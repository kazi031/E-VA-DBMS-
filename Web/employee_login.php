<?php
session_start();
$error = false;
$add = '';


$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{

  //echo 'Succesfully connected with Oracle DB';

  if(isset($_POST['id']))
  {
    if(!empty($_POST['id']))
    {

      $id=$_POST['id'];
      $password=$_POST['password'];
      


      $compiled=oci_parse($db,"Select * from Employee4");
      oci_execute($compiled);

      while($row = oci_fetch_array($compiled)){
        if($row['EMP_ID']==$id && $row['PASSWORD']==$password){
          $idstore = $row['EMP_ID'];
          $_SESSION['EMP_id'] = $idstore;
            oci_free_statement($compiled);
            oci_close($db);
            header("Location:emp.php");
            exit;
        }
        else{
          $error = true;
        }
      }

      oci_free_statement($compiled);
      oci_close($db);
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
  <h2>Employee Login : <h2>
  <br><br>
  <form  method="post">
    <div class="form-group">
      <label for="uname">ID</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="id" required>
      <label for="uname">Password</label>
      <input type="Password" class="form-control" id="uname" placeholder="" name="password" required>
      
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   <?php if($error == true){ ?>
    <script> alert ("There was an issue with the form")</script>
 <?php } ?>
</div>

</body>
</html>
