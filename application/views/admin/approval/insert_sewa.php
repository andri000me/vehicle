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
								  
								  <td><?php echo anchor('approval/insert_sewa/'.$row->ID_REQUEST, 'Sewa', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
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
								echo form_open('approval/insert_sewa/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Jenis Operasional</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                        <span  class="inp_panel" style="font-weight:bold">
										 Sewa Kendaraan
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
                                	<td class=""><span  class="inp_panel">Tanggal Sewa</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
									    <?php
											  $date = date('d-m-Y');
											  
											  $data = array(
												   'name'        => 'tgl_sewa',
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
                                	<td class=""><span  class="inp_panel">Supplier</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<?php
										     foreach($harian->result() as $row_supplier)
                                                $supplier_list[$row_supplier->ID_SUPPLIER] = $row_supplier->NAMA_INSTANSI;
												
										     echo form_dropdown('id_supplier', $supplier_list, set_value('id_supplier'));
                                              echo form_error('id_supplier');
										  
										?>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Jenis Kendaraan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<?php
										     foreach($kendaraan->result() as $row_kendaraan)
                                                $kendaraan_list[$row_kendaraan->ID_JENIS_KENDARAAN] = $row_kendaraan->JENIS_KENDARAAN;
												
										     echo form_dropdown('id_jenis_kendaraan', $kendaraan_list, set_value('id_jenis_kendaraan'));
                                              echo form_error('id_jenis_kendaraan');
										  
										?>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">No Polisi</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<?php 
										   echo form_input('no_polisi', ''); 
										   echo form_error('no_polisi');
										 ?>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Biaya Sewa</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
            							<?php 
										   echo form_input('biaya_sewa', '');
										   echo form_error('biaya_sewa');
										 ?>
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
      
                                        echo form_dropdown('id_sopir', $sopir_list, set_value('id_sopir'));
                                        echo form_error('id_sopir');
                                     ?>
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
                                    	<span class="inp_panel"><?php echo anchor('approval/insert_voucher/'.$row->ID_REQUEST,'--- Voucher ---'); ?></span>
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
 