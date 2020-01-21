<script src="<?php echo base_url();?>asset/js/core/jquery.min.js"></script>
<script type="text/javascript">
function pop(id){
		Swal.fire({
			title: 'Are you sure?',
			// text: 'Transaksi reimburse akan direvisi',
			text: 'Transaksi reimburse akan diedit',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes'
		}).then((result)=>{
			if(result.value){
				Swal.fire(
					// 'Revised',
					'Edited',
					// 'Transaksi sukses direvisi!',
					'Transaksi sukses diedit!',
					'success'
				).then(function(){
					var url = window.location.origin;
					var path = window.location.pathname;
					var redirect = url+''+path+'/edit_trans/'+id;
					window.location = redirect;
				});
			}
		});
	}
</script>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
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
								<th>LAMPIRAN</th>
								<th>Opsi</th>
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
								<td><?php echo anchor('./upload/reimburse/'.$row->LAMPIRAN,$row->LAMPIRAN,array('target'=>'blank'));?></td>
								<td>
									<button class="btn btn-warning btn-fab btn-round btn-sm" rel="tooltip" data-placement="top" title="Edit" onclick="return pop('<?= $row->ID_REIMBURSE;?>');">
										<i class="material-icons">update</i>
									</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>