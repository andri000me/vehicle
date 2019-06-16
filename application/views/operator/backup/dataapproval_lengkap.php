<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Update Status Kendaraan Dinas</h3>
                  <br />
                </div>
                 
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="2px">NO</th>
                                        <th width="90px">PEMOHON</th>
                                        <th width="80px">SOPIR</th>
                                        <th width="40px" style="text-align:center">WAKTU BERANGKAT</th>
                                        <th width="40px" style="text-align:center">WAKTU KEMBALI</th>
                                        <th width="40px" style="text-align:center">KENDARAAN</th>
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
											<?php echo $row->NAMA_SOPIR; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->TGL_BERANGKAT."<br>-<br>".$row->JAM_KELUAR; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->TGL_KEMBALI."<br>-<br>".$row->JAM_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->JENIS_KENDARAAN."<br>-<br>".$row->NO_POLISI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php //echo $row->STATUS_OPERASIONAL; ?>
                                            <br>
                                            <?php
                                            $cek = $row->ID_STATUS_OPERASIONAL;
											if($cek!=1 && $cek!=2){
												?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
                                                  <a href="koreksi/update_op/<?php echo $row->ID_OPERASIONAL."-".
													$row->ID_SOPIR."-".
													$row->ID_KENDARAAN; 
												  ?>" 
                                                  class="btn2 btn2-warning btn2-mini">
                                                  Ubah
                                                  </a>
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
												<span class="label label-success"><?php echo $row->STATUS_OPERASIONAL ?></span><br>
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

