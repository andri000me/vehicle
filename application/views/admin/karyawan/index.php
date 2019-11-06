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
		document.getElementById('telegram').value = a[2];
		var opText = a[4], opVal = a[3];
		var f=$('#sEdit').find('option').length;
		if(f<=5){
			$('#sEdit').prepend('<option value='+opVal+' selected="selected">'+opText+'</option>');
		}else{
			$('#sEdit').find('option').get(0).remove();
			$('#sEdit').prepend('<option value='+opVal+' selected="selected">'+opText+'</option>');
		}
		// console.log(opVal);
	});
});
$(function(){
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
								<span class="zedit" id="<?php echo $row->NID;?>^<?php echo $row->NAMA;?>^<?php echo $row->JABATAN;?>^<?php echo $row->SUBDIT;?>">
								<?php
									echo "<a href='' onclick='hideAdd(); return false;'>".$row->NID."</a>";
								?>
								</span>
								</td>
								<td><?php echo $row->NAMA; ?></td>
								<td><?php echo $row->JABATAN; ?></td>
								<td><?php echo $row->SUBDIT; ?></td>
								<td>
									<span class="zdelete" id="<?php echo $row->NID;?>^<?php echo $row->NAMA;?>">
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
	</div>
 
 <!-- Insert Modal --> 
	  <div id="insert" class="modal fade" tabindex="-1" >
		<div class="modal-dialog modal-login" role="document">
		 <div class="modal-content">
		  <div class="card card-signup card-plain">
			<div class="modal-header">
			 <div class="card-header card-header-rose text-center">
				<button type="button" class="close" data-dismiss="modal">
				</button>
				<i class="material-icons">add_to_queue</i>
				<h5 class="card-title">Karyawan</h5>
			 </div>
			</div>
			<div class="modal-body">
			<?php echo form_open('master/insert_karyawan');?>
				<div class="card-body">
					<div class="form-group bmd-form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">near_me</i>
							  </span>
							</div>
							<input type="text" class="form-control" placeholder="NID" name="nid" required/>
						</div>
					</div>
					<div class="form-group bmd-form-group">
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="material-icons">near_me</i>
							  </span>
							</div>
							<input type="text" class="form-control" placeholder="Nama Karyawan" name="nama" required/>
						</div>
					</div>
				</div>
			<?php echo form_close();?>
			</div>
		   </div>
		 </div>
		</div>
	  </div>
										<?php 
                                             // //Menampilkan dropdown level
                                             // foreach($id_jab->result() as $row_jabatan)
                                             // $jabatan_list[$row_jabatan->ID_JABATAN] = $row_jabatan->JABATAN;
      
                                             // echo form_dropdown('id_jabatan', $jabatan_list, '0');
                                             // echo form_error('id_jabatan');
                                        ?>
                                    
	<!-- /.end insert -->
	<div class="fixed-plugin">
		<a href="#" data-toggle="modal" data-target="#insert">
			<i class="material-icons">near_me</i>
		</a>
	</div>