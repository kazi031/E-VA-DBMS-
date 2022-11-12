

<?php
  session_start();
  $process_id = $_SESSION['process_id'];
  $conn=oci_connect("RUSHAD","rushad5698","localhost/XE");
  
  
  if(isset($_POST['process_id']))
  {
  	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
    $copper_amount = $tin_amount = $steel_amount = $gold_amount = $silver_amount ='';
	
	$copper_amount = $_POST['copper_amount'];
    $tin_amount = $_POST['tin_amount'];
	$steel_amount = $_POST['steel_amount'];
	$gold_amount = $_POST['gold_amount'];
	$silver_amount = $_POST['silver_amount'];
	
	$sql = "insert into pcb_recycle(process_id,copper,tin,steel,gold,silver) 
	values(:process_id,:copper_amount,:tin_amount,:steel_amount,:gold_amount,:silver_amount)";
	
	$result = oci_parse($conn,$sql);
	
	oci_bind_by_name($result,':process_id',$process_id);
	oci_bind_by_name($result,':copper_amount',$copper_amount);
	oci_bind_by_name($result,':tin_amount',$tin_amount);
	oci_bind_by_name($result,':steel_amount',$steel_amount);
	oci_bind_by_name($result,':gold_amount',$gold_amount);
	oci_bind_by_name($result,':silver_amount',$silver_amount);
	
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
      <input type="number" type="number" min="0" step="any" value="0" class="form-control" id="uname" name="copper_amount" required>
      
	  <label for="uname">Tin Amount (in Kg)</label>
      <input type="number" type="number" min="0" step="any" value="0" class="form-control" id="uname" name="tin_amount" required>
	  
	  <label for="uname">Steel Amount (in Kg)</label>
      <input type="number" type="number" min="0" step="any" value="0" class="form-control" id="uname" name="steel_amount" required>
	  
	  <label for="uname">Gold Amount (in Kg)</label>
      <input type="number" type="number" min="0" step="any" value="0" class="form-control" id="uname" name="gold_amount" required>
	  
	  <label for="uname">Silver Amount (in Kg)</label>
      <input type="number" type="number" min="0" step="any" value="0" class="form-control" id="uname" name="silver_amount" required>
      </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
