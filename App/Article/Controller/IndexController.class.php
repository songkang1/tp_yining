<?php

namespace Article\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index($category = 0) {
        $pagesize = 10;


        /**
         *  初始化文章
         */
        $Article = M('article'); // 实例化Data数据对象
//            $map['tag'] = array('like', "%" . $tag . "%");
        $map['lang'] = array('like', LANG_SET);
        if($category != 0){
        $map['category_id'] = array('like', $category);
        $temo = M('article_category')->where(array("lang" => LANG_SET,"id"=>$category))->select();
        $this->assign('currcategory', $temo[0]); // 赋值数据集
        }
     
        $count = $Article->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new \Think\Page($count, $pagesize); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

        $totalpage = ceil($Page->totalRows / $pagesize);

        $show["total_page"] = $totalpage; // 分页显示输出
        $show["curr_page"] = $Page->parameter['p']; // 分页显示输出
        // 进行分页数据查询

        $orderby['id'] = 'desc';

        $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();



        $this->assign('articlelist', $list); // 赋值数据集
       $categorylist = M('article_category')->where(array("lang" => LANG_SET))->select();

        $tree = build_tree(0, $categorylist);
        $this->assign('categorylist', $tree); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出









        $this->theme("default")->display('Article/index');
    }
    
    
    public function single($id){
        
        
           $categorylist = M('article_category')->where(array("lang" => LANG_SET))->select();

        $tree = build_tree(0, $categorylist);
        $this->assign('categorylist', $tree); // 赋值数据集
            $article = M('article')->where("id='$id'")->select();       
            $article[0]["category"] =  M('article_category')->where(array("id"=>$article[0]['category_id']))->select();
            $this->article = $article; 
        $this->assign('currcategory',  $article[0]["category"][0]); // 赋值数据集
            $this->theme("default")->display('Article/single');
    }

}
