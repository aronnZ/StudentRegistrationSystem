
<?php
header("content-type:text/html;charset=utf-8");
session_start();



if($_POST["user"]!=null&&$_POST["password"]!=null)
{
  $user = $_POST["user"];
  $password = $_POST["password"];
  $checkbox = $_POST["checkbox"];
  $type = substr($_POST["user"],0,1);


  $con=mysqli_connect("localhost","root","123456","systemdb");

  if(!$con)
  {
      echo "数据库连接错误!";
      return;
  }



  if($type=="S" || $type=="s")
  {
    $sql="select password,name from student where stu_id = '$user'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row["password"]==null) 
    {
      echo "用户名不存在！";
    }
    elseif ($row["password"]==$password)
    {
      $_SESSION["user"]=$user;
      $_SESSION["name"]=$row["name"];

      $sql="insert into onlinepeople values ('$user');";
      $result = mysqli_query($con,$sql);

      if($checkbox=="true")
      {
        $sql="insert into remember values ('$user','$password');";
        $result = mysqli_query($con,$sql);
      }
      else
      {
        $sql="delete from remember where id='$user'";
        $result = mysqli_query($con,$sql);
      }   

      echo("stumain.php");
    }   
    else
    {
      echo "密码错误！";
    }             
  }


  elseif($type=="P" || $type=="p")
  {
    $sql="select password,name from professor where prof_id = '$user'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row["password"]==null) 
    {
      echo "用户名不存在！";
    }
    elseif ($row["password"]==$password)
    {
      $_SESSION["user"]=$user;
      $_SESSION["name"]=$row["name"];
      $name = $row["user"];

      $sql="insert into onlinepeople values ('$user');";
      $result = mysqli_query($con,$sql);

      if($checkbox=="true")
      {
        $sql="insert into remember values ('$user','$password');";
        $result = mysqli_query($con,$sql);
      }
      else
      {
        $sql="delete from remember where id='$user'";
        $result = mysqli_query($con,$sql);
      }      

      echo("promain.php");
    }   
    else
    {
      echo "密码错误！";
    }      
  }

  elseif($type=="R" || $type=="r"||$type=="A" || $type=="a")
  {
    $sql="select password from administrator where ID = '$user' ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row["password"]==null) 
    {
      echo "用户名不存在！";
    }

    elseif ($row["password"]==$password)
    {
      $_SESSION["user"]=$user;

      if($checkbox=="true")
      {
        $sql="insert into remember values ('$user','$password');";
        $result = mysqli_query($con,$sql);
      }
      else
      {
        $sql="delete from remember where id='$user'";
        $result = mysqli_query($con,$sql);
      }   

      echo("admin_main.php");
    }   
    else
    {
      echo "密码错误！";
    } 
  }

  else
   {
    echo "用户名不存在！";
   }

}

else
{
  echo "用户名或密码不能为空！";
}

mysqli_close($con);
?>