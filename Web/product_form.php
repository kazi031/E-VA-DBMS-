<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['user_id'] . "!";

} else {
				echo '<script type="text/javascript">';
				echo ' alert("Please login with proper credentials first ")';  //not showing an alert box.
				echo '</script>';
				header("Location:login_page_admin.php");
				exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Insert</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="css/style_login.css">
</head>
<body>

	<header>
	 <div class="container">
        <nav>
          <div id="branding">
          <span class="highlight"><a class="navbar-brand js-scroll-trigger" href="index.php">E-va</a></span>
         </div>

				 <div class="nav-item">
				 <span class="highlight"><a class="navbar-brand js-scroll-trigger" href="export_form.php">Export Form</a></span>
				</div>

				<div class="nav-item">
				<span class="highlight"><a class="navbar-brand js-scroll-trigger" href="trans_view.php">View Transactions</a></span>
			 </div>

				 <div class="nav-item">
				 <span class="highlight"><a class="navbar-brand js-scroll-trigger" href="logout_page_admin.php">Log Out</a></span>
				</div>

        </nav>
      </div>
	</header>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="product_insert.php" method="post">
					<span class="login100-form-title p-b-32">
						Product Input Form
					</span>

					<span class="txt1 p-b-11">
						Product Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Product Name is required">
						<input class="input100" type="text" name="prod_name" >
						<span class="focus-input100"></span>
					</div>

          <span class="txt1 p-b-11">
						Product Price
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Product Price is required">
						<input class="input100" type="text" name="prod_price" >
						<span class="focus-input100"></span>
					</div>


          <span class="txt1 p-b-11">
						Product Type
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Product Type is required">
            <select class="input100" name="prod_type">
              <option value="TV">TV</option>
              <option value="PC">PC</option>
              <option value="Fridge">Fridge</option>
              <option value="Others">Others</option>
            </select>
						<span class="focus-input100"></span>
					</div>



          <span class="txt1 p-b-11">
						Storage ID
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Storage ID is required">

            <select  class="input100" name="storage_id">
              <option value="STR-001">STR-001</option>
              <option value="STR-002">STR-002</option>
              <option value="STR-003">STR-003</option>
              <option value="STR-004">STR-004</option>
            </select>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Product Description Highlight
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Product Price is required">
						<input class="input100" type="text" name="prod_desc_high" >
						<span class="focus-input100"></span>
					</div>


					<span class="txt1 p-b-11">
						Product Description Detail
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Product Price is required">
						<input class="input100" type="text" name="prod_desc_det" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Refurbished Process ID
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Refurbished Process ID is required">
						<input class="input100" type="text" name="ref_proc_id" >
						<span class="focus-input100"></span>
					</div>



					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Submit
						</button>
					</div>

				</form>

        <span>  <br> </span>


        <button class="login100-form-btn" id="myBtn" align="center" >View Detailed Product List</button>
        <script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        //header("Location:product_list.php")
        window.location.href = "product_list.php";
        //href="index.php";
        });
        </script>

			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor_login/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/bootstrap/js/popper.js"></script>
	<script src="vendor_login/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/daterangepicker/moment.min.js"></script>
	<script src="vendor_login/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
