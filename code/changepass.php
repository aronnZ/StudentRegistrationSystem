<?php
session_start();

$user = $_SESSION["user"];
$old = $_POST["old"];
$new = $_POST["new"];

if($old==null||$new==null)
{
    echo "密码不能为空!";
}

elseif($old==$new)
{
    echo "新密码与旧密码不能相同！";
}

else
{
    $con=mysqli_connect("localhost","root","123456","systemdb");

    $sql="select password from professor where prof_id = '$user'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row["password"]==$old)
    {
        $sql="update professor set password = '$new' where prof_id = '$user'";
        mysqli_query($con,$sql);

        $sql="select password from remember where id = '$user'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row!=null)
        {
            $sql="delete from remember where id='$user'";
            $result = mysqli_query($con,$sql);
        }



        echo "修改成功！";
    }
    else
    {
        echo "密码错误！";
    }
}
mysqli_close($con);
?>
