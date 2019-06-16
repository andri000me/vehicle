<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script access allowed');
?>

<html>
   <head>
   <title> <?php echo $title; ?> </title>

   <link rel="shortcut icon" href="<?php echo base_url();?>asset/images/ico.png"/>
   
   <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/DT_bootstrap.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/btnx.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/moris.css" rel="stylesheet" media="screen">
   <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
   
   <!--datepicker-->
   <link href="<?php echo base_url();?>asset/css/datepicker.css" rel="stylesheet" type="text/css" />

   
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.easing.min.js"></script>
   <script type="text/javascript" src='<?php echo base_url();?>asset/js/active_menu.js'></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.bxSlider.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.js"></script>
   
   <!--datepicker-->
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/datepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/eye.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>asset/js/layout.js?ver=1.0.2"></script>

   <!--Timepicker-->
    <link href="<?php echo base_url();?>asset/css/bootstrap-timepicker.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap-2.2.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap-timepicker.js"></script>
   
   <!-- ini buat slider-->
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
      	 
          <!-- header-->
         <div id="header_pjbs">
             <div class="header_pjbs">
        
        	     <div class="panel50kr">
            	     <div class="logo_pjbs">
                	     <img src="<?php echo base_url();?>asset/images/logo.png" alt="logo edriver" />
                     </div>
                 </div>
            
                 <div class="panel50kn">
                     <div class="menu_pjbs">
                         <ul>
                    	     <?php 
                                  foreach($menu->result() as $row)
								  {
	                                echo'<li>'.anchor($row->MENU_URI, $row->MENU_NAMA).'</li>' ;
								  }
									echo anchor('home/logout','Logout', array('class' => 'btn lgt')); 

							 ?>
                         </ul>
                     </div>
                 </div>
            
             </div>
         </div>
         <!-- end header-->
		 
		  <div id="header_pjbs" style="margin-top:35px;max-height:18px;position:fixed;z-index:8;overflow:hidden;color:#fff;background:#333;">
             <div class="header_pjbs" style="z-index:8;color:#fff;background:#333">
        
        	     <table class="table-condensed" style="color:#fff;float:right;font-size:11px;">
				  <tr >
			      <td style="text-align:left;font-size:10px;"><b>Username</b></td>
				  <td style="text-align:left;font-size:10px;"><?php echo $this->session->userdata('nama');?> </td>
				  
				  <td style="text-align:left;font-size:10px;"><b>Subdit</b></td>
				  <td style="text-align:left;font-size:10px;">
					      <?php  
						       echo $this->session->userdata('subdit');
						  ?>
				  </td>
			   </tr>
			 </table>
            
             </div>
         </div>
         
		 <!-- slider-->
	     <div id="slider_pjbs">
    	     <div class="slider_pjbs">
        	     <div class="exampleDiv">
            
                 <!-- slider asli-->
            	     <div id="container" >
                         <div id="slider">
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
                         </div>
        		    </div>
                <!-- slider asli selesai-->
            
        	     </div>
             </div>
         </div>
    	 <!-- end slider-->

         <!-------------------------------------------------------------------------------------------------------------->
		 
         <!-- Content -->
		 
	     <div id="content">
		 	<?php echo $contents; ?>
         </div>  
         <!-- End div Content -->
         
         <!-------------------------------------------------------------------------------------------------------------->

		 <!-- Footer -->
	     <div id="footer_pjbs"> 
		     <div class="footer_pjbs">&copy; IT PJBS
			 
			 </div>
		 </div>  
         <!-- End div footer_pjbs -->
		 
	  </center>
	  
	  <!--Timepicker-->
	  <script type="text/javascript">
        $(document).ready(function () { 
            $('#timepicker1').timepicker();

            $('#timepicker2').timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });

            $('#timepicker4').timepicker({
                minuteStep: 1,
                secondStep: 5,
                showInputs: false,
                modalBackdrop: true,
                showSeconds: true,
                showMeridian: false
            });
			
			$('#timepicker5').timepicker({
                minuteStep: 1,
                secondStep: 5,
                showInputs: false,
                modalBackdrop: true,
                showSeconds: true,
                showMeridian: false
            });

            setTimeout(function() {
              $('#timeDisplay').text($('#timepicker1').val());
            }, 100);

            $('#timepicker1').on('changeTime.timepicker', function(e) {
              $('#timeDisplay').text(e.time.value);
            });
        });
    </script>
	  
   </body>
   
   
</html>

<script src="<?php echo base_url();?>asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url();?>asset/js/moris-min.js"></script>
<script src="<?php echo base_url();?>asset/js/raphael-min.js"></script>

