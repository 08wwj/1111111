<?php
namespace Home\Controller;
use Think\Controller;
class Question1Controller extends Controller {
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
        $question = M("question"); //实例化p_class对象
        $count=$question->count(); //查询总记录数
        $Page= new\Think\Page($count,3); // 实例化分页类  传入总记录数和每页显示条数
        $show=$Page->show(); //分页显示输出
        // 进行分页数据查询  注意limit 方法的参数要使用Page类的属性
        $list=$question->where('q_show=1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list1=$question->where('q_show=2')->select();
        $this->assign("list",$list); //赋值数据集
        $this->assign("list1",$list1); //赋值数据集
        $this->assign('page',$show); //赋值输出*/
        $this->display("index"); //输出模板 
    }
    public function qq()
    {
        $id=$_GET['id'];
        //echo $id;die;
        $question = M("question"); //实例化p_class对象
        $list=$question->where("q_id='$id'")->find();
        $this->assign('list',$list);
        $this->display("detail");
    }
}