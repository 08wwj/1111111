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
			<td class="th" colspan="10">查看问题</td>
		</tr>
		<tr>
	
			<td class="tdLittle2">问题</td>
			<td class="tdLtitle4">答案</td>
			<td class="tdLtitle7">时间</td>
		</tr>
            <?php foreach($list as $k=>$v){?>
		<tr>
			<td><?php echo $v['q_wenti']?></td>
			<td><?php echo $v['q_da']?></a></td>
			<td><?php echo $v['q_time']?></td>
		</tr>
            <?php } ?>
	</table>
	<div class="page">
			<?php echo $page; ?>
		</div>
</body>
</html>