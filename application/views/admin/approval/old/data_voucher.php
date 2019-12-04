<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!----------------------------------------------------------------------------------------------------------------------------->
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
					<table class="table table-hover" id="dataTables-id">
						<thead class=" text-primary">
							<tr>
								<th>NO</th>
								<th>KODE VOUCHER</th>
								<th>TGL PEMBERIAN</th>
								<th>PEMOHON</th>
								<th>WAKTU BERANGKAT</th>
								<th>TUJUAN</th>
								<th>KEPERLUAN</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($voucher->result() as $row){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->KODE_VOUCHER; ?></td>
								<td><?php echo $row->TGL_PEMBERIAN; ?></td>
								<td><?php echo $row->PEMOHON; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->KETERANGAN_TUJUAN; ?></td>
								<td><?php echo $row->KEPERLUAN; ?></td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>