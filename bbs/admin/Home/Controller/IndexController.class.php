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
        /** 
        *  
        * 验证码生成 
        */  
       public function verify_c(){  
           $Verify = new \Think\Verify();  
           $Verify->fontSize = 18;  
           $Verify->length   = 4;  
           $Verify->useNoise = false;  
           $Verify->codeSet = '0123456789';  
           $Verify->imageW = 130;  
           $Verify->imageH = 50;  
           //$Verify->expire = 600;  
           $Verify->entry();  
       }
        public function yzm(){
        $config =    array(    
             'fontSize'    =>    130,    // 验证码字体大小   
             'length'      =>    4,     // 验证码位数   
             'useNoise'    =>    true, // 关闭验证码杂点
         );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
        }
        //处理登陆
        public function admin_login_pro(){
            //print_r($_POST);
            $code=$_POST['yzm'];
            $name=$_POST['admin_name'];
            $pwd=$_POST['admin_pwd'];
            //echo $pwd;die;
            $verify = new \Think\Verify();   
            if(empty($verify->check($code, $id=''))){
                $this->display('login');
            }else{
                $admin_user = M('user');
                $data = $admin_user->where("u_name='".$name."'")->find();
                //echo $admin_user->getLastSql();
                if($data){
                      if($data['u_password']==md5($pwd)){
                        //  $this->redirect();
                        session('name',$name); 
                       $this->display('index');

                      }else{
                        echo "<script>alert('密码错误')</script>";
                      $this->display('login'); 
                      }
                      }
                      else{
                      echo "<script>alert('用户名不存在')</script>";
                      $this->display('login');
                      } 
            }
        }
        //用户退出
        public function loginout(){
           unset($_session[name]); 
           $this->display('login');
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
        $count      = $category->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $category->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
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
            $count      = $article->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $article->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('array',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display('check_article');
        }
        //显示导航栏添加表单
        public function nav(){
            $this->display('add_nav');
        }
        //添加导航
        public function add_nav(){
            $nav=M('nav');
            $title=$_POST['title'];
            $url=$_POST['url'];
            $isset=$_POST['isset'];
            $content=$_POST['content'];
            $data['n_name']=$title;
            $data['n_url']=$url;
            $data['isset']=$isset;
            $data['n_content']=$content;
            $nav->add($data);
        }
}
