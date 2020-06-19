

<?php
session_start();
$newpass= $_POST['fname'];

$link = mysqli_connect('localhost', 'root', '123456','systemdb');

if(!$link){
    exit('数据库连接失败');
}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'S');

//更新密码
$sql="update student set password='{$newpass}' where stu_id='{$_SESSION["user"]}'";


$res=mysqli_query($link,$sql);
echo"成功修改密码\n";
echo '<br>三秒后自动跳到首页面......';
header("refresh:3;url=./stumain.php");

