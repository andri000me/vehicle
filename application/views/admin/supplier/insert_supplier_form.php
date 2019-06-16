<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Supplier Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php echo form_open('master/insert_supplier');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">Kode Supplier</td>
                         <td>
						   <?php
						      echo form_input('kode_supplier',set_value('kode_supplier'));
						      echo form_error('kode_supplier');
						   ?>
					     </td>
				       </tr>
				       <tr>
					     <td class="inp_panel">Nama Instansi</td>
					     <td>
						    <?php
							   echo form_input('nama_instansi', set_value('nama_instansi'));
							   echo form_error('nama_instansi');
						    ?>
					     </td>
				      </tr>
					  
					   <tr>
                         <td class="inp_panel">Tipe</td>
                         <td>
						     <?php 
                                foreach($tipe_supplier->result() as $row_tipe)
                                   $tipe_list[$row_tipe->ID_TIPE_SUPPLIER] = $row_tipe->TIPE_SUPPLIER;
      
                                 echo form_dropdown('id_tipe_supplier', $tipe_list, '1');
                                 echo form_error('id_tipe_supplier');
                             ?>
						   
					     </td>
				       </tr>
					  
					  <tr>
					     <td class="inp_panel">Keterangan</td>
						 <td>
						    <?php
							   echo form_input('keterangan', set_value('keterangan'));
							   echo form_error('keterangan');
						    ?>
						 </td>
					  </tr>
					  
					  <tr>
                         <td class="inp_panel">Status</td>
                         <td>
						     <?php 
                                foreach($status_supplier->result() as $row_status)
                                   $status_list[$row_status->ID_STATUS_SUPPLIER] = $row_status->STATUS_SUPPLIER;
      
                                 echo form_dropdown('id_status_supplier', $status_list, '1');
                                 echo form_error('id_status_supplier');
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
		 <?php echo anchor('master/supplier', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
