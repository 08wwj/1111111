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
			<td class="th" colspan="10">查看课程</td>
		</tr>
		<tr>
			<th>ID</th>
			<th>课程分班名称</th>
			<th>课程分班内容</th>
                        <th>课程图片</th>
			<th>操作</th>
		</tr> 
            <?php foreach($list as $k=>$v){?>
		<tr>
			<td><?php echo $v["p_id"]?></td>
			<td><a href=""><?php echo $v["p_name"]?></a></td>
			<td><?php echo $v["p_content"]?></td>
                        <td><img src="/bbs/Public/<?php echo $v['p_image'];?>" width="200" height="200"></td>
			<td>
				<a href="/bbs/admin.php/Home/Peixun/uppeix/id/<?php echo $v['p_id'];?>">[编辑]</a>
                                <a href="/bbs/admin.php/Home/Peixun/delpeix/id/<?php echo $v['p_id'];?>" class="del">[删除]</a>
			</td>
		</tr>
            <?php } ?>
	</table>
		<div class="page">
			<?php echo $page; ?>
		</div>
   
</body>
</html>