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

<div class="aaa_pts_show_1">【 代理记账管理 】</div>

<div class="aaa_pts_show_2">
    <div>
       <div class="aaa_pts_4"><a href="<?php echo U('Agency/index');?>">代理记账管理</a></div>
    </div>
    <div class="aaa_pts_3">
      
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:90px;">名字</td>
           <td style="width:90px;">图标</td>
           <td style="width:200px;">标题</td>
           <td style="width:200px;">办理流程</td>
           <td>服务流程</td>
           <td>获得服务</td>
           <td style="width:200px;">操作</td>
         </tr>
         <tbody id="news_option">
         <!-- 遍历 -->
          <?php if(is_array($agency)): $i = 0; $__LIST__ = $agency;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
             <td><?php echo ($v["name"]); ?></td>
             <td style="padding:3px 0;"><img src="/minigongszzw/Data/<?php echo ($v["photo_x"]); ?>" width="80px" height="80px"/></td>
             <td><?php echo ($v["title"]); ?></td>
             <td style="padding:3px 0;"><img src="/minigongszzw/Data/<?php echo ($v["process"]); ?>" width="80px" height="80px"/></td>
             <td style="padding:3px 0;"><img src="/minigongszzw/Data/<?php echo ($v["server_process"]); ?>" width="80px" height="80px"/></td>
             <td style="padding:3px 0;"><img src="/minigongszzw/Data/<?php echo ($v["get_server"]); ?>" width="80px" height="80px"/></td>
            <td>
              <a href="<?php echo U('Agency/add');?>?id=<?php echo ($v["id"]); ?>">修改</a>
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

function del_id_urls (pro_id) {
  if (confirm('您确定要删除吗？')) {
    location.href="<?php echo U('del');?>?did="+pro_id;
  };
}
</script>
</body>
</html>