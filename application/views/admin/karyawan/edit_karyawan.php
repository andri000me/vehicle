<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>Form Ubah Data Karyawan</h4>
                      <?php 
					  echo anchor('master/karyawan','Kembali', 
					  array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $karyawan->row();
								echo form_open('master/edit_karyawan/'.$row->ID_KARYAWAN);
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">NID</span></td>
                                    <td>
                                    	<input type="text" name="nid" value="<?php echo $row->NID;?>"/>
            							<?php echo form_error('nid');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text"  name="nama"  value="<?php echo $row->NAMA;?>"/>
                                        <?php echo form_error('nama');?>
                                    </td>
                                </tr>                               
                                <tr>
                                	<td class=""><span  class="inp_panel">ID Jabatan</span></td>
                                    <td>
										
										<?php 
                                             //Menampilkan dropdown level
                                             foreach($id_jab->result() as $row_jabatan)
                                             $jabatan_list[$row_jabatan->ID_JABATAN] = $row_jabatan->JABATAN;
      
                                             echo form_dropdown('id_jabatan', $jabatan_list, $row->ID_JABATAN);
                                             echo form_error('id_jabatan');
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
 