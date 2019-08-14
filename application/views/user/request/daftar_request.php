<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <!---------------------------------------------------------------------------------------------------- -->
 <div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12">
			  <div class="card card-nav-tabs">
				<!-- Header -->
			  	<?php include "header.php";?>					    
				<!-- isi dengan table atau tampilan -->
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="example">
                                <thead class=" text-primary">
                                        <th>NO</th>
                                        <th>TGL BERANGKAT</th>
                                        <th>TGL KEMBALI</th>
										<th>JAM KELUAR</th>
										<th>JAM KEMBALI</th>
										<th>TUJUAN</th>
										<th>KEPERLUAN</th>
										<th>STATUS</th>
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
			</div>
		</div>
	</div>  
 
 
 