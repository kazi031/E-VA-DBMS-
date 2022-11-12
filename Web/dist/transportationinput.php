<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{

  if(isset($_POST['destination_date']))
  {
    if(!empty($_POST['destination_date']))
    {

    
      $destination_date=date('d-m-Y',strtotime($_POST['destination_date']));	  	  
	  $destination_time=$_POST['destination_time'];
      $vehicle_type=$_POST['vehicle_type'];
      $vehicle_number_plate=$_POST['vehicle_number_plate'];
      $vehicle_driver_name=$_POST['vehicle_driver_name'];
      $vehicle_contact_no=$_POST['vehicle_contact_no'];
      $info_id=$_POST['info_id'];
      $info_date=date ( 'd-m-Y', strtotime($_POST['info_date'])); 
      $a_id=$_POST['a_id'];
      $c_id=$_POST['c_id'];
      

//solve the date and time input 

      $sql="INSERT INTO transportation(t_id ,destination_date,destination_time,vehicle_type,vehicle_number_plate,vehicle_driver_name,vehicle_contact_no,info_id,info_date,a_id,c_id) 
	  VALUES(transportation_t_id_seq.nextval,to_date('".$destination_date."','dd/mm/yyyy'),:destination_time,:vehicle_type,:vehicle_number_plate,:vehicle_driver_name,:vehicle_contact_no,:info_id,to_date('".$info_date."','dd/mm/yyyy'),:a_id,:c_id)";



      $compiled=oci_parse($db,$sql);

  

  oci_bind_by_name($compiled,':destination_date',$destination_date);
  oci_bind_by_name($compiled,':destination_time',$destination_time);
  oci_bind_by_name($compiled,':vehicle_type',$vehicle_type);
  oci_bind_by_name($compiled,':vehicle_number_plate',$vehicle_number_plate);
  oci_bind_by_name($compiled,':vehicle_driver_name',$vehicle_driver_name);
  oci_bind_by_name($compiled,':vehicle_contact_no',$vehicle_contact_no);
  oci_bind_by_name($compiled,':info_id',$info_id);
  oci_bind_by_name($compiled,':info_date',$info_date);
  oci_bind_by_name($compiled,':a_id',$a_id);
  oci_bind_by_name($compiled,':c_id',$c_id);
  

  oci_execute($compiled);

  oci_free_statement($compiled);
  oci_close($db);

  header("Location:transportationdone.php");
  exit;
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transportation Info Input</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
body {

background-image: url('transportbg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color:black;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div class="topnav">
  <a href="../index.php"><img src="logo.jpg" alt="E-VA" width="54" height="25"></a>
	
	<a href="errorinput.php">Error</a>
 
 <a href="errorofrinput.php">Error of Recycle</a> 
  <a href="scrapeshopinput.php">Scrap E-Shop</a>
  
 
</div>

<div>
  <br>
  <h2 align='center'>Transportation Info Input Entry <h2>
  <br><br>
  <form class="setInput" method="post">
   <label for="uname"><a href="transportationout.php">See Transportation Info List</a></label><br><br>
   <label for="uname"><a href="transportationsearch.php">Transportation Search</a></label><br><br>   
      <label for="uname">Destination Date</label>
      <input type="text" class="form-control" id="uname" placeholder="Destination Date dd/mm/yyyy " name="destination_date" required>
	  <label for="uname">Destination Time</label>
	  <input type="text" class="form-control" id="uname" placeholder="Destination Time (xx:xx am/pm)" name="destination_time" required>
      <label for="uname">Vehicle Type</label>
      <input type="text" class="form-control" id="uname" placeholder="Vehicle Type" name="vehicle_type" required>
      <label for="uname">Vehicle Number Plate</label>
      <input type="text" class="form-control" id="uname" placeholder="Vehicle Number Plate" name="vehicle_number_plate" required>
      <label for="uname">Vehicle Driver Name</label>
      <input type="text" class="form-control" id="uname" placeholder="Vehicle Driver Name" name="vehicle_driver_name" required>
      <label for="uname">Vehicle Contact No</label>
      <input type="text" class="form-control" id="uname" placeholder="Vehicle Contact No" name="vehicle_contact_no" required>
      <label for="uname">Secondary Transaction Info id</label>
      <input type="text" class="form-control" id="uname" placeholder="Secondary Transaction Info id" name="info_id" required>
      <label for="uname">Secondary Transaction Info Date</label>
      <input type="text" class="form-control" id="uname" placeholder="Info Date" name="info_date" required>
      <label for="uname">Area Manager id</label>
      <input type="text" class="form-control" id="uname" placeholder="Area Manager id" name="a_id" required>
      <label for="uname">Company id</label>
      <input type="text" class="form-control" id="uname" placeholder="Company id " name="c_id" required>


      
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
