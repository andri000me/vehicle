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
								  <td><?php echo anchor('approval/insert_op/'.$row->ID_REQUEST,'Operasional', array('class' => 'btn2 btn2-small btn2-primary' ) ); ?> </td>
								  
								  <td><?php echo anchor('approval/insert_sewa/'.$row->ID_REQUEST, 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('approval/insert_voucher/'.$row->ID_REQUEST, 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('approval/insert_reimburse/'.$row->ID_REQUEST, 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
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
								echo form_open('approval/insert_op/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Jenis Operasional</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<!--<select name="jenis_operasional">
                                        	<?php /*foreach($jenis_operasional->result() as $rows)
												{
													$id_o=$rows->ID_JENIS_OPERASIONAL;
													$jenis=$rows->JENIS_OPERASIONAL;*/
											?>
                                            	<option value="<?php //echo $id_o;?>"><?php //echo $jenis;?></option>
                                            <?php //}?>
                                        </select>-->
										
										 <span  class="inp_panel" style="font-weight:bold">
										 Kendaraan Operasional
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
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->KEPERLUAN;?>
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td class=""><span  class="inp_panel">Jam Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<div class="input-append bootstrap-timepicker">
                                         <input id="timepicker4" type="text" class="input-small" value="<?php echo $row->JAM_KELUAR;?>" name="jam_keluar">
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
                                        
										<div class="input-append bootstrap-timepicker">
                                         <input id="timepicker5" type="hidden" class="input-small" value="<?php echo $row->JAM_KEMBALI;?>" name="jam_kembali">
                                        
                                       </div>
									   <?php echo form_error('jam_kembali');?>
                                        <input type="hidden" value="<?php echo $row->ID_REQUEST;?>" name="id_request" class="span1"/>
                                        <?php echo form_error('id_request');?>
                                        <input type="hidden" value="<?php echo $row->TGL_BERANGKAT;?>" name="tgl_berangkat" class="span1"/>
                                        <?php echo form_error('tgl_berangkat');?>
                                        <input type="hidden" value="<?php echo $row->TGL_KEMBALI;?>" name="tgl_kembali" class="span1"/>
                                        <?php echo form_error('tgl_kembali');?>
                                        <?php echo form_error('id_driver');?>
                                        <?php echo form_error('id_mobil');?>
                                        &nbsp;<span style="font-style:italic;font-size:9px;"> * edit bila perlu</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<span class="inp_panel">---Kendaraan Operasional---</span>
                                    </td>
                               </tr>                       
                                <tr>
                                	<td class=""><span  class="inp_panel">Sopir</span></td>
                                    <td><span  class="inp_panel">:</span></td>
									<td>
						                <?php 
                                       $sopir_list = array();
									   
                                        foreach($driver_aktif->result() as $row_sopir)
                                           $sopir_list[$row_sopir->ID_SOPIR] = $row_sopir->NAMA;
										   
										$list_sopir = explode('|', $sopir);
						 
										 for($i = 0; $i < count($list_sopir)-1; $i++)
										 {
										   $data_sopir = explode('/', $list_sopir[$i]);										 
										   $sopir_list[$data_sopir[0]] = $data_sopir[2];
										 }
										 
										 //tambahan
										 
										 $list_sopir2 = explode('|', $sopir2);
						 
										 for($i = 0; $i < count($list_sopir2)-1; $i++)
										 {
										   $data_sopir2 = explode('/', $list_sopir2[$i]);										 
										   $sopir_list[$data_sopir2[0]] = $data_sopir2[2];
										 }
      
                                        echo form_dropdown('id_sopir', $sopir_list, set_value('id_sopir'));
                                        echo form_error('id_sopir');
                                     ?>
					                 </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Mobil</span></td>
                                    <td><span  class="inp_panel">:</span></td>
									<td>
						                <?php 
                                        $mobil_list= array();
									   
                                        foreach($mobil_aktif->result() as $row_mobil)
                                           $mobil_list[$row_mobil->ID_KENDARAAN] = $row_mobil->JENIS_KENDARAAN." - ".$row_mobil->NO_POLISI;
										   
										$list_mobil = explode('|', $mobil);
						 
										 for($i = 0; $i < count($list_mobil)-1; $i++)
										 {
										   $data_mobil = explode('/', $list_mobil[$i]);										 
										   $mobil_list[$data_mobil[0]] = $data_mobil[3]." - ".$data_mobil[2];
										 }
										 
										//tambahan
										$list_mobil2 = explode('|', $mobil2);
						 
										 for($i = 0; $i < count($list_mobil2)-1; $i++)
										 {
										   $data_mobil2 = explode('/', $list_mobil2[$i]);										 
										   $mobil_list[$data_mobil2[0]] = $data_mobil2[3]." - ".$data_mobil2[2];
										 }
      
                                        echo form_dropdown('id_kendaraan', $mobil_list, set_value('id_mobil'));
                                        echo form_error('id_mobil');
                                     ?>
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
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_sewa/'.$row->ID_REQUEST,'--- Sewa Operasional ---'); ?></span>
                                    </td>
                               </tr>
                               <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_reimburse/'.$row->ID_REQUEST,'--- Reimburse BBM ---'); ?></span>
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
 