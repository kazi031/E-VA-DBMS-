<?php
session_start();
  $var_value = $_SESSION['A_id'];
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

      $company_name=$_POST['usname'];
      $area=$_POST['area'];
      $contact=$_POST['contact'];
      $waste=$_POST['waste'];
      $license=$_POST['license'];
      $income = 0;


      
      
      $result = oci_parse($db, "select corporate_company.nextval from dual");
      oci_execute($result);
      $row = oci_fetch_array($result);
      $nxt = $row['NEXTVAL'];
      $op = 'C-' . strval($nxt);

      $sql3="SELECT * FROM AreaManager WHERE AreaManager.AREA_location=:area1";
      $ans = oci_parse($db, $sql3);
      oci_bind_by_name($ans, ':area1', $area);
      oci_execute($ans);
      $row = oci_fetch_array($ans);
      $a_id = $var_value;


      $sql="INSERT INTO 
        CorporateUser(c_id,mutual_contact,company_name,trade_license,address,recycle_product_amount,a_id) VALUES(:id1,:contact,:company_name,:license,:area,:waste,:a_id)";



      $compiled=oci_parse($db,$sql);


  oci_bind_by_name($compiled,':id1',$op);
  oci_bind_by_name($compiled,':company_name',$company_name);
  oci_bind_by_name($compiled,':area',$area);
  oci_bind_by_name($compiled,':contact',$contact);
  oci_bind_by_name($compiled, ':a_id', $a_id);
  oci_bind_by_name($compiled,':waste',$waste);
  oci_bind_by_name($compiled,':license',$license);
  //oci_bind_by_name($compiled, ':dob',$dob);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);

  oci_free_statement($compiled);


  $dt = date('m/d/Y', time());
  $sql8="SELECT * FROM AreaStorage WHERE a_id=:a_id AND access_date=to_date('".$dt."','MM/DD/YYYY')";
  $compiled3=oci_parse($db,$sql8);
      oci_bind_by_name($compiled3, ':a_id', $a_id);
  oci_execute($compiled3);
  $row=oci_fetch_array($compiled3);



  if($row['UNIT_RECEIVED']==NULL)
  {
    $income=$row['DAILY_EXPENSE'];
    $sql4="INSERT INTO AreaStorage(unit_received,daily_expense,access_date,a_id) VALUES(:waste,:income,to_date('".$dt."','MM/DD/YYYY'),:a_id)";
    $compiled4=oci_parse($db, $sql4);
    
    oci_bind_by_name($compiled4,':waste', $waste);
    oci_bind_by_name($compiled4,':income', $income);
    oci_bind_by_name($compiled4, ':a_id', $a_id);

    oci_execute($compiled4);
    oci_free_statement($compiled4);
  }
  else
  {
    $unit_received=$row['UNIT_RECEIVED']+$waste;
    $daily_expense=$row['DAILY_EXPENSE'];

    $sql5="UPDATE AreaStorage SET unit_received=:unit_received , daily_expense=:daily_expense WHERE a_id=:a_id AND access_date=to_date('".$dt."','MM/DD/YYYY')";
    $compiled5=oci_parse($db, $sql5);
    oci_bind_by_name($compiled5, ':unit_received', $unit_received);
    oci_bind_by_name($compiled5, ':daily_expense', $daily_expense);
    oci_bind_by_name($compiled5, ':a_id', $a_id);
    oci_execute($compiled5);
    oci_free_statement($compiled5);

  }
  #oci_execute($compiled2);

  oci_free_statement($compiled3);






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
  <h2>Enter Coprporate Company Data (Local E-Waste Collector): <h2>
  <br><br>
  <form lass="was-validated" method="post">
    <div class="form-group">
      
      
      <label for="uname">Comapny Name</label>
      <input type="text" class="form-control" id="uname" placeholder="GrammenPhone" name="usname" required>
      <label for="uname">Mutual Contact</label>
      <input type="text" class="form-control" id="uname" placeholder="01*********" name="contact" required>
      <label for="uname">Trade License</label>
      <input type="text" class="form-control" id="uname" placeholder="*****" name="license" required>
      <label for="uname">Area</label>
      <input type="text" class="form-control" id="uname" placeholder="Mirpur" name="area" required>
      <label for="uname">Product Amount</label>
      <input type="number" class="form-control" id="uname" placeholder="*****" name="waste" required>

   
      </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
