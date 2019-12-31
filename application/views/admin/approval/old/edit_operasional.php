<script src="<?php echo base_url();?>asset/js/core/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('.zadd').click(function(){
		var add=$(this).closest('td').children('span').attr('id');
		var a=add.split("^");
		// Tambahan Penyesuaian dari Select Option
		var j = document.getElementById("jenis").value;
		var ref;
		if(j==1){
			ref = document.getElementById('zdrop');
			var t = document.getElementById('penumpang').value;
			var check = t+a[3];
			if(check>=5){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kendaraan sudah penuh!'
				});
			}else{
				detail(ref,a);
				$(this).fadeOut(500,function(){
					delRow(this);
				});
				sum();
			}
		}else if(j==2){
			ref = document.getElementById('zdrop2');
			detail(ref,a);
			$(this).fadeOut(500,function(){
					delRow(this);
			});
		}else{
			console.log(j);
		}
		// End Tambahan
	});
});
function detail(ref,a){
	var row = ref.insertRow(-1);
	var html = '<a href="" onclick="return false;"><i class="material-icons">delete_forever</i></a><input type="hidden" name="request_baru[]" value=';
	row.insertCell(0).innerHTML = html+''+a[0]+'>';
	row.insertCell(1).innerHTML = a[1];
	row.insertCell(2).innerHTML = a[2];
	row.insertCell(3).innerHTML = a[3];
}
function sum(){
	var ref = document.getElementById('zdrop');
	var p = 0;
	for(var r = 0; r<ref.rows.length; r++){
		var cell = parseInt(ref.rows[r].cells[3].innerHTML);
		p += isNaN(cell) ? 0 : cell;
	}
	document.getElementById('penumpang').value = "Jumlah Penumpang: "+p+" Orang";
}
function delRow(a){
	var i = a.parentNode.parentNode.rowIndex;
	document.getElementById('ztable').deleteRow(i);
}
function hideComp(){
	var o = document.getElementById("jenis").value;
	if(o==1){
		$('#operasional').fadeIn(500);
		$('#reimburse').hide();
	}else{
		$('#operasional').hide();
		$('#reimburse').fadeIn(500);
	}
}
console.log(document.getElementById('zdrop'));
</script>
<?php 
	$t = $transaksi->row();
	// $j = ($jenis=="Kendaraan"?1:2);
	if($jenis=="Kendaraan"){
		$j = 1;
		$d = "display:inherit";
	}else{
		$j = 2;
		$d = "display:none";
	}
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12">
			  <div class="card">
				<div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">crop_rotate</i>
                  </div>
                  <h4 class="card-title">Transaksi Operasional</h4>
                </div>
				<!-- isi dengan table atau tampilan -->
                <div class="card-body">
					<div class="form-group">
                      <label class="bmd-label-floating">Jenis Operasional</label>
                      <select name="jenis" id="jenis" class="selectDisable2" style="width:80%">
						<option value="<?php echo $j;?>"><?php echo $jenis;?></option>
					  </select>
                    </div>
				</div>
			  </div>
			</div>
			<div class="col-md-7">
			  <!------------------- EDIT OPERASIONAL -------------------->
			  <div class="card" id="operasional">
			    <div class="card-header card-header">
                  <h4 class="card-title">Operasional Kendaraan</h4>
                </div>
				<div class="card-body">
				<?php 
					echo form_open('approval/edit_op/');
				?>
				 <div class="row">
                    <div class="col-lg-3 col-md-4">
                      <ul class="nav nav-pills nav-pills-warning flex-column" role="tablist">
						<li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#link_k" role="tablist">Kendaraan</a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#link_d1" role="tablist" onclick="sum();">Details</a>
                        </li>
                      </ul>
                    </div>
					<div class="col-md-8">
                      <div class="tab-content">
                        <div class="tab-pane active" id="link_k">
							<div class="form-group">
							  <input type="text" class="form-control" name="no_trans" value="<?php echo $t->ID_PEMINJAMAN;?>"readonly>
							</div>
							<div class="form-group">
							  <label class="bmd-label-floating">Kendaraan</label>
							  <input type="hidden" name="kendaraan_lama" value="<?php echo $t->NO_POLISI;?>">
							  <select name="kendaraan_baru" class="select2" style="width:80%" required>
								<option value="<?php echo $t->NO_POLISI;?>" selected><?php echo $t->NO_POLISI." - ".$t->NAMA_KENDARAAN;?></option>
								<?php 
								foreach($mobil_aktif->result() as $m){
									echo"<option value='".$m->NO_POLISI."'>".$m->NO_POLISI." - ".$m->NAMA_KENDARAAN."</option>";
								}
								?>
							  </select>
							</div>
							<div class="form-group">
							  <label for="keterangan">Keterangan</label>
							  <input type="text" class="form-control" name="keterangan" value="<?php echo $t->KETERANGAN;?>">
							</div>
						</div>
						<div class="tab-pane" id="link_d1">
						 <div class="table-responsive">
							<table class="table table-active" id="zdrop">
							 <thead>
							  <tr>
							   <th>#</th>
							   <th>Pemohon</th>
							   <th>Tujuan</th>
							   <th>Penumpang</th>
							  </tr>
							 </thead>
							 <tbody>
							  <!--- Detail Lama-->
							  <?php foreach($detail->result() as $l){ ?>
							  <tr style="display:none">
								<td>
									<input type="hidden" name="request_lama[]" value="<?php echo $l->ID_REQUEST;?>"></a>
								</td>
								<td><?php echo $l->NAMA;?></td>
								<td><?php echo $l->TUJUAN;?></td>
								<td><?php echo $l->PENUMPANG;?></td>
							  </tr>
							  <?php } ?>
							  <!-- End Detail Lama---->
							  
							  <!-- Detail Baru---->
							  <?php foreach($detail->result() as $d){ ?>
							  <tr>
								<td>
									<a href="" onclick="return false;"><i class="material-icons">delete_forever</i></a><input type="hidden" name="request_baru[]" value="<?php echo $d->ID_REQUEST;?>"></a>
								</td>
								<td><?php echo $d->NAMA;?></td>
								<td><?php echo $d->TUJUAN;?></td>
								<td><?php echo $d->PENUMPANG;?></td>
							  </tr>
							  <?php } ?>
							  <!-- End Detail Baru-->
							 </tbody>
							</table>
						 </div>
						 <div class="form-group">
						  <input type="text" class="form-control" id="penumpang" readonly>
						 </div>
						 <div class="form-group">
						  <button class="btn btn-warning" type="submit">
							  <span class="btn-label">
								<i class="material-icons">done_all</i>
							  </span>
							  Update
						  </button>
						  <a href="<?php echo base_url()."approval/#operasional";?>" class="btn btn-default">
							<span class="btn-label">
								<i class="material-icons">reply_all</i>
							</span>Cancel
						  </a>
						 </div>
						</div>
					  </div>
					</div>
				 </div>
				<?php echo form_close();?>
				</div>
			  </div>
			  <!-------------------------------- EDIT REIMBURSE  --------------------------------->
			  <div class="card" id="reimburse" style="display:none;">
			    <div class="card-header card-header">
                  <h4 class="card-title">Operasional Reimburse</h4>
                </div>
				<div class="card-body">
				<?php echo form_open_multipart('approval/edit_reimburse/'); ?>
				 <div class="row">
                    <div class="col-lg-3 col-md-4">
                      <ul class="nav nav-pills nav-pills-warning flex-column" role="tablist">
						<li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#link_r" role="tablist">Reimburse</a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#link_d2" role="tablist">Details</a>
                        </li>
                      </ul>
                    </div>
					<div class="col-md-8">
                      <div class="tab-content">
                        <div class="tab-pane active" id="link_r">
							<div class="form-group">
							  <input type="text" class="form-control" name="no_reimburse" value="<?php echo $t->ID_REIMBURSE;?>" readonly>
							</div>
							<div class="form-group">
							  <label for="keterangan">Keterangan</label>
							  <input type="text" class="form-control" name="keterangan" value="<?php echo $t->KETERANGAN;?>" required="true">
							</div>
							<div class="form-group">
							  <label for="nominal">Nominal</label>
							  <input type="text" class="form-control" name="nominal" value="<?php echo $t->NOMINAL;?>" required>
							</div>
							<div class="form-group">
							  <label class="bmd-label-floating">Tanggal Pemberian</label>
							  <input type="text" class="form-control berangkatpicker" name="tgl_pemberian" value="<?php echo $t->TGL_PEMBERIAN;?>">
							</div>
							<div class="form-group">
								<label for="lampiran">Lampiran</label>
								<div class="custom-file">
								  <input type="file" class="file-input" id="lampiran" name="lampiran" <?php echo $t->LAMPIRAN;?>>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="link_d2">
						 <div class="table-responsive">
							<table class="table table-active" id="zdrop2">
							 <thead>
							  <tr>
							   <th>#</th>
							   <th>Pemohon</th>
							   <th>Tujuan</th>
							   <th>Penumpang</th>
							  </tr>
							 </thead>
							 <tbody>
							  <!--- Detail Lama-->
							  <?php foreach($detail->result() as $l){ ?>
							  <tr style="display:none">
								<td>
									<input type="hidden" name="request_lama[]" value="<?php echo $l->ID_REQUEST;?>"></a>
								</td>
								<td><?php echo $l->NAMA;?></td>
								<td><?php echo $l->TUJUAN;?></td>
								<td><?php echo $l->PENUMPANG;?></td>
							  </tr>
							  <?php } ?>
							  <!-- End Detail Lama---->
							  
							  <!-- Detail Baru---->
							  <?php foreach($detail->result() as $d){ ?>
							  <tr>
								<td>
									<a href="" onclick="return false;"><i class="material-icons">delete_forever</i></a><input type="hidden" name="request_baru[]" value="<?php echo $d->ID_REQUEST;?>"></a>
								</td>
								<td><?php echo $d->NAMA;?></td>
								<td><?php echo $d->TUJUAN;?></td>
								<td><?php echo $d->PENUMPANG;?></td>
							  </tr>
							  <?php } ?>
							  <!-- End Detail Baru-->
							 </tbody>
							</table>
						 </div>
						 <div class="form-group">
						  <button class="btn btn-warning" type="submit">
							  <span class="btn-label">
								<i class="material-icons">done_all</i>
							  </span>
							  Update
						  </button>
						  <a href="<?php echo base_url()."approval";?>" class="btn btn-default">
							<span class="btn-label">
								<i class="material-icons">reply_all</i>
							</span>Cancel
						  </a>
						 </div>
						</div>
					  </div>
					</div>
				 </div>
				<?php echo form_close();?>
				</div>
			  </div>
			</div>
			
			  <!-------------------------------- DETAILS  --------------------------------->
			<div class="col-md-5">
			  <div class="card">
				<div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">loupe</i>
                  </div>
                  <h4 class="card-title">Details Overview</h4>
                </div>
				<div class="card-body">
				 <div class="table-responsive">
				  <table class="table table-striped table-sm" id="ztable">
					<thead>
						<tr>
						 <th class="text-center">Pemohon</th>
						 <th>Tujuan</th>
						 <th>Penumpang</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($request->result() as $r){ ?>
						<tr>
						 <td>
							<span class="zadd" id="<?php echo $r->ID_REQUEST;?>^<?php echo $r->NAMA;?>^<?php echo $r->TUJUAN;?>^<?php echo $r->PENUMPANG;?>">
								<?php
									echo "<a href='' onclick='return false;'> <i class='material-icons'>add_circle</i></a>&nbsp;";
									echo $r->NAMA;
								?>
							</span>
						 </td>
						 <td><?php echo $r->TUJUAN;?></td>
						 <td><?php echo $r->PENUMPANG;?></td>
						</tr>
					<?php } ?>
					</tbody>
				  </table>
				 </div>
				</div>
			  </div>
			</div>
		</div>
	</div>