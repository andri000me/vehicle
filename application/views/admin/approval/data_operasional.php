<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
			  <div class="card">
				<div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">crop_rotate</i>
                  </div>
                  <h4 class="card-title">Operasional</h4>
                </div>
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="opTable" style="width:100%">
						<thead class="text-primary">
							<tr>
								<th></th>
								<th>No</th>
								<th>Keterangan</th>
								<th>Supir</th>
								<th>Kendaraan</th>
								<th>Waktu Berangkat</th>
								<th>Status</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($approval->result() as $row){
							?>
							<tr>
								<td></td>
								<td><?php echo $row->ID_PEMINJAMAN; ?></td>
								<td><?php echo $row->KETERANGAN; ?></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->NO_POLISI."- ".$row->NAMA_KENDARAAN; ?></td>
								<td><?php echo $row->TGL_PEMINJAMAN; ?></td>
								<td><?php echo oprStat($row->STATUS); ?></td>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/edit_trans/'.$row->ID_PEMINJAMAN;?>" class="btn btn-danger btn-fab btn-round btn-sm">
										<i class="material-icons">edit</i>
									</a>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>