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
					<table class="table table-hover display" id="listTable" style="width:100%">
						<thead class="text-primary">
							<tr>
								<th></th>
								<th>Keterangan</th>
								<th>Supir</th>
								<th>Kendaraan</th>
								<th>Waktu Berangkat</th>
								<th class="none">Status</th>
								<th class="none">#</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($approval->result() as $row){
							?>
							<tr>
								<td></td>
								<td><?php echo $row->KETERANGAN; ?></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo "( ".$row->NO_POLISI.") ".$row->NAMA_KENDARAAN; ?></td>
								<td><?php echo $row->TGL_PEMINJAMAN; ?></td>
								<td><?php echo oprStat($row->STATUS); ?></td>
								<td>
								<?php
									echo anchor('approval/print_form/'.$row->ID_PEMINJAMAN, 'Print',  array('class' => 'btn2 btn2-important btn2-mini'));
									echo "&nbsp;";
									echo anchor('approval/edit_operasional/'.$row->ID_PEMINJAMAN, 'Edit', array('class' => 'btn2 btn2-warning btn2-mini'));
								?>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>