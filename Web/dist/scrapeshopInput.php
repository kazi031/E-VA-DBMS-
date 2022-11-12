<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{

  if(isset($_POST['local_id']))
  {
    if(!empty($_POST['local_id']))
    {

      $local_id=$_POST['local_id'];
      $trade_license=$_POST['trade_license'];
      $perDay=$_POST['perDay'];
      


      $sql='INSERT INTO scrapeShop(local_id ,trade_license ,perDay) VALUES(:local_id,:trade_license,:perDay)';



      $compiled=oci_parse($db,$sql);

  
  oci_bind_by_name($compiled,':local_id',$local_id);
  oci_bind_by_name($compiled,':trade_license',$trade_license);
  oci_bind_by_name($compiled,':perDay',$perDay);

  

  oci_execute($compiled);

  oci_free_statement($compiled);
  oci_close($db);

  header("Location:scrapeshopdone.php");
  exit;
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scrapeshop Input</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
body {

background-image: url('scrapesbg.jpg');
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
  <a href="transportationinput.php">Transportation</a>
  
 
</div>
  
<div>
  <br>
  <h2 align='center'>Scrap E-Shop Entery <h2>
  <br><br>
  <form class="setInput" method="post">
   <label for="uname"><a href="scrapeshopout.php">See Scrap E-Shop List</a></label><br><br>
   <label for="uname"><a href="scrapeshopsearch.php">Scrape E Shop Search</a></label><br><br>   
      <label for="uname">Local ID</label>
      <input type="text" class="form-control" id="uname" placeholder="Local Id" name="local_id" required>
      <label for="uname">Trade License</label>
      <input type="text" class="form-control" id="uname" placeholder="Trade License" name="trade_license" required>
      <label for="uname">Per Day</label>
      <input type="text" class="form-control" id="uname" placeholder="Per Day" name="perDay" required>

      
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
