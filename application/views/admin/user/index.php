<script src="<?php echo base_url();?>asset/js/1.8.2.min.js"></script>
<script type="text/javascript">
//Mengambil data dari row
$(document).ready(function(){
	$('.zedit').click(function(){
		document.getElementById('edit').scrollIntoView();
		var edit=$(this).closest('td').children('span').attr('id');
		var a=edit.split("^");
		document.getElementById('username').value = a[0];
		var tuVal = a[1], tuText = a[2];
		var suVal = a[3], suText = a[4];
		var a=$('#sEdit').find('option').length, b=$('#sEdit2').find('option').length;
		if(a<=6){
			$('#sEdit').prepend('<option value='+tuVal+' selected="selected">'+tuText+'</option>');
		}else{
			$('#sEdit').find('option').get(0).remove();
			$('#sEdit').prepend('<option value='+tuVal+' selected="selected">'+tuText+'</option>');
		}
	});
});
$(document).ready(function(){
	$('.zdelete').click(function(){
		var del=$(this).closest('td').children('span').attr('id');
		var base_url = "<?php echo base_url();?>";
		var a=del.split("^");
		console.log(a[1]);
		document.getElementById('delId').href = base_url+'master/delete_sopir/'+a[0];
		document.getElementById('hnama').innerHTML = "Apakah Anda yakin akan menghapus data "+a[1]+" ?";
	});
});
</script>
<script type="text/javascript">

</script>
<script type="text/javascript">
function hideAdd(){
	$('#add').hide();
	$('#edit').show(500);
}
function hideEdit(){
	$('#add').show(500);
	$('#edit').hide();
}
</script>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <div class="content">
    <div class="container-fluid">
    <div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header card-header-primary">
                  <h4 class="card-title">List User</h4>
                </div>
				<div class="card-body">
					<div class="table-responsive">
					 <table class="table table-hover" id="dataTables-id">
						<thead class="text-primary">
						  <tr>
							<th>Username</th>
							<th>Nama</th>
							<th>Tipe</th>
							<th>Status</th>
							<th>Opsi</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						foreach($user->result() as $row){ 
						?>
						  <tr>
							<td>
								<span class="zedit" id="<?php echo $row->USERNAME;?>^<?php echo $row->TIPE_USER;?>^<?php echo userTipe($row->TIPE_USER);?>^<?php echo $row->STATUS;?>^<?php echo userStat($row->STATUS);?>">
								<?php
									echo "<a href='' onclick='hideAdd(); return false;'>".$row->USERNAME."</a>";
								?>
								</span>
							</td>
							<td><?php echo $row->NAMA;?></td>
							<td><?php echo userTipe($row->TIPE_USER);?></td>
							<td><?php echo userStat($row->STATUS);?></td>
							<td>
								<span class="zdelete" id="<?php echo $row->ID_USER;?>^<?php echo $row->USERNAME;?>">
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
		<!-- Add Form -->
		<div class="col-md-4" id="add">
			<div class="card card-profile">
				<div class="card-header card-header-rose">
                  <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-body">
				<?php echo form_open('master/insert_user');?>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">how_to_reg</i>
					  </span>
					</div>
					<?php
						foreach($id_jab->result() as $row)
							$karyawan_list[$row->ID_KARYAWAN] = $row->NID.' - '.$row->NAMA;
							echo form_dropdown('id_karyawan', $karyawan_list,'','class=form-control');
					?>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">person_pin</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Username" name="username" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">vpn_key</i>
					  </span>
					</div>
					<input type="password" class="form-control" placeholder="Password" name="password" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">supervisor_account</i>
					  </span>
					</div>
					<select name="tipe_user" class="form-control">
					  <?php 
					  for($i=1;$i<6;$i++){
						  echo "<option value='$i'>".userTipe($i)."</option>";
					  }
					  ?>
					</select>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">check</i>
					  </span>
					</div>
					<input type="hidden" class="form-control" name="status_user" value="1">
					<input type="text" class="form-control" value="Aktif" disabled/>
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
						<i class="material-icons">person_pin</i>
					  </span>
					</div>
					<input type="text" class="form-control" name="username" id="username" disabled/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">vpn_key</i>
					  </span>
					</div>
					<input type="password" class="form-control" name="password" id="password" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">supervisor_account</i>
					  </span>
					</div>
					<select name="status" class="form-control" id="sEdit">
					  <option disabled>------------------------------------------------------------</option>
					  <?php 
					  for($i=1;$i<6;$i++){
						  echo "<option value='$i'>".userTipe($i)."</option>";
					  }
					  ?>
					</select>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">check</i>
					  </span>
					</div>
					<select name="status" class="form-control" id="sEdit2">
					  <option disabled>------------------------------------------------------------</option>
					  <?php 
					  for($i=0;$i<4;$i++){
						  echo "<option value='$i'>".sopirStat($i)."</option>";
					  }
					  ?>
					</select>
				  </div>
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
<!-- /.end insert --> 
 