<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Home/Question/addquestion');?>" method="post">
		<table class="table">
			<tr>
				<td class="th" colspan="2">添加相关问题</td>
			</tr>
			<tr>
				<td>问题</td>
				<td>
					<input type="text" name="q_wenti" class="title"/>
				</td>
			</tr>
                    <tr>
				<td>答案</td>
				<td>
					<input type="text" name="q_da" class="title"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="提交" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>