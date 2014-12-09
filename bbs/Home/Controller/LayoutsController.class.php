<?php
namespace Home\Controller;
use Think\Controller;
class LayoutsController extends Controller {
    public function nav(){
        $nav=M('nav');
        $condition = array( 'isset' =>1);
        $array=$nav->where($condition)->select();
        $this->assign('array',$array);
        //var_dump($array);die;
        $this->display('header');
    }
    public function detail(){
        $this->display('detail'); 
    }
}