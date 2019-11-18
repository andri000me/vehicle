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
 
 <div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12">
			  <div class="card card-nav-tabs">
				<!-- isi dengan table atau tampilan -->
                <div class="card-body">
					<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<tr>
					    <td class=""><span  class="inp_panel" style="font-weight:bold">Jenis Operasional</span></td>
                        <td><span  class="inp_panel">:</span></td>
						<td>
							<select>
							  <option value="1" selected="selected" onclick="javascript:tampil_operasional()">Operasional Biasa</option>
							  <option value="2" onclick="javascript:tampil_voucher()">Voucher Taxi</option>
							  <option value="3" onclick="javascript:tampil_sewa()">Sewa Kendaraan</option>
							  <option value="4" onclick="javascript:tampil_reimburse()">Reimburse</option>
							</select>
					    </td>
					  </tr>
					</table>
                 
                    </div>
					
					<hr>
            
 					<div class="fleft" style="margin-left:10px;">
					
					<!----------------------------------------------- INSERT OPERASIONAL ----------------------------------------------------->
                            <?php 
								echo form_open('approval/insert_op/');
								//$row = $approval->row();
								?>
                            <table id="tbl_operasional" class="table-condensed">
                            	
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe Perjalanan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                	<td class=""><span  class="inp_panel">Jam Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<div class="input-append bootstrap-timepicker">
                                         <input id="timepicker4" type="text" class="input-small" value="" name="jam_keluar">
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
                                        
										<div class="input-append bootstrap-timepicker">
                                         <input id="timepicker5" type="hidden" class="input-small" value="" name="jam_kembali">
                                        
                                       </div>
									   <?php echo form_error('jam_kembali');?>
                                        <input type="hidden" value="" name="id_request" class="span1"/>
                                        <?php echo form_error('id_request');?>
                                        <input type="hidden" value="" name="tgl_berangkat" class="span1"/>
                                        <?php echo form_error('tgl_berangkat');?>
                                        <input type="hidden" value="" name="tgl_kembali" class="span1"/>
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
					                 </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Mobil</span></td>
                                    <td><span  class="inp_panel">:</span></td>
									<td>
						                <?php 
                                        $mobil_list= array();
									   
                                        foreach($mobil_aktif->result() as $row_mobil)
                                           $mobil_list[$row_mobil->ID_KENDARAAN] = $row_mobil->NAMA_KENDARAAN." - ".$row_mobil->NO_POLISI;
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
								echo form_open('approval/insert_voucher/');
								//$row = $approval->row();
								?>
                            <table id="tbl_voucher" style="display:none;" class="table-condensed">
                            
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Waktu Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
								
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Waktu Kembali</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
								
                                </tr>
								
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe Perjalanan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
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
								      <input type="hidden" value="" name="id_request" class="span1"/>
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
								echo form_open('approval/insert_reimburse/');
								//$row = $approval->row();
								?>
                            <table id="tbl_reimburse"  style="display:none;" class="table-condensed">
                            	
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Waktu Berangkat</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
								
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Waktu Kembali</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
										
										<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
								
                                </tr>
								
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe Perjalanan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	</span>
                                    </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Jenis Reimburse</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
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
								      <input type="hidden" value="" name="id_request" class="span1"/>
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
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>