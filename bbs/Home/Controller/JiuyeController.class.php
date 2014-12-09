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
    public function search(){
        $Jiuye = M("jiuye");
        $student_name = $_POST['student_name'];
        $school_name = $_POST['school_name'];
      //  $where = " where 1=1";
		include "/sphinxapi.php";
        $sphinxapi = new SphinxClient(); 
        $sphinxapi->SetServer('127.0.0.1', 9312); 
        $sphinxapi->SetMatchMode(SPH_MATCH_ALL);
        $result = $sphinxapi->Query($student_name,"*"); 
        var_dump($result);die;
        $key = array_keys($result['matches']);
        $id = implode(',',$key);
        if(!empty($student_name)) {
              //  $where .= " and student_name like '%$student_name%'";
            $map['student_name'] = array('like',"%{$student_name}%");
        }
        if(!empty($school_name)) {
          //      $where .= " and school_name like '%$school_name%'";
            $map['school_name'] = array('like',"%{$school_name}%");
        }
        session('student_name',$map);  
     //   $sql="select * from jiuye" . $where;
     //   $mapcount  = $Jiuye->where($where)->count();
     //   echo $mapcount;die;
        $map1 = session('student_name');
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
        
       /* 
        $list = $Jiuye->query($sql);
        $this->assign("list",$list);
        */
         $Jiuye1 = M("jiuye1");
        //$list = $Jiuye->select();
        $res = $Jiuye1->select();
        $this->assign('res',$res);
        $this -> assign('list',$list);
        $this -> assign('page',$showpage);
        $this->display('index');
    }
}