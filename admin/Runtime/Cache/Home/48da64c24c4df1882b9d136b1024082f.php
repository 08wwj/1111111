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
			<td class="th" colspan="10">查看栏目</td>
		</tr>
		<tr>
			<th>CID</th>
			<th>栏目名称</th>
			<th>操作</th>
		</tr>
		<?php foreach($data as $key => $val){ ?>
		<tr>

			<td><?php echo $val['c_id']?></td>
			<td><a href=""><?php echo $val['c_title']?></a></td>
			<td>
				<a href="">[编辑]</a>
				<a href="" class="del">[删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
		<div class="page">
			<?php echo $page?>
		</div>
</body>
</html>