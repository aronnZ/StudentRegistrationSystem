<?php
session_start();
$_SESSION["scroeid"]=$_POST["id"];
echo $_SESSION["scroeid"];



?>