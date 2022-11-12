<?php
  //session_start();
  //$var_value = $_SESSION['A_id'];
  //$_SESSION['vr'] = $var_value;
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
          if($row['PRODUCT_ID']==$id && $row['PRODUCT_NAME_P']==$name){
            echo 'DONE';

            $_SESSION['p_id'] = $id;
            $_SESSION['p_name'] = $name;
            $_SESSION['p_type'] = $row['PRODUCT_TYPE'];
            $_SESSION['p_price'] = $row['PRODUCT_PRICE'];

              oci_free_statement($compiled);
              oci_close($db);
              header("Location:../product_detail.php");
              exit;
          }
          else{
            $error = true;
          }
        }

    }
    }
  }

  //If(!$db && $var_value!=0)
    //echo 'Failed to connect to Oracle';
  //else{


  //}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Products</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">E-va</p></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">

            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Our Recyled Products</h1>

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
                            <div class="card-body">
                                <div class="table-responsive">

    <?php
    //$sql1 = "SELECT * FROM Employee4,L_E_C4 WHERE Employee4.EMP_ID = L_E_C4.LEC_ID AND L_E_C4.A_ID=:id";

    $db = oci_connect("RUSHAD","rushad5698","localhost/XE");

    $sql1 = "SELECT product_id,product_name_p,product_type,product_price,prod_desc_high FROM product WHERE product_status='unsold' ";

    $result = oci_parse($db, $sql1);
    //oci_bind_by_name($result,':id',$var_value);

      oci_execute($result);

      ?>


                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th >Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Type</th>
                                                <th>Description</th>


                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th >Product ID</th>
                                              <th>Product Name</th>
                                              <th>Product Price</th>
                                              <th>Type</th>
                                              <th>Description</th>

                                            </tr>
                                        </tfoot>

                                        <tbody>
                                        <?php
                                            while($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)){
                                              //$GEN_ID = $row['PRODUCT_ID'];
                                        ?>


                                            <tr>
                                                <td><?php echo $row['PRODUCT_ID']; ?></td>
                                                <td><?php echo $row['PRODUCT_NAME_P']; ?></td>
                                                <td><?php echo $row['PRODUCT_PRICE']; ?></td>
                                                <td><?php echo $row['PRODUCT_TYPE']; ?></td>
                                                <td><?php echo $row['PROD_DESC_HIGH']; ?></td>

                                            </tr>

                                            <?php }
                                            ?>
                                        </tbody>


                                    </table>

                                    <br><br>

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

                                      <br>


                                    <div class="container-login100-form-btn">
                                       <button class="login100-form-btn" type="submit">
                                         Submit
                                       </button>
                                     </div>

                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
