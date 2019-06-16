<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
             <div class="panel90">
			 <div class="judul_pjbs">
                      <h4>Form Tambah Jenis Kendaraan</h4>
                      <?php 
					   echo anchor('master/jenis_kendaraan','Batal', array('class' => 'btn2 btn2-warning fleft'));  
					   ?>
             </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
				   
				  <?php echo form_open('master/insert_jenis_kendaraan');?>
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  			 <table class="table-condensed">
                               <tr>
                                 <td class=""><span class="inp_panel">Jenis Kendaraan</span></td>
                                 <td>
                                      <?php
                                       echo form_input('jenis_kendaraan', set_value('jenis'));
                                       echo form_error('jenis_kendaraan');
                                      ?>	                                  
                                 </td>
                               </tr>
                                
                              <tr>
                                 <td></td>
                                 <td>
                                 <?php 
                                    echo form_submit('submit','Tambah', 'class = "btn2 btn2-info"');
                                 ?>
                                 </td>
                              </tr>
                           </table>
                          
                          <?php echo form_close(); ?>

				</div> <!-- End of div row-fluid-->
					 
				</div>  <!-- End of div class panel90 -->
		 
		        <div class="clear"></div>
                     
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
