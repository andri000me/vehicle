<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                    
                    <div class="fleft">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('request/', 'Input Form C', array('class' => 'btn2 btn2-small btn2-warning' )); ?></td>
								  <td><?php echo anchor('request/daftar_request', 'Request', array('class' => 'btn2 btn2-small btn2-primary' )); ?> </td>
								  <td><?php echo anchor('request/daftar_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <hr />
                    <div class="clear"></div>
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TGL BERANGKAT</th>
                                        <th>TGL KEMBALI</th>
										<th>JAM KELUAR</th>
										<th>JAM KEMBALI</th>
										<th>TUJUAN</th>
										<th>KEPERLUAN</th>
										<th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$no = 1;
                                foreach($request->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no;//$row->ID_REQUEST;?></td>
                                        <td><?php echo $row->TGL_BERANGKAT;?></td>
                                        <td><?php echo $row->TGL_KEMBALI;?></td>
                                        <td><?php echo $row->JAM_KELUAR;?></td>
										<td><?php echo $row->JAM_KEMBALI;?></td>
										<td><?php echo $row->KETERANGAN_TUJUAN;?></td>
										<td><?php echo $row->KEPERLUAN;?></td>
										<td>
										  <?php 
										      $cek = $row->ID_STATUS_REQUEST;
											  
											  if($cek == 4)
											  {
											    ?>
												<span class="label label-warnin"><?php echo $row->STATUS_REQUEST; ?></span><br>
												<?php
											  }
											  else if($cek == 2)
											  {
											    ?>
												<span class="label label-important"><?php echo $row->STATUS_REQUEST; ?></span><br>
												<?php
											  }
											  else if($cek == 3 || $cek == 1)
											  {
											     ?>
												<span class="label label-success"><?php echo $row->STATUS_REQUEST; ?></span><br>
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
                </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 
 