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
					<table class="table table-hover" id="dataTables-id" style="width:100%">
						<thead class="text-primary">
							<tr>
								<th>NO</th>
								<th>TGL PEMBERIAN</th>
								<th>PEMOHON</th>
								<th>WAKTU BERANGKAT</th>
								<th>KEPERLUAN</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($reimburse->result() as $row){
							?>
							<tr>
								<td><?php echo $row->ID_REIMBURSE; ?></td>
								<td><?php echo $row->TGL_PEMBERIAN; ?></td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->KEPERLUAN; ?></td>
								<td>
									<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/edit_trans/'.$row->ID_REIMBURSE;?>" class="btn btn-danger btn-fab btn-round btn-sm">
										<i class="material-icons">edit</i>
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>