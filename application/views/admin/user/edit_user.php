<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>Form Ubah Data User</h4>
                      <?php 
					  echo anchor('master/user','Kembali', 
					  array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $user->row();
								echo form_open('master/edit_user/'.$row->ID_USER);
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Karyawan</span></td>
                                    <td>  
										<?php
                                             foreach($id_jab->result() as $row_kar)
                                             $karyawan_list[$row_kar->ID_KARYAWAN] = $row_kar->NID.' | '.$row_kar->NAMA;
      
                                             echo form_dropdown('id_karyawan', $karyawan_list, $row->ID_KARYAWAN);
                                             echo form_error('id_karyawan');
                                        ?>
                                        
                                    </td>
                                </tr>
                            	<tr>
                                	<td class=""><span class="inp_panel">Username</span></td>
                                    <td>
                                    	<input type="text" placeholder="ID" name="username" value="<?php echo $row->USERNAME; ?>"/>
            							<?php echo form_error('username');?>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe User</span></td>
                                    <td>
										<?php 
                                             foreach($tipe->result() as $row_tipe)
                                             $tipe_list[$row_tipe->ID_TIPE_USER] = $row_tipe->TIPE_USER;
      
                                             echo form_dropdown('tipe_user', $tipe_list, $row->ID_TIPE_USER);
                                             echo form_error('tipe_user');
                                        ?>
										
                                    </td>
                                </tr>       
                                <tr>
                                	<td class=""><span  class="inp_panel">Status User</span></td>
                                    <td>
										<?php 
                                             foreach($status->result() as $row_status)
                                             $status_list[$row_status->ID_STATUS_USER] = $row_status->STATUS_USER;
      
                                             echo form_dropdown('status_user', $status_list, $row->ID_STATUS_USER);
                                             echo form_error('status_user');
                                        ?>
                                    </td>
                                </tr>                                
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Ubah"/>
                                        <input type="reset" class="btn2 btn2-danger btn2-small" value="Reset"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
                    </div>
             </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 