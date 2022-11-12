<?php
	$conn = oci_connect("RUSHAD","rushad5698","localhost/XE");
	if (!$conn)
	{
		exit("Connection Failed: " . $conn);
	}
	else{
		echo "connected!";
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
        <title>Process Table</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="Home.php">E-va</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <a class="dropdown-item" href="../index.php">Logout</a>
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
                            <a class="nav-link" href="Home.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Recycle Process</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="Process_Insert.php">Insert Process</a></nav>
                            </div>
                            
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Error of Recycle
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
							
							
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Error of Recycle
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="error1.php">Insert Recycle Error</a><a class="nav-link" href="error1_out.php">Recycle Error Table</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="error2.php">Insert Error</a><a class="nav-link" href="error2_out.php">Error Table</a></nav>
                                    </div>
                                </nav>
                            </div>
							
							
							
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="Recycle_Charts.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="Process_table.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Recycle Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Recycle Process Table</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Recycle</li>
                        </ol>
                  
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Process Table</div>
                            <div class="card-body">
                                <div class="table-responsive">




<?php
$sql="select r.process_id,to_char(r.process_date,'DD/MM/YY HH:MI AM') as process_date,m.material_name,r.material_amount,sr.steel,sr.iron,NULL as copper,NULL as tin,NULL as gold,NULL as silver,NULL as plastic from recycle r
                  join
                steel_recycle sr on sr.process_id=r.process_id
                  join
                materials m on r.material_code=m.material_code

                 UNION ALL

select r.process_id,to_char(r.process_date,'DD/MM/YY HH:MI AM') as process_date,m.material_name,r.material_amount,pb.steel,NULL as iron,pb.copper,pb.tin,pb.gold,pb.silver,NULL as plastic from recycle r
                  join
                pcb_recycle pb on pb.process_id=r.process_id
                  join
                materials m on r.material_code=m.material_code


                 UNION ALL

select r.process_id,to_char(r.process_date,'DD/MM/YY HH:MI AM') as process_date,m.material_name,r.material_amount,NULL as steel,NULL as iron,cw.copper,NULL AS tin,NULL AS gold,NULL AS silver,cw.plastic from recycle r
                  join
                copper_wire_recycle cw on cw.process_id=r.process_id
                  join
                materials m on r.material_code=m.material_code



                 UNION ALL

select r.process_id,to_char(r.process_date,'DD/MM/YY HH:MI AM') as process_date,m.material_name,r.material_amount,NULL as steel,NULL as iron,NULL as copper,NULL as tin,NULL as gold,NULL as silver,pr.plastic from recycle r
                  join
                plastic_recycle pr on pr.process_id=r.process_id
                  join
                materials m on r.material_code=m.material_code";





$result = oci_parse($conn,$sql);
oci_execute($result);
?>
								
								
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Process ID</th>
												<th>Process Date</th>
                                                <th>Material Name</th>
                                                <th>Recycled Amount</th>
                                                <th>Steel</th>
                                                <th>Iron</th>
                                                <th>Copper</th>
												<th>Tin</th>
												<th>Gold</th>
												<th>Silver</th>
												<th>Plastic</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Process ID</th>
												<th>Process Date</th>
                                                <th>Material Name</th>
                                                <th>Recycled Amount</th>
                                                <th>Steel</th>
                                                <th>Iron</th>
                                                <th>Copper</th>
												<th>Tin</th>
												<th>Gold</th>
												<th>Silver</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php
										while($row = oci_fetch_array($result)){
										?>
                                            
											<tr>
												<td><?php echo $row['PROCESS_ID']; ?>  </td>
												<td><?php echo $row['PROCESS_DATE']; ?>  </td>
												<td><?php echo $row['MATERIAL_NAME']; ?>  </td>
												<td><?php echo $row['MATERIAL_AMOUNT']; ?>  </td>
												<td><?php echo $row['STEEL']; ?>  </td>
												<td><?php echo $row['IRON']; ?>  </td>
												<td><?php echo $row['COPPER']; ?>  </td>
												<td><?php echo $row['TIN']; ?>  </td>
												<td><?php echo $row['GOLD']; ?>  </td>
												<td><?php echo $row['SILVER']; ?>  </td>
												<td><?php echo $row['PLASTIC']; ?>  </td>
                                            </tr> 
										
										<?php } ?>	
												                                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; E-va 2020</div>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
