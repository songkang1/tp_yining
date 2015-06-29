<?php

namespace Admin\Controller;

use Think\Controller;

class SettingController extends Controller {

    public function index() {

        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            $meta = M('option');
            $map['lang'] = array('like', LANG_SET);
            $map['type'] = "public";
            $list = $meta->where($map)->select();
            $this->assign('option', $list); // 赋值数据集
            $this->theme("default")->display('Admin/Setting/option');
        }
    }

    public function option() {

        self::index();
    }

    public function saveOption() {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (IS_POST) {
                $page['id'] = I('param.id');
                $page['meta_key'] = I('param.meta_key');
                $page['meta_value'] = I('param.meta_value');
                $page['type'] = I('param.type');
                if ($page['id'] == "") {
                    $result = M('option')->data($page)->add();
                } else {
                    $result = M('option')->data($page)->save();
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
    public function deleteOption($id) {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
//            if (!is_numeric($id)) {
//                $this->error('参数错误');
//            }
//            $option = M("option");
//            $result = $option->where('id=' . $id)->delete();
//            if ($result) {
//                $this->success('删除成功.');
//            } else {
//                $this->error('删除失败，请重试.');
//            }
            $this->error('不能删除');
        }
    }

    /**
     * email
     */
    public function email() {

        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            $meta = M('option');
            $map['lang'] = array("like", "%" . LANG_SET . "%");
            $map['type'] = "email";
            $email = $meta->where($map)->select();
            $this->assign('email', $email); // 赋值数据集

            $map['type'] = "other";
            $other = $meta->where($map)->select();
            $this->assign('other', $other); // 赋值数据集

            $map['type'] = "index";
            $index = $meta->where($map)->select();
            $this->assign('index', $index); // 赋值数据集

            $map['type'] = "public";
            $seo = $meta->where($map)->select();
            $this->assign('seo', $seo); // 赋值数据集
            
            $this->theme("default")->display('Admin/Setting/email');
        }
    }

    public function saveEmail() {
//
//        print_r("<pre>");
//        print_r($_POST);
//        print_r("</pre>");
//        die;
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (IS_POST) {

                $requestdata = $_POST;
                foreach ($requestdata['id'] as $value) {
                    $page = array();
                    $page['id'] = $value;
                    $page['meta_key'] = $requestdata['meta_key'][$value];
                    $page['meta_value'] = $requestdata['meta_value'][$value];
                    $page['type'] = $requestdata['type'][$value];
                    M('option')->data($page)->save();
                }
                $this->success('发布成功.');
            } else {
                $this->error('你干啥呢？');
            }
        }
    }

}
