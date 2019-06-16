<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('request/', 'Input Form C', array('class' => 'btn2 btn2-small btn2-warning' )); ?></td>
								  <td><?php echo anchor('request/daftar_request', 'Request', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('request/daftar_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('request/daftar_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
            
                </div>
                 
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <!--<th width="2px">NO</th>-->
										<th width="5px">NO</th>
                                        <th width="90px">PEMOHON</th>
                                        <th width="80px">SOPIR / KENDARAAN</th>
                                        <th width="40px" style="text-align:center">WAKTU BERANGKAT</th>
                                        <th width="40px" style="text-align:center">WAKTU KEMBALI</th>
                                        <th width="40px" style="text-align:center">TUJUAN</th>
                                        <th width="20px" style="text-align:center">STATUS</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<?php
										$no = 1;
										
										foreach($approval->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
										 <td>
											<?php echo $no; ?>
                                        </td>
                                        <td>
											<?php echo $row->PEMOHON; ?>
                                        </td>
                                        <td>
											<?php echo $row->NAMA_SOPIR."<br>-<br>".$row->JENIS_KENDARAAN."<br>".$row->NO_POLISI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->TGL_BERANGKAT."<br>-<br>".$row->JAM_KELUAR; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->TGL_KEMBALI."<br>-<br>".$row->JAM_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->KETERANGAN_TUJUAN; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php //echo $row->STATUS_OPERASIONAL; ?>
                                            <br>
											<?php
                                            $cek = $row->ID_STATUS_OPERASIONAL;
											if($cek!=1 && $cek!=2){
												?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  
												<?php
                                                }
										    else if($cek == 2)
											{
											    ?>
												<span class="label label-important"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
											}
											else{
												?>
												<span class="label label-success"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
												}
											?>  
                                        </td>
                                    </tr>
                                    <?php 
									  $no++;
									}
									 ?>
                                 </tbody>

                            </table>
                        </div>
       				</div>
             </div>  <!-- End of div class panel90 -->
		 
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

