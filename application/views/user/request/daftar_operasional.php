<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!-------------------------------------------------------------------------------------------------------------------------------->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
             <div class="card card-nav-tabs">
             <?php include "header.php";?>
			 <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                                <thead class=" text-primary">
										<th>NO</th>
                                        <th>PEMOHON</th>
                                        <th>SOPIR / KENDARAAN</th>
                                        <th>WAKTU BERANGKAT</th>
                                        <th>WAKTU KEMBALI</th>
                                        <th>TUJUAN</th>
                                        <th>STATUS</th>
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
			 </div>
			 </div>
		    </div>
        </div>
    </div>

