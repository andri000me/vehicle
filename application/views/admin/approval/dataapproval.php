<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
<?php $kode=$level;
		?>
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/hal_op_reject', 'Pembatalan', array('class' => 'btn2 btn2-small btn2-danger')); ?></td>
                                  <?php if($kode==6)
								  {}else{?>
								  <td><?php echo anchor('approval/lihat_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td><?php }?>

                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
				
				<div class="clear"></div>
                   <h3>Data Request</h3>
				  
				  	<?php echo anchor('approval/pending_request', 'Daftar Pending Request', array('class' => 'btn2 btn2-small btn2-warning')); ?>
				   <br/>
				  
                </div>
				
				<hr/>
                
				<div class="row-fluid">
                
                        <div class="span12" style="font-size:11px;">
                        
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="5%">NO</th>
                                        <th min-width="20%">ATAS NAMA</th>
                        
                                        <th width="10%">WAKTU KELUAR</th>
                                        <th width="10%">WAKTU KEMBALI</th>
										<th width="10%">WAKTU REQUEST</th>
                                        <th >TUJUAN</th>
										<th width="15%">KEPERLUAN</th>
                                        <th  width="10%">APPROVAL</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<?php
										echo form_open('approval/insert_op/');
										$no = 1;
										foreach($approval->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
                                        <td>
											<?php echo $no; ?>
                                        </td>
                                        <td>
											<?php echo $row->ATAS_NAMA; ?>
                                        </td>
                 
                                        <td>
										    <?php echo $row->TGL_BERANGKAT."<br>-<br>".$row->JAM_KELUAR; ?>
                                        </td>
                                        <td>
										    <?php echo $row->TGL_KEMBALI."<br>-<br>".$row->JAM_KEMBALI; ?>
                                        </td>
										<td>
										    <?php echo $row->WAKTU_MASUK; ?>
                                        </td>
                                        <td>
											<?php echo $row->KETERANGAN_TUJUAN; ?>
                                        </td>
										<td>
											<?php echo $row->KEPERLUAN; ?>
                                        </td>
                                        <td style="text-align:center;">
										<?php echo anchor('approval/insert_op/'.$row->ID_REQUEST, 'APPROVE', array('class' => 'btn2 btn2-small btn2-warning')); ?>
										</td>
                                    </tr>
                                    <?php 
									$no++;
									} form_close();
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

