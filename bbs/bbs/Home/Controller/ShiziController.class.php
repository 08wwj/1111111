<?php
namespace Home\Controller;
use Think\Controller;
class ShiziController extends Controller {
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
        $shizi=M('shizi');
            $count= $shizi->where("is_del=1 and is_show=1")->count();// 查询满足要求的总记录数
            $Page=new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show= $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
             $a=$_GET['p'];
       //echo bbb.$a;die;
         $b = S($a.shizi);
        if(!empty($b)){
         $list=$b;
        }else{
            $list = $shizi->cache($a.shizi,60)->where("is_del=1 and is_show=1")->limit($Page->firstRow.','.$Page->listRows)->select();
        }
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display('index'); 
    }
    public function detail(){
        $shizi=M('shizi');
        $s_id=$_GET['s_id'];
        $list=$shizi->where("s_id='$s_id'")->select();
        $this->assign("list",$list);
        $this->display('detail'); 
    }
}