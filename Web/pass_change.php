<?php
	session_start();
	$pass1 = $_SESSION['pass1'];
	$pass2 = $_SESSION['pass2'];
	$id = $_SESSION['EMP_id'];
	$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
	If (!$db)
  		echo 'Failed to connect to Oracle';
  	else{
  			if(strcmp($pass1, $pass2)==0)
  			{
  				$sql = "UPDATE Employee4 SET PASSWORD=:pass1 WHERE EMP_ID=:id";

      			$compiled = oci_parse($db, $sql);
      			oci_bind_by_name($compiled,':id',$id);
      			oci_bind_by_name($compiled,':pass1',$pass1);
      			oci_execute($compiled);
      			oci_free_statement($compiled);
      			oci_close($db);
      			echo '<script type="text/javascript">';
      			echo 'alert("pass changed successfully")';
      			echo '</script>';
      			
  			}
  			header("Location:employee_profile.php");
      	exit;
  	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>pass_change</title>
</head>
<body>

</body>
</html>