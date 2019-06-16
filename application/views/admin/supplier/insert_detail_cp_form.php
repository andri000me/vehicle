<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Tambah Detail Contact Person Supplier Baru </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				   <?php //echo  $id_sup.' | '.$cp.' | '.$telp.' | '.$hp.' | '.$mail; ?>
				   
				  <?php echo form_open('master/insert_detail_cp');?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">Nama Instansi</td>
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
					     <td class="inp_panel">Contact Person</td>
					     <td>
						    <?php
							   echo form_input('contact_person');
							   echo form_error('contact_person');
						    ?>
					     </td>
				      </tr>
					  <tr>
					     <td class="inp_panel">No Telpon</td>
						 <td>
						    <?php
							   echo form_input('no_telpon');
							   echo form_error('no_telpon');
						    ?>
						 </td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Handphone</td>
						<td>
						   <?php
							  echo form_input('handphone');
							  echo form_error('handphone');
						   ?>
						</td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Email</td>
						<td>
						   <?php
							  echo form_input('email');
							  echo form_error('email');
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
		 <?php echo anchor('master/detail_contact_person', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>

 
