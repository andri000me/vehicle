<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
            <div class="panel90">
			<div class="judul_pjbs">
                      <h4>Form Ubah Jenis Kendaraan</h4>
                      <?php 
					   echo anchor('master/kendaraan','Batal', array('class' => 'btn2 btn2-warning fleft'));  
					   ?>
             </div>
             <hr />
				<div class="fleft" style="margin-left:10px;">
				  <?php 
				     $row = $jenis_kendaraan->row();
				     echo form_open('master/edit_jenis_kendaraan/'.$row->ID_JENIS_KENDARAAN);
				  ?>
				  
				  <!--- Table --------------------------------------------------------------------------------------------------------->
				  
				     <table class="table-condensed">				   
					   
				       <tr>
					     <td><span class="inp_panel">Jenis Kendaraan</span></td>
					     <td>
						    <?php
							   echo form_input('jenis_kendaraan', $row->JENIS_KENDARAAN);
							   echo form_error('jenis_kendaraan');
						    ?>
					     </td>
				      </tr>
					 
				      <tr>
					     <td></td>
					     <td>
						 <?php 
							echo form_submit('submit','Simpan', 'class = "btn2 btn2-info"');
						 ?>
						 </td>
				      </tr>
				   </table>
				  
				  <?php echo form_close(); ?>
						
				</div> <!-- End of div row-fluid-->
					 
				</div>  <!-- End of div class panel90 -->
		 
		        <div class="clear"></div>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <br/><br/>
 
 
