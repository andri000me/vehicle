<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Approval</h3>
                   <?php 
					  echo anchor('approval_admin/','<< Kembali', 
					  array('class' => 'btn2 btn2-warning btn2-small'));   
					?>
                </div>
                 
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="2px">No</th>
                                        <th width="90px">Pemohon</th>
                                        <th width="80px">Driver</th>
                                        <th width="40px" style="text-align:center">Tanggal</th>
                                        <th width="40px" style="text-align:center">Jam</th>
                                        <th width="40px" style="text-align:center">Mobil</th>
                                        <th width="20px" style="text-align:center">Status</th>
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
											<?php echo $row->TGL_BERANGKAT."<br>-<br>".$row->TGL_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->JAM_KELUAR."<br>-<br>".$row->JAM_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->JENIS_KENDARAAN."<br>-<br>".$row->NO_POLISI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php //echo $row->STATUS_OPERASIONAL; ?>
                                            <br>
                                            <?php
                                            $cek = $row->STATUS_OPERASIONAL;
											if($cek!="Kembali"){
												?>
                                                  <span class="label">Belum Kembali</span><br>
                                                  <a href="update_op/<?php echo $row->ID_OPERASIONAL."-".
													$row->ID_SOPIR."-".
													$row->ID_KENDARAAN; 
												  ?>" 
                                                  class="btn2 btn2-warning btn2-mini">
                                                  ubah
                                                  </a>
												<?php
                                                }
											else{
												?>
												<span class="label label-success">Kembali</span><br>
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

