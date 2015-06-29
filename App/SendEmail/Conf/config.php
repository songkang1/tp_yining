<?php
return array(
	//'配置项'=>'配置值'
    	#WECHAT服务器配置（用于接收用户信息识别token）
    'MAIL_HOST' =>v_option("MAIL_HOST","email"),//'smtp.exmail.qq.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>v_option("MAIL_USERNAME","email"),//'1012508994@qq.com',//你的邮箱名
    'MAIL_FROM' =>v_option("MAIL_FROM","email"),//'1012508994@qq.com',//发件人地址
     'MAIL_TO' =>v_option("MAIL_TO","email"),//'1012508994@qq.com',//收件人地址
    'MAIL_FROMNAME'=>v_option("MAIL_FROMNAME","email"),//'',//发件人姓名
    'MAIL_PASSWORD' =>v_option("MAIL_PASSWORD","email"),//'song19940217qq,.',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
);