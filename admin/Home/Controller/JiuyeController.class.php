<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8"); 
class JiuyeController extends Controller{	
	public function add_jiuye(){
            $this->display();
	}
        public function add_jiuye_pro(){
            $Jiuye=M('jiuye');
            $data['student_name']=$_POST['student_name'];
            $data['school_name']=$_POST['school_name'];
            $data['job_time']=$_POST['job_time'];
            $data['job_company']=$_POST['job_company'];
            $data['work_money']=$_POST['work_money'];
            $res = $Jiuye->add($data);
            if($res){
                $this->success("添加成功",U("Jiuye/show_jiuye"));
            }else{
                $this->error();
            }
        }
        public function show_jiuye(){
            $Jiuye = M('jiuye');
            $count = $Jiuye->count();
            $Page  = new \Think\Page($count,2);
            $show  = $Page->show();
            $list = $Jiuye->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);
            $this->assign('page',$show);
            $this->display(); 
	}
        public function delete(){
            $id = $_GET['id'];
            $Jiuye = M('jiuye');
            $Jiuye->delete($id); 
            $this->redirect('Jiuye/show_jiuye'); 
        }
        public function update(){
            $id = $_GET['id'];
            $Jiuye = M('jiuye');
            $res = $Jiuye->find($id);
            //var_dump($res);
            $this->assign('res',$res);
            $this->display(); 
        }
        public function update_pro(){
            $id=$_POST['id'];   
            $student_name=$_POST['student_name'];
            $school_name=$_POST['school_name'];
            $job_time=$_POST['job_time'];
            $job_company=$_POST['job_company'];
            $work_money=$_POST['work_money'];
            $Jiuye=M("jiuye");
            $data=array('student_name'=>$student_name,'school_name'=>$school_name,
                        'job_time'=>$job_time,'job_company'=>$job_company,'work_money'=>$work_money);
            //var_dump($data);die;
            $a=$Jiuye->where("id='$id'")->setField($data); 
            if($a){
                $this->redirect('Jiuye/show_jiuye');
            }else{
                $this->error();
            }
        }
        public function add_upload(){
            $this->display();
        }
	public function add_upload_pro(){
            $Jiuye1=M('jiuye1');
            $data['description']=$_POST['description'];
            $data['video']=$_POST['video'];
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './upload/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $data['image']=$info['image']['savename'];
                $res = $Jiuye1->add($data);
                if($res){
                    $this->success('上传成功！',U('Jiuye/show_upload'));
                }else{
                    $this->error('上传失败！');
                } 
            }
        }
        public function show_upload(){
            $Jiuye1=M('jiuye1');
            $count= $Jiuye1->count();// 查询满足要求的总记录数
            $Page=new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show= $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $Jiuye1->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display(); 
        } 
        public function delet(){
            $id = $_GET['id'];
            $Jiuye1 = M('jiuye1');
            $Jiuye1->delete($id); 
            $this->redirect('Jiuye/show_upload'); 
        }
        public function upd(){
            $id = $_GET['id'];
            $Jiuye1 = M('jiuye1');
            $res = $Jiuye1->find($id);
            //var_dump($res);
            $this->assign('res',$res);
            $this->display();
        }
        public function upd_pro(){
            $id = $_POST['id'];
            echo $id;
            $Jiuye1=M('jiuye1');
            $data['description']=$_POST['description'];
            $data['video']=$_POST['video'];
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './upload/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $data['image']=$info['image']['savename'];
                //$res = $Jiuye1->add($data);
                $res = $Jiuye1->where('id=$id')->setField($data);
                var_dump($res);die;
                if($res){
                    $this->success('修改成功！',U('Jiuye/show_upload'));
                }else{
                    $this->error('修改失败！');
                } 
            }
        }
}       
?>

