
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


      $sql="SELECT *  FROM AreaStorage";
      $compiled=oci_parse($db,$sql);




  //oci_bind_by_name($compiled, ':dob',$dob);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);

  while($row = oci_fetch_array($compiled))
  {

  }

  echo $row['ACCESS_DATE'];

  oci_free_statement($compiled);


  oci_close($db);

 #header("Location:GOTO.html");
  exit;

}
?>

