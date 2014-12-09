<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class JiuyeController extends Controller {
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
        $Jiuye = M("jiuye");
        $Jiuye1 = M("jiuye1");
        $list = $Jiuye->select();
        $res = $Jiuye1->order('add_time desc')->limit(4)->select();
        $this->assign('list',$list);
        $this->assign('res',$res);
        $this->display();
    }
    public function detial(){
        $id = $_GET['id'];
        $Jiuye1 = M("jiuye1");
      //  $list = $Jiuye1->select();
        $li = $Jiuye1->find($id);
       // var_dump($li);die;
        $this->assign("li",$li);
        $this->display();
    }
}