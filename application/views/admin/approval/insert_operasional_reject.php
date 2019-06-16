<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>~ Reject Form C</h4>
                      <?php 
					  echo anchor('approval/approval_admin','<< kembali', 
					  array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								
								echo form_open('approval/up_op_reject');
								$row = $approval->row();
								?>
                            <table class="table-condensed">
                            	
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->PEMOHON;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->TGL_BERANGKAT;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe Perjalanan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->TIPE_SPJ;?>
                                        </span>
                                    </td>
                                </tr>
                                
                                 <tr>
                                	<td class=""><span  class="inp_panel">Kendaraan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->JENIS_KENDARAAN;?>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td class=""><span  class="inp_panel">Sopir</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->NAMA_SOPIR;?>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td class="" valign="top"><span  class="inp_panel">Keterangan</span></td>
                                    <td valign="top"><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<input type="hidden" value="<?php echo $row->ID_OPERASIONAL;?>" name="id_operasional" class="span1"/>
                                        <?php echo form_error('id_operasional');?>
                                        <input type="hidden" value="<?php echo $row->ID_KENDARAAN;?>" name="id_kendaraan" class="span1"/>
                                        <?php echo form_error('id_kendaraan');?>
                                        <input type="hidden" value="<?php echo $row->ID_SOPIR;?>" name="id_sopir" class="span1"/>
                                        <?php echo form_error('id_sopir');?>
                                        <textarea name="ket"></textarea>
										<input type="hidden" value="<?php echo $row->ID_REQUEST;?>" name="id_request" class="span1"/>
                                        <?php echo form_error('id_request');?>
                                        &nbsp;<span style="font-style:italic;font-size:9px;"> * isi bila perlu</span>
                                    </td>
                                </tr> 
                                <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
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
 