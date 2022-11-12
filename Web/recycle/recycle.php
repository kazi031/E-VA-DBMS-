


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
  <form action="recycle2.php" lass="was-validated" method="post">
    <div class="form-group">
      <label for="uname">Material Name</label>
	  
		<?php
	
		$conn=oci_connect("RUSHAD","rushad5698","localhost/XE");
		if (!$conn)
		{
			exit("Connection Failed: " . $conn);
		}
    
		$sql = "select material_name from materials";
		$result = oci_parse($conn,$sql);
		oci_execute($result);
	
		echo "<select class='form-control' id='mat_name' name='material_name'>";
		while ($row = oci_fetch_array($result)) {
	
		echo "<option value='" . $row['MATERIAL_NAME'] ."'>" . $row['MATERIAL_NAME']."</option>";
		}
		echo "</select>";
		
	  	?>
  
      <label for="uname">Material Amount (in Kg)</label>
      <input type="number" min="0" value="0" step="any" class="form-control" id="uname" name="material_amount" required>
   	  
      </div>
    <br>
	<button type="submit" id="myButton" class="btn btn-primary" value="save">Submit</button>
   </form>
  
</div>




</body>
</html>
