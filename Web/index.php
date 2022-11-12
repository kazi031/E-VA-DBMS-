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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-VA</title>
    <link href="assets1/img/mine1.png" rel="icon">
  <link href="assets1/img/mine1.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min2.css" rel="stylesheet">
  <link href="css/slider.css" rel="stylesheet">
  <link href="css/style_dropdown.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">E-va</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">E-Waste Pick Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="dist/product_show_grid.php">Products</a>
          </li>
          <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link js-scroll-trigger" href="#">Login <i class="fas fa-angle-down"></i></a>
                <div class="dropdown-content">
                <a href="login.php">Employee</a>
                <a href="login_admin.php">Area Manager</a>
                <a href="adminlogin.php">Admin</a>
                <a href="companylogin.php">Company</a>
                <a href="recycle_admin_login.php">Recycle Admin</a>
                <a href="login_page_admin.php">Finance Admin</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container1">
	  <div class="SlideShow1">
		<div class="intro-text">
        	
      	</div>
	  </div>
	</div>
	
	
	<div class="container1">
	  <div class="SlideShow2">
		<div class="intro-text">
        	
      	</div>
	  </div>
	</div>
	
	
	<div class="container1">
	  <div class="SlideShow3">
		<div class="intro-text">
        	
      	</div>
	  </div>
	</div>
	
	
	<a class="prev031" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next031" onclick="plusSlides(1)">&#10095;</a>
  </header>
  <!-- Header -->
  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">E-Waste Collection Process</h4>
          <p class="text-muted">E-Waste materials are collected from general users,small scrap metal shops in a samll quantity.A large amount of e-wastage is collected from different corporate companies.Some waste materials are collected from community workers of city corporation.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-recycle fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Recycled & Refurbished Products</h4>
          <p class="text-muted">Most of the products go through the whole recycling process and the final recycled products are sold to different companies as raw material.We have also refurbished products for general users to purchase.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-radiation fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Export Chemical Wastage</h4>
          <p class="text-muted">All the chemical waste materials are exported to different countries like China,Japan etc as chemical waste recycling is not allowed in Bangladesh.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
  <section class="bg-light page-section" id="portfolio">
                <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
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
            </div>
  </section>
</div>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/yellow.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  
                  <h4 class="subheading">What is E-va</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">E-va holds a complete support line for collecting scrap, transportation, storage and recycling as well as store for refurbished products. The only motto is “TO PROMOTE A GREEN BANGLADESH AS WELL AS A GREEN WORLD.”</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/03.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>February 2020</h4>
                  <h4 class="subheading">E-va was Born</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">E-va was basically a project done by some students of MIST CSE 18 and now its working to fulfill the motto to make Bangladesh green again .</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/01.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Our Mission</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Build Green House Bangladesh and Green World by application of latest State of Art Recycling Technology for Recycling of Precious Metals, Alloys and Electronic-Waste.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/shahir.jpg" alt="">
            <h4>Shahir Zaoad</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/4.jpg" alt="">
            <h4>Kazi Rafid Raiyan</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>	  
	  
	  
	  <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/5.jpeg" alt="">
            <h4>Fardeen Ashraf</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/6.jpg" alt="">
            <h4>Hinoy Rahman</h4>
            <p class="text-muted">Lead Marketer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/8.jpg" alt="">
            <h4>Rushadul Mannan</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>	  
	  
	  
	  
	  
	  
	  
	  
	  
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">E-Waste Pick Up</h2>
          <h3 class="section-subheading text-muted">Send us a message.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post" action="mail/contact_me.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="uname" type="text" placeholder="Your Name *" name="usname" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" name="email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="text" placeholder="Your Phone *" name="contact" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                
              </div>
              <div class="col-md-6" >
                <div class="form-group">
                  <input class="form-control" id="area" type="text" placeholder="Your Area *" name="area" required="required" data-validation-required-message="Please enter your area.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="message" type="text" placeholder="Your Message *" name="message" required="required" data-validation-required-message="Please enter a message.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="name" type="date"  name="dob" required="required" data-validation-required-message="Please enter your date of birth.">
                  <p class="help-block text-danger"></p>
                </div>
                
              </div>
              </div>
              
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Explore</li>
                  <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Finish</li>
                  <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Lines</li>
                  <li>Category: Branding</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Southwest</li>
                  <li>Category: Website Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Window</li>
                  <li>Category: Photography</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  <script src="js/slider.js"></script>




          <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="dist/assets/demo/chart-pie-demo.js"></script>

</body>

</html>
