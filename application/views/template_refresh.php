<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script access allowed');
?>

<html>
   <head>
   <title> <?php echo $title; ?> </title>
   <!-- refresh page every 30s -->
   <!--<meta charset="utf-8" http-equiv="refresh" content="120;" />-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

   <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>asset/images/apple-icon.png">
   <link rel="icon" type="image/png" href="<?php echo base_url();?>asset/images/favicon.png">
   <link href="<?php echo base_url();?>asset/demo/demo.css" rel="stylesheet" />
  <!--     Select2     --> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/select2/css/select2.min.css" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/css.css" />
  <!--     JQuery UI     -->
  <link type="text/css" href="<?php echo base_url();?>asset/css/jquery-ui.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css">-->
  <!-- CSS Files -->
  <!--<link href="<?php echo base_url();?>asset/css/material-kit.css?v=2.0.6" rel="stylesheet" />-->
  <!--<link href="<?php echo base_url();?>asset/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />-->
  <link href="<?php echo base_url();?>asset/css/material-dashboard-pro.min.css?v=2.1.0" rel="stylesheet" />
  <link href="<?php echo base_url();?>asset/css/mk.css" rel="stylesheet" />
  
  
  
   </head>
   
   <body class="index-page sidebar-collapse">
	 <div class="navbar-default sidebar" data-image="<?php echo base_url();?>asset/images/city-profile.jpg" data-background-color="black">
		  <!--<div class="logo">
			<a href="" class="simple-text logo-normal">
			  <img src="<?php echo base_url();?>asset/images/logo.png"/>
			</a>
		  </div>-->
		  <div class="logo">
			<a href="" class="simple-text logo-mini">
			  EF
			</a>
			<a href="" class="simple-text logo-normal">
			  E-FORM C
			</a>
		  </div>
		  <div class="sidebar-wrapper navbar-collapse">
			<ul class="nav navbar-nav flex-column flex-nowrap">
			 <?php
				$level = $this->session->userdata('level');
				$check_menu = $this->usermodel->get_menu_for_level($level);
				$sub = 1;
				foreach($check_menu->result() as $row){
				 echo"<li class='nav-item'>";
				 if($row->HAVECHILD == 0){
					echo"<a class='nav-link' href='".base_url()."".$this->uri->segment(0)."".$row->MENU_URI."'>";
					echo"<i class='material-icons'>".$row->ICON."</i>";
					echo"<p>".strtoupper($row->MENU_NAMA)."</p>";
					echo"</a>";
				 }else{
					$level2 = $this->usermodel->get_second_level($row->MENU_ID);
					echo"<a class='nav-link collapsed' data-toggle='collapse' data-target='#submenu".$sub."' href='#'>";
					echo"<i class='material-icons'>".$row->ICON."</i>";
					echo"<p>".strtoupper($row->MENU_NAMA)."<b class='caret'></b></p>";
					echo"</a>";
					echo"<div class='collapse' id='submenu".$sub."'>";
					 echo"<ul class='nav'>";
					foreach($level2->result() as $row2){
						echo"<li class='nav-item'>";
						echo"<a class='nav-link py-0' href='".base_url()."".$this->uri->segment(0)."".$row2->MENU_URI."'>";
						echo"<i class='material-icons'>".$row2->ICON."</i>";
						echo"<p>".strtoupper($row2->MENU_NAMA)."</p>";
						echo"</a>";
						echo"</li>";
					}
					 echo"</ul>";
					echo"</div>";
				 }
				 echo"</li>";
				 $sub++;
				}
			 ?>
			</ul>
		  </div>
	 </div>
	<!--</div>-->
	
	
	<div class="main-panel">
	  <!--<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-info navbar-color-on-scroll" color-on-scroll="100">-->
	  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
			<div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <h4 class="navbar-brand"><?php echo $title; ?></h4>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url().''.$this->uri->segment(0).'home/logout'?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	 <!-- Navbar -->
      <?php echo $contents; ?>
	</div>
	<!-- End Navbar -->
	<!--<div class="content">
		
	</div>-->
	<!-- Footer -->
	<footer class="footer">
	 <div class="container-fluid">
		<div class="copyright float-center">
			&copy;
			<script>document.write(new Date().getFullYear())</script>, by Slamet Fajar Suryadi
		</div>
	 </div>
	</footer>  
    <!-- End Footer -->
	  
	  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>asset/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/js/core/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url();?>asset/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url();?>asset/js/plugins/sweetalert2.min.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url();?>asset/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url();?>asset/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!-- Plugin for the Select2  -->
  <script src="<?php echo base_url();?>asset/select2/js/select2.min.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <!-- <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-selectpicker.js"></script> -->
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url();?>asset/js/plugins/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>asset/js/plugins/dataTables.responsive.mins.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url();?>asset/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url();?>asset/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url();?>asset/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url();?>asset/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="<?php echo base_url();?>asset/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url();?>asset/js/plugins/arrive.min.js"></script>
  <!-- Maps Plugin    -->
  <!-- Chartist JS -->
  <script src="<?php echo base_url();?>asset/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>asset/js/material-dashboard-pro.min.js?v=2.1.0" type="text/javascript"></script>
  <!--<script src="<?php echo base_url();?>asset/js/material-kit.js?v=2.0.5" type="text/javascript"></script>-->
  <script src="<?php echo base_url();?>asset/demo/demo.js"></script>
  <!--  Sortable Plugin    -->
  <script src="<?php echo base_url();?>asset/js/plugins/jquery-sortable.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
  <script>
  //Select2 Js Initialization
	$(function() {
		$('.select2').select2({
			debug: true,
			placeholder: "Select a Data",
			allowClear: true
		});
	});
  //Sortable Js Initialization
	$(function  () {
	  $('.sortable').sortable();
	});
  //DataTables Js Initialization
    $(function() {
        $('#dataTables-id').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
			  [10, 25, 50, -1],
			  [10, 25, 50, "All"]
			],
			responsive: true,
			language: {
			  search: "_INPUT_",
			  searchPlaceholder: "Search records",
			}
        });
		$('#detail-id').DataTable({
			"pageLength" : 5,
			"lengthMenu": [
			  [5, 10, 15, -1],
			  [5, 10, 15, "All"]
			],
			responsive: true
        });
		$('#listTable').DataTable( {
			responsive: {
				details: {
					type: 'column'
				}
			},
			columnDefs: [ {
				className: 'control',
				orderable: false,
				targets:   0
			} ],
			order: [ 1, 'asc' ]
		});
    });
  </script>
  <script>
    $('.berangkatpicker, .kembalipicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });
  </script>
  <script>
	new Chartist.Pie('#cobaChart', {
	  series: [20, 10, 30, 40]
	}, {
	  donut: true,
	  donutWidth: 60,
	  donutSolid: true,
	  startAngle: 270,
	  total: 200,
	  showLabel: true
	});
  </script>
  </body>
   
   
</html>

