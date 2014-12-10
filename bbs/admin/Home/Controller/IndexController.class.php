<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function ll() {
        if(empty($_SESSION['name'])){
           $this->redirect('index/login');  
        }
    }
	public function index(){
            $this->ll();
	$this->display();
	}
          public function login(){
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
        //用户注册
        public function zhuce_pro(){
            $user=M('user');
            $name=$_POST['username'];
            $psd=$_POST['psd'];
            $data['u_name'] = $name;
	$data['u_password'] = md5($psd);
	$aa=$user->add($data);
        if($aa){
           $this->redirect('Index/login'); 
        }
        }
        //用户退出
        public function loginout(){
            $this->ll();
           unset($_SESSION['name']); 
           $this->display('login');
        }
        //加载注册页面
        public function zhuce(){
            $this->display();
        }
        //导航栏列表
        //将栏目添加到数据库
	public function add_category_pro(){
        $this->ll();
	$name=$_POST['name'];
	$content=$_POST['content'];
	$category = M("category"); // 实例化User对象
	// 然后直接给数据对象赋值
	$data['c_title'] = $name;
	$data['c_content'] = $content;
	$aa=$category->add($data);
        if($aa){
           $this->redirect('Index/category_list'); 
        }
	}
        //插叙栏目数据
	public function category_list(){
                $this->ll();
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
        //删除分类信息
        public function category_delete(){
                $this->ll();
            $cid=$_GET['c_id'];
           $category = M('category');
            $aa=$category->delete($cid);
            if($aa){
               $this->redirect('Index/category_list');  
            }
        }
        //显示修改分类信息的表单
        public function edit_category_show(){
                $this->ll();
            $c_id=$_GET['c_id'];
              $category=M('category'); 
          $condition = array( 'c_id' =>$c_id);
            $array=$category->where($condition)->find();
            $this->assign('list',$array); 
            $this->display();
        }
        //修改分类信息
        public function edit_category_pro(){
                $this->ll();
        $id=$_POST['c_id'];    
       // echo $id;die;
        $c_title=$_POST['c_title'];
        $c_content=$_POST['c_content'];
        $category=M("category");
        $data=array('c_title'=>$c_title,'c_content'=>$c_content);
        //var_dump($data);die;
        $a=$category->where("c_id='$id'")->setField($data); //更新个别字段的值，可以使用setField方法。
        if($a){
            $this->redirect('index/category_list');
        }

        }
        //显示文章表单并查询分类
        public function article_show(){
             $this->ll();
           $category=M('category'); 
           $array = $category->select();
	//print_r($array);
	$this->assign('array',$array); 
        $this->display('add_article_show');
        }
        //将文章保存到数据库
	public function add_article_show(){   
                $this->ll();
	$title=$_POST['title'];
        $aid=$_POST['a_id'];
	$content=$_POST['content'];
	$article = M("article"); // 实例化User对象
       $data['c_title']=$aid;
	$data['a_title'] = $title;
	$data['a_content'] = $content;
	$aa=$article->add($data);
        if($aa){
            $this->redirect('Index/article_list'); 
        }
	}
        //将文章列表显示
        public function article_list(){
             $this->ll();
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
          //删除文章信息
        public function article_delete(){
                $this->ll();
            $id=$_GET['c_id'];
           $article = M('article');
            $aa=$article->delete($id);
            if($aa){
               $this->redirect('Index/article_list');  
            }
        }
        //编辑文章信息
        public function edit_article_show(){
                $this->ll();
            $id=$_GET['id'];
            $article=M('article');
            $category=M('category');
            $array=$category->select();
            $condition = array( 'id' =>$id);
            $list=$article->where($condition)->find();
            $this->assign('list',$list);
            $this->assign('array',$array);
            $this->display();
        }
        //将文章信息保存到数据库
        public function edit_article_pro(){
                $this->ll();
            $a_title=$_POST['a_title'];
            $id=$_POST['id'];
             $title=$_POST['c_title'];
            $content=$_POST['content'];
            $article = M("article"); // 实例化User对象
        // 更改用户的name和email的值
        $data = array('a_title'=>$a_title,'c_title'=>$title,'a_content'=>$content);
        $aa=$article-> where("id='".$id."'")->setField($data);
            if($aa){
            $this->redirect('Index/article_list'); 
        }
        }
        //显示导航栏添加表单
        public function nav(){
                $this->ll();
            $this->display('add_nav');
        }
        //添加导航
        public function add_nav(){
                $this->ll();
            $nav=M('nav');
            $title=$_POST['title'];
            $url=$_POST['url'];
            $isset=$_POST['isset'];
            $content=$_POST['content'];
            $order=$_POST['order'];
            $data['n_name']=$title;
            $data['n_url']=$url;
            $data['isset']=$isset;
            $data['n_content']=$content;
            $data['ordera']=$order;
            $aa=$nav->add($data);
             if($aa){
            $this->redirect('Index/nav_list'); 
        }
        }
        //导航列表
        public function nav_list(){
                $this->ll();
            $nav=M('nav'); 
            $count      = $nav->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $nav->order('ordera')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('array',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display('nav_list');
        }
         //删除导航栏
        public function nav_delete(){
                $this->ll();
            $n_id=$_GET['n_id'];
            $nav = M('nav');
            $aa=$nav->delete($n_id);
            if($aa){
               $this->redirect('Index/nav_list');  
            }  
        }
        //开启导航
        public function nav_issetb(){
                $this->ll();
        $n_id=$_GET['n_id'];
        $nav = M("nav");//实例化User对象
        $aa=$nav-> where("n_id='".$n_id."'")->setField('isset','1');
        if($aa){
        $this->redirect('Index/nav_list');    
        }
        }
        //关闭导航
        public function nav_isseta(){
                $this->ll();
         $n_id=$_GET['n_id'];
        $nav = M("nav");//实例化User对象
        $aa=$nav-> where("n_id='".$n_id."'")->setField('isset','0');
        if($aa){
        $this->redirect('Index/nav_list');    
        }
        }
        //修改导航
        public function edit_nav(){
            $nav=M('nav');
             $n_id=$_GET['n_id'];
             $array=$nav-> where("n_id='".$n_id."'")->find();
             $this->assign('array',$array);
            $this->display();
        }
        //将修改数据添加到数据库
        public function edit_nav_pro(){
            $this->ll();
            $nav=M('nav');
            $title=$_POST['title'];
            $url=$_POST['url'];
            $content=$_POST['content'];
            $order=$_POST['order'];
            $n_id=$_POST['n_id'];
            $data['n_name']=$title;
            $data['n_url']=$url;
            $data['isset']=$isset;
            $data['n_content']=$content;
            $data['ordera']=$order;
             $data=array('n_name'=>$title,'n_content'=>$content,'n_url'=>$url,'ordera'=>$order);
             $aa=$nav->where("n_id='$n_id'")->setField($data); //更新个别字段的值，可以使用setField方法。
             if($aa){
            $this->redirect('Index/nav_list'); 
        } 
        }
        //添加视频表单
        public function add_video(){
          $this->ll();
          $model = M("category_video");  
          $array=$model->select();
          $this->assign('array',$array);
          $model = M("shizi");  
          $shizi=$model->select();
          $this->assign('shizi',$shizi);
          $this->display();           
        }
        //添加视频
        public function add_video_pro(){
                $this->ll();
        // echo '<pre>';
        //var_dump($_FILES['v_image']['name']);
        //var_dump($_POST);
        //die;
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './video/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {
  // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
    //$this->success('上传成功！');
        }
        //die;
        $a_title=$_POST['c_title'];
        $v_title = $_POST['v_title'];
        $v_image = $_FILES['v_image']['name'];
        $v_link = $_POST['v_link'];
        $v_desc = $_POST['v_desc'];
        $teach=$_POST['teach'];
        $data['v_title'] = $v_title;
        $data['v_image'] = $v_image;
        $data['v_link'] = $v_link;
        $data['v_desc'] = $v_desc;
        $data['c_title'] = $a_title;
        $data['s_name'] = $teach;
        $model = M("b_vadio");
        //var_dump($_POST);
        $result = $model->add($data);
        //var_dump($result);
        if($result) {
                //$this->success('添加成功！',U("Admin/video_show"));
                $this->redirect("index/video_show");
                //$this->display("Admin:video_show");
        }else{
                $this->error('写入错误！');
        }
    }
    //显示视频列表
    public function video_show(){
            $this->ll();
       $model = M("b_vadio");
        $count      = $model->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
       $this->display();
    }
        //加载添加视频分类页面
        public function add_video_category(){
          $this->ll();
         
        $this->display(); 
        }
     //将栏目添加到数据库
	public function video_category_pro(){
        $this->ll();
	$name=$_POST['name'];
	$content=$_POST['content'];
	$category = M("category_video"); // 实例化User对象
	// 然后直接给数据对象赋值
	$data['c_title'] = $name;
	$data['c_content'] = $content;
	$aa=$category->add($data);
        if($aa){
           $this->redirect('Index/category_video_list'); 
        }
	}
        //显示插入视频分类信息
	public function category_video_list(){
        $this->ll();
	$category = M("category_video"); // 实例化User对象    
        $count      = $category->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $category->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
	$this->display('video_category_show');
	}
         //删除分类信息
        public function category_video_delete(){
                $this->ll();
            $cid=$_GET['c_id'];
           $category = M('category_video');
            $aa=$category->delete($cid);
            if($aa){
               $this->redirect('Index/category_video_list');  
            }
        }
        //显示修改分类信息的表单
        public function edit_category_video(){
                $this->ll();
            $c_id=$_GET['c_id'];
              $category=M('category_video'); 
          $condition = array( 'c_id' =>$c_id);
            $array=$category->where($condition)->find();
            $this->assign('list',$array); 
            $this->display();
        }
        //修改分类信息
        public function edit_category_video_pro(){
        $this->ll();
        $id=$_POST['c_id'];    
       //echo $id;die;
        $c_title=$_POST['c_title'];
        $c_content=$_POST['c_content'];
        //echo $c_content;die;
        $category=M("category_video");
        $data=array('c_title'=>$c_title,'c_content'=>$c_content);
        //var_dump($data);die;
        $a=$category->where("c_id='$id'")->setField($data); //更新个别字段的值，可以使用setField方法。
        if($a){
            $this->redirect('index/category_video_list');
        }
        }
}
