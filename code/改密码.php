<?php
session_start();
?>
<form method="post" action="成功修改密码.php">

    新的密码: <input type="text" name="fname">

    <input type="submit">

</form>



<?php



@$_SESSION["pass"] = $_POST['fname'];

?>





