<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
</head>
<style>
*{margin:0; padding:0; }
div,ul{overflow:hidden;}
body{background:url("/minigongszzw/Public/ht/images/login_01.jpg") repeat 0 0;}
.d1{background:url("/minigongszzw/Public/ht/images/login_02.jpg") no-repeat center top; padding-top:373px; position:absolute; top:0; bottom:0; width:100%; min-width:1020px;}
.d2{width:1000px; margin:0 auto;}
.c1{list-style:none;}
.c1{color:#fff; font-size:30px; text-align:center;}
.c1 .r1{color:#2ac3ff; padding-left:10px;}

.c2{list-style:none; margin-top:58px; text-align:center; width:100%;}
.c2 li{width:195px; height:42px; margin-right:10px; background:url("/minigongszzw/Public/ht/images/icon.jpg") no-repeat 9px 10px #fff; display:inline-block;}
.c2 li input{width:150px; height:33px; line-height:33px; border:0; border-left:1px solid #dedede; margin-left:38px; margin-top:5px; text-indent:5px; outline:none;}
.c3{text-align:center; margin-top:30px;}
.c4{text-align:right; padding-right:20px; color:#fff; font-size:12px; margin-top:101px;}
</style>
<body>
<form name="Form1" method="post" action="?key=<?php echo $key;?>" id="Form1" onsubmit="return chkForm()">
<div class="d1">
   <div class="d2">
       <div class="c1">
          小程序综合管理系统
          <!-- 这个在后台可以管理 -->
          <font class="r1"><?php echo $sysname ? $sysname."小程序" : '乐仁平台';?></font>
       </div>
       
       <ul class="c2">
         <li style="background-position:9px -57px"><input placeholder="输入管理账号" id="username" name="username"/></li>
         <li style="background-position:9px -138px;"><input placeholder="输入管理密码" type="password" id="pwd" name="pwd"/></li>
       </ul>
       <div class="c3">
          <input type="image" src="/minigongszzw/Public/ht/images/submit.jpg" name="submit" value="1"/>
          <div class="c4">Copyright © 2016 leren.</div>
       </div>
   </div>
</div>
</form>
</body>
</html>
<script>
var username=document.getElementById("username");
var pwd=document.getElementById("pwd");
function chkForm(){
	if(username.value==''){
		alert('用户名不能为空！');
		username.focus();
		return false;
		}
	if(pwd.value==''){
		alert('密码不能为空！');
		pwd.focus();
		return false;
		}
	}
</script>

<!--[if lt IE 9]>
  <script>
    alert('浏览器版本过低，请及时更新浏览器版本！');
    window.open('http://chrome.360.cn/');
    
    app_name.value = "输入app名称";
    username.value = "输入管理账号";
    pwd.value = "输入管理密码";
    
  </script>
  <style>
  .c2 {padding-left:200px;}
  .c2 li{float:left;}
  </style>
<!--<![endif]-->