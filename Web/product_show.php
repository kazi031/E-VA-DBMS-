<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  $_SESSION['loggedin'] = false;
  session_destroy();
  session_start();
}



$db = oci_connect("RUSHAD","rushad5698","localhost/XE");

if (!$db) {
  // code...
  echo "Failure";
}
else {
  // code...


  if(isset($_POST['prod_id']) && isset($_POST['prod_name']))
  {
    if(!empty($_POST['prod_id']) && !empty($_POST['prod_id']))
    {


      $id=$_POST['prod_id'];
      $name=$_POST['prod_name'];



      $compiled=oci_parse($db,'SELECT * FROM product');
      oci_execute($compiled);

      //echo 'done';

      while($row = oci_fetch_array($compiled)){
        //echo $row;
        if($row['PRODUCT_ID']==$id && $row['PRODUCT_NAME']==$name){
          echo 'DONE';

          $_SESSION['p_id'] = $id;
          $_SESSION['p_name'] = $name;
          $_SESSION['p_type'] = $row['PRODUCT_TYPE'];
          $_SESSION['p_price'] = $row['PRODUCT_PRICE'];

            oci_free_statement($compiled);
            oci_close($db);
            header("Location:product_detail.php");
            exit;
        }
        else{
          $error = true;
        }
      }

  }
  }
}


 ?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
  <link href="css/slider.css" rel="stylesheet">
  <link href="css/style_dropdown.css" rel="stylesheet">
</head>

<body id="page-top">












<?php

$count=0;
$f='d';


$con = oci_connect("RUSHAD","rushad5698","localhost/XE");
if (!$con) {
  // code...
  echo "Failure";
}
else {
  //echo "success";

    $stid = oci_parse($con, "SELECT product_id,product_name,product_type,product_price,prod_desc_high FROM product where product_status='unsold' ");
    //$stid = oci_parse($con, "SELECT product_id,product_name,product_type,product_price,prod_desc_high FROM product where product_name='GOW' ");
  oci_execute($stid);

  echo "<table border='1'>\n";
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
  echo "<tr>\n";
  foreach ($row as $item) {
      $temp_arr[$count]=$row;
      echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";

  }
    //echo "<ul><li><a>BUTTON<a><li></ul>";
    //echo "<td><input class='myclass' type='button' value='Delete'/></td>"." </tr>\n";
    //echo "<td><ul><li id='de' ". $count . " ><a href='product_detail.php'>BUTTON<a></li></ul></td>"." </tr>\n";
    echo " </tr>\n";
    $count=$count+1;
  }
  echo "</table>\n";
  //$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

  //print_r($temp_arr);

  //echo $f;



  oci_commit($con);
  oci_close($con);
}



 ?>

 <form class="login100-form validate-form flex-sb flex-w"  method="post">

   <span class="txt1 p-b-11">
     Enter Product ID
   </span>
   <div class="wrap-input100 validate-input m-b-36" data-validate = "Product ID is required">
     <input class="input100" type="text" name="prod_id" >
     <span class="focus-input100"></span>
   </div>


   <span class="txt1 p-b-11">
     Enter Product Name
   </span>
   <div class="wrap-input100 validate-input m-b-36" data-validate = "Product Name is required">
     <input class="input100" type="text" name="prod_name" >
     <span class="focus-input100"></span>
   </div>


 <div class="container-login100-form-btn">
    <button class="login100-form-btn" type="submit">
      Submit
    </button>
  </div>

</form>






</body>

</html>
