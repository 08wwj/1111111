<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Home/Jiuye/update_pro');?>" method="post">
		<table class="table">
			<tr>
				<td class="th" colspan="2">修改就业信息</td>
			</tr>
			<tr>
				<td>学生姓名</td>
				<td>
					<input type="text" name="student_name" class="title" value='<?php echo ($res["student_name"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td>学校名称</td>
				<td>
					<input type="text" name="school_name" class="title" value='<?php echo ($res["school_name"]); ?>'/>

				</td>
			</tr>
			<tr>
				<td>入职时间</td>
				<td>
					<input type="text" name="job_time" class="title" value='<?php echo ($res["job_time"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td>入职公司</td>
				<td>
					<input type="text" name="job_company" class="order" value='<?php echo ($res["job_company"]); ?>'/>
				</td>
			</tr>
                        <tr>
				<td>期望薪资</td>
				<td>
					<input type="text" name="work_money" class="order" value='<?php echo ($res["work_money"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
                                        <input type="hidden" name='id' value='<?php echo ($res["id"]); ?>'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>