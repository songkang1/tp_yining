<?php

namespace Admin\Controller;

use Think\Controller;

class ArticleController extends Controller {

    public function index() {
        $pagesize = 7;


        if (!v_islogin()) {
            $this->error('请登录', U("Admin/User/Login"));
        } else {
            /**
             *  初始化文章
             */
            $Article = M('article'); // 实例化Data数据对象

//            $map['tag'] = array('like', "%" . $tag . "%");
            $map['lang'] = array('like', LANG_SET);
            /**
             * seache
             */
            $categoryid = $_POST['category_id'];
            $title = $_POST['title'];
            if($categoryid != ""){
                $map['category_id'] = array('like', "$categoryid");
            }
            if($title !=""){
                $map['title'] = array('like', "%" . $title . "%");
            }
               $this->assign('querydata',$_POST); // 赋值数据集
            
//        $map['type'] = array('like', "article");

            $count = $Article->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

            $Page = new \Think\Page($count, $pagesize); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

            $totalpage = ceil($Page->totalRows / $pagesize);

            $show["total_page"] = $totalpage; // 分页显示输出
            $show["curr_page"] = $Page->parameter['p']; // 分页显示输出
            // 进行分页数据查询

            $orderby['id'] = 'desc';

            $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();



            $this->assign('article', $list); // 赋值数据集
             $this->assign('categorylist', M('article_category')->where(array("lang"=>LANG_SET))->select()); // 赋值数据集
           
//print_r($Page->show());die;
            $this->assign('page', $show); // 赋值分页输出



            $this->theme("default")->display('Admin/Article/index');
        }
    }

//     public function edit() {
//        $this->theme("default")->display('Admin/Article/edit');
//    }

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

            $this->assign('categorylist', M('article_category')->where(array("lang"=>LANG_SET))->select()); // 赋值数据集
            $this->article = M('article')->where("id='$id'")->select();
            $this->theme("default")->display('Admin/Article/edit');
        }
    }

    /**
     * 新增文章
     * @param type $id 文章ID
     */
//    public function add($id = 1) {
//        if (!v_islogin()) {
//            $this->success('请登录', "/?m=admin&a=login");
//        } else {
//            $this->theme(sk_option('theme'))->display('Admin/articleedit');
//        }
//    }

    /**
     * 保存
     */
    public function save() {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (IS_POST) {
                $page['id'] = I('param.articleid');
                $page['category_id'] = I("param.categoryid");
                $page['title'] = I('param.title');
               
                $page['summary'] = I('param.summary');
                $page['tag'] = I('param.tag');
                $page['body'] = I('param.body');
                $page['created'] = time();
                $page['lang'] = LANG_SET ;
 					 $page['img'] = I('param.img');
 	             $page['img'] = substr($page['img'], 0, strlen($page['img']) - 2);

//                $page['type'] = I('param.type');


                if ($page['id'] == "") {
                    $result = M('article')->data($page)->add();
                } else {
                    $result = M('article')->data($page)->save();
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
            $article = M("article");
            $result = $article->where('id=' . $id)->delete();
            if ($result) {
                $this->success('删除成功.');
            } else {
                $this->error('删除失败，请重试.');
            }
        }
    }

    /**
     * ###############################################article category  manager################################
     */
    public function categorylist() {

        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            $categorylist = M('article_category')->where(array("lang"=>LANG_SET))->select();

            $this->assign('categorylist', $categorylist); // 赋值数据集

            $this->theme(v_option('theme'))->display('Admin/Article/categorylist');
        }
    }

    public function categoryedit($id = 0) {

        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
            $ategory = M('article_category')->where("id='$id'")->select();
            $this->assign('category', $ategory); // 赋值数据集
            $this->theme(v_option('theme'))->display('Admin/Article/categoryedit');
        }
    }

    /**
     * 删除
     */
    public function categorydelete($id) {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }

            $article = M('article')->where("category_id='$id'")->count();
            if ($article <= 0) {
                $category = M("article_category");
                $result = $category->where('id=' . $id)->delete();
                if ($result) {
                    $this->success('删除成功.');
                } else {
                    $this->error('删除失败，请重试.');
                }
            }else{
                 $this->error('该分类下还有文章，不能删除该分类');
            }
        }
    }

    /**
     * 保存
     */
    public function categorysave() {
        if (!v_islogin()) {
            $this->success('请登录', U("Admin/User/Login"));
        } else {
            if (IS_POST) {
                $page['id'] = I('param.id');
                $page['name'] = I('param.name');
                $page['desc'] = I('param.desc');
                $page['lang'] = LANG_SET ;
                  $page['created'] =time();
                if ($page['id'] == "") {
                    $result = M('article_category')->data($page)->add();
                } else {
                    $result = M('article_category')->data($page)->save();
                }
                $this->success('发布成功.');
            } else {
                $this->error('你干啥呢？');
            }
        }
    }

}
