<html>
<head>
  <body>
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
      echo "success";
    }


    $stid = oci_parse($con, 'SELECT * FROM product NATURAL JOIN storage_room');
    oci_execute($stid);

    echo "<table border='1'>\n";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
      echo "</tr>\n";
    }
    echo "</table>\n";




    oci_close($con);
  }

  else{
    echo '<script type="text/javascript">';
    echo ' alert("Please login with proper credentials first ")';  //not showing an alert box.
    echo '</script>';
    header("Location:login_page_admin.php");
    exit;
  }

     ?>
  </body>
</head>
</html>
