<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<script type="text/javascript" src="/bbs/admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bbs/admin/Public/js/public.js"></script>	
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看博文</td>
		</tr>
		<tr>
			<td class="tdLittle1">AID</td>
			<td>标题</td>
			<td class="tdLittle2">栏目名称</td>
			<td class="tdLtitle4">创作时间</td>
			<td class="tdLtitle7">操作</td>
		</tr>
            <?php foreach($array as $key => $val){?>
		<tr>
			<td ><?php echo $val['id']?></td>
			<td><?php echo $val['a_title']?></td>
			<td><a href=""><?php echo $val['c_title']?></a></td>
			<td><?php echo $val['a_time']?></td>
			<td>
				<a href="">[置顶]</a>
				<a href="">[编辑]</a>
				<a href="">[删除]</a>
			</td>
		</tr>
            <?php }?>
	</table>
	<div class="page">
		<a href="">1</a>
		<a href="">2</a>
		<a href="">3</a>
	</div>
</body>
</html>