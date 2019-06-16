<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Edit Kendaraan </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php 
				     $row = $kendaraan->row();
				     echo form_open('master/edit_kendaraan/'.$row->ID_KENDARAAN);
				  ?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
					   
					   <tr>
                         <td class="inp_panel">Jenis Kendaraan</td>
                         <td>
						     <?php 
                                foreach($jenis_kendaraan->result() as $row_jenis)
                                   $jenis_kd_list[$row_jenis->ID_JENIS_KENDARAAN] = $row_jenis->JENIS_KENDARAAN;
      
                                 echo form_dropdown('id_jenis_kendaraan', $jenis_kd_list, $row->ID_JENIS_KENDARAAN);
                                 echo form_error('id_jenis_kendaraan');
                             ?>
						   
					     </td>
				       </tr>
					   
				       <!-- <tr>
					     <td class="inp_panel">Tahun</td>
					     <td>
						    <?php
							   /*echo form_input('tahun', $row->TAHUN);
							   echo form_error('tahun');*/
						    ?>
					     </td>
				      </tr> -->
					  <tr>
					     <td class="inp_panel">No Polisi</td>
						 <td>
						    <?php
							   echo form_input('no_polisi', $row->NO_POLISI);
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
      
                                 echo form_dropdown('id_status_kendaraan', $status_list, $row->ID_STATUS_KENDARAAN);
                                 echo form_error('id_status_kendaraan');
                             ?>
						   
					     </td>
				       </tr>
					  
				      <tr>
					     <td></td>
					     <td>
						 <?php 
							echo form_submit('submit','Simpan', 'class = "btn2 btn2-info"');
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
 
 
