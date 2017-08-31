<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minigongszzw/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minigongszzw/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minigongszzw/Public/ht/js/action.js"></script>
</head>
<body>

<div class="aaa_pts_show_1">【 程序配置信息 】</div>

<div class="aaa_pts_show_2">
    

    <div class="aaa_pts_3">
      <form action="<?php echo U('More/save_bottom');?>" method="post" onsubmit="return ac_from();"  enctype="multipart/form-data">
      <ul class="aaa_pts_5">
         <li>
            <div class="d1">公司名称:</div>
            <div>
              <input class="inp_1" name="name" id="name" value="<?php echo ($server["name"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">联系电话:</div>
            <div>
              <input class="inp_1" name="phone" id="phone" value="<?php echo ($server["phone"]); ?>"/>
              <input type="hidden" name="id"  value="<?php echo ($server["id"]); ?>"/>
            </div>
         </li>
         <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0"></li>
      </ul>
      </form>
         
    </div>
    
</div>
<script>
function ac_from(){
  var name=document.getElementById('name').value;
  if(!name){
	  alert('请输入公司名称！');
	  return false;
	}
  var phone=document.getElementById('phone').value;
  if(!phone){
    alert('请输入联系电话！');
    return false;
  }
  if(!(/^1[34578]\d{9}$/.test(phone))){ 
      alert("手机号码格式不正确！");  
      return false; 
  } 
}
</script>
</body>
</html>