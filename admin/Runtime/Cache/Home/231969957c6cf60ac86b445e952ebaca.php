<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="/bbs/admin/Public/css/login.css" />
	<script type="text/javascript" src="/bbs/admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bbs/admin/Public/js/login.js"></script>
	<title></title>
</head>
<body>
	<div id="divBox">
		<form action="" method="POST" id="login">
			<input type="text" id="userName" name="userName"/>
			<input type="password" id="psd" name="psd"/>
			<input type="" value="" id="verify" name="verify"/>
                        <p class="top15 captcha" id="captcha-container">       
                    <img width="30%" class="left15" height="40" margin-left='500' alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新">
                  </p>
			<input type="submit" id="sub" value=""/>
			<!-- 验证码 -->
			<img src="" id="verify_img" />
		</form>
		<div class="four_bj">
			
			<p class="f_lt"></p>
			<p class="f_rt"></p>
			<p class="f_lb"></p>
			<p class="f_rb"></p>
		</div>

		<ul id="peo">
			
		</ul>
		<ul id="psd">
			
		</ul>
		<ul id="ver">
			
		</ul>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="/bbs/admin/Public/js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('form','background');
    </script>
<![endif]-->
</body>
   <script src="/bbs/admin/Public/js/jq.js"></script>
   <script type="text/javascript">
    <!--
    // 验证码生成  
    var captcha_img = $('#captcha-container').find('img')  
    var verifyimg = captcha_img.attr("src");  
    captcha_img.attr('title', '点击刷新');  
    captcha_img.click(function(){  
        if( verifyimg.indexOf('?')>0){  
            $(this).attr("src", verifyimg+'&random='+Math.random());  
        }else{  
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
        }  
    });  
    //-->
    </script>
</html>