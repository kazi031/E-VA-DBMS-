<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{
  #echo 'Succesfully connected with Area Manager Admin';

  if(isset($_POST['usname']))
  {
    if(!empty($_POST['usname']))
    {

      $user_name=$_POST['usname'];
      $area=$_POST['area'];
      $contact=$_POST['contact'];
      $address=$_POST['address'];
      $join_date=date('d-m-Y',strtotime($_POST['join_date']));
      $salary=$_POST['salary'];
      $rate=$_POST['rate'];
      $password=$_POST['password'];


      
      
      $result = oci_parse($db, "select local_e_c.nextval from dual");
      oci_execute($result);
      $row = oci_fetch_array($result);
      $nxt = $row['NEXTVAL'];
      $op = 'L-' . strval($nxt);


      $sql3="SELECT * FROM AreaManager WHERE AreaManager.AREA_location=:area1";
      $ans = oci_parse($db, $sql3);
      oci_bind_by_name($ans, ':area1', $area);
      oci_execute($ans);
      $row = oci_fetch_array($ans);
      $a_id = $row['A_ID'];


      $sql="INSERT INTO L_E_C4(lec_id,name,area,contact,type_of_emp,a_id) VALUES(:id1,:name,:area,:contact,'local',:a_id)";



      $sql2="INSERT INTO Employee4(emp_id,address,salary,join_date,rate,password,available) VALUES(:id2,:address,:salary,to_date('".$join_date."','DD/MM/YYYY'),:rate,:password,'Free')";


     //$sql2="INSERT INTO Employee2(id,salary,rate) VALUES('kus',:salary,:rate)";


      $compiled=oci_parse($db,$sql);
      $compiled2=oci_parse($db,$sql2);


  oci_bind_by_name($compiled,':id1',$op);
  oci_bind_by_name($compiled,':name',$user_name);
  oci_bind_by_name($compiled,':area',$area);
  oci_bind_by_name($compiled,':contact',$contact);
  oci_bind_by_name($compiled, ':a_id', $a_id);
  oci_bind_by_name($compiled2,':id2',$op);
  oci_bind_by_name($compiled2,':address',$address);
  oci_bind_by_name($compiled2,':join_date',$join_date);
  oci_bind_by_name($compiled2,':salary',$salary);
  oci_bind_by_name($compiled2,':rate',$rate);
  oci_bind_by_name($compiled2,':password',$password);
  //oci_bind_by_name($compiled, ':dob',$dob);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);
  oci_execute($compiled2);

  oci_free_statement($compiled);
  oci_free_statement($compiled2);
  oci_free_statement($ans);

  oci_close($db);

  header("Location:GOTO.html");
  exit;
}
}
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Requirements</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div  class="container">
  <br><br>
  <h2>Enter Employee Data (Local E-Waste Collector): <h2>
  <br><br>
  <form lass="was-validated" method="post">
    <div class="form-group">
      <label for="uname">Name</label>
      <input type="text" class="form-control" id="uname" placeholder="John Doe" name="usname" required>
      <label for="uname">Area</label>
      <input type="text" class="form-control" id="uname" placeholder="Mirpur" name="area" required>
      <label for="uname">Contact</label>
      <input type="text" class="form-control" id="uname" placeholder="01*********" name="contact" required>
      <label for="uname">Address</label>
      <input type="text" class="form-control" id="uname" placeholder="House no:#,Road No:#" name="address" >
      <label for="uname">Joining Date</label>
      <input type="date" class="form-control" id="uname" placeholder="dd-mm-yyyy" name="join_date" required>
      <label for="uname">Salary</label>
      <input type="number" class="form-control" id="uname" placeholder="*****" name="salary" >
      <label for="uname">Rate</label>
      <input type="number" class="form-control" id="uname" placeholder="****" name="rate" required>
      <label for="uname">Password</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="password" required>
   
      </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
