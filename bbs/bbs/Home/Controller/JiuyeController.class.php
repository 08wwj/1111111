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
        $res = $Jiuye1->order('add_time desc')->limit(4)->select();
	$this->assign('res',$res);
        $count = $Jiuye->count();
        $Page  = new \Think\Page($count,5);
        $show  = $Page->show();
        $a=$_GET['p'];
       //echo bbb.$a;die;
         $b = S($a.jiuye);
        if(!empty($b)){
         $list=$b;
       //echo "<script>alert('来自缓存');</script>";
        }else{
        $list  = $Jiuye->cache($a.jiuye,60)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
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
    public function search(){
        $Jiuye = M("jiuye");
        $student_name = $_POST['student_name'];
        $school_name = $_POST['school_name'];
        if(!empty($student_name)) {
              //  $where .= " and student_name like '%$student_name%'";
            $map['student_name'] = array('like',"%{$student_name}%");
        }
        if(!empty($school_name)) {
          //      $where .= " and school_name like '%$school_name%'";
            $map['school_name'] = array('like',"%{$school_name}%");
        }
        session('name',$map);  
 
        $map1 = session('name');
       // var_dump($map1);
        $count = $Jiuye -> where($map1) -> count();
       // echo $count;
        $Page = new \Think\Page($count,2);
        foreach($map1 as $key=>$val)
        {    
            $Page->parameter   .=   "$key=".urlencode($val).'&';
        }
        $list = $Jiuye -> limit($Page -> firstRow,$Page -> listRows)
        -> where($map1)
        -> select();
        //var_dump($list);
        $showpage = $Page -> show();
  
        $Jiuye1 = M("jiuye1");
        $res = $Jiuye1->select();
        $this->assign('res',$res);
        $this -> assign('list',$list);
        $this -> assign('page',$showpage);
        $this->display('index');
    }
}