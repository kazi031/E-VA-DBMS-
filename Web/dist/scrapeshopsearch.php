<html>
<head>
    <title>Scrapeshop Output</title>
    <link rel="stylesheet" href="style.css">
	      <style>
body {

background-image: url('bgo.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color:black;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div class="topnav">
  <a href="../index.php"><img src="logo.jpg" alt="E-VA" width="54" height="25"></a>
 <a href="errorinput.php">Error</a>   
  <a href="errorofrinput.php">Error of Recycle</a>
  <a href="scrapeshopinput.php">Scrap E-Shop</a>
  
  
  <a href="transportationinput.php">Transportation</a>
</div>
<div>
<br>
<br>
<br>
 <form class="setInput" method="post">
 
		<label for="uname">Local id</label>
      <input type="text" class="form-control" id="uname" placeholder="Local id (type clear to clear )" name="slocal_id" required>
	   <button type="submit" class="btn btn-primary">Submit</button>
	   
  </form>
</div>

    <?php
	  if(isset($_POST['slocal_id']))
  {
    if(!empty($_POST['slocal_id']))
    {
   
    $conn=oci_connect("RUSHAD","rushad5698","localhost/XE");
	$slocal_id=$_POST['slocal_id'];
    $conn=oci_connect("RUSHAD","rushad5698","localhost/XE");
    $query = "select * from scrapeShop where local_id like '%$slocal_id%' order by local_id ";
    $stid = oci_parse($conn, $query);
    $r = oci_execute($stid);

    // Fetch each row in an associative array
    print  '<br>';
    print  '<br>';
    //$sql="CREATE TABLE customer(cut_id VARCHAR2(20),cust_name VARCHAR2(20),cust_date DATE,cust_street VARCHAR2(20),cust_city VARCHAR2(20))";

    print '<h1 align="center">Scrapeshop Output</h1>';

    //print '<table border="1" align="center">';
    print '<table>';
    print'<tr>';
    print'<th>Local Id</td>';
    print'<th>Trade License</td>';
    print'<th>perDay</td>';
    print '</tr>';
    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    print '<tr>';
    foreach ($row as $item) {
        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
    }
    print '</tr>';
    }
    print '</table>';
	}
	
  }

    ?>
</body>
</html>