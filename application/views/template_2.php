<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script access allowed');
?>

<html>
   <head>
   <title> <?php echo $title; ?> </title>
   <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>asset/images/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>asset/images/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/css.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>asset/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>asset/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo base_url();?>asset/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url();?>asset/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>asset/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
   
   
   </head>
   
   <body class="login-page sidebar-collapse">
	
	<div class="page-header header-filter" style="background-image: url('<?php echo base_url();?>asset/images/city.jpg'); background-size: cover; background-position: top center;">
	 <div class="container">
		<div id="content"> <?php echo $contents; ?> </div>
	 </div>
	 </div>
	<footer class="footer">
      <div class="container">
        <div class="copyright float-center">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with by Slamet Fajar Suryadi
        </div>
      </div>
    </footer>
	</div>
   </body>
   
</html>