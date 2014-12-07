<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller
{
	//将栏目添加到数据库
	public function add_article_pro(){
	$name=$_POST['name'];
	$content=$_POST['content'];
	$category = M("category"); // 实例化User对象
	// 然后直接给数据对象赋值
	$data['c_title'] = $name;
	$data['c_content'] = $content;
	$category->add($data);
	}
	//插叙栏目数据
	public function category_list(){
	$category = M("category"); // 实例化User对象
	$data = $category->select();
	//print_r($data);
	$this->assign('data',$data);
	$this->display('check_category_show');
	}
}
