<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //echo "Welcome to the member's area, " . $_SESSION['user_id'] . "!";



$con = oci_connect("RUSHAD","rushad5698","localhost/XE");
if (!$con) {
  // code...
  echo "Failure";
}
else {
  //echo "success";



  $name = $_POST['prod_name'];
  $type = $_POST['prod_type'];
  $price = $_POST['prod_price'];
  $s_id = $_POST['storage_id'];
  $prod_desc_h=$_POST['prod_desc_high'];
  $prod_desc_d=$_POST['prod_desc_det'];
  $prod_status='unsold';
  $ref_id=$_POST['ref_proc_id'];

  //print_r($_POST);

  $stid = oci_parse($con, "INSERT INTO product (product_id,product_name_p,product_price,product_type,storage_id,product_status,prod_desc_high,prod_desc_detail,re_process_id) VALUES (product_sequence.nextval,'".$name."','".$price."','".$type."','".$s_id."','".$prod_status."','".$prod_desc_h."','".$prod_desc_d."','".$ref_id."')");

  oci_execute($stid);



  oci_commit($con);
  oci_close($con);

  header("Location: product_form.php");
  exit();
}
}

else{
  echo '<script type="text/javascript">';
  echo ' alert("Please login with proper credentials first ")';  //not showing an alert box.
  echo '</script>';
  header("Location:login_page_admin.php");
  exit;
}


 ?>
