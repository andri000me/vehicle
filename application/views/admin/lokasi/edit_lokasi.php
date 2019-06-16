<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>Form Ubah Data Lokasi</h4>
                      <?php 
					  echo anchor('master/lokasi','Batal', 
					  array('class' => 'btn2 btn2-warning fleft'));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $lokasi->row();
								echo form_open('master/edit_lokasi/'.$row->ID_LOKASI);
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Kode Lokasi</span></td>
                                    <td>
                                    	<input type="text" placeholder="SPR001" name="kode_lokasi" value="<?php echo $row->KODE_LOKASI;?>"/>
            							<?php echo form_error('kode_lokasi');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Rudi Haryadi" name="lokasi"  value="<?php echo $row->LOKASI;?>"/>
                                        <?php echo form_error('lokasi');?>
                                    </td>
                                </tr>                               
                                
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-info btn2-small" value="Simpan"/>
										<?php
										    echo ' ';
							                echo form_reset('reset','Reset', 'class = "btn2 btn2-danger"');
										?>
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
 