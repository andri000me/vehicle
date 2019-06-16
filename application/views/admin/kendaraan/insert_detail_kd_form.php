<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Detail Kendaraan Dinas Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php echo form_open('master/insert_detail_kd');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">Kendaraan</td>
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
                         <td class="inp_panel">Tipe KD</td>
                         <td>
						     <?php 
                                foreach($tipe_kd->result() as $row_tipe_kd)
                                   $tipe_kd_list[$row_tipe_kd->ID_TIPE_KENDARAAN_DINAS] = $row_tipe_kd->TIPE_KENDARAAN_DINAS;
      
                                 echo form_dropdown('id_tipe_kendaraan_dinas', $tipe_kd_list,'5');
                                 echo form_error('id_tipe_kendaraan_dinas');
                             ?>
						   
					     </td>
				       </tr>
					   
					   <tr>
                         <td class="inp_panel">Pengguna</td>
                         <td>
						     <?php 
                                foreach($pengguna->result() as $row_pengguna)
                                   $pengguna_list[$row_pengguna->ID_JABATAN] = $row_pengguna->JABATAN;
      
                                 echo form_dropdown('id_pengguna', $pengguna_list,'0');
                                 echo form_error('id_pengguna');
                             ?>
						   
					     </td>
				       </tr>
					   
					   <tr>
                         <td class="inp_panel">Sopir</td>
                         <td>
						     <?php 
                                foreach($sopir->result() as $row_sopir)
                                   $sopir_list[$row_sopir->ID_SOPIR] = $row_sopir->NAMA;
      
                                 echo form_dropdown('id_sopir', $sopir_list,'0');
                                 echo form_error('id_sopir');
                             ?>
						   
					     </td>
				       </tr>
					   
					   <tr>
                         <td class="inp_panel">Lokasi</td>
                         <td>
						     <?php 
                                foreach($lokasi->result() as $row_lokasi)
                                   $lokasi_list[$row_lokasi->ID_LOKASI] = $row_lokasi->LOKASI;
      
                                 echo form_dropdown('id_lokasi', $lokasi_list,'1');
                                 echo form_error('id_lokasi');
                             ?>
						   
					     </td>
				       </tr>
				       
					  <tr>
					    <td class="inp_panel">Tgl Serah Terima</td>
						<td>
						   <?php
						   
						      $date = date('d-m-Y');
						      $data = array(
                                   'name'        => 'tgl_serah_terima',
                                   'id'          => 'inputDatepic',
								   'class'       => 'inputDatepic',
                                   'value'       => $date
                                   );
								   
							  echo form_input($data);
							  echo form_error('tgl_serah_terima');
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
		 <?php echo anchor('master/detail_kendaraan_dinas', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
