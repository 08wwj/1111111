<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class JiuyeController extends Controller {
    public function index(){
        $Jiuye = M("jiuye");
        $count = $Jiuye->count();
        $Page  = new \Think\Page($count,5);
        $show  = $Page->show();
        $list  = $Jiuye->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        
        $Jiuye1 = M("jiuye1");
        //$list = $Jiuye->select();
        $res = $Jiuye1->select();
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