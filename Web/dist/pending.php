<?php
    session_start();
    $var_value = $_SESSION['A_id'];
    $var_value_area = $_SESSION['Area_location'];
    $conn = oci_connect("RUSHAD","rushad5698","localhost/XE");

    if (!$conn && $var_value!=0)
    {
        exit("Connection Failed: " . $conn);
    }
    else
    {
        

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        $result = oci_parse($conn,"SELECT * FROM G_O_U4 WHERE AREA=:area");
        oci_bind_by_name($result,':area',$var_value_area);
        oci_execute($result);

        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html"><p style="font-size: 20px;font-family: Segoe Print;color: #fec503">E-va</p></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout_areamanager.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../area_manager_profile.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Profile</a
                            >
                            <a class="nav-link" href="approve.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Approve Requests</a
                            >
                            <a class="nav-link" href="pending.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pending Requests</a
                            >
                            <div class="sb-sidenav-menu-heading">Information</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="coporate_database.php">Corporate User Database</a><a class="nav-link" href="gen_user_database.php">General User Database</a><a class="nav-link" href="employee_database.php">Employee Database</a><a class="nav-link" href="scrap_dealer_database.php">Scrap Dealer Database</a><a class="nav-link" href="community_worker_datbase.php">Community Worker Database</a></nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addoitional</div>
                            <a class="nav-link" href="../AP_employee.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Add Employee</a
                            >
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Pending</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="post" action=""> 
                                    <input type='submit' value='Update Selected Records' name='but_update'><br><br>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Check</th>
                                                <th scope="col">UserID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">DOB</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Assigne Employee</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">Check</th>
                                                <th scope="col">UserID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">Date of Birth</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Assigne Employee</th>
                                            </tr>
                                        </tfoot>

                                        <?php
                                                    while($row = oci_fetch_array($result)){
                                                    $GEN_ID = $row['GEN_ID'];
                                                    $NAME = $row['NAME']; 
                                                    $CONTACT = $row['CONTACT'];
                                                    $EMAIL = $row['EMAIL'];
                                                    $AREA = $row['AREA'];
                                                    $DOB = $row['DOB'];

                                                    $MESSAGE =  $row['MESSAGE'];
                                                    $STATUS = $row['STATUS'];
                                                    $STATUS_CHANGE = $row['STATUS'];

                                                    if ( $STATUS == "Pending" ) {
                //$count = $count + 1;
                                        ?>


                                        <tbody>
                                            <tr>
                                            <td><input type='checkbox' name='update[]' value='<?= $GEN_ID ?>' ></td>
                                            <td><?= $GEN_ID ?></td>
                                            <td><?= $NAME ?></td>
                                            <td><?= $CONTACT ?></td>
                                            <td><?= $EMAIL ?></td>
                                            <td><?= $AREA ?></td>  
                                            <td><?= $DOB ?></td>
                                            <td><?= $MESSAGE ?></td>
                                            <td><?= $STATUS ?></td>
                                            <td>
                                                <select name='ID_<?= $GEN_ID ?>'>
                                                    <option value="">Choose...</option>
                                                    <?php 
                                                        $sql = "SELECT * FROM Employee4,L_E_C4 WHERE Employee4.EMP_ID = L_E_C4.LEC_ID AND L_E_C4.AREA=:area AND Employee4.AVAILABLE='Free'";
                                                        $result2 = oci_parse($conn, $sql);
                                                        oci_bind_by_name($result2, ':area', $AREA);
                                                        oci_execute($result2);
                                                        while($row = oci_fetch_array($result2)){
                                                    ?>
                                                    <option value='<?= $row['EMP_ID'] ?>'><?php echo $row['EMP_ID']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            </tr>
                                        </tbody>
                                        <?php

                                                } // Statues Pending check
                                            } //While Loop
                                        //$_SESSION['count_num'] = $count;
                                        ?>
                                    </table>
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
<?php
if(isset($_POST['but_update'])){

  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){

        $A_EMPLOYEE = $_POST['ID_'.$updateid];
        $sql3 = "SELECT * FROM Employee4 WHERE EMP_ID = :emp";
        $result5 = oci_parse($conn, $sql3);
        oci_bind_by_name($result5, ':emp', $A_EMPLOYEE);
        oci_execute($result5);
        $row = oci_fetch_array($result5);
        $AVAIL_CHECK = $row['AVAILABLE'];

        if($A_EMPLOYEE != null && $AVAIL_CHECK == 'Free'){
            $sql5 = "UPDATE G_O_U4 SET GEN_EMP_ID = :assign_emp WHERE GEN_ID = :g_id";
            $result2 = oci_parse($conn, $sql5);
            oci_bind_by_name($result2, ':assign_emp', $A_EMPLOYEE);
            oci_bind_by_name($result2, ':g_id', $updateid);
            oci_execute($result2);

            $sql2 = "UPDATE Employee4 SET AVAILABLE = 'Busy' WHERE EMP_ID = :employee_id";
            $result3 = oci_parse($conn, $sql2);
            oci_bind_by_name($result3, ':employee_id', $A_EMPLOYEE);
            oci_execute($result3) ;

            $sql4 = "UPDATE G_O_U4 SET STATUS = 'Approved' WHERE GEN_ID = :g_id";
            $result4 = oci_parse($conn, $sql4);
            oci_bind_by_name($result4, ':g_id', $updateid);
            oci_execute($result4);

            oci_free_statement($result2);
            oci_free_statement($result3);
            oci_free_statement($result4);

        }
        oci_free_statement($result5);
    }
  }

}
?>