<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">
    <div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
                  <h4 class="card-title">List Status Kendaraan</h4>
                </div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class="text-primary">
							<tr>
								<th>No</th>
								<th>Pemohon</th>
								<th>Sopir</th>
								<th>Waktu Berangkat</th>
								<th>Waktu Kembali</th>
								<th>Kendaraan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($approval->result() as $row){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->PEMOHON; ?></td>
								<td><?php echo $row->NAMA_SOPIR; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->TGL_KEMBALI; ?></td>
								<td><?php echo $row->JENIS_KENDARAAN."<br>-<br>".$row->NO_POLISI; ?></td>
								<td>
                                            <?php
                                            $cek = $row->ID_STATUS_OPERASIONAL;
											if($cek == 5){
												?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  <?php echo anchor('koreksi/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini')); ?>
                                                  <a href="koreksi/berangkat/<?php echo $row->ID_OPERASIONAL."-".
													$row->ID_SOPIR."-".
													$row->ID_KENDARAAN; 
												  ?>" 
                                                  class="btn2 btn2-warning btn2-mini">
                                                  Berangkat
                                                  </a>
												<?php
                                            }
											else if($cek == 4)
											{
											   ?>
                                                  <span class="label label-info"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
                                                  <a href="koreksi/kembali/<?php echo $row->ID_OPERASIONAL."-".
													$row->ID_SOPIR."-".
													$row->ID_KENDARAAN; ?>" 
                                                  class="btn2 btn2-warning btn2-mini">
                                                  Kembali
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
                                            <?php //echo anchor('koreksi/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini')); ?>&nbsp;											
                                </td>
                            </tr>
							<?php $no++; } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>