<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
		<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/approval_admin/';?>" class="made-with-mk">
			<div class="brand"><i class="material-icons">reply_all</i></div>
			<div class="made-with">Request <strong>Follow Up</strong></div>
		</a>
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
								<th>Pemohon</th>
								<th>Waktu Keluar</th>
								<th>Waktu Kembali</th>
								<th>Waktu Request</th>
								<th>Tujuan</th>
								<th>Keperluan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							echo form_open('approval/edit_approval');
							foreach($approval->result() as $row){
						?>
                            <tr>
								<td><?php echo $row->ID_REQUEST; ?></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->TGL_KEMBALI; ?></td>
								<td><?php echo $row->WAKTU_REQUEST; ?></td>
								<td><?php echo $row->TUJUAN; ?></td>
								<td><?php echo $row->KEPERLUAN; ?></td>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/edit_approval/'.$row->ID_REQUEST.'/1';?>" class="btn btn-success btn-fab btn-round btn-sm">
										<i class="material-icons">check</i>
									</a>
									<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/edit_approval/'.$row->ID_REQUEST.'/2';?>" class="btn btn-danger btn-fab btn-round btn-sm">
										<i class="material-icons">clear</i>
									</a>
								</td>
							</tr>
							<?php
								} 
								echo form_close();
							?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
	
	<!-- End List -->