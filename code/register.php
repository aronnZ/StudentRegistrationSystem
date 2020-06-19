<?php
session_start();

//M=S or P
$getID=$_POST["id"];
$M=$_POST["M"];
$name=$_POST["name"];
$birthday=$_POST["birthday"];
$SSN=$_POST["SSN"];
$status=$_POST["status"];
$extrainfo=$_POST["extrainfo"];
$del=$_POST["del"];


//echo "测试传输信息:",$getID,$M,$name,$birthday,$SSN,$status,$extrainfo, $del;;
/**测试联通性
$M='S';
$name='suhaonan';
$birthday= "2000-01-09";
$SSN="123";3
$status="本科生";
extrainfo = "2021";
**/
//<!-- Generate stu ID -->
//1.Connect
use PhpMyAdmin\Charsets;
$db_host="localhost";
$db_name="root";
$db_pwd="123456";
$link=mysqli_connect($db_host,$db_name,$db_pwd);
//2.judge
if(!$link){
    echo"Fail to connect db";
}
//3.set charset
mysqli_set_charset($link,"utf8");
//4.select db
mysqli_select_db($link,"systemdb");
//5.write sql
if($M=='P')
    $sql="select * from professor";
else if($M=='S')
    $sql="select * from student";
//6.send sql
$result=mysqli_query($link,$sql);
//7.deal with sql
//数据库返回为空，预设新建id为00000001
$col =array("本科生","硕士生","博士生");
$dep =array("考古学院","美术学院","计算机科学与技术学院","社会学","生物学院","无机化学","外国语学院","物理学院");
if($getID==""){
    //新建人员
    $ID= 1;
    if (!$result) {
        $ID=$M."00000001";
    }else {
        $length = mysqli_num_rows($result);
        $flag=array_fill(1,$length,"unused");
        while ($result_arr = mysqli_fetch_array($result)) {
            //取数字进行比较的同时比较姓名和SSN是否完全重复
            $var = (int)substr($result_arr[0], 1);
            $db_name = $result_arr[2];
            $db_SSN = $result_arr[4];
            if($db_SSN==$SSN){
                exit("该社会安全码已被注册，若要修改信息请进入修改界面！");
            }
            if(!($var>$length)){
                //不逾界，该ID被占用，标志设为used，继续遍历
                $flag[$var]="used";
            }
        }
        for($i = 1;$i<=$length;$i++){
            //遍历只要发现一个未使用过的编号便占有
            if($flag[$i]=="unused"){
                $ID=$i;
                break;
            }
        }
        $ID+=100000000;
        $ID=$M.substr((string)$ID,1);
    }
    if($M=='S'){
        //(`stu_id`, `password`, `name`, `birthday`, `SSN`, `status`, `graduation_date`)
        $sql="INSERT INTO student  VALUES ('".$ID."','000000','".$name."',";
        if($birthday) $sql=$sql."'".$birthday."','".$SSN."',";
        else $sql=$sql."NULL,'".$SSN."',";
        if($status and ($status!="undefined")) $sql=$sql."'".$status."',";
        else $sql=$sql."NULL,";
        if($extrainfo) $sql=$sql."'".$extrainfo."');";
        else $sql=$sql."NULL);";
        //echo $sql;
    }else if($M='P'){
        //(`prof_id`, `password`, `name`, `birthday`, `SSN`, `status`, `dept_name`)
        $sql="INSERT INTO professor  VALUES ('".$ID."','000000','".$name."',";
        if($birthday) $sql=$sql."'".$birthday."','".$SSN."',";
        else $sql=$sql."NULL,'".$SSN."',";
        if($status and ($status!="undefined")) $sql=$sql."'".$status."',";
        else $sql=$sql."NULL,";
        if($extrainfo) $sql=$sql."'".$extrainfo."');";
        else $sql=$sql."NULL);";
        //echo $sql;
    }
    $result=mysqli_query($link,$sql);

    if($result) {
        if ($M == 'S') {
            $output = "新建学生信息：\nID：" . $ID . "\n姓名：" . $name . "\n生日：" . $birthday . "\n社会安全码：" . $SSN ."\n身份：";
            if ($status=="bachelor" ) $output .= "本科生";
            if ($status=="master" ) $output .= "硕士生";
            if ($status=="doctor" ) $output .= "博士生";
            $output .= "\n毕业年份：" . $extrainfo . "\n";
            echo $output;
        }
        if ($M == 'P') {
            $output = "新建教授信息：\nID：" . $ID . "\n姓名：" . $name . "\n生日：" . $birthday . "\n社会安全码：" . $SSN . "\n身份：";
            if ($status == "lecturer") $output .= "讲师";
            if ($status == "associate_prof") $output .= "副教授";
            if ($status == "prof") $output .= "教授";
            $output .="\n系别：";
            if($extrainfo =="History") $output.="历史学院";
            if($extrainfo =="Art") $output.="美术学院";
            if($extrainfo =="Comp. Sci.") $output.="计算机科学与技术学院";
            if($extrainfo =="Sociology") $output.="社会学";
            if($extrainfo =="Biology") $output.="生物学院";
            if($extrainfo =="Inorganic Chemistry") $output.="无机化学";
            if($extrainfo =="ForeLans") $output.="外国语学院";
            if($extrainfo =="Physics") $output.="物理学院";
            $output.="\n";
            echo $output;
        }
        echo "数据已经添加到数据库！\n";
    }
    else
        echo "新建数据失败，请检查数据的正确性！\n";

}
else{
    if($del!=""){
        //删除人员
        //删除信息
        $ID=$getID;
        if($M=='S'){
            $sql1="DELETE FROM student where stu_id = '".$ID."' and SSN = '".$SSN."';";

            $sql2="DELETE FROM takes where stu_id = '".$ID."';";
        }else if($M='P'){
            $sql1="DELETE FROM professor where prof_id = '".$ID."' and SSN = '".$SSN."';";

            $sql2="DELETE FROM teaches where prof_id = '".$ID."';";
        }
        //echo $sql;

        $result1=mysqli_query($link,$sql1);
        $result2=mysqli_query($link,$sql2);
        if($result1&&$result2) {
            if ($M=='S'){
                $output ="已删除学生信息：\nID：".$ID."\n姓名：".$name."\n生日：".$birthday."\n社会安全码：".$SSN."\n身份：";
                if($status =="bachelor") $output.="本科生";
                if($status =="master") $output.="硕士生";
                if($status =="doctor") $output.="博士生";
                $output.="\n毕业年份：".$extrainfo."\n";
                echo $output;
            }else if($M=='P'){
                $output ="已删除教授信息：\nID：".$ID."\n姓名：".$name."\n生日：".$birthday."\n社会安全码：".$SSN. "\n身份：";
                if ($status == "lecturer") $output .= "讲师";
                if ($status == "associate_prof") $output .= "副教授";
                if ($status == "prof") $output .= "教授";
                $output .="\n系别：";
                if($extrainfo =="History") $output.="历史学院";
                if($extrainfo =="Art") $output.="美术学院";
                if($extrainfo =="Comp. Sci.") $output.="计算机科学与技术学院";
                if($extrainfo =="Sociology") $output.="社会学";
                if($extrainfo =="Biology") $output.="生物学院";
                if($extrainfo =="Inorganic Chemistry") $output.="无机化学";
                if($extrainfo =="ForeLans") $output.="外国语学院";
                if($extrainfo =="Physics") $output.="物理学院";
                $output.="\n";
                echo $output;
            }
            echo  "数据已经删除！\n";
        }
        else
            echo "数据删除失败，请稍后再试！\n";
    }else{
        //更新人员
        $ID=$getID;
        if($M=='S'){
            //(`stu_id`, `password`, `name`, `birthday`, `SSN`, `status`, `graduation_date`)
            $sql="UPDATE student SET  name= '".$name."'";
            if($birthday) $sql=$sql.",birthday = '".$birthday."'";
            else ;
            if($status and ($status!="undefined")) $sql=$sql.",status= '".$status."'";
            else ;
            if($extrainfo) $sql=$sql.",graduation_date= '".$extrainfo."'";
            else ;
            $sql = $sql."where stu_id = '".$ID."' and SSN = '".$SSN."';";
            //echo $sql;
        }else if($M='P'){
            //(`prof_id`, `password`, `name`, `birthday`, `SSN`, `status`, `dept_name`)
            $sql="UPDATE professor SET name= '".$name."'";
            if($birthday) $sql=$sql.",birthday = '".$birthday."'";
            else ;
            if($status and ($status!="undefined")) $sql=$sql.",status= '".$status."'";
            else ;
            if($extrainfo) $sql=$sql.",dept_name= '".$extrainfo."'";
            else ;
            $sql = $sql."where prof_id = '".$ID."' and SSN = '".$SSN."';";
            //echo $sql;
        }
        $result=mysqli_query($link,$sql);
        if($result) {
            if ($M=='S'){
                $output ="更新学生信息：\nID：".$ID."\n姓名：".$name."\n生日：".$birthday."\n社会安全码：".$SSN."\n身份：";

                if($status =="bachelor") $output.="本科生";
                if($status =="master") $output.="硕士生";
                if($status =="doctor") $output.="博士生";
                $output.="\n毕业年份：".$extrainfo."\n";
                echo $output;
            }else if($M=='P'){
                $output ="更新教授信息：\nID：".$ID."\n姓名：".$name."\n生日：".$birthday."\n社会安全码：".$SSN. "\n身份：";
                if ($status == "lecturer") $output .= "讲师";
                if ($status == "associate_prof") $output .= "副教授";
                if ($status == "prof") $output .= "教授";
                $output .="\n系别：";
                if($extrainfo =="History") $output.="历史学院";
                if($extrainfo =="Art") $output.="美术学院";
                if($extrainfo =="Comp. Sci.") $output.="计算机科学与技术学院";
                if($extrainfo =="Sociology") $output.="社会学";
                if($extrainfo =="Biology") $output.="生物学院";
                if($extrainfo =="Inorganic Chemistry") $output.="无机化学";
                if($extrainfo =="ForeLans") $output.="外国语学院";
                if($extrainfo =="Physics") $output.="物理学院";
                $output.="\n";
                 $output;
            }
            echo  "数据已经更新到数据库！\n";
        }
        else
            echo "数据更新失败，请检查数据的正确性！\n";


    }
}



//8.close db
mysqli_close($link);
