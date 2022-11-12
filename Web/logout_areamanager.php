<?php
session_start();
 $_SESSION['A_id']=0;

if(session_destroy())
{
header("Location:login_admin.php");
}
?>