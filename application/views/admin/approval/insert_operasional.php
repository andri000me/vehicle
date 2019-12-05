<script src="<?php echo base_url();?>asset/js/core/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('.zadd').click(function(){
		var add=$(this).closest('td').children('span').attr('id');
		var a=add.split("^");
		var ref = document.getElementById('zdrop');
		var t = document.getElementById('penumpang').value;
		var html = '<a href="" onclick="return false;"><i class="material-icons">delete_forever</i></a><input type="hidden" name="request[]" value=';
		if(t==5){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Kendaraan sudah penuh!'
			});
		}else{
			var row = ref.insertRow(-1);
			row.insertCell(0).innerHTML = html+''+a[0]+'>';
			row.insertCell(1).innerHTML = a[1];
			row.insertCell(2).innerHTML = a[2];
			row.insertCell(3).innerHTML = a[3];
			// Execute Delete Table
			$(this).fadeOut(500,function(){
				delRow(this);
			});
		}
		// Execute Sum Cell
		sum();
	});
});
function sum(){
	var ref = document.getElementById('zdrop');
	var p = 0;
	for(var r = 0; r<ref.rows.length; r++){
		var cell = parseInt(ref.rows[r].cells[3].innerHTML);
		p += isNaN(cell) ? 0 : cell;
	}
	// console.log("p :"+p+"cell :"+cell);
	document.getElementById('penumpang').value = p;
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
		$('#voucher').hide();
		var php = '<?php echo $kode_k;?>';
	}else if(o==2){
		$('#operasional').hide();
		$('#reimburse').fadeIn(500);
		$('#voucher').hide();
		var php = '<?php echo $kode_r;?>';
	}else{
		$('#operasional').hide();
		$('#reimburse').hide();
		$('#voucher').fadeIn(500);
		var php = '<?php echo $kode_v;?>';
	}
	$('#detail').fadeIn(500);
	document.getElementById('no_trans').value = php;
}
</script>
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
                      <select name="jenis" class="select2" style="width:80%" id="jenis" onchange="hideComp()">
						<option></option>
						<option value="1">Kendaraan</option>
						<option value="2">Reimburse</option>
						<option value="3">Voucher Taxi</option>
					  </select>
                    </div>
				</div>
			  </div>
			</div>
			<div class="col-md-7">
			  <!------------------- INSERT OPERASIONAL -------------------->
			  <div class="card" id="operasional" style="display:none">
			    <div class="card-header card-header">
                  <h4 class="card-title">Operasional Kendaraan</h4>
                </div>
				<div class="card-body">
				<?php echo form_open('approval/insert_op/'); ?>
				 <div class="row">
                    <div class="col-lg-3 col-md-4">
                      <ul class="nav nav-pills nav-pills-primary flex-column" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#link111" role="tablist">Details</a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#link110" role="tablist">Kendaraan</a>
                        </li>
                      </ul>
                    </div>
					<div class="col-md-8">
                      <div class="tab-content">
                        <div class="tab-pane" id="link110">
						<div class="form-group">
						  <input type="text" class="form-control" name="no_trans" id="no_trans" readonly>
						</div>
						<div class="form-group">
						  <label class="bmd-label-floating">Kendaraan</label>
						  <select name="kendaraan" class="select2" style="width:80%" required>
							<option></option>
							<?php 
							foreach($mobil_aktif->result() as $m){
								echo"<option value='".$m->NO_POLISI."'>".$m->NO_POLISI." - ".$m->NAMA_KENDARAAN."</option>";
							}
							?>
						  </select>
						</div>
						<br>
						<div class="form-group">
						  <label for="keterangan">Keterangan</label>
						  <input type="text" class="form-control" name="keterangan" id="keterangan">
						</div>
						<div class="form-group">
						  <button class="btn btn-primary" type="submit">
							  <span class="btn-label">
								<i class="material-icons">check</i>
							  </span>
							  Submit
						  </button>
						</div>
						</div>
						<div class="tab-pane active" id="link111">
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
							</table>
						 </div>
						 <div class="form-group">
						  <input type="text" class="form-control" name="penumpang" id="penumpang" placeholder="Jumlah Penumpang" readonly>
						 </div>
						</div>
					  </div>
					</div>
				 </div>
				<?php echo form_close();?>
				</div>
			  </div>
			  <!-------------------------------- INSERT REIMBURSE  --------------------------------->
			  <div class="card" id="reimburse" style="display:none">
			    <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">move_to_inbox</i>
                  </div>
                  <h4 class="card-title">Reimburse</h4>
                </div>
				<div class="card-body">
				<?php echo form_open('approval/insert_reimburse/'); ?>
					<div class="form-group">
                    </div>
				<?php echo form_close();?>
				</div>
			  </div>
			  <!-------------------------------- INSERT VOUCHER  --------------------------------->
			  <div class="card" id="voucher" style="display:none">
			    <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">monetization_on</i>
                  </div>
                  <h4 class="card-title">Voucher Taxi</h4>
                </div>
				<div class="card-body">
				<?php echo form_open('approval/insert_voucher/'); ?>
					<div class="form-group">
                    </div>
				<?php echo form_close();?>
				</div>
			  </div>
			</div>
			<!-------------------------------- DETAILS  --------------------------------->
			<div class="col-md-5" id="detail" style="display:none">
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