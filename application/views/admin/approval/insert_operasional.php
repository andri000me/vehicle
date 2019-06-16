<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <!---------------------------------------------------------------------------------------------------- -->
 
  <script>
			function tampil_operasional(id){
			    document.getElementById("tbl_operasional").style.display = 'block';
				document.getElementById("tbl_voucher").style.display = 'none';
				document.getElementById("tbl_sewa").style.display = 'none';
				document.getElementById("tbl_reimburse").style.display = 'none';
			}
			
			function tampil_voucher(id){
			    document.getElementById("tbl_operasional").style.display = 'none';
				document.getElementById("tbl_voucher").style.display = 'block';
				document.getElementById("tbl_sewa").style.display = 'none';
				document.getElementById("tbl_reimburse").style.display = 'none';
			}
			
			function tampil_sewa(id){
			    document.getElementById("tbl_operasional").style.display = 'none';
				document.getElementById("tbl_voucher").style.display = 'none';
				document.getElementById("tbl_sewa").style.display = 'block';
				document.getElementById("tbl_reimburse").style.display = 'none';
			}
			
			function tampil_reimburse(id){
			    document.getElementById("tbl_operasional").style.display = 'none';
				document.getElementById("tbl_voucher").style.display = 'none';
				document.getElementById("tbl_sewa").style.display = 'none';
				document.getElementById("tbl_reimburse").style.display = 'block';
			}
			
 </script>
<!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
		  
		   <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
							      <?php $row = $approval->row(); 
								  		$kode=$level;
									?>
                              	  <td><?php echo anchor('approval/approval_admin', 'Kembali', array('class' => 'btn2 btn2-small btn2-warning' )); ?></td>
								  
                              </tr>
                          </table>
                      </div>
			<div class="clear"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Approval Form C</h3>
					
					<table class="table-condensed">  
					  <tr>
					    <td class=""><span  class="inp_panel" style="font-weight:bold">Jenis Operasional</span></td>
                        <td><span  class="inp_panel">:</span></td>
						<td>
							<select>
							  <option value="1" selected="selected" onclick="javascript:tampil_operasional()">Operasional Biasa</option><?php if($kode==6){}else{?>
							  <option value="2" onclick="javascript:tampil_voucher()">Voucher Taxi</option>
							  <option value="3" onclick="javascript:tampil_sewa()">Sewa Kendaraan</option>
							  <option value="4" onclick="javascript:tampil_reimburse()">Reimburse</option><?php }?>
							</select>
					    </td>
					  </tr>
					</table>
                 
                    </div>
					
					<hr>
            
 					<div class="fleft" style="margin-left:10px;">
					
					<!----------------------------------------------- INSERT OPERASIONAL ----------------------------------------------------->
                            <?php 
								echo form_open('approval/insert_op/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table id="tbl_operasional" class="table-condensed">
                            	
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
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
							
				<!--------------------------------------------------------------------- INSERT VOUCHER  ---------------------------------------------------------->			
							
							 <?php 
								echo form_open('approval/insert_voucher/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table id="tbl_voucher" style="display:none;" class="table-condensed">
                            
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
								
								<!--<tr>
                                	<td class=""><span  class="inp_panel">Kode Voucher</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<input type="text" placeholder="" name="kode_voucher"/>
            							<?php //echo form_error('kode_voucher');?>
                                    </td>
                                </tr>-->
								
								<tr>
                                	<td class=""><span  class="inp_panel">Kode Voucher</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<textarea name="keterangan"></textarea>
                                        <?php echo form_error('keterangan');?>
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
							
								<!-- <tr>
                                	<td class=""><span  class="inp_panel">Nilai Voucher</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<input type="hidden" placeholder="Rp.50.000" name="nilai_voucher" />
                                        <?php //echo form_error('nilai_voucher');?>
                                    </td>
                                </tr> -->
								
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
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
							
				<!------------------------------------------------------------------- INSERT SEWA ----------------------------------------------------------------->
							
							 <?php 
								echo form_open('approval/insert_sewa/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table id="tbl_sewa" style="display:none;" class="table-condensed">
                            	
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
								
								<!--<tr>
                                	<td class=""><span  class="inp_panel">Biaya Sewa</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>-->
            							<?php 
										   //echo form_input('biaya_sewa', '');
										   //echo form_error('biaya_sewa');
										 ?>
                                    <!--</td>
                                </tr>-->
								
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
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
							
				<!-------------------------------------------------------------------- INSERT REIMBURSE ----------------------------------------------------------->
				
				            <?php 
								echo form_open('approval/insert_reimburse/'.$row->ID_REQUEST);
								//$row = $approval->row();
								?>
                            <table id="tbl_reimburse"  style="display:none;" class="table-condensed">
                            	
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
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
				
				<!------------------------------------------------------------------------------------------------------------------------------------------------->
							
                    </div>
             </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 