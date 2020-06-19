<?php

session_start();

$user = $_SESSION["user"];
$id = $_POST['id'];

$con=mysqli_connect("localhost","root","123456","systemdb");

$sql="select day,start_hr,start_min,end_hr,end_min,sec_id,semester from teaches natural join time_slot NATURAL JOIN section  where prof_id='$user'";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_all($result);
$sql="select day,start_hr,start_min,end_hr,end_min,semester from time_slot natural join section where sec_id='$id'";
$result1 = mysqli_query($con,$sql);
$contrary = mysqli_fetch_assoc($result1);


foreach($rows as $row)
{
    if($row[6]==$contrary['semester'])
    {
        if($row[0]==$contrary['day'])
        {
            $time1 = number_format($row[1])*60+number_format($row[2]);
            $time2 = number_format($row[3])*60+number_format($row[4]);
            
            $timecon1 = number_format($contrary['start_hr'])*60+number_format($contrary['start_min']);
            $timecon2 = number_format($contrary['end_hr'])*60+number_format($contrary['end_min']);
  
            if($timecon1>=$time1&&$timecon1<=$time2)
            {
                echo "和".$row[5]."上课时间冲突！";
                return;
            }
            elseif($timecon2>=$time1&&$timecon2<=$time2)
            {
                echo "和".$row[5]."上课时间冲突！";
                return;
            }
        }
    }
}


$sql="select course_id,sec_id,semester,year from section where sec_id='$id'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$sec_id= $row['sec_id'];
$course_id= $row['course_id'];
$semester= $row['semester'];
$year= $row['year'];


$sql="insert into teaches values ('$user','$course_id','$sec_id','$semester','$year')";
$result = mysqli_query($con,$sql);
echo $result;


mysqli_close($con);
?>
