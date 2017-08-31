<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minigongszzw/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minigongszzw/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minigongszzw/Public/ht/js/action.js"></script>
<script type="text/javascript" src="/minigongszzw/Public/ht/js/jquery-1.8.3.min.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 会员信息管理 】<a href="javascript:history.go(-1)" data-original-title="返回">返回</a></div>

<div class="aaa_pts_show_2">
    <div class="aaa_pts_3">
      <form action="<?php echo U('User/add');?>?id=<?php echo ($id); ?>" method="post" onsubmit="return ac_from();">
      <ul class="aaa_pts_5">
         <li>
            <div class="d1">登陆名称:</div>
            <div>
              <input class="inp_1" name="name" id="name" value="<?php echo ($userinfo["name"]); ?>" disabled=""/>
            </div>
         </li>
         <li>
            <div class="d1">用户权限:</div>
            <div>
              <select class="inp_1" name="qx" id="qx">
                 <!-- 权限遍历 category id=6 就是普通会员后续要改进一下表的结构 -->

                    <option value="6">普通会员</option>
  
                 <!-- 权限遍历 -->
              </select>
            </div>
         </li>
         <li>
          <div class="d1">所属店铺:</div>
          <div>
            <input class="inp_1" id="partner" value="<?php echo ($userinfo["shangchang"]); ?>" disabled="disabled"/>
            <input type="hidden" name="shop_id" id="shop_id" value="<?php echo ($userinfo["shop_id"]); ?>"/>
            <input type="button" value="选择店铺" class="aaa_pts_web_3" style="margin-left:15px;" onclick="win_open('<?php echo U('Shangchang/index');?>?type=xz',1280,800)">
            <input type="button" value="移除店铺" class="aaa_pts_web_3" style="margin-left:15px;" onclick="clearusr();">
          </div>
         </li>
         <li>
            <div class="d1">用户密码:</div>
            <div>
              <input class="inp_1" name="password" id="password"  type="password" /> &nbsp;&nbsp;&nbsp;不修改则留空
            </div>
         </li>
         <li>
            <div class="d1">用户姓名:</div>
            <div>
              <input class="inp_1" name="uname" id="uname" value="<?php echo ($userinfo["uname"]); ?>"/> &nbsp;&nbsp;&nbsp;请设置2个字符以上
            </div>
         </li>
         <li>
            <div class="d1">用户性别:</div>
            <div>
               <input type="radio" name="sex" value="0" <?php echo $userinfo['sex']==0 ? 'checked="checked"' : null?> /> 未知 &nbsp;
               <input type="radio" name="sex" value="1" <?php echo $userinfo['sex']==1 ? 'checked="checked"' : null?>/> 男  &nbsp;
               <input type="radio" name="sex" value="2" <?php echo $userinfo['sex']==2 ? 'checked="checked"' : null?> /> 女
            </div>
         </li>
         <li>
            <div class="d1">手机号码:</div>
            <div>
              <input class="inp_1" name="tel" id="tel" value="<?php echo ($userinfo["tel"]); ?>"/>&nbsp;&nbsp;&nbsp;请输入数字或电话
            </div>
         </li>
         <li>
            <div class="d1">用户邮箱:</div>
            <div>
              <input class="inp_1" name="email" id="email" value="<?php echo ($userinfo["email"]); ?>"/>&nbsp;&nbsp;&nbsp;例如：leren@xxx.com
            </div>
         </li>
         <?php if($userinfo["shop_id"] != 0): ?><li>
            <div class="d1">店铺保证金:</div>
            <div>
              <input class="inp_1" name="shop_money" id="shop_money" value="<?php echo ($userinfo["shop_money"]); ?>" disabled="" />
              <?php if($userinfo["shop_money"] > 0): ?><input type="button" value="退还保证金" class="aaa_pts_web_3" style="margin-left:15px;" onclick="refund(<?php echo ($userinfo["id"]); ?>,<?php echo ($userinfo["shop_money"]); ?>);"><?php endif; ?>
            </div>
         </li><?php endif; ?>
         <li>
            <div class="d1">注册时间:</div>
            <div>
              <input class="inp_1" name="addtime" id="addtime" value="<?php echo $userinfo['addtime']!='' ? date("Y-m-d H:i",$userinfo['addtime']) : null; ?>"/>&nbsp;&nbsp;&nbsp;可以留空
            </div>
         </li>
         <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0"></li>
      </ul>
      </form>
         
    </div>
    
</div>
<script>
function ac_from(){

  var uname=document.getElementById('uname').value;
  if(uname.length<2){
	  alert('用户昵称长度不能少于2');
	  return false;
	  }
  
  if(!<?php echo $id; ?>){
	  var password=document.getElementById('password').value;
	  if(password.length<6){
		  alert('密码长度不能少于6');
		  return false;
		  }  
  }
  
  var tel=document.getElementById("tel").value;
  var regx=/^1[34578]\d{9}$/;
  if (!regx.test(tel)) {
      alert("手机号码不合法，请输入正确的手机号码");
	  return false;
  }
 
  var email=document.getElementById("email").value;
  var regx=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (!regx.test(email)) {
      alert("邮箱格式不正确");
    return false;
  }
   
}
function clearusr(){
  document.getElementById('partner').value='';
  document.getElementById('shop_id').value='';
}
function refund(userid,money){
  if(confirm("是否给予该会员退还保证金？")){
      $.ajax({
         type: "POST",
         url: "<?php echo U('User/ajax_refund');?>",
         data: {
            uid: userid,
            money:money
         },
         success: function(msg){
           if(msg==1){
             alert( "退款成功！");
             document.getElementById('shop_money').value='';
           }else{
             alert( "退款失败！");
           }
           
         }
      });
  }
}
</script>
</body>
</html>