<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
<?php $kode=$level;?>
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
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
                   <h3>Data Operasional</h3>
                  <br />
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
											
											if($cek == 5)
											{
											   ?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  <?php 
											          echo anchor('approval/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini'));
											          echo "&nbsp;";
											          echo anchor('approval/edit_operasional/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Edit', array('class' => 'btn2 btn2-warning btn2-mini'));
											          echo "&nbsp;";
											          echo anchor('approval/berangkat/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Berangkat', array('class' => 'btn2 btn2-info btn2-mini'));
											}
											else if($cek == 4)
											{
											  ?>
                                                  <span class="label label-info"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  <?php 
											  echo anchor('approval/kembali/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Kembali', array('class' => 'btn2 btn2-info btn2-mini'));
											   ?>
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
											 <?php //echo anchor('approval/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini')); ?>&nbsp;
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

