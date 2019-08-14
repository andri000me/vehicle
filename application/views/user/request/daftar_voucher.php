<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12">
			  <div class="card card-nav-tabs">
                  <!-- Header -->
                  <?php include "header.php";?>
                  
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="example">
                                <thead class=" text-primary">
                                        <!--<th width="2px">NO</th>-->
										<th>NO</th>
										<th>KODE VOUCHER</th>
										<!--<th width="13%">NILAI VOUCHER</th>-->
										<th>TGL PEMBERIAN</th>
                                        <th>PEMOHON</th>
                                        <th>WAKTU BERANGKAT</th>
                                        <th>TUJUAN</th>
                                        <th>KEPERLUAN</th>
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
                                        <td>
											<?php echo $row->KODE_VOUCHER; ?>&nbsp;
                                        </td>
                                        <!--<td>
											<?php //echo $row->NILAI_VOUCHER; ?>&nbsp;
                                        </td>-->
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
                </div>
			</div>
		</div>
	</div>

