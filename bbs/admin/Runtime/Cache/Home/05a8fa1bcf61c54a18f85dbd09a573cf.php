<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Home/Peixun/addcourse');?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加课程</td>
			</tr>
			<tr>
				<td>课程标题</td>
				<td>
                            <input type="text" name="k_name" class="title"/>
				</td>
			</tr>
			
			<tr>
				<td>课程分班</td>
				<td>
                                   
                                    
					<select name='p_id'>
                                            
                                            <option value="">====选择课程分班====</option>
                                             <?php foreach($list as $k=>$v){?>
                                            <option value="<?php echo $v['p_id']?>"><?php echo $v['p_name']?></option>
                                            <?php } ?>
					</select>
                                    
				</td>

			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea id="editor_id" name="k_content" style="width:700px;height:300px;"></textarea>
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