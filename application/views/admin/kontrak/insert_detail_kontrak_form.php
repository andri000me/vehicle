<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Detail Kontrak Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				   
				  <?php echo form_open('master/insert_detail_kontrak');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">No Kontrak</td>
                         <td>
						     <?php 
                                //Menampilkan dropdown level
                                foreach($kontrak->result() as $row_kontrak)
                                   $kontrak_list[$row_kontrak->NO_KONTRAK] = $row_kontrak->NO_KONTRAK.' - '.$row_kontrak->NAMA_INSTANSI;
      
                                 echo form_dropdown('no_kontrak', $kontrak_list, set_value('no_kontrak'));
                                 echo form_error('no_kontrak');
                             ?>
						   
					     </td>
				       </tr>
				       <tr>
					     <td class="inp_panel">ID Kendaraan</td>
					     <td>
						    <?php
							   foreach($kendaraan->result() as $row_kendaraan)
                                  $kendaraan_list[$row_kendaraan->ID_KENDARAAN] = $row_kendaraan->NO_POLISI.' - '.$row_kendaraan->JENIS_KENDARAAN;
							   
							   echo form_dropdown('id_kendaraan', $kendaraan_list, set_value('id_kendaraan'));
							   echo form_error('id_kendaraan');
						    ?>
					     </td>
				      </tr>
					  <tr>
					     <td class="inp_panel">Tagihan Per Bulan</td>
						 <td>
						    <?php
							   echo form_input('tagihan_per_bulan');
							   echo form_error('tagihan_per_bulan');
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
		 <?php echo anchor('master/kontrak', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
