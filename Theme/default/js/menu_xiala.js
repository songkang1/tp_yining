(function(){
	function GetCookie(sname)
	{
		var acookie=document.cookie.split(";");
		for(var i=0;i<acookie.length;i++)
		{
			var arr=acookie[i].split("=");
			if(sname==trim(arr[0]))
			{
				if(arr.length>1)
			{
			userName = arr[1].substring(0,8);
					return unescape(userName);
				}
			else
				{
			return "";
			}
			}
		}
		return "";
	}
	function trim (trimStr)
	{
		return trimStr.replace(/(^\s*)|(\s*$)/g, "");
	}
	function GetCurUrl()
	{
	 var curUrl = window.location.href;
	 var arrayStr = curUrl.split("?ResponseTicket");
	 return arrayStr[0];
	}
	/*with (document) {
		if(GetCookie("USER_ID").length>0)
		{
			getElementById("loged").innerHTML = "<b>欢迎 <a href='/My_H3C/' title='点此进入“我的H3C”'><font color='#76A1CA'>"+GetCookie("USER_ID")+"</font>&nbsp;</a></b><li>|</li><a href='/My_H3C/Commen_User/My_ProfileCenter/' title='修改您的个人信息、密码'>修改信息</a> | <a href='http://www.h3c.com/Aspx/Home/Login/LoginOutPage.aspx?backurl="+GetCurUrl()+"' title='退出登录'>退出&nbsp;</a>";
		
		getElementById("loged").style.cssFloat = "left";
			getElementById("loged").style.styleFloat = "left";
		}
	}*/
	$("#Navi > .toplevel").hover(function(){
		$(this).addClass("current").find(".submenu").stop(true,true).slideDown(90);
	}, function(){
		$(this).removeClass("current").find(".submenu").stop(true,true).hide();
	});
})();
