<?php
session_start();
$id = $_SESSION['EMP_id'];
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{
      $var = $_POST['valueForm'];
      //echo $id;
      $result2 = oci_parse($db, "update Employee4 set available=:avail where emp_id=:id");
      oci_bind_by_name($result2,':id',$id);
      oci_bind_by_name($result2,':avail',$var);
      oci_execute($result2);




  oci_close($db);
  header("Location:employee_profile.php");
  exit;

}

?>