<?php

namespace Product\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index($category = 0) {
        $pagesize = 12;


        /**
         *  初始化文章
         */
        $Article = M('product'); // 实例化Data数据对象
//            $map['tag'] = array('like', "%" . $tag . "%");
        $map['lang'] = array('like', LANG_SET);
        if($category != 0){
        $map['category_id'] = array('like', $category);
        $temo = M('product_category')->where(array("lang" => LANG_SET,"id"=>$category))->select();
        if($temo[0]['sub_id'] == "0"){
             $subcategory = M('product_category')->where(array("lang" => LANG_SET,"sub_id"=>$category))->select();
             $in = "";
             foreach ($subcategory as $subcate){
                 //$map['id']  = array('not in','1,5,8');
                 $in .= $subcate['id'].",";
             }
             $in =substr($in,0,strlen($in)-1); 
             
            $map['category_id']  = array('in',$in);
        }
        $this->assign('currcategory', $temo[0]); // 赋值数据集
        }else{
             $this->assign('currcategory',array("img"=>  v_theme_url()."/img/logo.png","name"=>"","summary"=>"")); // 赋值数据集
        }
        /**
         * seache
         */
//        $categoryid = $_POST['category_id'];
//        $title = $_POST['title'];
//        if ($categoryid != "") {
//            $map['category_id'] = array('like', "$categoryid");
//        }
//        if ($title != "") {
//            $map['title'] = array('like', "%" . $title . "%");
//        }
//        $this->assign('querydata', $_POST); // 赋值数据集
//        $map['type'] = array('like', "article");

        $count = $Article->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new \Think\Page($count, $pagesize); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

        $totalpage = ceil($Page->totalRows / $pagesize);

        $show["total_page"] = $totalpage; // 分页显示输出
        $show["curr_page"] = $Page->parameter['p']; // 分页显示输出
        // 进行分页数据查询

        $orderby['id'] = 'desc';

        $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();

$categorylist = M('product_category')->where(array("lang" => LANG_SET))->order(array("order"=>"asc","created"=>"desc"))->select();
    $tree = build_tree(0, $categorylist);
    $this->assign('categorylist', $tree); // 赋值数据集
        $this->assign('product', $list); // 赋值数据集
        
//print_r($Page->show());die;
        $this->assign('page', $show); // 赋值分页输出









        $this->theme("default")->display('Product/index');
    }
    
    
    public function single($id){
        
        
           $categorylist = M('product_category')->where(array("lang" => LANG_SET))->order(array("order"=>"asc","created"=>"desc"))->select();
    $tree = build_tree(0, $categorylist);
    $this->assign('categorylist', $tree); // 赋值数据集
    
            $product = M('product')->where("id='$id'")->select();
            
            $arr = explode("||",$product[0]['img']);
            $product[0]["img"] = $arr;
            $this->product = $product;
              $currcategory  =  M('product_category')->where(array("id"=>$product[0]['category_id']))->select();
              
              $after=M("product")->where("id>".$id)->order('id asc')->limit('1')->find(); 
               $this->assign('after',$after); // 赋值数据集
             $this->assign('currcategory',$currcategory[0]); // 赋值数据集
            $this->theme("default")->display('Product/single');
    }

}
