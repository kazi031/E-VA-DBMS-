<?php

session_start();




if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['user_id'] . "!";
	$con = oci_connect("RUSHAD","rushad5698","localhost/XE");
    //echo 'nice';

}

else{
echo '<script type="text/javascript">';
echo ' alert("Please login with proper credentials first ")';  //not showing an alert box.
echo '</script>';
header("Location:login_page_admin.php");
exit;
}

 ?>





<html>
<head>
  <body>

  </body>
</head>
</html>
