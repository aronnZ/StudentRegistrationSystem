<?php

session_start();
$link = mysqli_connect('localhost', 'root', '123456','systemdb');

if (!$link) {
    exit('数据库连接失败');
}
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'S');

$k1 = $_GET['key1'];
$k2 = $_GET['key2'];
$k3 = $_GET['key3'];
$k4 = $_GET['key4'];
$k6 = $_SESSION["user"];

$tongji1="select day,time_slot_id from section where course_id='{$k1}' and sec_id='{$k2}' and semester='{$k3}'  and year='{$k4}'";
$Tres1=mysqli_query($link,$tongji1);
$G=mysqli_fetch_assoc($Tres1);
$day=$G['day'];
$time_slot_id=$G['time_slot_id'];


$tongji="select count(*) as C from takes where course_id='{$k1}' and sec_id='{$k2}' and semester='{$k3}'  and year='{$k4}' and flag='0'";
$Tres=mysqli_query($link,$tongji);
$number=mysqli_fetch_assoc($Tres);

$tongji2="select count(*) as C from takes natural join section where stu_id='{$k6}' and day='{$day}' and time_slot_id='{$time_slot_id}' and flag='0'and semester='{$k3}' and year='{$k4}';";
$Tres2=mysqli_query($link,$tongji2);
$number2=mysqli_fetch_assoc($Tres2);

$sql="select shtdwn_flag from administrator limit 1";
$result = mysqli_query($link,$sql);
$flag = mysqli_fetch_assoc($result);
if($flag['shtdwn_flag']!='1')
{
    if($number2['C']>=1){
        echo"该课程与你已选的课程的时间冲突,选课失败";
        echo"\n";
        echo'<a href="stuclasschoose.php">返回选课页面</a>';
    }else{
        if($number['C']>=10){
            echo"人数已经满了,选课失败";
            echo"\n";
            echo'<a href="classchoose.php">返回选课页面</a>';
        }else{
            $sql = "update takes set flag='0' where stu_id='{$k6}' and course_id='{$k1}' and sec_id='{$k2}' and semester='{$k3}' and year='{$k4}'";
            $res = mysqli_query($link, $sql);
            echo "选课成功";
            echo '<a href="stuclasschoose.php">返回选课页面</a>';

        }
    }
}else{
        echo"系统关闭";
        echo"\n";
        echo'<a href="stuclasschoose.php">返回选课页面</a>';
}

?>

