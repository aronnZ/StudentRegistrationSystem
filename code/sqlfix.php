<?php
    $stuID = $_POST["stuID"];
    $str =substr($stuID,0,1);


    $conn = mysqli_connect("localhost","root","123456","systemdb");

    if(!$conn){
        echo "0";
    }else{
        if($stuID=="indexRequest"){

//          检测是否有用户正在注册
            $sql = "select count(*) from onlinepeople";
            $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_row($result);

            if($row[0] == "0")
                echo "success";
            else
            {
                echo "online_fail";
                return;       
            }


//          改变administrator的shtdwn_flag
            $sql = "update administrator set shtdwn_flag = 1 ";
            mysqli_query($conn,$sql);

//          补选课
            $sql = "SELECT stu_id,4-COUNT(stu_id) AS sub 
                    FROM takes
                    WHERE takes.flag=0
                    GROUP BY takes.stu_id
                    HAVING COUNT(stu_id)<4";

            if ($result=mysqli_query($conn,$sql))
            {
                // 一条条获取
                
                while ($row=mysqli_fetch_row($result))
                {
                    $num = (int)$row[1];
                    if($num<2){

                        $sqll = "UPDATE takes SET takes.flag=0
                            WHERE takes.stu_id='".$row[0].
                            "' and takes.flag=2 limit 1";

                    }else{

                        $sqll = "UPDATE takes SET takes.flag=0
                            WHERE takes.stu_id='".$row[0].
                            "' and takes.flag=2 limit ".$row[1];

                    }
                    mysqli_query($conn,$sqll);
                }

                // 释放结果集合
                mysqli_free_result($result);
            }


//          删除未满足要求的课程
            $sql = "DELETE 
                    FROM takes
                    WHERE takes.sec_id NOT IN(
                    SELECT teaches.sec_id
                    FROM teaches) ;
                    ";
            mysqli_query($conn,$sql);
                    
            $sql = "DELETE FROM teaches
                    WHERE teaches.sec_id in
                    (SELECT sec_id 
                    FROM takes 
                    GROUP BY course_id,sec_id,semester,year
                    HAVING COUNT(stu_id)<3);
                    ";
            mysqli_query($conn,$sql); 

            $sql = "DELETE FROM takes
                    WHERE takes.sec_id in
                    (SELECT sec_id 
                    FROM takes 
                    where flag=0
                    GROUP BY course_id,sec_id,semester,year
                    HAVING COUNT(stu_id)<3)
                    ";
            mysqli_query($conn,$sql);     
            
            $sql = "DELETE 
            FROM takes
            WHERE takes.sec_id NOT IN(
            SELECT teaches.sec_id
            FROM teaches) ;
            ";
    mysqli_query($conn,$sql);
                    



        }else{
            if($str=="S"){

                $sql = "select * from student where stu_id = '$stuID'";
            }else{
                $sql = "select * from professor where prof_id = '$stuID'";
            }
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if(null == $row){
                echo "2";
            }else{
                echo "1";
            }
        }
        mysqli_close($conn);
    }


