<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-4 col-md-12">
			  <div class="card">
				<div class="card-header card-header-danger text-center">
					<h4 class="card-title">Report</h4>
				</div>
				<div class="card-body">
				<?php echo form_open('report/operasional');?>
					<div class="form-group">
						<label class="bmd-label-floating">Tanggal Awal</label>
						<input type="text" class="form-control berangkatpicker" value="<?php echo date('01-m-Y');?>" name="date">
					</div>
					<div class="form-group">
						<label class="bmd-label-floating">Tanggal Akhir</label>
						<input type="text" class="form-control kembalipicker" value="<?php echo date('d-m-Y');?>" name="date1">
					</div>
				</div>
				<div class="card-footer justify-content-center">
						<button type="submit" class="btn btn-danger btn-round">OK</button>&nbsp;&nbsp;
						<button type="reset" class="btn btn-round">Reset</button>
				</div>
                <?php echo form_close();?> 
			  </div>
			</div>
			<!-- ini adalah graph jon -->
                    <div class="block">
                            <div class="block-content collapse in">
                                <div class="span12 chart">
                                    <h5>
									  <?php $tanggal = explode('|', $tgl);
					                        echo $tanggal[0]." s/d ".$tanggal[1]."</br>"; 
											echo anchor('report/print_form_report_operasional/'.$tanggal[0].'/'.$tanggal[1], 'Print',  array('class' => 'btn2 btn2-warning btn2-small'));
										?>
							        </h5>
                                </div>
                            </div>
                    </div>
			<!-- End Chart -->
			<div class="col-lg-8 col-md-12" id="table" style="display:none">
			<div class="card">
				<div class="card-header card-header-danger text-center">
					<h4 class="card-title">List Operasional</h4>
					<?php $tanggal = explode('|', $tgl); ?>
					<p class="card-category">Data Operasional pada
					<?php echo $tanggal[0]." sampai ".$tanggal[1]; ?>
					</p>
				</div>
				<div class="card-body">
					<div class="card-body table-responsive">
						<table class="table table-hover">
							<thead class="text-warning">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Sopir/Kendaraan</th>
									<th>Waktu Berangkat</th>
									<th>Waktu Kembali</th>
									<th>Tujuan</th>
                                </tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
									foreach($user->result() as $row){  
								?>
								<tr>
									<td> <?php echo $no; $no++; ?></td>
									<td> <?php echo $row->PEMOHON; ?></td>
									<td> <?php echo $row->NAMA_SOPIR." - ".$row->NAMA_KENDARAAN; ?></td>
									<td> <?php echo $row->TGL_BERANGKAT;?></td>
									<td> <?php echo $row->TGL_KEMBALI; ?></td>
									<td> <?php echo $row->TUJUAN; ?></td>
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