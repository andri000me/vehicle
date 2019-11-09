<script src="<?php echo base_url();?>asset/js/1.8.2.min.js"></script>
<script type="text/javascript">
//Mengambil data dari row
$(function(){
	$('.zedit').click(function(){
		document.getElementById('edit').scrollIntoView();
		var edit=$(this).closest('td').children('span').attr('id');
		var a=edit.split("^");
		document.getElementById('nid').value = a[0];
		document.getElementById('nama').value = a[1];
		document.getElementById('id').value = a[4];
		var opText = a[3], opVal = a[2];
		// Set value to list option from raw data
		$('#sEdit').val(opVal).trigger('change');
	});
});
$(function(){
	$('.zdelete').click(function(){
		var del=$(this).closest('td').children('span').attr('id');
		var base_url = "<?php echo base_url();?>";
		var a=del.split("^");
		console.log(a[1]);
		document.getElementById('delId').href = base_url+'master/delete_karyawan/'+a[0];
		document.getElementById('hnama').innerHTML = "Apakah Anda yakin akan menghapus data "+a[1]+" ?";
	});
});
</script>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 <div class="content">
    <div class="container-fluid">
    <div class="row">
	<a data-toggle="modal" data-target="#insert" class="made-with-mk">
		<div class="brand"><i class="material-icons">library_add</i></div>
		<div class="made-with">Tambah <strong>Karyawan</strong></div>
	</a>
		<div class="col-md-8">
		<!-- TABEL KENDARAAN  --------------------------------------------------------------------------------->
                	       <div class="judul_pjbs">
                    	      <?php 
					              echo anchor('master/detail_kendaraan_dinas','Detail Kendaraan Dinas', array('class' => 'btn2 btn2-warning btn2-small' ));
					         ?>
                           </div> <!--- End of div class judul_pjbs --->
			<div class="card">
				<div class="card-header card-header-primary">
                  <h4 class="card-title">List Kendaraan</h4>
                </div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class="text-primary">
							<tr>
								<th>Nomor Polisi</th>
								<th>Nama Kendaraan</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($kendaraan->result() as $row){  ?>
								<tr>
									<td><?php echo $row->NO_POLISI; ?></td>
									<td><?php echo $row->NAMA_KENDARAAN; ?></td>
									<td><?php echo carStat($row->STATUS); ?></td>
									<td>
									<?php
										echo anchor('master/edit_kendaraan/'.$row->ID_KENDARAAN, 'Edit', 'class="btn2 btn2-info btn2-mini"');
										echo anchor('master/delete_kendaraan/'.$row->ID_KENDARAAN, 'Hapus', 'class="btn2 btn2-danger btn2-mini"');
									?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Form -->
		<div class="col-md-4" id="add">
			<div class="card card-profile">
				<div class="card-header card-header-rose">
                  <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-body">
				<?php echo form_open('master/insert_kendaraan');?>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">looks_one</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">local_taxi</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Kendaraan" name="nama" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">ballot</i>
					  </span>
					</div>
					<select name="tipe_user" class="select2 form-control">
						<option></option>
					  <?php 
					  for($i=0;$i<6;$i++){
						  echo "<option value='$i'>".carStat($i)."</option>";
					  }
					  ?>
					</select>
				  </div>
                  <button type="submit" class="btn btn-outline-primary btn-round">Submit</a>
                </div>
				<?php echo form_close();?>
			</div>
		</div>
		<!-- End Add Form -->
		<!-- Edit Form -->
		<div class="col-md-4" id="edit" style="display:none">
			<div class="card card-profile">
				<div class="card-header card-header-warning">
                  <h4 class="card-title">Update Data</h4>
                </div>
                <div class="card-body">
				<?php echo form_open('master/edit_user');?>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">looks_one</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">local_taxi</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Kendaraan" name="nama" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">ballot</i>
					  </span>
					</div>
					<select name="tipe_user" class="select2 form-control">
						<option></option>
					  <?php 
					  for($i=0;$i<6;$i++){
						  echo "<option value='$i'>".carStat($i)."</option>";
					  }
					  ?>
					</select>
                  <button type="submit" class="btn btn-outline-warning btn-round">Update</button>
				  <button type="button" class="btn btn-outline-primary btn-round" onclick="hideEdit(); return false;">Cancel</button>
                </div>
				<?php echo form_close();?>
			</div>
		</div>
		<!-- End Edit Form -->
	</div>
	<!-- Classic Modal -->
	  <div class="modal fade" id="delete" tabindex="-1" role="">
		<div class="modal-dialog modal-login" role="document">
		  <div class="modal-content">
		  <div class="card card-signup card-plain">
			<div class="modal-header">
			  <div class="card-header card-header-danger text-center">
			    <i class="material-icons">clear</i>
			  </div>
			</div>
			<div class="modal-body">
			  <h4 class="text-center" id="hnama"></h4>
			</div>
			<div class="modal-footer">
			  <a class="btn btn-outline-primary btn-round" id="delId">Ya</a>
			  <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal">Tidak</button>
			</div>
		  </div>
		</div>
		</div>
	  </div>
	  <!--  End Modal -->
	</div>