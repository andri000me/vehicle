<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Ubah Detail Contact Person Supplier </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				   <?php //echo  $id_sup.' | '.$cp.' | '.$telp.' | '.$hp.' | '.$mail; ?>
				   
				  <?php 
				    $row = $detail_cp->row();
					echo form_open('master/edit_detail_cp/'.$row->ID_DETAIL_CONTACT_PERSON);
				  ?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
                       <tr>
                         <td class="inp_panel">Nama Instansi</td>
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
					     <td class="inp_panel">Contact Person</td>
					     <td>
						    <?php
							   echo form_input('contact_person', $row->CONTACT_PERSON);
							   echo form_error('contact_person');
						    ?>
					     </td>
				      </tr>
					  <tr>
					     <td class="inp_panel">No Telpon</td>
						 <td>
						    <?php
							   echo form_input('no_telpon', $row->NO_TELPON);
							   echo form_error('no_telpon');
						    ?>
						 </td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Handphone</td>
						<td>
						   <?php
							  echo form_input('handphone', $row->HANDPHONE);
							  echo form_error('handphone');
						   ?>
						</td>
					  </tr>
					  <tr>
					    <td class="inp_panel">Email</td>
						<td>
						   <?php
							  echo form_input('email', $row->EMAIL);
							  echo form_error('email');
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
		 <?php echo anchor('master/detail_contact_person', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>
 
 
