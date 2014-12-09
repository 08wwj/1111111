<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Storage\Driver;
class PeixunController extends Controller
{
    //培训课程分类显示
    public function index()
    {
        $this->display("add_peixun");
    }          
    //培训课程分班添加
    public function addpeixun()
    {
        //图片上传
      
        $p_class = M('p_class');//实例化
        $data['p_show']=$_POST['p_show'];
        $data['p_name']=$_POST['p_name'];
        $data['p_content']=$_POST['p_content'];
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =  $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $time=date('Y-m-d');
                
                $data['p_image']=$time."/".$info['p_image']['savename'];
               // var_dump($info['p_image']['savename']);die;
                $res=$p_class->add($data);
                if($res){
                    $this->success('上传成功！',U('check_peixun'));
                }else{
                    $this->error('上传失败！');
                } 
            }

        } 
     //查看课程分班
    public function check_peixun(){
        $p_class = M("p_class"); //实例化p_class对象
        $count=$p_class->count(); //查询总记录数
        $Page= new\Think\Page($count,2); // 实例化分页类  传入总记录数和每页显示条数
        $show=$Page->show(); //分页显示输出
        // 进行分页数据查询  注意limit 方法的参数要使用Page类的属性
        $list=$p_class->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("list",$list); //赋值数据集
        $this->assign('page',$show); //赋值输出*/
        $this->display("check_peixun"); //输出模板   
    }
    //课程分班删除
    public function delpeix()
    {
       $id=$_GET["id"];
       $p_class=M("p_class");
       $a=$p_class->where("p_id='$id'")->delete(); 
       if($a){
            $this->redirect('check_peixun'); 
       }
    }
    //课程分班修改（表单显示）
    public function uppeix()
    {
        $id=$_GET["id"];
        $p_class=M("p_class");
        $list=$p_class->where("p_id='$id'")->find();
        $this->assign("list",$list);
        $this->display("edit_peixun");
    }
    //课程分班修改页面
    public function updatepei()
    {
        $p_class=M("p_class");
        $id=$_POST['p_id'];    
        $data['p_show']=$_POST['p_show'];
        $data['p_name']=$_POST['p_name'];
        $data['p_content']=$_POST['p_content'];     
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
            $upload->rootPath  =     './Public/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $time=date('Y-m-d');
                $data['p_image']=$time."/".$info['p_image']['savename'];   
                $res=$p_class->where("p_id='$id'")->save($data);
                if($res){
                   $this->redirect('check_peixun'); 
                }else{
                    $this->error('修改失败！');
                } 
            }
        

      
    }
    //培训课程显示（分类）
    public function add_course()
    {
        $p_class = M("p_class"); 
        $list = $p_class->select();
        $this->assign('list',$list);
        $this->display("add_course");
    }
    //课程添加
    public function addcourse()
    {
        $course = M('course');//实例化
        $data['k_name']=$_POST['k_name'];
        $data['p_id']=$_POST['p_id'];
        $data['k_content']=$_POST['k_content'];
        $a=$course->data($data)->add();
        if($a){
           $this->redirect('check_course');
        }
    }
    //查看课程列表
    public function check_course()
    {
        $course = M("course"); //实例化p_class对象
        $p_class=M("p_class");
        $sql="select * from course,p_class where course.p_id=p_class.p_id";
        $count=$course->count(); //查询总记录数
        $Page= new\Think\Page($count,2); // 实例化分页类  传入总记录数和每页显示条数
        $show=$Page->show(); //分页显示输出
        // 进行分页数据查询  注意limit 方法的参数要使用Page类的属性
        $list=$course->limit($Page->firstRow.','.$Page->listRows)->query($sql);
        $this->assign("list",$list); //赋值数据集
        $this->assign('page',$show); //赋值输出*/ 
        $this->display("check_course");
    }
   //删除课程
    public function delcourse()
    {
       $id=$_GET["id"];
       $course=M("course");
       $a=$course->where("k_id='$id'")->delete(); 
       if($a){
            $this->redirect('check_course'); 
       }
    }
    //修改课程(表单)
    public function updcourse()
    {
        $id=$_GET["id"];
        $course=M("course");
        $p_class=M("p_class");
        $list1=$p_class->select();
        $list=$course->where("k_id='$id'")->find($sql);
        $this->assign("list",$list);
        $this->assign("list1",$list1);
        $this->display("edit_course");
    }
    //修改课程数据
    public function updatecourse()
    {
        $course=M("course");
        $id=$_POST['k_id'];    
        $data['k_name']=$_POST['k_name'];
        $data['p_id']=$_POST['p_id'];
        $data['k_content']=$_POST['k_content'];
        $a=$course->where("k_id='$id'")->setField($data);
        if($a)
        {
            $this->redirect('check_course'); 
        }
    }
}

?>




