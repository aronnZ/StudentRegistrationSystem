<?php

session_start();

if($_POST["user"]!=null)
{
    $user = $_POST["user"];

    $con=mysqli_connect("localhost","root","123456","systemdb");

    $sql="select password from remember where id = '$user'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row["password"]!=null) 
    {
        echo($row["password"]);
    }
}

mysqli_close($con);

?>