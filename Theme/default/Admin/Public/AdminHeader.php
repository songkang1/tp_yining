<!DOCTYPE html>
<html lang="en">   
    <head>

        <meta charset="utf-8" />

        <title>   <?php echo v_title(); ?></title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <?php echo v_meta_seo(); ?>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/style.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES --> 

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

        <link href="<?php echo v_theme_url(); ?>/Admin/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- END PAGE LEVEL STYLES -->

        <link rel="shortcut icon" href="<?php echo v_theme_url(); ?>/Admin/media/image/favicon.ico" />


        <script type="text/javascript" src="<?php echo v_theme_url(); ?>/js/jquery.min.js"></script>
        <!--百度文本编辑器-->
        <!-- 加载编辑器的容器 -->

        <!-- 配置文件 -->
        <script type="text/javascript" src="<?php echo v_theme_url(); ?>/Admin/media/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="<?php echo v_theme_url(); ?>/Admin/media/ueditor/ueditor.all.js"></script>

    </head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="page-header-fixed">

        <!-- BEGIN HEADER -->

        <div class="header navbar navbar-inverse navbar-fixed-top">

            <!-- BEGIN TOP NAVIGATION BAR -->

            <div class="navbar-inner">

                <div class="container-fluid">

                    <!-- BEGIN LOGO -->

                    <a class="brand" href="index.html">
                        LOGO

                    </a>

                    <!-- END LOGO -->

                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->

                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

                        <img src="media/image/menu-toggler.png" alt="" />

                    </a>          

                    <!-- END RESPONSIVE MENU TOGGLER -->            

                    <!-- BEGIN TOP NAVIGATION MENU -->              

                    <ul class="nav pull-right">

                        <!-- BEGIN USER LOGIN DROPDOWN -->

                        <li class="dropdown user">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img alt="" src="<?php echo v_theme_url(); ?>/Admin/media/image/avatar1_small.jpg" />

                                <span class="username">Admin</span>

                                <i class="icon-angle-down"></i>

                            </a>

                            <ul class="dropdown-menu">

                                <li><a href="<?php echo U("Admin/User/profile"); ?>"><i class="icon-user"></i> My Profile</a></li>

<!--							<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

                                                        <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

                                                        <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>-->

                                <li class="divider"></li>

                                                        <!--<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>-->

                                <li><a href="<?php echo U("Admin/User/loginOut"); ?>"><i class="icon-key"></i> Log Out</a></li>

                            </ul>

                        </li>

                        <li class="dropdown user" style="padding:5px 0px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">


                                <span class="username"><?php if (LANG_SET != "zh") {
            echo "英文";
        } else {
            echo "中文";
        } ?></span>

                                <i class="icon-angle-down"></i>

                            </a>



                            <ul class="dropdown-menu">

                                <li><a href="<?php
                                       $lang = "zh";
                                       if (LANG_SET == "zh") {
                                           $lang = "en";
                                       }
                                       echo U("Admin/index/index/l/" . $lang . "");
                                       ?>"><?php if (LANG_SET == "zh") {
                                           echo "英文";
                                       } else {
                                           echo "中文";
                                       } ?></a></li>



                            </ul>

                        </li>
                        <!-- END USER LOGIN DROPDOWN -->

                    </ul>

                    <!-- END TOP NAVIGATION MENU --> 

                </div>

            </div>

            <!-- END TOP NAVIGATION BAR -->

        </div>

        <!-- END HEADER -->

        <!-- BEGIN CONTAINER -->

        <div class="page-container">

            <!-- BEGIN SIDEBAR -->

            <div class="page-sidebar nav-collapse collapse">

                <!-- BEGIN SIDEBAR MENU -->        

                <ul class="page-sidebar-menu">

                    <li>

                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                        <div class="sidebar-toggler hidden-phone"></div>

                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                    </li>

                    <li>

                       

                    </li>

                    <li class="start ">

                        <a href="<?php echo U("Admin/Index/index"); ?>">

                            <i class="icon-home"></i> 

                            <span class="title">仪表盘</span>

                            <span class="selected"></span>

                        </a>

                    </li>

                    <li class="">
                        <a href="javascript:;">
                            <i class="icon-file-text"></i> 
                            <span class="title">文章管理</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">

                            <li class="">
                                <a href="<?php echo U("Admin/Article/index"); ?>">
                                    文章列表</a>
                            </li>
<!--                            <li >
                                <a href="<?php echo U("Admin/Article/edit"); ?>">
                                    添加新文章</a>
                            </li>-->
                            <li>
                                <a href="<?php echo U("Admin/Article/categorylist"); ?>">
                                    文章分类列表</a>
                            </li>
<!--                            <li>
                                <a href="<?php echo U("Admin/Article/categoryedit"); ?>">
                                    添加新文章分类</a>
                            </li>-->


                        </ul>

                    </li>
                    <li class="">
                        <a href="javascript:;">
                            <i class="icon-file-text"></i> 
                            <span class="title">产品管理</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">

                            <li class="">
                                <a href="<?php echo U("Admin/Product/index"); ?>">
                                    产品列表</a>
                            </li>
<!--                            <li >
                                <a href="<?php echo U("Admin/Product/edit"); ?>">
                                    添加产品</a>
                            </li>-->
                            <li>
                                <a href="<?php echo U("Admin/Product/categorylist"); ?>">
                                    产品分类列表</a>
                            </li>
<!--                            <li>
                                <a href="<?php echo U("Admin/Product/categoryedit"); ?>">
                                    添加新产品分类</a>
                            </li>-->

                        </ul>

                    </li>
                    <li class="">
                        <a href="javascript:;">
                            <i class="icon-file-text"></i> 
                            <span class="title">单页面管理</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">

                            <li class="">
                                <a href="<?php echo U("Admin/Page/index"); ?>">
                                    单页面列表</a>
                            </li>
<!--                            <li >
                                <a href="<?php echo U("Admin/Page/edit"); ?>">
                                    添加单页</a>
                            </li>-->
                        </ul>

                    </li>
                    <li class="">
                        <a href="javascript:;">
                            <i class="icon-file-text"></i> 
                            <span class="title">友情链接</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="">
                                <a href="<?php echo U("Admin/Link/index"); ?>">
                                    所有友情链接</a>
                            </li>
<!--                            <li >
                                <a href="<?php echo U("Admin/Link/edit"); ?>">
                                    添加友情链接</a>
                            </li>-->


                        </ul>

                    </li>
                    <li class="">
                        <a href="javascript:;">
                            <i class="icon-file-text"></i> 
                            <span class="title">网站设置</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">

                            <!--						<li>
                                                                                    <a href="<?php echo U("Admin/Setting/meta"); ?>">
                                                                                    网站Meta参数设置</a>
                                                                            </li>-->
<!--                            <li >
                                <a href="<?php echo U("Admin/Setting/option"); ?>">
                                    网站Option设置</a>
                            </li>-->
                            <li >
                                <a href="<?php echo U("Admin/Setting/email"); ?>">
                                    设置</a>
                            </li>


                        </ul>

                    </li>
                </ul>

                <!-- END SIDEBAR MENU -->

            </div>

            <!-- END SIDEBAR -->

            <!-- BEGIN PAGE -->

            <div class="page-content">

                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                <div id="portlet-config" class="modal hide">

                    <div class="modal-header">

                        <button data-dismiss="modal" class="close" type="button"></button>

                        <h3>Widget Settings</h3>

                    </div>

                    <div class="modal-body">

                        Widget settings form goes here

                    </div>

                </div>

                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                <!-- BEGIN PAGE CONTAINER-->

                <div class="container-fluid">

                    <script type="text/javascript">
                        $(function () {
                            var strs = new Array();
                            var val = $("#nav-current-index").val();
                            if (val != null) {
                                strs = val.split("|");//将它分割成数租


                                $(".page-sidebar-menu > li").eq(strs[0]).addClass("active");

                                if (strs[1] != -1) {

                                    $(".page-sidebar-menu > li").eq(strs[0]).find("ul > li").eq(strs[1]).addClass("active");
                                }
                            }

                        });
                    </script>
