<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4> Approval Form C</h4>
                      <?php 
					  echo anchor('approval/approval_admin','Kembali', 
					  array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					  ?>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $approval->row();
								echo form_open('approval/insert_op');
								?>
                            <table class="table-condensed">
                            	
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
                                    	<?php 
										   
										    $this->load->model('datemodel');
							                $tgl = new Datemodel();
							  
							                $tgl_berangkat = $tgl->format_tanggal2($row->TGL_BERANGKAT);
											$row->TGL_BERANGKAT = $tgl_berangkat;
											
										    echo $row->TGL_BERANGKAT;
										   
										 ?>
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
                                	<td class=""><span  class="inp_panel">Waktu</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	
                                        <input type="text" value="<?php echo $row->JAM_KELUAR;?>" name="jam_keluar" class="span1"/>
                                        <?php echo form_error('jam_keluar');?>
                                        -
                                        <input type="text" value="<?php echo $row->JAM_KEMBALI;?>" name="jam_kembali" class="span1"/>
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
                                	<td class=""><span  class="inp_panel">Driver</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<select class="span3" name="id_sopir">
                                        <?php
                                        foreach($driver_aktif->result() as $row){
										?>
                                        	<option  value="<?php echo $row->ID_SOPIR;?>"><?php echo $row->NAMA;?></option>
                                        <?php
										}
										?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Mobil</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<select class="span3" name="id_kendaraan">
                                        <?php
                                        foreach($mobil_aktif->result() as $row){
										?>
                                        	<option  value="<?php echo $row->ID_KENDARAAN;?>">
												<?php echo $row->JENIS_KENDARAAN;?>
                                                 - 
                                                <?php echo $row->NO_POLISI;?>
                                            </option>
                                        <?php
										}
										?>
                                        </select>
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
 