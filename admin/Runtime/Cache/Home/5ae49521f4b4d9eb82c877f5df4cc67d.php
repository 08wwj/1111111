<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>BBS后台管理首页</title>
	<link rel="stylesheet" href="/bbs/admin/Public/css/admin.css" />
	<script type="text/javascript" src="/bbs/admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bbs/admin/Public/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">BBS后台管理首页 （V1.1）</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[<?php echo $_SESSION['name']?>]</span>
			</p>
			<div id='time'></div>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo U('Home/index/loginout');?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>
			<div class="menu_box">
				<h2>文章分类管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/add_category_show');?>" class="pos">添加栏目</a>				        	
				        </li> 
				    </ul>  

				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/category_list');?>" class="pos">查看栏目</a>    	
				        </li> 
				    </ul>   
				</div>
			</div>

			 <div class="menu_box">
				<h2>文章管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/article_show');?>" class="pos">添加文章</a>				        	
				        </li> 
				    </ul>  
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/article_list');?>" class="pos">博文列表</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="" class="pos">回收站</a>				        	
				        </li> 
				    </ul>   
				</div>
			</div>
			 <div class="menu_box">
				<h2>师资管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('shizi/add_shizi');?>" class="pos">添加师资</a>				        	
				        </li> 
				    </ul>  
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('shizi/shizi_list');?>" class="pos">师资列表</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('shizi/huishou_shizi');?>" class="pos">回收站</a>				        	
				        </li> 
				    </ul>   
				</div>
			</div>
			
			 <div class="menu_box">
				<h2>职位管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/position/add_position');?>" class="pos">添加职位</a>				        	
				        </li> 
				    </ul>  
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/position/position_list');?>" class="pos">职位列表</a>				        	
				        </li> 
				    </ul>
				  
				</div>
			</div>
			<div class="menu_box">
				<h2>php培训课程</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Peixun/index');?>" class="pos">添加课程分班</a>				        	
				        </li> 
				    </ul>  
                                    
                                    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Peixun/check_peixun');?>" class="pos">查看课程分班</a>				        	
				        </li> 
				    </ul>  
                                    
                                    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Peixun/add_course');?>" class="pos">添加课程</a>				        	
				        </li> 
				    </ul>  

				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Peixun/check_course');?>" class="pos">查看课程</a>    	
				        </li> 
				    </ul>   
				</div>
			</div>
                          <div class="menu_box">
				<h2>就业信息管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Jiuye/add_jiuye');?>" class="pos">添加就业信息</a>				        	
				        </li> 
				    </ul>  

				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Jiuye/show_jiuye');?>" class="pos">查看就业信息</a>    	
				        </li> 
				    </ul>   
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Jiuye/add_upload');?>" class="pos">添加个人形象</a>				        	
				        </li> 
				    </ul>  

				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Jiuye/show_upload');?>" class="pos">查看个人形象</a>    	
				        </li> 
				    </ul>   
				</div>
			</div>
                    <div class="menu_box">
				<h2>导航栏管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/nav');?>" class="pos">添加导航栏</a>				        	
				        </li> 
				    </ul>
                                    <ul class="con">
                                    <li class="nav_u">
				        	<a href="<?php echo U('Home/index/nav_list');?>" class="pos">导航栏列表</a>				        	
				    </li> 
				</ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>视频管理</h2>
				<div class="text">
                                    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/add_video_category');?>" class="pos">添加视频分类</a>
				        </li> 
				    </ul>
                                     <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/category_video_list');?>" class="pos">视频分类列表</a>
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/index/add_video');?>" class="pos">上传视频</a>
				        </li> 
				    </ul>
                                    <ul class="con">
				        <li class="nav_u">
                                                <a href="<?php echo U('Home/index/video_show');?>" class="pos">列表显示</a>	
				        </li> 
				    </ul>
				
				</div>
			</div>
			
			 <div class="menu_box">
				<h2>常见问题</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Question/index');?>" class="pos">添加问题</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('Home/Question/listquestion');?> " class="pos">查看问题</a>				        	
				        </li> 
				    </ul>
				
				</div>
			</div>			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src=""></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2013-2013 houdunwang.com All Rights Reserved. 京ICP备0000000号</p>
		</div>
	</div>

</body>
    <script language="javascript" src="/bbs/admin/Public/js/ServerClock.js"></script>
<script language="javascript">
<!--
var myDate = new Date();
/*
以下代码中：2008,9,19,0,9,0 为服务器端返回的时间，

以 ASP.NET代码为例
 var srvClock = new ServerClock(<%=DateTime.Now.ToString("yyyy,M,d,H,m,s") %>);
*/
var srvClock = new ServerClock(myDate.getFullYear(),myDate.getMonth(),myDate.getDate(),myDate.getHours(),myDate.getMinutes(),myDate.getSeconds());

/* 时间格式化字符串 */
var fmtStr = "当前时间是：yyyy年MM月dd日 HH:mm:ss";
/* 
由于网络延时无法估计的原因，会有一定的误差。用户可以通过 set_delay() 方法来减少误差。
默认为1000，表示 1 秒。 
*/
srvClock.set_delay(3000); /* 时钟向后延时 3 秒 */

/* 0.5秒刷新一次时间 */
window.setInterval(function(){
	document.getElementById("time").innerHTML = srvClock.get_ServerTime(fmtStr);},500);

//-->
</script>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="/bbs/admin/Public/js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->