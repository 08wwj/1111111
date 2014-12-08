<?php

namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8"); 
class PositionController extends Controller{
	
	public function add_position(){
		$this->display("add_position");
	}
	public function insert_position(){
		$position= M("zhiwu"); 
		$z_name=$_POST['z_name'];
		$z_content=$_POST['z_content'];               
		$position->z_name =$z_name;
		$position->z_content =$z_content;
		$res=$position->add(); 
		if($res){
                    $this->display('position_list');
                }else{
                    $this->display('add_postion');
                }
	}
        
        public function position_list(){
            $position=M('zhiwu');
            $count= $position->count();// 查询满足要求的总记录数
            $Page=new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show= $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $position->limit($Page->firstRow.','.$Page->listRows)->select();
            
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display('position_list'); 
        }
        public function edit_position(){
            $position=M('zhiwu');
            $z_id=$_GET['z_id'];
            $condition = array( 'z_id' =>$z_id);
            $list=$position->where($condition)->select();
            $this->assign('list',$list);
            $this->display('edit_position');
        }
        public function update_position(){
            $position= M("zhiwu"); 
            $z_id=$_POST['z_id'];
            $data['z_name']=$_POST['z_name'];
            $data['z_content']=$_POST['z_content'];
            $res=$position->where("z_id=$z_id")->save($data); 
            if($res){
                redirect("position_list");
                //echo "<script>alert('修改成功');location.href='{:U(position/position_list')}';</script>";
            }else{
                redirect("position_list");
                //echo "<script>alert('修改失败');location.href='{:U('position/list_position')}';</script>";
            }
        }
        public function delete_position(){
            $position= M("zhiwu"); 
            $z_id=$_GET['z_id'];
            var_dump($z_id);
            $res=$position->where("z_id=$z_id")->delete(); // 删除id为5的用户数据
            if($res){
                redirect("position_list");
            }
        }
}
?>