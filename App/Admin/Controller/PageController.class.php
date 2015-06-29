<?php

namespace Admin\Controller;

use Think\Controller;

class PageController extends Controller {

    public function index() {
        $pagesize = 7;


        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            /**
             *  初始化文章
             */
            $M = M('page'); // 实例化Data数据对象
//            $map['tag'] = array('like', "%" . $tag . "%"); 
//        $map['type'] = array('like', "article");
            $map['lang'] = array('like', LANG_SET);
            $count = $M->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

            $Page = new \Think\Page($count, $pagesize); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

            $totalpage = ceil($Page->totalRows / $pagesize);

            $show["total_page"] = $totalpage; // 分页显示输出
            $show["curr_page"] = $Page->parameter['p']; // 分页显示输出
            // 进行分页数据查询

            $orderby['id'] = 'desc';

            //$list = $M->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();
	    $list = $M->order($orderby)->where($map)->select();


            $this->assign('staticpage', $list); // 赋值数据集
//print_r($Page->show());die;
            $this->assign('page', $show); // 赋值分页输出



            $this->theme("default")->display('Admin/Page/index');
        }
    }

    /**
     * 通过ID获取文章
     * @param type $id 文章ID
     */
    public function edit($id = 0) {
        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }

            $this->pages = M("page")->where(array("lang" => LANG_SET,"top"=>"top"))->select();
            $this->staticpage = M('page')->where("id='$id'")->select();
            $this->theme("default")->display('Admin/Page/edit');
        }
    }

    /**
     * 保存
     */
    public function save() {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (IS_POST) {
                $page['id'] = I('param.pageid');
                  $page['sub_id'] = I('param.sub_id');
                $page['title'] = I('param.title');
                $page['summary'] = I('param.summary');
                $page['body'] = I('param.body');
                $page['callcode'] = I('param.callcode');
		if($page['sub_id'] == "0"){
		   $page['top'] = "top";
		}


                $page['created'] = time();
                $page['lang'] = LANG_SET;
//                $page['type'] = I('param.type');


                if ($page['id'] == "") {
                    $result = M('page')->data($page)->add();
                } else {
                    $result = M('page')->data($page)->save();
                }

                $this->success('发布成功.');
            } else {
                $this->error('你干啥呢？');
            }
        }
    }

    /**
     * 删除
     */
    public function delete($id) {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
            $m = M("page");
            $result = $m->where('id=' . $id)->delete();
            if ($result) {
                $this->success('删除成功.');
            } else {
                $this->error('删除失败，请重试.');
            }
        }
    }

}
