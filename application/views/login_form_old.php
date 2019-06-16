<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
					 
				<div class="row-fluid">
                  <div class="span12">
				  
				   <?php

                     // hanya untuk menampilkan informasi saja
                     if(isset($login_info))
                     {
                        echo "<span style='background-color:#eee;padding:3px;'>";
                        echo $login_info;
                        echo '</span>';
                     }
  
                   ?>
				   
				  <?php echo form_open('home/login');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td>Username</td>
                         <td>
						   <?php
						      echo form_input('username',set_value('username'));
						      echo form_error('username');
						   ?>
					     </td>
				       </tr>
				       <tr>
					     <td>Password</td>
					     <td>
						    <?php
							   echo form_password('password');
							   echo form_error('password');
						    ?>
					     </td>
				      </tr>
				      <tr>
					     <td></td>
					     <td><?php echo form_submit('submit','LOGIN','class = "btn2 btn2-info"');?></td>
				      </tr>
				   </table>
				  
				  <?php echo form_close(); ?>
						
				  </div> <!-- End of div class span12 -->
				</div> <!-- End of div row-fluid-->
					 
				</div>  <!-- End of div class panel90 -->
		 
		        <div class="clear"></div>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
