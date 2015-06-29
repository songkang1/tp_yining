<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
         $this->theme("default")->display('Index/index');
    }
  /**
     * 红酒介绍_上下滚动
     */
    public function happyNewYear() {
         $this->theme("default")->display('Public/wx_wine');
    }
 

}