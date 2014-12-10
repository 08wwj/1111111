<?php
namespace Home\Controller;
use Think\Controller;
class Peixun1Controller extends Controller {
     public function __construct() {
        parent::__construct();
         $nav=M('nav');
        $condition = array( 'isset' =>1);
        $nav=$nav->where($condition)->select();
        //$this->assign('nv',$array);
        //var_dump($array);die;
        $this->assign('nav',$nav); 
    }
    public function index(){
    $p_class = M("p_class"); //实例化p_class对   
    $count=$p_class->count(); //查询总记录数
    $Page= new\Think\Page($count,2); // 实例化分页类  传入总记录数和每页显示条数
    $show=$Page->show(); //分页显示输出
    // 进行分页数据查询  注意limit 方法的参数要使用Page类的属性
     $list=$p_class->limit($Page->firstRow.','.$Page->listRows)->select();
     $this->assign("list",$list); //赋值数据集
     $this->assign('page',$show); //赋值输出*/
     $course=M("course");
     $lists=$course->select();
     $this->assign('list1',$lists);
    $this->display("index");
    }
}