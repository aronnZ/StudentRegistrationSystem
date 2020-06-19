<?php

session_start();
$link = mysqli_connect('localhost', 'root', '123456','systemdb');

if (!$link) {
    exit('数据库连接失败');
}
mysqli_set_charset($link, 'utf8');


$sql="select shtdwn_flag from administrator limit 1";
$result = mysqli_query($link,$sql);
$flag = mysqli_fetch_assoc($result);
if($flag['shtdwn_flag']!='1')
{

$k1 = $_GET['key1'];
$k2 = $_GET['key2'];
$k3 = $_GET['key3'];
$k4 = $_GET['key4'];
$k6 = $_SESSION["user"];

$sql = "delete from takes  where stu_id='{$k6}' and course_id='{$k1}' and sec_id='{$k2}' and semester='{$k3}' and year='{$k4}' and flag='2'";
$res = mysqli_query($link, $sql);
echo "删除成功";
echo '<a href="stuclasschoose.php">返回选课页面</a>';
}else{
    echo"系统关闭";
    echo"\n";
    echo'<a href="stuclasschoose.php">返回选课页面</a>';
}