<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Form Edit Data Sopir</h3>
                      <?php 
					  echo anchor('master/sopir','Batal', 
					  array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $sopir->row();
								echo form_open('master/edit_sopir/'.$row->ID_SOPIR);
								?>
                            <table class="table-condensed">
							    <tr>
                                	<td class=""><span  class="inp_panel">NID</span></td>
                                    <td>
                                    	<input type="text" placeholder="SP0001" name="nid"  value="<?php echo $row->NID;?>"/>
                                        <?php echo form_error('nid');?>
                                    </td>
                                </tr> 
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Rudi Haryadi" name="nama"  value="<?php echo $row->NAMA;?>"/>
                                        <?php echo form_error('nama');?>
                                    </td>
                                </tr>    
                                <tr>
                                	<td class=""><span  class="inp_panel">Lokasi</span></td>
                                    <td>
                                        <?php
										    foreach($lokasi->result() as $row_lokasi)
                                                $lokasi_list[$row_lokasi->KODE_LOKASI] = $row_lokasi->LOKASI;
      
                                            echo form_dropdown('lokasi', $lokasi_list, $row->KODE_LOKASI);
										    echo form_error('lokasi');
									    ?>
                                    </td>
                                </tr>                           
                                <tr>
                                	<td class=""><span  class="inp_panel">Status</span></td>
                                    <td>
                                        <?php
										    foreach($status_sopir->result() as $row_status)
                                                $status_list[$row_status->ID_STATUS_SOPIR] = $row_status->STATUS_SOPIR;
      
                                            echo form_dropdown('status', $status_list, $row->ID_STATUS_SOPIR);
										    echo form_error('status');
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
 