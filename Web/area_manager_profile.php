<?php
  session_start();
  $var_value = $_SESSION['A_id'];

  $db = oci_connect("RUSHAD","rushad5698","localhost/XE");

  If(!$db)
    echo 'Failed to connect to Oracle';
  else{


    $sql1 = "SELECT * FROM AreaManager WHERE A_ID=:id";

    $resultgg = oci_parse($db, $sql1);
    oci_bind_by_name($resultgg,':id',$var_value);
      
    oci_execute($resultgg);
    $row = oci_fetch_array($resultgg);
    $id = $row['A_ID'];
    $name = $row['NAME'];
    $contact = $row['CONTACT_NO'];
    $store = $row['STORE_ADDRESS'];
    $area = $row['AREA_LOCATION'];

    $a_id=$var_value;



    $sql2="SELECT SUM(DAILY_EXPENSE)  FROM AreaStorage WHERE a_id=:a_id";
    $compiled2=oci_parse($db,$sql2);
    oci_bind_by_name($compiled2, ':a_id', $a_id);
    oci_execute($compiled2);
    $row = oci_fetch_array($compiled2);
    $cost =  $row['SUM(DAILY_EXPENSE)'];


    $sql3="SELECT SUM(UNIT_RECEIVED)  FROM AreaStorage WHERE a_id=:a_id";
    $compiled3=oci_parse($db,$sql3);
    oci_bind_by_name($compiled3, ':a_id', $a_id);
    oci_execute($compiled3);
    $row = oci_fetch_array($compiled3);
    $unit =  $row['SUM(UNIT_RECEIVED)'];



    $sql4="SELECT *  FROM AreaStorage WHERE a_id=:a_id";
    $compiled4=oci_parse($db,$sql4);
    oci_bind_by_name($compiled4, ':a_id', $a_id);
    oci_execute($compiled4);

    $ac_date=NULL;

    while($row = oci_fetch_array($compiled4))
    {
        $ac_date =  $row['ACCESS_DATE'];
    }

    if ($ac_date==NULL) {
       $ac_date='0/0/0';
    }
    


    oci_free_statement($resultgg);
    oci_free_statement($compiled2);
    oci_free_statement($compiled3);
    oci_free_statement($compiled4);



  oci_close($db);

  }

  
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-VA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/mine1.png" rel="icon">
  <link href="assets/img/mine1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
 

  

  <!-- Template Main CSS File -->
  <link href="assets/css/stylemine.css" rel="stylesheet">
  <link href="assets/css/stylelogin.css" rel="stylesheet">
  <link href="css/test1.css" rel="stylesheet">

  <!--<link href="assets/css/style.css" rel="stylesheet">
  

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
          <h1 style="font-size: 20px;font-family: Segoe Print"><span class="highlight"><em>E-va</em></h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="dist/area_manager.php">Inventory</a></li>
            <li class="current"><a href="logout_areamanager.php">LogOut</a></li>
          </ul>
        </nav>
      </div>
    </header>



  <main id="main">
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="assets1/img/companyAdmin/c3.png" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $name; ?>
                                    </h5>
                                    <h6>
                                        <?php echo '<span style="color:#fec503;">Area Manager</span>'; ?>
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Product Information</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>INFORMATION</p>
                            <a href="dist/corporate_database.php">Corporate Company</a><br/>
                            <a href="dist/community_worker_database.php">Community Workers</a><br/>
                            <a href="dist/scrap_dealer_database.php">Scrap Dealer</a><br/>
                            <a href="dist/employee_database.php">Employee</a><br/>
                            <a href="dist/gen_user_database.php">General User</a>
                            <p>Waste Collection</p>
                            <a href="AP_corporate.php">Corporate Company Products</a><br/>
                            <a href="AP_communityworker.php">Community Workers Collection</a><br/>
                            <a href="AP_scrapdealer.php">Scrap Products</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Area Manager Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$id.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$name.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$contact.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Area</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$area.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Store Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$store.'</span>'; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Unit Received</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$unit.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Cost</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$cost.'</span>'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last Purchase Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo '<span style="color:#000000;">'.$ac_date.'</span>'; ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>