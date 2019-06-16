<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>~ Insert Data Driver</h4>
                      <?php 
					   echo anchor('master/driver','<< Driver', 
					   array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					   ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_driver');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">id Sopir</span></td>
                                    <td>
                                    	<input type="text" placeholder="SPR001" name="id_sopir"/>
            							<?php echo form_error('id_sopir');?>
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
                                	<td class=""><span  class="inp_panel">Status</span></td>
                                    <td>
                                    	<select class="span2" name="status">
                                            <option value="1">Aktif (tersedia)</option>
                                            <option value="2">Bertugas (tidak tersedia)</option>
                                            <option value="3">Sopir Direksi</option>
                                            <option value="0">Non-Aktif (keluar)</option>
                                            <option value="4">Absen (tidak hadir)</option>
                                        </select>
                                        <?php echo form_error('status');?>
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
 

<?php echo anchor('home/logout', 'Logout'); ?>