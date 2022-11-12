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



  $name = $_POST['cust_name'];
  $licence = $_POST['cust_licence'];
  $country = $_POST['cust_country'];
  $desc = $_POST['export_desc'];
  $rev=$_POST['export_revenue'];
  $cost=$_POST['export_cost'];
  $amounts=$_POST['export_am'];
  $seg_id=$_POST['seg_prog_id'];

  $date= date("d-M-y");



  $stid = oci_parse($con, "INSERT INTO exports (e_id,customer_comp,customer_trade,customer_country,date_of_export,export_rev,amount_exp,export_cost,export_desc,se_process_id) VALUES (export_sequence.nextval,'".$name."','".$licence."','".$country."',sysdate,'".$rev."','".$amounts."','".$cost."','".$desc."','".$seg_id."')");

  oci_execute($stid);

  print_r($_POST);



  oci_commit($con);
  oci_close($con);

  header("Location: export_form.php");
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
