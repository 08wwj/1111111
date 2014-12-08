<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<script type="text/javascript" src="/bbs/admin/Public/js/jquery-1.7.2.min.js"></script>	
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">个人形象列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>形象描述</td>
			<td>形象照片</td>
                        <td>操作</td>
		</tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td>
			<td><?php echo ($vo["description"]); ?></td>
			<td><img src="/bbs/upload/<?php echo ($vo["image"]); ?>" width="100" height="100"></td>
			<td>
				<a href="<?php echo U('Jiuye/delet');?>?id=<?php echo ($vo["id"]); ?>" class="del">删除</a>
                                <a href="<?php echo U('Jiuye/upd');?>?id=<?php echo ($vo["id"]); ?>" class="del">修改</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="page">
		<?php echo ($page); ?>
	</div>

</body>
</html>