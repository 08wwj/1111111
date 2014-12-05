<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
$Category = M("Category"); 
// 实例化User对
// 然后直接给数据对象赋值
$Category->c_name = '$name';
$Category->c_content = '$content';
// 把数据对象添加到数据库
$Category->add();
}
?>