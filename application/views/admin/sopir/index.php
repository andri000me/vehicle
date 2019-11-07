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
		document.getElementById('id').value = a[5];
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
		<div class="col-md-8">
			<div class="card">
				<div class="card-header card-header-primary">
                  <h4 class="card-title">List Driver Kendaraan</h4>
                </div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class="text-primary">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Telegram</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
						</thead>
						<tbody>
						<?php foreach($datasopir->result() as $row)
						{ ?>
							<tr>
								<td>
								<span class="zedit" id="<?php echo $row->NID_SOPIR;?>^<?php echo $row->NAMA;?>^<?php echo $row->CHAT_ID;?>^<?php echo $row->STATUS;?>^<?php echo sopirStat($row->STATUS);?>^<?php echo $row->ID_SOPIR;?>">
								<?php
									echo "<a href='' onclick='hideAdd(); return false;'>".$row->NID_SOPIR."</a>";
								?>
								</span>
								</td>
								<td><?php echo $row->NAMA;?></td>
								<td><?php echo $row->CHAT_ID;?></td>
								<td><?php echo sopirStat($row->STATUS);?></td>
								<td>
									<span class="zdelete" id="<?php echo $row->ID_SOPIR;?>^<?php echo $row->NID_SOPIR;?>">
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
				<?php echo form_open('master/insert_sopir');?>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">how_to_reg</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="NID" name="nid" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">face</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Nama" name="nama" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">near_me</i>
					  </span>
					</div>
					<input type="text" class="form-control" placeholder="Telegram" name="telegram" required/>
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
				<?php echo form_open('master/edit_sopir');?>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">vpn_key</i>
					  </span>
					</div>
					<input type="hidden" name="id" id="id">
					<input type="text" class="form-control" name="nid" id="nid" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">face</i>
					  </span>
					</div>
					<input type="text" class="form-control" value="" name="nama" id="nama" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">near_me</i>
					  </span>
					</div>
					<input type="text" class="form-control" value="" name="telegram" id="telegram" required/>
				  </div>
				  <div class="input-group">
					<div class="input-group-prepend">
					  <span class="input-group-text">
						<i class="material-icons">check</i>
					  </span>
					</div>
					<select name="status" class="form-control" id="sEdit">
						<option disabled>------------------------------------------------------------</option>
						 <?php 
						 for($i=0;$i<4;$i++){
							 echo "<option value=".$i.">".sopirStat($i)."</option>";
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