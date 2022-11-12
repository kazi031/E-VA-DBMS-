<?php
  session_start();
  $process_id = $_SESSION['process_id'];
  $conn=oci_connect("RUSHAD","rushad5698","localhost/XE");
  
  
  if(isset($_POST['process_id']))
  {
  	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
    $copper_amount = $plastic_amount = '';
	
	$copper_amount = $_POST['copper_amount'];
    $plastic_amount = $_POST['plastic_amount'];
	
	$sql = "insert into copper_wire_recycle(process_id,copper,plastic) values(:process_id,:copper_amount,:plastic_amount)";
	
	$result = oci_parse($conn,$sql);
	
	oci_bind_by_name($result,':process_id',$process_id);
	oci_bind_by_name($result,':copper_amount',$copper_amount);
	oci_bind_by_name($result,':plastic_amount',$plastic_amount);
	
	oci_execute($result);
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
  <h2>Enter Recycle Process Information : <h2>
  <br><br>
  <form lass="was-validated" method="post">
    <div class="form-group"> 
      
	  <label for="uname">Process ID</label>
	  <input type="text" class="form-control" id="uname" name="process_id" value="<?php echo $process_id;?>" readonly>
	  
	  <label for="uname">Copper Amount (in Kg)</label>
      <input type="number" min="0" value="0" step="any" class="form-control" id="uname" name="copper_amount" required>
      
	  <label for="uname">Plastic Amount (in Kg)</label>
      <input type="number" min="0" value="0" step="any" class="form-control" id="uname" name="plastic_amount" required>
      </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>