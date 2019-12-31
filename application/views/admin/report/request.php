<script src="<?php echo base_url();?>asset/js/core/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	var dat = document.getElementByName('date').text;
	console.log(dat);
});
</script>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-4 col-md-12">
			  <div class="card">
				<div class="card-header card-header-info text-center">
					<h4 class="card-title">Report</h4>
				</div>
				<div class="card-body">
				<?php echo form_open('report/request');?>
					<div class="form-group">
						<label class="bmd-label-floating">Tanggal Awal</label>
						<input type="text" class="form-control berangkatpicker" value="<?php echo date('Y-m-01');?>" name="date">
					</div>
					<div class="form-group">
						<label class="bmd-label-floating">Tanggal Akhir</label>
						<input type="text" class="form-control kembalipicker" value="<?php echo date('Y-m-d');?>" name="date1">
					</div>
				</div>
				<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-info btn-round">OK</button>&nbsp;&nbsp;
						<?php echo anchor('report/request_print','Print',array('class'=>'btn btn-round','target'=>'blank'));?>
				</div>
                <?php echo form_close();?> 
              </div>
			</div>
			<div class="col-lg-8 col-md-12">
			<div class="card">
				<div class="card-header card-header-info text-center">
					<h4 class="card-title">List Request</h4>
					<p class="card-category">Data Request pada
					<?php //echo $tgl_awal." sampai ".$tgl_akhir; ?>
					<?php 
						$tgl = explode('|',$tgl);
						echo $tgl[0]." sampai ".$tgl[1]; 
					?>
					</p>
				</div>
				<div class="card-body">
					<div class="card-body table-responsive">
						<table class="table table-hover" id="dataTables-id">
							<thead class="text-info">
								<tr>
									<th>#</th>
									<th>Nama</th>
									<th>Tgl Berangkat</th>
									<th>Keperluan</th>
									<th>Tujuan</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
									// foreach($requestx->result() as $row){
									foreach($op as $x){
										$k = explode('^',$x);
								?>
								<!--<tr>
									<td> <?php echo $no; ?></td>
									<td> <?php echo $row->NAMA; ?></td>
									<td> <?php echo $row->TGL_BERANGKAT; ?></td>
									<td> <?php echo $row->KEPERLUAN; ?></td>
									<td> <?php echo $row->TUJUAN; ?></td>
									<td> <?php echo reqStat($row->STATUS); ?></td>
								</tr>-->
								<tr>
									<td> <?php echo $no; $no++; ?></td>
									<td> <?php echo $k[0]; ?></td>
									<td> <?php echo $k[1]; ?></td>
									<td> <?php echo $k[2]; ?></td>
									<td> <?php echo $k[3]; ?></td>
									<td> <?php echo reqStat($k[4]); ?></td>
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
