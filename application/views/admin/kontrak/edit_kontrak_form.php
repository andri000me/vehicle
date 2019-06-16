<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Edit Kontrak</h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php 
				     $row = $kontrak->row();
				     echo form_open('master/edit_kontrak/'.$row->ID_KONTRAK);
				  ?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
					     <td class="inp_panel">No Kontrak</td>
						 <td>
						    <?php
							   echo form_input('no_kontrak', $row->NO_KONTRAK);
							   echo form_error('no_kontrak');
						    ?>
						 </td>
					  </tr>
					   
				       <tr>
					     <td class="inp_panel">Supplier</td>
					     <td>
						    <?php
							   //Menampilkan dropdown level
                                foreach($supplier->result() as $row_supplier)
                                   $supplier_list[$row_supplier->ID_SUPPLIER] = $row_supplier->NAMA_INSTANSI;
      
                                 echo form_dropdown('id_supplier', $supplier_list, $row->ID_SUPPLIER);
                                 echo form_error('id_supplier');
						    ?>
					     </td>
				      </tr>
					  <tr>
					     <td class="inp_panel">Atas Nama</td>
						 <td>
						    <?php
							   echo form_input('atas_nama', $row->ATAS_NAMA);
							   echo form_error('atas_nama');
						    ?>
						 </td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Kontrak Mulai</td>
						<td>
						   <?php
						      //$tgl_mulai = format_tanggal($row->KONTRAK_MULAI);
							  
							  $this->load->model('datemodel');
							  $tgl = new Datemodel();
							  
							  //$tgl_mulai = $tgl->format_tanggal2($row->KONTRAK_MULAI);
							  $tgl_mulai = $row->KONTRAK_MULAI;
						     
						      $data = array(
                                   'name'        => 'kontrak_mulai',
                                   'id'          => 'inputDatepic',
								   'class'       => 'inputDatepic',
								   //'value'       => $row->KONTRAK_MULAI
                                   'value'       => $tgl_mulai
                                   );
						   
							  echo form_input($data);
							  echo form_error('kontrak_mulai');
						   ?>
						</td>
					  </tr>
					  
					  <tr>
					    <td class="inp_panel">Kontrak Akhir</td>
						<td>
						   <?php
						    
							  //$tgl_akhir = $tgl->format_tanggal2($row->KONTRAK_AKHIR);
							  $tgl_akhir = $row->KONTRAK_AKHIR;
							  
						      $data = array(
                                   'name'        => 'kontrak_akhir',
                                   'id'          => 'inputDatepic2',
								   'class'       => 'inputDatepic2',
								   //'value'       => $row->KONTRAK_AKHIR
                                   'value'       => $tgl_akhir
                                   );
						      
							  echo form_input($data);
							  echo form_error('kontrak_akhir');
						   ?>
						</td>
					  </tr>
					  
					  <tr>
					     <td class="inp_panel">Status Kontrak</td>
					     <td>
						    <?php
                                foreach($status_kontrak->result() as $row_status)
                                   $status_list[$row_status->ID_STATUS_KONTRAK] = $row_status->STATUS_KONTRAK;
      
                                 echo form_dropdown('id_status_kontrak', $status_list, $row->ID_STATUS_KONTRAK);
                                 echo form_error('id_status_kontrak');
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
		 <?php echo anchor('master/kontrak', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>
 
 
