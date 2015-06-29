<?php

namespace Admin\Controller;

use Think\Controller;

class LinkController extends Controller {

    public function index() {
        $pagesize = 7;


        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            
            $link = M('link'); // 实例化Data数据对象

//            $map['tag'] = array('like', "%" . $tag . "%");
            $map['lang'] = array('like', LANG_SET);
            

            $count = $link->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

            $Page = new \Think\Page($count, $pagesize); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

            $totalpage = ceil($Page->totalRows / $pagesize);

            $show["total_page"] = $totalpage; // 分页显示输出
            $show["curr_page"] = $Page->parameter['p']; // 分页显示输出
            // 进行分页数据查询

            $orderby['id'] = 'desc';

            $list = $link->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();



            $this->assign('link', $list); // 赋值数据集
            
            $this->assign('page', $show); // 赋值分页输出



            $this->theme("default")->display('Admin/Link/index');
        }
    }

//     public function edit() {
//        $this->theme("default")->display('Admin/Article/edit');
//    }

    /**
     *  
     * @param type $id 文章ID
     */
    public function edit($id = 0) {
        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
 
            $this->link = M('link')->where("id='$id'")->select();
            $this->theme("default")->display('Admin/Link/edit');
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
                $page['id'] = I('param.id');
               
                $page['name'] = I('param.name');
                $page['category'] = I('param.category');
                $page['weburl'] = I('param.weburl');
                $page['created'] = time();
                $page['lang'] = LANG_SET;

//                $page['type'] = I('param.type');


                if ($page['id'] == "") {
                    $result = M('link')->data($page)->add();
                } else {
                    $result = M('link')->data($page)->save();
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
            $link = M("link");
            $result = $link->where('id=' . $id)->delete();
            if ($result) {
                $this->success('删除成功.');
            } else {
                $this->error('删除失败，请重试.');
            }
        }
    }
 

}
