<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Kendaraan Baru </h3>
                </div>
				
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php echo form_open('master/insert_kendaraan');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <!-- <tr>
                         <td class="inp_panel">ID Kendaraan</td>
                         <td>
						   <?php
						      /*echo form_input('id_kendaraan',set_value('id_kendaraan'));
						      echo form_error('id_kendaraan');*/
						   ?>
					     </td>
				       </tr> -->
					   
					   <tr>
                         <td class="inp_panel">Jenis Kendaraan</td>
                         <td>
						     <?php 
                                foreach($jenis_kendaraan->result() as $row)
                                   $jenis_kd_list[$row->ID_JENIS_KENDARAAN] = $row->JENIS_KENDARAAN;
      
                                 echo form_dropdown('id_jenis_kendaraan', $jenis_kd_list, set_value('id_jenis_kendaraan'));
                                 echo form_error('id_jenis_kendaraan');
                             ?>
						   
					     </td>
				       </tr>
					   
					  <!--<tr>
					     <td class="inp_panel">Tahun</td>
						 <td>
						    <?php
							   /*echo form_input('tahun', set_value('tahun'));
							   echo form_error('tahun');*/
						    ?>
						 </td>
					  </tr>-->
					  
					  <tr>
					     <td class="inp_panel">No Polisi</td>
						 <td>
						    <?php
							   echo form_input('no_polisi', set_value('no_polisi'));
							   echo form_error('no_polisi');
						    ?>
						 </td>
					  </tr>
					  
					  <tr>
                         <td class="inp_panel">Status Kendaraan</td>
                         <td>
						     <?php 
                                foreach($status_kendaraan->result() as $row_status)
                                   $status_list[$row_status->ID_STATUS_KENDARAAN] = $row_status->STATUS_KENDARAAN;
      
                                 echo form_dropdown('id_status_kendaraan', $status_list, '1');
                                 echo form_error('id_status_kendaraan');
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
                
		 <br><br><br><br>
		 <?php echo anchor('master/kendaraan', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
