<script src="<?php echo base_url();?>asset/js/core/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
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
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($ops->result() as $row){
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
									<?php if($row->STATUS<>3){ ?>
										<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/edit_trans/'.$row->ID_PEMINJAMAN;?>" class="btn btn-warning btn-fab btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Task">
											<i class="material-icons">edit</i>
										</a>
										<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/kembali/'.$row->ID_PEMINJAMAN;?>" class="btn btn-success btn-fab btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="End Task">
											<i class="material-icons">flight_land</i>
										</a>
									<?php }else{ ?>
										  <div class="form-check text-center">
											<label class="form-check-label">
											  <input class="form-check-input" type="checkbox" value="" checked disabled>
											  <span class="form-check-sign">
												<span class="check"></span>
											  </span>
											</label>
										  </div>
									<?php } ?>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>