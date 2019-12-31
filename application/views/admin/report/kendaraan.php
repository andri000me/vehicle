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
				<?php echo form_open('report/kendaraan');?>
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
						<button type="reset" class="btn btn-round">Reset</button>
				</div>
                <?php echo form_close();?> 
              </div>
			</div>
			<div class="col-lg-8 col-md-12" id="table">
			<div class="card">
				<div class="card-header card-header-info text-center">
					<h4 class="card-title">List Transaksi Kendaraan</h4>
					<p class="card-category">Data Transaksi Kendaraan pada
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
									<th>Nomor</th>
									<th>Sopir</th>
									<th>Kendaraan</th>
									<th>Keterangan</th>
									<th>Waktu Operasional</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// foreach($op->result() as $k){
									foreach($op as $x){
										$k = explode('^',$x);
								?>
								<!--<tr>
									<td> <?php echo $k->ID_PEMINJAMAN; ?></td>
									<td> <?php echo $k->NAMA; ?></td>
									<td> <?php echo $k->NAMA_KENDARAAN; ?></td>
									<td> <?php echo $k->KETERANGAN; ?></td>
									<td> <?php echo date('Y-m-d',strtotime($k->TGL_PEMINJAMAN)); ?></td>
								</tr>-->
								<tr>
									<td> <?php echo $k[0]; ?></td>
									<td> <?php echo $k[1]; ?></td>
									<td> <?php echo $k[2]; ?></td>
									<td> <?php echo $k[3]; ?></td>
									<td> <?php echo date('Y-m-d',strtotime($k[4])); ?></td>
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
