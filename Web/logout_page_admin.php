<?php
session_start();
 $_SESSION['loggedin'] =false;
session_destroy();
header("Location:login_page_admin.php");
exit;

 ?>
