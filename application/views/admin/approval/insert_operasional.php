<script src="<?php echo base_url();?>asset/js/core/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function hideComp(){
	var o = document.getElementById("jenis").value;
	// console.log(o);
	if(o==1){
		$('#operasional').fadeIn(500);
		$('#reimburse').hide();
		$('#voucher').hide();
	}else if(o==2){
		$('#operasional').hide();
		$('#reimburse').fadeIn(500);
		$('#voucher').hide();
	}else{
		$('#operasional').hide();
		$('#reimburse').hide();
		$('#voucher').fadeIn(500);
	}
}
</script>
<style>
* {
  box-sizing: border-box;
}

#cari {
  width: 100%;
  font-size: 12px;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 15px;
  margin-bottom: 10px;
}

#detail {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#detail li a {
  border: 1px solid #ecfcff;
  background-image: linear-gradient(to left, #33b5e5 , #00d4ff);
  border-radius: 10px;
  margin-top: -1px; /* Prevent double borders */
  background-color: #5edfff;
  padding: 8px;
  text-decoration: none;
  color: white;
  display: block
}

#detail li a:hover:not(.header) {
  background-color: #b2fcff;
}
</style>
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
			  <!------------------- INSERT OPERASIONAL -------------------->
			<div class="col-md-8">
			  <div class="card" id="operasional" style="display:none">
			    <div class="card-header card-header">
                  <h4 class="card-title">Operasional Kendaraan</h4>
                </div>
				<div class="card-body">
				<?php echo form_open('approval/insert_op/'); ?>
				 <div class="row">
                    <div class="col-lg-3 col-md-6">
                      <ul class="nav nav-pills nav-pills-primary flex-column" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">Kendaraan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">Details</a>
                        </li>
                      </ul>
                    </div>
					<div class="col-md-8">
                      <div class="tab-content">
                        <div class="tab-pane active" id="link110">
						<div class="form-group">
						  <label class="bmd-label-floating">Kendaraan</label>
						  <select name="kendaraan" class="select2" style="width:80%">
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
						  <label for="keteranganId">Keterangan</label>
						  <input type="text" class="form-control" name="keterangan" id="keteranganId">
						</div>
						</div>
						<div class="tab-pane" id="link111">
						<div class="form-group" id="column">
						  <label for="textCol">Keterangan</label><br>
						  <textarea class="form-control" rows="3" name="detail" id="textCol" readonly></textarea>
						</div>
						<div class="form-group">
						  <button class="btn btn-success" type="submit">
							  <span class="btn-label">
								<i class="material-icons">check</i>
							  </span>
							  Submit
						  </button>
						  <button class="btn btn-danger" type="reset">
							  <i class="material-icons">close</i> Clear
						  </button>
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
			<div class="col-md-4">
			  <div class="card">
				<div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">loupe</i>
                  </div>
                  <h4 class="card-title">List Details</h4>
                </div>
				<div class="card-body">
				 <input type="text" id="cari" onkeyup="myFunction()" placeholder="Cari request">
				 <ul id="detail">
					 <?php foreach($request->result() as $r){
						echo "<li><a href='#'>".$r->NAMA.": ".$r->TUJUAN."</a></li>";
					 }?>
					 <li><a href="#">Adele</a></li>
					 <li><a href="#">Billy</a></li>
				 </ul>
				</div>
			  </div>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
$(function(init){
	$('#detail').sortable({
		connectWith: "#detail"
	});
	function init(){
		$('#column').droppable({
			accept: '#detail',
			drop: function(event, ui){
				$(this).find('#textCol').val('');
				$(this).find('#textCol').val((ui.sortable.text()));
			}
		});
	}
});
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("cari");
    filter = input.value.toUpperCase();
    ul = document.getElementById("detail");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>