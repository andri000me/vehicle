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
								  <td><?php echo anchor('request/daftar_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('request/daftar_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					<hr>
					    
			<div class="clear"></div>
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
										<th width="5%">NO</th>
										<th width="10%">TGL SEWA / TGL PENGEMBALIAN</th>
										<th width="10%">SUPPLIER</th>
										<th width="10%">JENIS KENDARAAN</th>
										<th width="10%">NO POLISI</th>
								
                                        <th width="10%">PEMOHON</th>
                                        <th width="10%">WAKTU BERANGKAT</th>
                                        <th width="10%">TUJUAN</th>
                                        <th width="10%">KEPERLUAN</th>
										
										<th width="10%">STATUS</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<?php
										$no = 1;
										
										foreach($sewa->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
										 <td>
											<?php echo $no; ?>&nbsp;
                                        </td>
                                        <td>
											<?php echo $row->TGL_SEWA."<br/>-<br/>".$row->TGL_PENGEMBALIAN; ?>&nbsp;
                                        </td>
                                        <td>
											<?php echo $row->NAMA_INSTANSI; ?>&nbsp;
                                        </td>
                                        <td>
											<?php echo $row->JENIS_KENDARAAN; ?>&nbsp;
                                        </td>
										 <td>
											<?php echo $row->NO_POLISI; ?>&nbsp;
                                        </td>
										
										<td>
											<?php echo $row->PEMOHON; ?>&nbsp;
                                        </td>
                                        <td>
											<?php echo $row->TGL_BERANGKAT."&nbsp;".$row->JAM_KELUAR; ?>&nbsp;
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->KETERANGAN_TUJUAN; ?>&nbsp;
                                        </td>
										<td style="text-align:center">
											<?php echo $row->KEPERLUAN; ?>&nbsp;
                                        </td>
										
										 <td>
											<?php 
											   $cek = $row->ID_STATUS_SEWA;
											   
											   if($cek == 0)
											   {
											    ?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_SEWA; ?></span><br>
												  <?php echo anchor('approval/update_sewa/'.$row->ID_SEWA_KENDARAAN, 'Update', array('class' => 'btn2 btn2-info btn2-mini')); 
												
											   }
											   else if($cek == 1)
											   {
											    ?>
												<span class="label label-success"><?php echo $row->STATUS_SEWA; ?></span><br>
												<?php 
											   }
											   
											?>&nbsp;
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

