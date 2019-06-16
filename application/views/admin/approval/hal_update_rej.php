<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!--------------------------------------------------------------------------------------------------------------------------------><?php $kode=$level?>
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					  <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/hal_op_reject', 'Pembatalan', array('class' => 'btn2 btn2-small btn2-danger')); ?></td><?php if($kode==6){}else{?>
								  <td><?php echo anchor('approval/lihat_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td><?php }?>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					<hr>
					    
			<div class="clear"></div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Pembatalan</h3>
                   
                  <hr>
                </div>
                
				<div class="row-fluid">
                
                        <div class="span12" style="font-size:11px;">
                        
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th min-width="25%">Atas Nama</th>
                                        <th width="15%">Keperluan</th>
                                        <th width="15%">Jam Keluar</th>
                                        <th width="15%">Jam Kembali</th>
                                        <th >Tanggal</th>
                                        <th  width="10%">Approval</th>
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
											<?php echo $row->TIPE_SPJ; ?>
                                        </td>
                                        <td>
											<?php echo $row->JAM_KELUAR; ?>
                                        </td>
                                        <td>
											<?php echo $row->JAM_KEMBALI; ?>
                                        </td>
                                        <td>
											<?php echo $row->TGL_BERANGKAT; ?>
                                        </td>
                                        <td style="text-align:center;">
                                        <a href="<?php echo base_url(). 'index.php/approval/up_op_reject/'.$row->ID_REQUEST; ?>" class="btn2 btn2-danger btn2-small">CANCEL</a>
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

