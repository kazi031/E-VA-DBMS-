<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


    <meta charset="utf-8">
    <title>Product Purchase Confirmation</title>
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


    <style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
}
table {
  border-spacing: 15px;
}
</style>



  </head>
  <body>
    <header>
     <div class="container">
          <nav>
            <div id="branding">
            <span class="highlight"><a class="navbar-brand js-scroll-trigger" href="index.php">E-va</a></span>
           </div>
          </nav>
        </div>
    </header>


    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
          <form class="login100-form validate-form flex-sb flex-w"  method="post">


            <?php

            $db = oci_connect("RUSHAD","rushad5698","localhost/XE");

            $compiled=oci_parse($db,"SELECT prod_desc_detail FROM product WHERE product_id='".$_SESSION['p_id']."'");
            oci_execute($compiled);
            $row = oci_fetch_array($compiled);

            echo "<table border='1' style='width:100%'>\n";

            echo "<tr>\n";
            echo "    <td> Product ID :" . $_SESSION['p_id'] . "</td>\n";
            echo "</tr>\n";

            echo "<tr>\n";
            echo "    <td> Product Name :" . $_SESSION['p_name'] . "</td>\n";
            echo "</tr>\n";

            echo "<tr>\n";
            echo "    <td> Product Type :" . $_SESSION['p_type'] . "</td>\n";
            echo "</tr>\n";

            echo "<tr>\n";
            echo "    <td> Product Price :" . $_SESSION['p_price'] . " BDT only</td>\n";
            echo "</tr>\n";

            echo "<tr>\n";
            echo "    <td> Product Price :" . $row['PROD_DESC_DETAIL'] . " </td>\n";
            echo "</tr>\n";


            echo "</table>\n";

            //echo nl2br("\n",false);
            //echo $_SESSION['p_id'] ;
            //echo nl2br("\n",false); //linebreak
            //echo $_SESSION['p_name'] ;
            //echo nl2br("\n",false);
            //echo $_SESSION['p_type'] ;
            //echo nl2br("\n",false);
            //echo $_SESSION['p_price'] ;
            //echo nl2br("\n",false);
            //echo $row['PROD_DESC_DETAIL'];
            //echo nl2br("\n",false);


            if (isset($_POST['btn']))
            {

                  $stid = oci_parse($db, "UPDATE product SET product_status ='sold' WHERE product_id='".$_SESSION['p_id']."' ");
                  oci_execute($stid);

                  /*echo "<table border='1'>\n";
                  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                  echo "<tr>\n";
                  foreach ($row as $item) {
                      echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                  }
                    echo "</tr>\n";
                  }
                  echo "</table>\n";




                  oci_close($con);*/


                  header("Location: ./dist/product_show_grid.php");
                  exit();
            }



            //echo 'it works :D' . "/n";
            //print_r($_SESSION)
            ?>
            <span><br><br><br></span>

            <input class="navbar-brand js-scroll-trigger" type="submit" name="btn" value="Confirm Purchase">



          </form>
          <a class="navbar-brand js-scroll-trigger" href="./dist/product_show_grid.php">Cancel Purchase</a>

          <span>  <br> </span>




        </div>
      </div>
    </div>









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
