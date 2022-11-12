<?php
	session_start();
	$id = $_SESSION['EMP_id'];
	unset($_SESSION['pass1']);
	unset($_SESSION['pass2']);
	//$_SESSION['pass2'] = $_POST['pass2'];
	$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
	If (!$db)
  		echo 'Failed to connect to Oracle';
	else
	{
  		if(isset($_SESSION['EMP_id']))
  		{

  			$sql = "SELECT * FROM Employee4 WHERE EMP_ID=:id";
      		$compiled = oci_parse($db, $sql);

      		$sql2 = "SELECT * FROM L_E_C4 WHERE LEC_ID=:id";
      		$compiled2 = oci_parse($db, $sql2);

      		oci_bind_by_name($compiled,':id',$id);
      		oci_bind_by_name($compiled2,':id',$id);
      		oci_execute($compiled);
      		oci_execute($compiled2);

      		$rowEmp = oci_fetch_array($compiled);
      		$rowLEC = oci_fetch_array($compiled2);

      		oci_free_statement($compiled);
      		oci_free_statement($compiled2);
      		oci_close($db);
		}
		if(isset($_POST['pass1']))
		{

			$_SESSION['pass1'] = $_POST['pass1'];
			$_SESSION['pass2'] = $_POST['pass2'];
			header("Location:pass_change.php");
			exit;

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Emp Profile</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/pass_change.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
	 <div class="container">
        <nav>
          <i class="fa fa-user fa-3x"></i>
          <ul>
          	<li></li>
            <li><a href="emp.php">Collections</a></li>
            <li><a href="logout.php" tite="Logout">Logout</a></li>
          </ul>
        </nav>
      </div>
	</header>
	<div>
		<ul class="list-group list-group-flush">
  			<li class="list-group-item">Name: <?php echo $rowLEC['NAME']; ?></li>
  			<li class="list-group-item">Area: <?php echo $rowLEC['AREA']; ?></li>
  			<li class="list-group-item">Phone No: <?php echo $rowLEC['CONTACT']; ?></li>
  			<li class="list-group-item">Address: <?php echo $rowEmp['ADDRESS']; ?></li>
  			<li class="list-group-item">Joining_date: <?php echo $rowEmp['JOIN_DATE']; ?></li>
        <li class="list-group-item">Availability: <?php echo $rowEmp['AVAILABLE']; ?></li>
        <li class="list-group-item">
          <form method="post" name="availForm" action="available_change.php">
            Chose Availability:
            <select name="valueForm">
              <option value="">Select...</option>
              <option value="Free">Free</option>
              <option value="Busy">Busy</option>
            </select>
            <input type="submit" name="">
          </form>
        </li>
  			<li class="list-group-item">
  				<button class="open-button" onclick="openForm()">Change Password</button>

				<div class="form-popup" id="myForm">
  					<form action="" class="form-container" method="post">

    				<label for="psw"><b>New Password</b></label>
    				<input type="text" placeholder="Enter Password" name="pass1" required>

    				<label for="psw"><b>Confirm New Password</b></label>
    				<input type="text" placeholder="Confirm Password" name="pass2" required>

    				<button type="submit" class="btn">Confirm</button>
    				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  					</form>
				</div>

			</li>
		</ul>
	</div>
	<script>
		function openForm() {
  		document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
  		document.getElementById("myForm").style.display = "none";
		}
	</script>
</body>
</html>