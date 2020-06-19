<?php
header("content-type:text/html;charset=utf-8");
session_start();

    if($_POST["gradearray"]!=null && $_POST["Stu_names"]!=null)
    {
        echo"提交成功！";
        $grade = $_POST["gradearray"];
        $Stu_name=$_POST["Stu_names"];
        $sec=$_POST["sec"];

        

        $grade=explode(',',$grade,100);
        $Stu_name=explode(',',$Stu_name,100);
        $sec=explode(',',$sec,100);
    
        $con=mysqli_connect("localhost","root","123456","systemdb");

        if(!$con)
        {
            echo "数据库连接错误!";
            return;
        }

        $count=-1;
        
        foreach ($grade as $grades)
        
        {
            $count=$count+1;
            $score=$grade[$count];
            $name=$Stu_name[$count];
            $sec_id=$sec[$count];

                        
            $sql="update takes set grade='$score' where stu_id = '$name' and sec_id = '$sec_id'";
            $result = mysqli_query($con,$sql);
        }
        

    }else
    {
        echo"提交失败！";
    }  


mysqli_close($con);
?>