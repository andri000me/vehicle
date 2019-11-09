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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
                  <h4 class="card-title">List Karyawan</h4>
                </div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class="text-primary">
							<tr>
								<th>NID</th>
								<th>Nama Karyawan</th>
								<th>Jabatan</th>
								<th>Divisi</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($karyawan->result() as $row){
							?>
							<tr>
								<td>
								<span class="zedit" id="<?php echo $row->NID;?>^<?php echo $row->NAMA;?>^<?php echo $row->KODE_JABATAN;?>^<?php echo $row->NAMA_JABATAN;?>^<?php echo $row->ID_KARYAWAN;?>">
								<?php
									echo "<a href='' data-toggle='modal' data-target='#edit'>".$row->NID."</a>";
								?>
								</span>
								</td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->NAMA_JABATAN; ?></td>
								<td><?php echo $row->DIVISI; ?></td>
								<td>
									<span class="zdelete" id="<?php echo $row->ID_KARYAWAN;?>^<?php echo $row->NAMA;?>">
									<button class="btn btn-primary btn-fab btn-round btn-sm" data-toggle="modal" data-target="#delete">
									<i class="material-icons">clear</i>
									</button>
									</span>
								</td>                                    
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- Delete Modal -->
	  <div class="modal fade" id="delete" tabindex="-1">
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
	  <!-- Insert Modal --> 
	 <div id="insert" class="modal fade" tabindex="-10">
		<div class="modal-dialog modal-notify modal-warning" role="document">
		  <div class="modal-content">
		    <div class="modal-header text-center">
				<h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true" class="white-text">&times;</span>
				</button>
		    </div>
			<div class="modal-body">
			<?php echo form_open('master/insert_karyawan');?>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">how_to_reg</i>
							  </span>
							</div>
							<input type="text" class="form-control" placeholder="NID" name="nid" required/>
						</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">person_pin</i>
							  </span>
							</div>
							<input type="text" class="form-control" placeholder="Nama Karyawan" name="nama" required/>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">beenhere</i>
							  </span>
							</div>
							<select name="jabatan" class="select2" style="width:80%">
								<option></option>
							  <?php 
							  foreach($id_jab->result() as $jbt){
								  echo "<option value='".$jbt->KODE_JABATAN."'>".$jbt->NAMA_JABATAN."</option>";
							  }
							  ?>
							</select>
						</div>
					</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="submit" class="btn btn-outline-success waves-effect">Submit</button>&nbsp;&nbsp;
				<button type="submit" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>
			<?php echo form_close();?>
		  </div>
		</div>
	  </div>
	  <!-- End Insert -->
	  
	  <!-- Edit Modal --> 
	 <div id="edit" class="modal fade" tabindex="-17">
		<div class="modal-dialog modal-notify modal-warning" role="document">
		  <div class="modal-content">
		    <div class="modal-header text-center">
				<h4 class="modal-title white-text w-100 font-weight-bold py-2">Update Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true" class="white-text">&times;</span>
				</button>
		    </div>
			<div class="modal-body">
			<?php echo form_open('master/edit_karyawan');?>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">how_to_reg</i>
							  </span>
							</div>
							<input type="hidden" id="id" name="id">
							<input type="text" class="form-control" id="nid" name="nid" required/>
						</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">person_pin</i>
							  </span>
							</div>
							<input type="text" class="form-control" id="nama" name="nama" required/>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">beenhere</i>
							  </span>
							</div>
							<select name="jabatan" class="select2" style="width:80%" id="sEdit">
							  <?php 
							  foreach($id_jab->result() as $jbt){
								  echo "<option value='".$jbt->KODE_JABATAN."'>".$jbt->NAMA_JABATAN."</option>";
							  }
							  ?>
							</select>
						</div>
					</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="submit" class="btn btn-outline-success waves-effect">Submit</button>&nbsp;&nbsp;
				<button type="submit" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Cancel</button>
            </div>
			<?php echo form_close();?>
		  </div>
		</div>
	  </div>
	  <!-- End Edit -->
	<!--<div class="fixed-plugin">
		<a href="#" data-toggle="modal" data-target="#insert">
			<i class="material-icons">near_me</i>
		</a>
	</div>-->
	