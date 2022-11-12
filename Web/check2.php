<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{
  #echo 'Succesfully connected with Area Manager Admin';

      $unit_received=10;
      $daily_expense=100;
      $dt = date('d/m/Y', time());
      echo $dt;

      $sql3="SELECT * FROM AreaStorage WHERE access_date=to_date('".$dt."','DD/MM/YYYY')";



     //$sql2="INSERT INTO Employee2(id,salary,rate) VALUES('kus',:salary,:rate)";


      $compiled=oci_parse($db,$sql3);
      #$compiled2=oci_parse($db,$sql2);


  //oci_bind_by_name($compiled, ':dob',$dob);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);
  $row=oci_fetch_array($compiled);
  echo "string";
  echo $row['UNIT_RECEIVED'];

  if($row['UNIT_RECEIVED']==NULL)
  {
    echo "_nai";
    $sql7="INSERT INTO AreaStorage(unit_received,daily_expense,access_date) VALUES(:unit_received,:daily_expense,to_date('".$dt."','DD/MM/YYYY'))";
    $compiled2=oci_parse($db, $sql7);
    oci_bind_by_name($compiled2, ':unit_received', $unit_received);
    oci_bind_by_name($compiled2, ':daily_expense', $daily_expense);

    oci_execute($compiled2);
    oci_free_statement($compiled2);
    echo "_end";
  }
  else
  {
    echo "_ase";
    $waste=$row['UNIT_RECEIVED']+$unit_received;
    $income=$row['DAILY_EXPENSE']+$daily_expense;

    $sql8="UPDATE AreaStorage SET unit_received=:waste , daily_expense=:income WHERE access_date=to_date('".$dt."','DD/MM/YYYY')";
    $compiled3=oci_parse($db, $sql8);
    oci_bind_by_name($compiled3,':waste', $waste);
    oci_bind_by_name($compiled3,':income', $income);
    oci_execute($compiled3);
    oci_free_statement($compiled3);

  }
  #oci_execute($compiled2);

  oci_free_statement($compiled);

  #oci_free_statement($compiled2);
  #oci_free_statement($ans);

  oci_close($db);
  exit;

}
?>






