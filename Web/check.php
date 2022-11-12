
 <?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{
  #echo 'Succesfully connected with Area Manager Admin';

  

      $user_name='AA-001';
	  $dob = date('m/d/Y', time());
	  echo $dob;


      $sql="INSERT INTO AA(access_date,id) VALUES(to_date('".$dob."','MM/DD/YYYY'),:name)";
      $compiled=oci_parse($db,$sql);



  oci_bind_by_name($compiled,':name',$user_name);

  //oci_bind_by_name($compiled, ':dob',$dob);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);


  oci_free_statement($compiled);


  oci_close($db);

 #header("Location:GOTO.html");
  exit;

}
?>

