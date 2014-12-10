<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Storage\Driver;
class QuestionController extends Controller
{
      public function __construct() {
        parent::__construct();
          if(empty($_SESSION['name'])){
           $this->redirect('index/login');  
        }
    }
    //列表显示
    public function index()
    {
        $this->display("index");
    }
    //添加问题
    public function addquestion()
    {
        $question = M('question');//实例化
        $data['q_wenti']=$_POST['q_wenti'];
        $data['q_da']=$_POST['q_da'];
        $a=$question->data($data)->add();
        if($a){
           $this->redirect('listquestion');
        }
    }
    //查看问题
    public function listquestion()
    {
        $question = M("question"); //实例化p_class对象
        $count=$question->count(); //查询总记录数
        $Page= new\Think\Page($count,3); // 实例化分页类  传入总记录数和每页显示条数
        $show=$Page->show(); //分页显示输出
        // 进行分页数据查询  注意limit 方法的参数要使用Page类的属性
        $list=$question->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("list",$list); //赋值数据集
        $this->assign('page',$show); //赋值输出*/
        $this->display("listquestion"); //输出模板 
    }
}
