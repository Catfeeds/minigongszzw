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

<div class="aaa_pts_show_1">【 地址挂靠管理 】</div>

<div class="aaa_pts_show_2">
    <div>
       <div class="aaa_pts_4"><a href="<?php echo U('Affiliate/index');?>">地址挂靠管理</a></div>
       <div class="aaa_pts_4"><a href="<?php echo U('Affiliate/add');?>">添加地址挂靠</a></div>
    </div>
    <div class="aaa_pts_3">
      
      <table class="pro_3">
         <tr class="tr_1">
           <td style="width:90px;">ID</td>
           <td style="width:200px;">地址</td>
           <td style="width:90px;">图标</td>
           <td style="width:100px;">价格/元</td>
           <td>地址类型</td>
           <td>服务类型</td>
           <td style="width:200px;">操作</td>
         </tr>
         <tbody id="news_option">
         <!-- 遍历 -->
          <?php if(is_array($affiliate)): $i = 0; $__LIST__ = $affiliate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
             <td><?php echo ($v["id"]); ?></td>
             <td><?php echo ($v["name"]); ?></td>
             <td style="padding:3px 0;"><img src="/minigongszzw/Data/<?php echo ($v["photo_x"]); ?>" width="80px" height="80px"/></td>
             <?php if($v["price"] == 0): ?><td>面议</td>
              <?php else: ?>
                <td><?php echo ($v["price"]); ?></td><?php endif; ?>
             <?php if($v["type"] == 1): ?><td>小规模地址</td>
             <?php else: ?>
             <td>一般纳税人地址</td><?php endif; ?>
             <td><?php echo ($v["server_type"]); ?></td>
            <td>
              <a href="<?php echo U('Affiliate/add');?>?id=<?php echo ($v["id"]); ?>">修改</a>
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