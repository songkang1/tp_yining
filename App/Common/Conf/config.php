<?php

return array(
    //'配置项'=>'配置值'
    'LOAD_EXT_CONFIG' => 'db',
    'TMPL_TEMPLATE_SUFFIX' => '.php', //更改模板文件后缀
    'TMPL_ENGINE_TYPE' => 'PHP', //自定义模板引擎
    'VIEW_PATH' => './Theme/', //指定模板目录
    'URL_MODEL' => '3', //URL模式
    'DEFAULT_FILTER' => 'htmlspecialchars', //htmlspecialchars过滤
    'SESSION_AUTO_START' => true, //是否开启session
    'URL_CASE_INSENSITIVE' => true, //URL不区分大小写   
    'DEFAULT_THEME' => 'default', //开支多模板支持，设置默认模板目录为default
    'TMPL_LOAD_DEFAULTTHEME' => true, //开启差异主题定义方式，当前模板无对应文件时，会自动调用默认模板文件 
    'TMPL_ACTION_ERROR' => 'Public:error', //默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success', //默认成功跳转对应的模板文
//     'TMPL_EXCEPTION_FILE' => 'Public:404',
//    'ERROR_PAGE' =>'/Theme/default/Public/404.html',
    'LANG_AUTO_DETECT' => true,
    'LANG_SWITCH_ON' => true, // 开启多语言功能
    'DEFAULT_LANG' => 'zh', // 设置默认语言为简体中文
    'LANG_LIST' => 'zh,en', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量
);
