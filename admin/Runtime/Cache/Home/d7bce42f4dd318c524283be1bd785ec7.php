<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/bbs/admin/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="/bbs/admin.php/Home/Index/zhuce_pro" method="post" id="loginForm">
		<table class="table">
			<tr >
				<td class="th" colspan="2">注册用户</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" id="username"/></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="psd" id="psd"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="注册" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
    <script src="/bbs/admin/Public/js/jq.js"></script>
   <script type="text/javascript">
    <!--
        $('#loginForm').submit(function(){
        if($('#username').val()==''){
            alert('请输入用户名！');
            return false;
        }
        if($('#psd').val()==''){
            alert('请输入密码！');
            return false;
        }
    });
    //-->
    </script>
</html>