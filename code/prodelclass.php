<?php

session_start();

$user = $_SESSION["user"];
$id = $_POST['id'];

$con=mysqli_connect("localhost","root","123456","systemdb");

$sql="delete from teaches where sec_id='$id' and prof_id='$user'";
$result = mysqli_query($con,$sql);

echo $result;


mysqli_close($con);
?>
