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

<div class="aaa_pts_show_1">【 意见管理 】</div>

<div class="aaa_pts_show_2">
    <div>
       <div class="aaa_pts_4"><a href="<?php echo U('Suggest/index');?>">意见管理</a></div>
    </div>
    <div class="aaa_pts_3">
      
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:90px;">ID</td>
           <td style="width:90px;">用户名</td>
           <td style="width:200px;">内容</td>
           <td style="width:100px;">时间</td>
           <td style="width:100px;">操作</td>
         </tr>
         <tbody id="news_option">
         <!-- 遍历 -->
          <?php if(is_array($suggest)): $i = 0; $__LIST__ = $suggest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
             <td><?php echo ($v["id"]); ?></td>
             <td><?php echo ($v["username"]); ?></td>
             <td><?php echo ($v["content"]); ?></td>
             <td><?php echo (date("Y-m-d H:i:s",$v["addtime"])); ?></td>
            <td>
             <a onclick="del_id_urls(<?php echo ($v["id"]); ?>)">删除</a>
             </td>
           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         <!-- 遍历 -->
         </tbody>
      </table>
    </div>
    
</div>
<script>
function product_option(page){
	
	var pid = $('#pid').val();
	if(pid == ''){
		pid = $('#ppid').val();
	}
  var obj={
	   "name":$("#name").val(),
	   "shop_id":pid,
	   "tuijian":$("#tuijian").val()
	  }
	  //alert(obj);exit();
  var url='?page='+page;
  $.each(obj,function(a,b){
	  url+='&'+a+'='+b;
	 });
  location=url;
}

function del_id_urls (id) {
  if (confirm('您确定要删除吗？')) {
    location.href="<?php echo U('del');?>?id="+id;
  };
}
</script>
</body>
</html>