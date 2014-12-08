<?php

namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8"); 
class ShiziController extends Controller{	
	public function add_shizi(){
            $position=M('zhiwu');
            $list=$position->select();
            var_dump($list);
            $this->assign('list',$list);
            $this->display("add_shizi");
	}
	public function insert_shizi(){
            $shizi=M('shizi');
            $data['s_name']=$_POST['s_name'];
            $data['z_name']=$_POST['z_name'];
            $data['s_content']=$_POST['s_content'];
            $data['is_show']=$_POST['is_show'];
            $data['is_del']=1;
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
                $data['s_image']=$info['s_image']['savename'];
                $res = $shizi->add($data);
                if($res){
                    $this->success('上传成功！',U('shizi_list'));
                }else{
                    $this->error('上传失败！');
                } 
            }
        }
        public function shizi_list(){
            $shizi=M('shizi');
            $count= $shizi->where("is_del=1")->count();// 查询满足要求的总记录数
            $Page=new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show= $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $shizi->where("is_del=1")->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display('shizi_list'); 
        }
        public function is_show(){
            $shizi=M('shizi');
            $s_id=$_POST['s_id'];
            $is_show=$_POST['is_show'];   
            if($is_show==1){
                $is_show=0;
            }else{
                $is_show=1;
            }
            $data['is_show']=$is_show;
            $shizi->where("s_id=$s_id")->save($data);      
        }    
        public function edit_shizi(){
            $shizi=M('shizi');
            $position=M('zhiwu');
            $s_id=$_GET['s_id'];
            $condition = array( 's_id' =>$s_id);
            $list=$shizi->where($condition)->select();
            $lists=$position->select();
            $this->assign('list',$list);
            $this->assign('position',$lists);
            $this->display('edit_shizi');
        }

        
}
?>

