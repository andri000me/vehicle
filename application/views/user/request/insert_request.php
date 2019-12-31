<script src="<?php echo base_url();?>asset/js/core/jquery.min.js"></script>
<script type="text/javascript">
function check_p(){
	var val = document.getElementById('penumpang');
	if(val.value>7){
		Swal.fire({
			icon: 'info',
			title: 'Oops...',
			html: 'Penumpang melebihi batas!!',
			closeModal: false
		}).then(function(){
			Swal.close();
			val.focus();
			val.select();
		});
	}
}
</script>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <!---------------------------------------------------------------------------------------------------- -->
<div class="content">
	<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
		 <div class="card card-nav-tabs">
         <?php include "header.php";?>
		  <div class="card-body">
		  <?php echo form_open('request/index');?>
           <div class="row">&nbsp;</div>
		    <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">Tanggal Berangkat</label>
                <input type="text" class="form-control berangkatpicker" value="<?php echo date('Y-m-d');?>" name="date">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">Tanggal Kembali</label>
                <input type="text" class="form-control kembalipicker" value="<?php echo date('Y-m-d');?>" name="date1">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="bmd-label-floating">Jumlah Penumpang</label>
                <input type="text" class="form-control" name="jml_penumpang" maxlength="1" value="1" id="penumpang" onchange="check_p();"required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="status">Status Dinas</label>
                <select id="status" name="id_tipe_spj" class="select2 form-control">
				  <?php 
					  for($i=1;$i<3;$i++){
						  echo "<option value='$i'>".spj($i)."</option>";
					  }
				  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Keterangan Tujuan</label>
                <div class="form-group">
                  <textarea class="form-control" rows="2" name="ket_tujuan" required></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Keperluan</label>
                <div class="form-group">
                  <textarea class="form-control" rows="2" name="keperluan" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">OK</button>
          <button type="reset" class="btn btn-primary">Reset</button>
					<?php echo form_close();?>
			</div>
			  </div>
			</div>
	</div>
	</div>