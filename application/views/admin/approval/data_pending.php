<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
			<div class="card">
				<div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">help_outline</i>
                  </div>
                  <h4 class="card-title">Pending Request</h4>
                </div>
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class=" text-primary">
							<tr>
								<th>No</th>
								<th>Pemohon</th>
								<th>Waktu Berangkat</th>
								<th>Waktu Kembali</th>
								<th>Waktu Request</th>
								<th>Tujuan</th>
								<th>Keperluan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$no = 1;
							foreach($pending->result() as $row){
						?>
                            <tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->TGL_KEMBALI; ?></td>
								<td><?php echo $row->WAKTU_REQUEST; ?></td>
								<td><?php echo $row->TUJUAN; ?></td>
								<td><?php echo $row->KEPERLUAN; ?></td>
							</tr>
							<?php
								$no++;} 
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