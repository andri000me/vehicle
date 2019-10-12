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
						<thead class=" text-primary">
							<tr>
								<th>Nama</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
						</thead>
						<tbody>
						<?php foreach($datasopir->result() as $row)
						{ ?>
							<tr>
								<td><?php echo $row->NAMA;?></td>
								<?php
								$a = $row->STATUS_SOPIR;
								switch ($a) { 
									case 'Non-aktif': 
										$badge = "label";
									break; 
									case 'Aktif(tersedia)': 
										$badge = "label label-success";
									break; 
									case 'Sedang bertugas(Tidak tersedia)': 
										$badge = "label label-info";
									break;
									case 'Sopir direksi': 
										$badge = "label label-warning";									
									break; 
									case 'Absen(Tidak hadir)': 
										$badge = "label label-important";
									break;
									case 'Dipesan(booked)': 
										$badge = "label label-info";
									break;
								}?>
								<td>
									<span class="<?php echo $badge;?>"><?php echo $row->STATUS_SOPIR;?></span>
								</td>
								<td>
								<?php 
									echo anchor('master/edit_sopir/'.$row->ID_SOPIR, 'Edit', 'class="btn2 btn2-info btn2-mini"');
									echo '  ';
									echo anchor('master/delete_sopir/'.$row->ID_SOPIR, 'Hapus','class="btn2 btn2-danger btn2-mini"');
								?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-profile">
				<div class="card-header card-header-rose">
                  <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-body">
				<?php echo form_open('master/insert_sopir');?>
				  <input type="text" class="form-control" placeholder="NID" name="nid" required/>
				  <input type="text" class="form-control" placeholder="Nama" name="nama" required/>
				  <input type="text" class="form-control" value="Aktif (tersedia)" name="status" disabled/>
                  <button type="submit" class="btn btn-rose btn-round">Submit</a>
                </div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	</div>