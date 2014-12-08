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
        $p_show=$_POST['p_show'];
        $p_name=$_POST['p_name'];
        $p_contnt=$_POST['p_content'];
        $p_class = M('p_class');//实例化
        
        $data['p_show']=$p_show;
        $data['p_name']=$p_name;
        $data['p_content']=$p_contnt;
        //var_dump($data);die;
        $a=$p_class->add($data);
        if($a){
           $this->redirect('check_peixun');
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
        $id=$_POST['id'];    
        $p_show=$_POST['p_show'];
        $p_name=$_POST['p_name'];
        $p_contnt=$_POST['p_content'];
        $p_class=M("p_class");
        $a=$data = array('p_name'=>'$p_name','p_show'=>'$p_show','p_content'=>'$p_content');$p_class-> where("id='$id'")->setField($data);
        if($a){
            echo "修改成功";
        }
    }
    //培训课程显示
   // public function ()
   
}

?>




