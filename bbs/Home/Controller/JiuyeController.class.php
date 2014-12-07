<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class JiuyeController extends Controller {
    public function index(){
        $Jiuye = M("Jiuye");
        $list = $Jiuye->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function insert(){
        $Jiuye = M("Jiuye"); 
        $data['student_name'] = $_POST['student_name'];
        $data['school_name'] = $_POST['school_name'];
        $data['job_time'] = $_POST['job_time'];
        $data['job_company'] = $_POST['job_company'];
        $data['work_money'] = $_POST['work_money'];
        $res = $Jiuye->add($data);
        if($res){
                $this->success('添加成功！',U('Index/index'));
        }else{
                $this->error('添加失败！');
        } 
    }
}