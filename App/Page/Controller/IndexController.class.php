<?php

namespace Page\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index($id) {
        $article = M('page')->where(array("callcode='$id'", "lang" => LANG_SET))->select();
        $this->article = $article;



        $temo = M('page')->where(array("lang" => LANG_SET, "id" => $article[0]['id']))->select();
        $this->assign('currcategory', $temo[0]); // 赋值数据集
        $categorylist = M('page')->where(array("lang" => LANG_SET,"_string"=>"sub_id='".$temo[0]['id']."' OR id = '".$temo[0]['id']."'"))->select();

        $tree = build_tree(0, $categorylist);
        $this->assign('categorylist', $tree); // 赋值数据集
        if ($id != "about" && $id != "channel" && $id != "support") {
           
            $id = "about";
        }
        $this->assign("backup", $id);

        $this->theme("default")->display('Page/index');
    }

    public function single($id, $s = "") {
        if(!is_numeric($id)){
            $temp = M('page')->where(array("callcode='$id'", "lang" => LANG_SET))->find();
            $temp1 = M("page")->where(array("sub_id"=>$temp['id']))->limit("1")->find();
            $s = $id;
	    $id = $temp1['id'];
	    
            
        }
        $article = M('page')->where(array("id='$id'", "lang" => LANG_SET))->select();
        $this->article = $article;


        $temo = M('page')->where(array("lang" => LANG_SET, "id" => $article[0]['id']))->select();
        $this->assign('currcategory', $temo[0]); // 赋值数据集
        
	//print_r($s);
	if ($s != "about" && $s != "channel" && $s != "support") {
           // $s = "about";
      	}
	
        $this->assign("backup", $s);
        $categorylist = M('page')->where(array("lang" => LANG_SET,"_string"=>"sub_id='".$article[0]['sub_id']."' OR id = '".$article[0]['sub_id']."'"))->select();

        $tree = build_tree(0, $categorylist);
        $this->assign('categorylist', $tree); // 赋值数据集
        $this->theme("default")->display('Page/index');
    }

}
