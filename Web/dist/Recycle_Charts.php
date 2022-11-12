<?php
	
		$conn = oci_connect("RUSHAD","rushad5698","localhost/XE");
		if (!$conn)
		{
			exit("Connection Failed: " . $conn);
		}
    
		$sql = "select ri.item_name,rs.item_amount from recycled_storage rs
                                            join
                                        recycled_items ri on rs.item_code=ri.item_code";
		$result = oci_parse($conn,$sql);
		oci_execute($result);
		$item_arr = [];
		$item_amount = [];
		while($row = oci_fetch_array($result)){
			 $item_arr[] = $row['ITEM_NAME']; 
			 $item_amount[] = (float)$row['ITEM_AMOUNT']; 
		}
		/*echo  $item_arr[0]  ;
		echo  $item_arr[1] ;
		echo  $item_arr[2] ;*/
		
		
		$sql = "select m.material_name,sum(r.material_amount) as material_amount from recycle r 
																	join 
															       materials m on m.material_code=r.material_code 
															group by m.material_name";
		$result = oci_parse($conn,$sql);
		oci_execute($result);
		$material_arr = [];
		$material_amount = [];
		while($row = oci_fetch_array($result)){
			 $material_arr[] = $row['MATERIAL_NAME']; 
			 $material_amount[] = (float)$row['MATERIAL_AMOUNT']; 
		}
		
		$sql2 = "select to_char(process_date,'dd/mm/yy') as proc_date ,sum(material_amount) as material_amount 
													 from recycle group by to_char(process_date,'dd/mm/yy')
													 order by to_char(process_date,'dd/mm/yy') DESC";
		$result2 = oci_parse($conn,$sql2);
		oci_execute($result2);
		$date_arr = [];
		$mat_amount = [];
		$c = 0;
		while($row = oci_fetch_array($result2) and $c!=6){
			 $date_arr[] = $row['PROC_DATE']; 
			 $mat_amount[] = (float)$row['MATERIAL_AMOUNT']; 
			 $c++;
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
        <title>Charts</title>
        <link href="css/styles.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Info Graphs</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Daily Recycle Amount</div>          				
							
							
							
							
							
							
							
							
							
								<canvas id="MYCHART" width="100%" height="30"></canvas>
								<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
								<script type="text/javascript">
								   var ctx = document.getElementById('MYCHART').getContext('2d');
								   var chart = new Chart(ctx, {
                                   // The type of chart we want to create
                                   type: 'line',

                                   // The data for our dataset
                                   data: {
        						   labels: <?php echo json_encode($date_arr); ?>,
        						   datasets: [{
            					   label: 'Amount In KG',
            
            						data: <?php echo json_encode($mat_amount); ?>,
									//backgroundColor:'green'
									backgroundColor:[
			
			   					   'rgba(9, 132, 227,.5)',
               					   'rgba(9, 132, 227,.5)',
                				   'rgba(9, 132, 227,.5)',
                				   'rgba(9, 132, 227,.5)', 			
			
									],
									borderColor: [
                					'rgba(9, 132, 227,1)',
                					'rgba(9, 132, 227,1)',
                					'rgba(9, 132, 227,1)',
                					'rgba(9, 132, 227,1)', 
            						]
        							}]
    								},

    								// Configuration options go here
   								    options: {}
									});
							
								</script>					
							
							
							
							
							
							
							
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    
								<div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Recycled Items Storage</div>	
									
									
								<canvas id="myChart" width="100%" height="53.7%"></canvas>
								<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
								<script type="text/javascript">
								var ctx = document.getElementById('myChart').getContext('2d');
								var chart = new Chart(ctx, {
    							// The type of chart we want to create
    							type: 'bar',

    							// The data for our dataset
    							data: {
        						labels: <?php echo json_encode($item_arr); ?>,
        						datasets: [{
            					label: 'Storage In KG',
            
            					data: <?php echo json_encode($item_amount); ?>,
								//backgroundColor:'green'
								backgroundColor:[
									'rgba(9, 132, 227,1.0)',
                					'rgba(9, 132, 227,1.0)',
                					'rgba(9, 132, 227,1.0)',
                					'rgba(9, 132, 227,1.0)',
                					'rgba(9, 132, 227,1.0)',
                					'rgba(9, 132, 227,1.0)',
									'rgba(9, 132, 227,1.0)'
								]
        						}]
    							},

    							// Configuration options go here
    							options: {}
								});
	
								</script>	
								
								<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Recycled Materials Amount</div>
                                    
									
									
									
									<div class="card-body">
									
									<canvas id="myPieChart1" width="100%" height="50"></canvas>
									<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
									<script type="text/javascript">
									var ctx = document.getElementById('myPieChart1').getContext('2d');
									var chart = new Chart(ctx, {
    								// The type of chart we want to create
    								type: 'pie',

    								// The data for our dataset
   									 data: {
        								 labels: <?php echo json_encode($material_arr); ?>,
       									 datasets: [{
           								 label: 'Storage In KG',
            
            							data: <?php echo json_encode($material_amount); ?>,
										//backgroundColor:'green'
										backgroundColor:[
			
			    							'rgba(0, 148, 50,1.0)',
                							'rgba(9, 132, 227,1.0)',
                							'rgba(234, 32, 39,1.0)',
                							'rgba(255, 195, 18,1.0)', 			
			
										]
        								}]
   										},

    									// Configuration options go here
    									options: {
										title: {}
		
										}
										});
	
										</script>
									
									
									    </div>
									
									
									
									
									
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
