<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Subdit Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php echo form_open('master/insert_subdit');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">Kode Subdit</td>
                         <td>
						   <?php
						      echo form_input('kode_subdit',set_value('kode_subdit'));
						      echo form_error('kode_subdit');
						   ?>
					     </td>
				       </tr>
				       <tr>
					     <td class="inp_panel">Subdit</td>
					     <td>
						    <?php
							   echo form_input('subdit', set_value('subdit'));
							   echo form_error('subdit');
						    ?>
					     </td>
				      </tr>
				      <tr>
					     <td></td>
					     <td>
						 <?php 
							echo form_submit('submit','Tambah', 'class = "btn2 btn2-info"');
							echo ' ';
							echo form_reset('reset','Reset', 'class = "btn2 btn2-danger"');
						 ?>
						 </td>
				      </tr>
				   </table>
				  
				  <?php echo form_close(); ?>
						
				  </div> <!-- End of div class span12 -->
				</div> <!-- End of div row-fluid-->
					 
				</div>  <!-- End of div class panel90 -->
		 
		        <div class="clear"></div>
                
		  <br/><br/>
          <?php echo anchor('master/subdit', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 

 
