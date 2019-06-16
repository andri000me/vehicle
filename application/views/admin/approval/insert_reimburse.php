<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
		  
		  <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
							      <?php $row = $approval->row(); ?>
                              	  <td><?php echo anchor('approval/approval_admin', 'Kembali', array('class' => 'btn2 btn2-small btn2-warning' )); ?></td>
								  <td><?php echo anchor('approval/insert_op/'.$row->ID_REQUEST,'Operasional', array('class' => 'btn2 btn2-small btn2-inverse' ) ); ?> </td>
								  
								  <td><?php echo anchor('approval/insert_sewa/'.$row->ID_REQUEST, 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('approval/insert_voucher/'.$row->ID_REQUEST, 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('approval/insert_reimburse/'.$row->ID_REQUEST, 'Reimburse', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
                              </tr>
                          </table>
                      </div>
			<div class="clear"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Approval Form C</h3>
                     
                    </div>
                
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								echo form_open('approval/insert_reimburse/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Jenis Operasional</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                        <span  class="inp_panel" style="font-weight:bold">
										 Reimburse BBM
										</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->ATAS_NAMA;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Waktu Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->TGL_BERANGKAT;?>
                                        </span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo " &nbsp; ".$row->JAM_KELUAR;?>
                                        </span>
                                    </td>
								
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Waktu Kembali</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->TGL_KEMBALI;?>
                                        </span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo " &nbsp; ".$row->JAM_KEMBALI;?>
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
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->KEPERLUAN;?>
                                        </span>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Jenis Reimburse</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<?php 
										    foreach($jenis_reimburse->result() as $row_jr)
                                              $jr_list[$row_jr->ID_JENIS_REIMBURSE] = $row_jr->JENIS_REIMBURSE;
											  
											echo form_dropdown('id_jenis_reimburse', $jr_list);
                                            echo form_error('id_jenis_reimburse');
										   
										?>
                                    </td>
                                </tr>
                                
								<tr>
                                	<td class=""><span  class="inp_panel">Tanggal Pemberian</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
									    <?php
											  $date = date('d-m-Y');
											  
											  $data = array(
												   'name'        => 'tgl_pemberian',
												   'id'          => 'inputDatepic',
												   'class'       => 'inputDatepic',
												   'value'       => $date
												   );
										   
											  echo form_input($data);
											  echo form_error('tgl_pemberian');
										   ?>
                                    	
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Keterangan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<textarea name="keterangan"></textarea>
                                        <?php echo form_error('keterangan');?>
                                    </td>
                                </tr>
								
								<tr>
								   <td>
								      <input type="hidden" value="<?php echo $row->ID_REQUEST;?>" name="id_request" class="span1"/>
                                      <?php echo form_error('id_request');?>
								   </td>
								</tr>
								
                                <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_op/'.$row->ID_REQUEST,'--- Kendaraan Operasional ---'); ?></span>
                                    </td>
                               </tr>                       
                        
                               <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_sewa/'.$row->ID_REQUEST,'--- Sewa Operasional ---'); ?></span>
                                    </td>
                               </tr>
                               <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_voucher/'.$row->ID_REQUEST,'--- Voucher ---'); ?></span>
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
 