<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/hal_op_reject', 'Pembatalan', array('class' => 'btn2 btn2-small btn2-danger')); ?></td>
								  <td><?php echo anchor('approval/lihat_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
								  <td><?php echo anchor('approval/lihat_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					<hr>
					    
			<div class="clear"></div>
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Data Voucher</h3>
                  <br />
                </div>
                 
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <!--<th width="2px">NO</th>-->
										<th width="4%">NO</th>
										<!--<th width="8%">KODE VOUCHER</th>-->
										<th width="13%">KODE VOUCHER</th>
										<th width="13%">TGL PEMBERIAN</th>
                                        <th width="13%">PEMOHON</th>
                                        <th width="13%">WAKTU BERANGKAT</th>
                                        <th width="13%">TUJUAN</th>
                                        <th width="13%">KEPERLUAN</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<?php
										$no = 1;
										
										foreach($voucher->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
										 <td>
											<?php echo $no; ?>&nbsp;
                                        </td>
                                       <!-- <td>
											<?php //echo $row->KODE_VOUCHER; ?>&nbsp;
                                        </td>-->
                                        <td>
											<?php echo $row->KETERANGAN; ?>&nbsp;
                                        </td>
                                        <td>
											<?php echo $row->TGL_PEMBERIAN; ?>&nbsp;
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

