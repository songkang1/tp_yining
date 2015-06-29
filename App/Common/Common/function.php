<?php

//--------------- PUBLIC ---------------// 
//调用option
function v_option($meta_key, $type = 'public', $where = array() ) {
    $where["meta_key"] = $meta_key;
    $where["type"] = $type;
    return M('option')->where($where)->getField('meta_value');
}

/**
 * meta 
 * @return string
 */
//调用meta
//function v_meta($meta_key, $type = 'public') {
//    return M('option')->where("meta_key='$meta_key' AND type='$type'")->getField('meta_value');
//}

/**
 * 检查是否存在这个key
 * @param type $meta_key
 * @return type
 */
//function v_check_meta($meta_key) {
//    return M('meta')->where("meta_key='$meta_key'")->getField('meta_key');
//}

//网站地址
function v_site_url() {
	return  M('option')->where("meta_key='site_url'")->getField('meta_value');
    //return  "http://localhost";
}
//title
function v_title() {
    $title =M('option')->where(array("meta_key='site_name'","lang"=>LANG_SET))->getField('meta_value');;
    //MODULE_NAME get HOME
    //CONTROLLER_NAME get controler
    //ACTION_NAME get action name
    if(MODULE_NAME == "Home"){
        $title .= " -  ".L("L_NAV_HOME");
    }
    else if(MODULE_NAME == "Article"){
        $title .= " - ".L("L_NAV_ARTICLE");
    }
    else if(MODULE_NAME == "Page"){
        $title .= " ";
    }
    else if(MODULE_NAME == "Product"){
        $title .= " - ".L("L_NAV_PRODUCT");
    }
  
	 
    
    
	return $title;
    //return  "http://localhost";
}
 

//模板目录
function v_theme_url() {
    return v_site_url() . '/Theme/default';
}

/**
 * 加载公共模板
 */
function v_template_part($data) {
    echo W("Common/Public/index", array("data"=>$data));
}
 

function v_islogin() {
    $value = $_SESSION['admin_user'];
    if ($value != "") {
        return true;
    } else {
        return false;
    }
};
function v_meta_seo() {
    
    $list = M("option")->where(array("meta_key"=>"meta","lang"=>LANG_SET))->select();
    $meta = $list[0]['meta_value'];
   $meta =  htmlspecialchars_decode($meta);
     
//    $keywords = v_meta("site_keywords"); //"java,php,WEB前端,web前端开发,javascript,HTML,css,技术随笔";//mc_option('article_keywords');
//    $description = v_meta("site_description"); //mc_option('article_description');
   
    return $meta;
}

//获取用户真实IP
function v_user_ip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    };
    return $ip;
}

 
 


//HTML危险标签过滤
function v_remove_html($str) {
    $str = htmlspecialchars_decode($str);
    $str = preg_replace("/\s+/", " ", $str); //过滤多余回车 
    $str = preg_replace("/<[ ]+/si", "<", $str); //过滤<__("<"号后面带空格) 

    $str = preg_replace("/<\!--.*?-->/si", "", $str); //注释 
    $str = preg_replace("/<(\!.*?)>/si", "", $str); //过滤DOCTYPE 
    $str = preg_replace("/<(\/?html.*?)>/si", "", $str); //过滤html标签 
    $str = preg_replace("/<(\/?head.*?)>/si", "", $str); //过滤head标签 
    $str = preg_replace("/<(\/?meta.*?)>/si", "", $str); //过滤meta标签 
    $str = preg_replace("/<(\/?body.*?)>/si", "", $str); //过滤body标签 
    $str = preg_replace("/<(\/?link.*?)>/si", "", $str); //过滤link标签 
    $str = preg_replace("/<(\/?form.*?)>/si", "", $str); //过滤form标签 
    $str = preg_replace("/cookie/si", "COOKIE", $str); //过滤COOKIE标签 

    $str = preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si", "", $str); //过滤applet标签 
    $str = preg_replace("/<(\/?applet.*?)>/si", "", $str); //过滤applet标签 

    $str = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", "", $str); //过滤style标签 
    $str = preg_replace("/<(\/?style.*?)>/si", "", $str); //过滤style标签 

    $str = preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si", "", $str); //过滤title标签 
    $str = preg_replace("/<(\/?title.*?)>/si", "", $str); //过滤title标签 

    $str = preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si", "", $str); //过滤object标签 
    $str = preg_replace("/<(\/?objec.*?)>/si", "", $str); //过滤object标签 

    $str = preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si", "", $str); //过滤noframes标签 
    $str = preg_replace("/<(\/?noframes.*?)>/si", "", $str); //过滤noframes标签 

    $str = preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si", "", $str); //过滤frame标签 
    $str = preg_replace("/<(\/?i?frame.*?)>/si", "", $str); //过滤frame标签 

    $str = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si", "", $str); //过滤script标签 
    $str = preg_replace("/<(\/?script.*?)>/si", "", $str); //过滤script标签 
    $str = preg_replace("/javascript/si", "Javascript", $str); //过滤script标签 
    $str = preg_replace("/vbscript/si", "Vbscript", $str); //过滤script标签 
    $str = preg_replace("/on([a-z]+)\s*=/si", "On\\1=", $str); //过滤script标签 
    $str = preg_replace("/&#/si", "&＃", $str); //过滤script标签

    return $str;
}
  
 /**
 * 邮件发送函数
 */
    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to);
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = ""; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }

function findChild(&$arr, $id) {
    $childs = array();
    foreach ($arr as $k => $v) {
        if ($v['sub_id'] == $id) {
            $childs[] = $v;
        }
    }
    return $childs;
}

function build_tree($root_id, $rows) {

    $childs = findChild($rows, $root_id);
    if (empty($childs)) {
        return null;
    }
    foreach ($childs as $k => $v) {
        $rescurTree = build_tree($v['id'], $rows);
        if (null != $rescurTree) {
            $childs[$k]['childs'] = $rescurTree;
        }
    }
    return $childs;
}

?>
