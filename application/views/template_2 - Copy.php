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

   <link href="<?php echo base_url();?>asset/css/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/DT_bootstrap.css" rel="stylesheet" media="screen">

   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/btnx.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/moris.css" rel="stylesheet" media="screen">

   <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" media="screen">

   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.easing.min.js"></script>
   <script type="text/javascript" src='<?php echo base_url();?>asset/js/active_menu.js'></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.bxSlider.js"></script>

   <script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.js"></script>
   
      <!--  -->
   <script src="<?php echo base_url();?>asset/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url();?>asset/js/DT_bootstrap.js"></script>
   <script src="<?php echo base_url();?>asset/js/jquery.easy-pie-chart.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/moris-min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/raphael-min.js"></script>
   
   <!-- ini buat slider yo -->
   <script type='text/javascript'>
       (function($){	
             $(function(){
               $('#slider1').bxSlider({
                 easing: 'easeOutBounce',
                 mode: 'fade',	
                 pager: false,		  
                 speed : 1000,
                 controls: true,
                 autoHover: true,
                 auto : true,
                 pause : 5000
               });
             });
           }(jQuery))
   </script>
   
   </head>
   
   <body>
      <center>	 
		 <!---------------------------------------------------------------------------------------------------- ---->
		 
		  <!-- header-->
         <div id="header_pjbs">
             <div class="header_pjbs">
        
        	     <div class="panel50kr">
            	     <div class="logo_pjbs">
                	     <img src="<?php echo base_url();?>asset/images/logo 100x.png" alt="logo edriver" />
                     </div>
                 </div>
            
             </div>
         </div>
         <!-- End of header_pjbs-->
 
 <!---------------------------------------------------------------------------------------------------- -->
		 
		 <!-- slider-->
	     <div id="slider_pjbs">
    	     <div class="slider_pjbs">
        	     <div class="exampleDiv">
            
                 <!-- slider asli-->
            	     <div id="container" >
                     <img src="<?php echo base_url();?>asset/images/slider.PNG" style="max-width:997px;max-height:370px;min-width:997px;min-height:360px;">
                         <!--<div id="slider">
                             <div class="demo-wrap build-pager">
                                 <ul id="slider1">
                                   <li>                                                
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       <tr>
                                         <td valign="middle" height="330">
                                         <span class='embossed'></span>
                                         <div class="desk">
                                             <p> </p>
                                         </div>
                                         </td>
                                         <td valign="middle"></td>
                                       </tr>
                                     </table>					
                                   </li>
                                   
                                 </ul>
                             </div>
                         </div>-->
        		    </div>
                <!-- slider asli selesai-->
            
        	     </div>
             </div>
         </div>
     <!-- akhir slider jon-->

         <!------ -------------------------------------------------------------------------------------------------------->
	
	     <div id="content"> <?php echo $contents; ?> </div>  <!-- End div content -->
		 
	     <div id="footer_pjbs"> 
		     <div class="footer_pjbs">&copy; IT PJBS </div>
		 </div>  <!-- End div footer_pjbs -->
		 
	  </center>
   </body>
   
</html>