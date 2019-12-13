<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!----------------------------------------------------------------------------------------------------------------------------->
			<div class="card">
				<div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">move_to_inbox</i>
                  </div>
                  <h4 class="card-title">Reimburse</h4>
                </div>
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="opTable">
						<thead class="text-primary">
							<tr>
								<th>NO</th>
								<th>JENIS_REIMBURSE</th>
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
								foreach($reimburse->result() as $row){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->JENIS; ?></td>
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