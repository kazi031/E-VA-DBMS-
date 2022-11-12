<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{
  echo 'Succesfully connected with Oracle DB';

  if(isset($_POST['usname']))
  {
    if(!empty($_POST['usname']))
    {

      $user_name=$_POST['usname'];
      $contact=$_POST['contact'];
      $email=$_POST['email'];
      $area=$_POST['area'];
      $message=$_POST['message'];
      $dob=date('d-m-Y',strtotime($_POST['dob']));

      $sql1 = "SELECT * FROM Employee4,L_E_C4 WHERE Employee4.EMP_ID = L_E_C4.LEC_ID AND L_E_C4.AREA=:area1 AND Employee4.AVAILABLE='Free'";

      $result = oci_parse($db, $sql1);

      oci_bind_by_name($result,':area1',$area);

      oci_execute($result);
      $row = oci_fetch_array($result);
      $gen_emp_id = $row['EMP_ID'];



      $result3 = oci_parse($db, "select local_e_c.nextval from dual");
      oci_execute($result3);
      $row = oci_fetch_array($result3);
      $nxt = $row['NEXTVAL'];
      $op = 'G-' . strval($nxt);

      if($gen_emp_id == null){

          $sql = "INSERT INTO G_O_U4(gen_id,name,contact,email,area,dob,gen_emp_id,message,status) VALUES(:op,:name,:contact,:email,:area,to_date('".$dob."','DD/MM/YYYY'),:gen_emp_id,:message,'Pending')";

      }
      else{

          $sql = "INSERT INTO G_O_U4(gen_id,name,contact,email,area,dob,gen_emp_id,message,status) VALUES(:op,:name,:contact,:email,:area,to_date('".$dob."','DD/MM/YYYY'),:gen_emp_id,:message,'Approved')";
      }
      



      $compiled=oci_parse($db,$sql);

  oci_bind_by_name($compiled,':name',$user_name);
  oci_bind_by_name($compiled,':contact',$contact);
  oci_bind_by_name($compiled,':email',$email);
  oci_bind_by_name($compiled,':area',$area);
  oci_bind_by_name($compiled,':gen_emp_id',$gen_emp_id);
  oci_bind_by_name($compiled,':message',$message);
  oci_bind_by_name($compiled,':op',$op);


  oci_execute($compiled);

  $result2 = oci_parse($db, "update Employee4 set available='Busy' where emp_id=:emp_id");
  oci_bind_by_name($result2, ':emp_id', $gen_emp_id);
  oci_execute($result2);


  oci_free_statement($compiled);
  oci_free_statement($result);
  oci_free_statement($result2);
  oci_free_statement($result3);


  oci_close($db);
  #echo "string";

  header("Location:GOTO.html");
  exit;
}
}
}
?>