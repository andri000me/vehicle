<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>Form Tambah Data Karyawan</h4>
                
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_karyawan');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">NID</span></td>
                                    <td>
                                    	<input type="text" placeholder="NID" name="nid"/>
            							<?php echo form_error('id_karyawan');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Rudi Haryadi" name="nama"/>
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
      
                                             echo form_dropdown('id_jabatan', $jabatan_list, '0');
                                             echo form_error('id_jabatan');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Tambah"/>
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
 
