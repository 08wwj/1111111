<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="/bbs/admin.php/Home/Index/edit_category_pro" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改栏目</td>
			</tr>
			<tr>
				<td>栏目名称</td>
                                <td><input type="text" name="c_title" value="<?php echo $list['c_title']?>"/><input type="hidden" name="c_id" value="<?php echo $list['c_id']?>"/></td>
			</tr>
			<tr>
				<td>描述</td>
				<td>
					<textarea name="c_content" id="description" class="textarea"><?php echo $list['c_content']?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>