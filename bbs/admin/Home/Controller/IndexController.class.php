<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
	public function login(){
	$this->display();
	}
	public function index(){
	$this->display();
	}
	//将栏目添加到数据库
	public function add_category_pro(){
	$name=$_POST['name'];
	$content=$_POST['content'];
	$category = M("category"); // 实例化User对象
	// 然后直接给数据对象赋值
	$data['c_title'] = $name;
	$data['c_content'] = $content;
	$aa=$category->add($data);
       
	}
	//插叙栏目数据
	public function category_list(){
	$category = M("category"); // 实例化User对象
	$data = $category->select();
	//print_r($data);
	$this->assign('data',$data);
	$this->display('check_category_show');
	}
        //显示文章表单并查询分类
        public function article_show(){
           $category=M('category'); 
           $array = $category->select();
	//print_r($array);
	$this->assign('array',$array); 
        $this->display('add_article_show');
        }
        //将文章保存到数据库
	public function add_article_show(){   
	$title=$_POST['title'];
        $aid=$_POST['a_id'];
	$content=$_POST['content'];
	$article = M("article"); // 实例化User对象
       $data['c_title']=$aid;
	$data['a_title'] = $title;
	$data['a_content'] = $content;
	$article->add($data);
	}
        //将文章列表显示
        public function article_list(){
             $article=M('article');
              $array = $article->select();
            //print_r($array);
            $this->assign('array',$array); 
            $this->display('check_article');
        }
}
