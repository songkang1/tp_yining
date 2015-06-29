<?php

namespace SendEmail\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function send(){
        
        $body = $_POST['body'];
        $email = $_POST['email'];
        
        $res =sendMail(C("MAIL_TO"), "来自网站的邮件", $body."<br /><span style='display:block; width:100%; text-align:right'>来自[".$email."]</span>");
        if(res){
            echo "200";
        }
        else{
            echo "303";
        }
        
        
    }

}
