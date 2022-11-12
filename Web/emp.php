<?php
	session_start();
	$var_value = $_SESSION['EMP_id'];
	//$_SESSION['vr'] = $var_value;
	//echo $var_value;
	$db = oci_connect("RUSHAD","rushad5698","localhost/XE");

	If(!$db)
		echo 'Failed to connect to Oracle';
	else{


		$result = oci_parse($db,"SELECT * FROM G_O_U4 WHERE GEN_EMP_ID=:id");
		oci_bind_by_name($result,':id',$var_value);
	   	
	   	oci_execute($result);
	}

	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Employee Page</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<header>
	 <div class="container">
        <nav>
          <i class="fa fa-user fa-3x"></i>
          <ul>
            <li><a href="employee_profile.php">Profile</a></li>
            <li><a href="logout.php" tite="Logout">Logout</a></li>
          </ul>
        </nav>
      </div>
	</header>


	<h2 align="center">Collect E-Waste from these people</h2>

	
	<table class="table table-dark" border="2">
	<thead>
		<tr>
			<th scope="col">Customer Name</th>
			<th scope="col">Contact Number</th>
			<th scope="col">Email</th>
			<th scope="col">Area</th>
			<th scope="col">Date of Birth</th>
			<th scope="col">Message</th>
		</tr>
	</thead>
		<?php
			while($row = oci_fetch_array($result)){
		?>

	<tbody>
		<tr> 
			<td><?php echo $row['NAME']; ?></td>
			<td><?php echo $row['CONTACT']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
			<td><?php echo $row['AREA']; ?></td>  
			<td><?php echo $row['DOB']; ?></td>
			<td><?php echo $row['MESSAGE']; ?></td>
		</tr>
	</tbody>

		<?php } ?>
	</table>
	
</body>
</html>