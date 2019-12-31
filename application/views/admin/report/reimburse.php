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
				<?php echo form_open('report/reimburse');?>
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
			<div class="col-lg-8 col-md-12">
			<div class="card">
				<div class="card-header card-header-info text-center">
					<h4 class="card-title">List Transaksi Reimburse</h4>
					<?php $tanggal = explode('|', $tgl); ?>
					<p class="card-category">Data Transaksi Reimburse pada
					<?php echo $tanggal[0]." sampai ".$tanggal[1]; ?>
					</p>
				</div>
				<div class="card-body">
					<div class="card-body table-responsive">
						<table class="table table-hover" id="dataTables-id">
							<thead class="text-info">
								<tr>
									<th>No</th>
									<th>Transaksi</th>
									<th>Keterangan</th>
									<th>Tanggal Pemberian</th>
									<th>Nominal</th>
                                </tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
									foreach($op as $x){
										$k = explode('^',$x);
								?>
								<tr>
									<td> <?php echo $no; $no++; ?></td>
									<td> <?php echo $k[0]; ?></td>
									<td> <?php echo $k[1]; ?></td>
									<td> <?php echo $k[2]; ?></td>
									<td> <?php echo number_format($k[3]); ?></td>
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