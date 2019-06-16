<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3> Form Ubah Jabatan </h3>
                </div>
					 
				<div class="row-fluid">
                  <div class="span12">
				   
				  <?php 
				    $row = $jabatan->row();
					echo form_open('master/edit_jabatan/'.$row->ID_JABATAN);
				  ?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table>
				       <tr>
					     <td class="inp_panel">Kode Jabatan</td>
					     <td>
						    <?php
							   echo form_input('kode_jabatan', $row->KODE_JABATAN);
							   echo form_error('kode_jabatan');
						    ?>
					     </td>
				      </tr>
					  <tr>
					     <td class="inp_panel">Jabatan</td>
						 <td>
						    <?php
							   echo form_input('jabatan', $row->JABATAN);
							   echo form_error('jabatan');
						    ?>
						 </td>
					  </tr>
					  <tr>
                         <td class="inp_panel">Subdit</td>
                         <td>
						     <?php 
                                //Menampilkan dropdown level
                                foreach($subdit->result() as $row_subdit)
                                   $subdit_list[$row_subdit->ID_SUBDIT] = $row_subdit->SUBDIT;
      
                                 echo form_dropdown('id_subdit', $subdit_list, $row->ID_SUBDIT);
                                 echo form_error('id_subdit');
                             ?>
						   
					     </td>
				       </tr>
					   <tr>
                         <td class="inp_panel">Jenis Jabatan</td>
                         <td>
						     <?php 
                                //Menampilkan dropdown level
                                foreach($jenis_jabatan->result() as $row_jenis)
                                   $jenis_list[$row_jenis->ID_JENIS_JABATAN] = $row_jenis->JENIS_JABATAN;
      
                                 echo form_dropdown('id_jenis_jabatan', $jenis_list, $row->ID_JENIS_JABATAN);
                                 echo form_error('id_jenis_jabatan');
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
		 <?php echo anchor('master/jabatan', 'Kembali.'); ?>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 

 
 
