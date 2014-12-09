<?php
namespace Home\Controller;
use Think\Controller;
class ShipinController extends Controller {
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
       $video=M('b_vadio');
        $count      = $video->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $array = $video->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);// 赋值分页输出
       //var_dump($array);
     $this->assign('array',$array);
      $this->display();
    }
}