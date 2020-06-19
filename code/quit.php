<?php

header("content-type:text/html;charset=utf-8");
session_start();

$con=mysqli_connect("localhost","root","123456","systemdb");

$user = $_SESSION["user"];

$sql="delete from onlinepeople where id = '$user'";
$result = mysqli_query($con,$sql);



$_SESSION=array();

mysqli_close($con);

?>