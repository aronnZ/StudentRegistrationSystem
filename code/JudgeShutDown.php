<?php
    header("content-type:text/html;charset=utf-8");
    session_start();
    
    $con=mysqli_connect("localhost","root","123456","systemdb");
     
    $sql="select shtdwn_flag from administrator limit 1";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    
    echo"$row[shtdwn_flag]";
    
    mysqli_close($con);
?>