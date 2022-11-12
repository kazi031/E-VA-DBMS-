<?php
session_start();
$db=oci_connect("RUSHAD","rushad5698","localhost/XE");
If (!$db)
  echo 'Failed to connect to Oracle';
else
{

  if(isset($_POST['se_process_id']))
  {
    if(!empty($_POST['se_process_id']))
    {

      $se_process_id=$_POST['se_process_id'];
      $type=$_POST['type'];
      $amount=$_POST['amount'];
      $process_id=$_POST['process_id'];
      $r_process_id=$_POST['r_process_id'];


      $sql='INSERT INTO segregation(se_process_id,material_type,amount,process_id,r_process_id) VALUES(:se_process_id,:type,:amount,:process_id,:r_process_id)';



      $compiled=oci_parse($db,$sql);

  //oci_bind_by_name($compiled,':id',$user_id);
  oci_bind_by_name($compiled,':se_process_id',$se_process_id);
  oci_bind_by_name($compiled,':type',$type);
  oci_bind_by_name($compiled,':amount',$amount);
  oci_bind_by_name($compiled,':process_id',$process_id);
  oci_bind_by_name($compiled,':r_process_id',$r_process_id);
  //oci_bind_by_name($compiled,':dob',$dob);

  oci_execute($compiled);

  oci_free_statement($compiled);
  oci_close($db);

  header("Location:segregation.php");
  exit;
}
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-VA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/mine1.png" rel="icon">
  <link href="assets1/img/mine1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets1/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets1/vendor/owl.carousel/assets1/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets1/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets1/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets1/css/stylemine.css" rel="stylesheet">
  <link href="../assets1/css/styletable.css" rel="stylesheet">
  <!--<link href="assets1/css/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: Gp - v2.0.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header>
      <div class="container">
        <div id="branding">
          <a class="navbar-brand" href="../index.php"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">E-va</p></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        </div>
        <nav>
          <ul>
            <li class="current"><a href="../adminlogin.php"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">Logout</p></a></li>
            <li class="current"><a href="../index.php"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">Home</p></a></li>
            <li class="current"><a href="about.html"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">About</p></a></li>
          </ul>
        </nav>
      </div>
    </header>









  <main id="main">
    <div>
    <br><br>
    <h2 align='center'>Enter Segregation Data: <h2>
    <form class="setInput" method="post">
        <label for="uname">SE PROCESS ID</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter SE Process ID" name="se_process_id" required>
        <label for="uname">MATERIAL TYPE</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter material Type" name="type" required>
        <label for="uname">AMOUNT</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter Amount" name="amount" required>
        <label for="uname">SORT PROCESS ID</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter SORT Process ID" name="process_id" required>
         <label for="uname">REC PROCESS ID</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter REC Process ID" name="r_process_id" required>

     
        
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>
  </div>
  </main>










<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>E-VA<span>.</span></h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container1">
      <div class="copyright">
        &copy; Copyright <strong><span>E-VA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets1/vendor/jquery/jquery.min.js"></script>
  <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets1/vendor/php-email-form/validate.js"></script>
  <script src="assets1/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets1/vendor/venobox/venobox.min.js"></script>
  <script src="assets1/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets1/vendor/counterup/counterup.min.js"></script>
  <script src="assets1/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets1/js/main.js"></script>

</body>

</html>