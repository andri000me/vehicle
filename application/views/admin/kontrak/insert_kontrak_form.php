<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Kontrak Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php echo form_open('master/insert_kontrak');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       
				       <tr>
					     <td class="inp_panel">No Kontrak</td>
					     <td>
						    <?php
							   echo form_input('no_kontrak');
							   echo form_error('no_kontrak');
						    ?>
					     </td>
				      </tr>
					  
					  <tr>
                         <td class="inp_panel">Supplier</td>
                         <td>
						     <?php 
                                //Menampilkan dropdown level
                                foreach($supplier->result() as $row)
                                   $supplier_list[$row->ID_SUPPLIER] = $row->NAMA_INSTANSI;
      
                                 echo form_dropdown('id_supplier', $supplier_list, set_value('id_supplier'));
                                 echo form_error('id_supplier');
                             ?>
						   
					     </td>
				       </tr>
					  
					  <tr>
					     <td class="inp_panel">Atas Nama</td>
						 <td>
						    <?php
							   echo form_input('atas_nama', 'PT. PJB Services');
							   echo form_error('atas_nama');
						    ?>
						 </td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Kontrak Mulai</td>
						<td>
						   <?php
						      $date = date('d-m-Y');
							  
						      $data = array(
                                   'name'        => 'kontrak_mulai',
                                   'id'          => 'inputDatepic',
								   'class'       => 'inputDatepic',
                                   'value'       => $date
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
						      
							  $tahun = date('Y') + 2;
							  $hari = date('d') - 1;
							  $date = $hari."-".date('m')."-".$tahun;
							  
						      $data = array(
                                   'name'        => 'kontrak_akhir',
                                   'id'          => 'inputDatepic2',
								   'class'       => 'inputDatepic2',
                                   'value'       => $date
                                   );
						      
							  echo form_input($data);
							  echo form_error('kontrak_akhir');
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
		 <?php echo anchor('master/detail_kontrak', 'Lihat Detail Kontrak.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
