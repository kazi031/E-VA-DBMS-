<?php
session_start();

if(session_destroy())
{
header("Location:recycle_admin_login.php");
}
?>