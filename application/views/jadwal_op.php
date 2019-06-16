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
                              	 <td><?php echo anchor('home/', 'Dashboard', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('jadwal/', 'Jadwal Operasional', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
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
                                        <th>KENDARAAN</th>
										<th>SOPIR</th>
										<th>WAKTU BERANGKAT</th>
										<th>WAKTU KEMBALI</th>
										<th>PEMOHON</th>
										<th>TUJUAN</th>
										<th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$no = 1;
                                foreach($jadwal->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no;//$row->ID_REQUEST;?></td>
                                        <td><?php echo $row->JENIS_KENDARAAN." ( ".$row->NO_POLISI." ) ";?></td>
                                        <td><?php echo $row->NAMA_PENGEMUDI;?></td>
                                        <td><?php echo $row->TGL_BERANGKAT." ".$row->JAM_KELUAR;?></td>
										<td><?php echo $row->TGL_KEMBALI." ".$row->JAM_KEMBALI;?></td>
										<td><?php echo $row->NAMA_PEMOHON." - ".$row->SUBDIT;?></td>
										<td><?php echo $row->TUJUAN;?></td>
										<td>
										  <?php 
										      $cek = $row->ID_STATUS_OPERASIONAL;
											  
											  if($cek == 5)
											  {
											    ?>
												<span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
											  }
											  else if($cek == 4)
											  {
											    ?>
												<span class="label label-important"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
											  }
											  else if($cek == 3 || $cek == 1)
											  {
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
                </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 
 