<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
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
     //var_dump($nav);
     $article=M('article');
     $condition = array('c_title' =>学院信息);
     $list=$article->where($condition)->select();
     $condition1 = array('c_title' =>校园动态);
     $list1=$article->where($condition1)->order('a_time desc')->limit(8)->select();
     //var_dump($list);
     $this->assign('list',$list);
     $this->assign('list1',$list1);
    //查询就业信息
     $jiuye=M('jiuye');
     $list=$jiuye->order('add_time desc')->limit(8)->select(); 
     $this->assign('list2',$list);
     //查询php培训名师答疑
    $jiuye=M('question');
     $list=$jiuye->order('q_time desc')->limit(0,6)->select(); 
     $array=$jiuye->order('q_time desc')->limit(6,5)->select(); 
     $this->assign('list3',$list);
     $this->assign('list4',$array);
     //查询首页视频
        $Jiuye1 = M("jiuye1");
        $res = $Jiuye1->order('add_time desc')->limit(4)->select();
        $this->assign('res',$res);
        //var_dump($res);
     $this->display();
    }
}