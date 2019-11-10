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
								<th>No</th>
								<th>Atas Nama</th>
								<th>Keperluan</th>
								<th>Jam Keluar</th>
								<th>Jam Kembali</th>
								<th>Tanggal</th>
								<th>Approval</th>
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
								<td><?php echo $row->TIPE_SPJ; ?></td>
								<td><?php echo $row->JAM_KELUAR; ?></td>
								<td><?php echo $row->JAM_KEMBALI; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td>
									<a href="<?php echo base_url(). 'index.php/approval/up_op_reject/'.$row->ID_REQUEST; ?>" class="btn2 btn2-danger btn2-small">CANCEL</a>
								</td>
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