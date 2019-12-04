<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
		<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/insert_op/';?>" class="made-with-mk">
			<div class="brand"><i class="material-icons">library_add</i></div>
			<div class="made-with">Tambah <strong>Transaksi</strong></div>
		</a>
 			<div class="col-md-12 ml-auto mr-auto">
			 <div class="page-categories">
			 <!-- Header -->
			 <?php include "header.php";?>
			 <div class="tab-content tab-space tab-subcategories">
			  <div class="tab-pane">
			  <div class="card">
				<div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">crop_rotate</i>
                  </div>
                  <h4 class="card-title">Operasional</h4>
                </div>
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class=" text-primary">
							<tr>
								<th>No</th>
								<th>Pemohon</th>
								<th>Kendaraan</th>
								<th>Waktu Berangkat</th>
								<th>Tujuan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($approval->result() as $row){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->PEMOHON; ?></td>
								<td><?php echo $row->NO_POLISI." ".$row->NAMA_KENDARAAN; ?></td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->TUJUAN; ?></td>
								<td>
								<?php 
									$cek = $row->ID_STATUS_OPERASIONAL;
											
											if($cek == 5)
											{
											   ?>
                                                  <span class="label label-warning"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  <?php 
											          echo anchor('approval/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini'));
											          echo "&nbsp;";
											          echo anchor('approval/edit_operasional/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Edit', array('class' => 'btn2 btn2-warning btn2-mini'));
											          echo "&nbsp;";
											          echo anchor('approval/berangkat/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Berangkat', array('class' => 'btn2 btn2-info btn2-mini'));
											}
											else if($cek == 4)
											{
											  ?>
                                                  <span class="label label-info"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												  <?php 
											  echo anchor('approval/kembali/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN, 'Kembali', array('class' => 'btn2 btn2-info btn2-mini'));
											   ?>
												<?php
										    }
											
										    else if($cek == 2)
											{
											    ?>
												<span class="label label-important"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
											}
											else{
												?>
												<span class="label label-success"><?php echo $row->STATUS_OPERASIONAL; ?></span><br>
												<?php
												}
											?>  
											 <?php //echo anchor('approval/print_form/'.$row->ID_OPERASIONAL, 'Print',  array('class' => 'btn2 btn2-important btn2-mini')); ?>&nbsp;
                                        </td>
                                    </tr>
									
                                    <?php 
									  $no++;
									}
									 ?>
                                 </tbody>
					</table>
				  </div>
				</div>
			  </div>
			 </div>
			</div>
		</div>
	</div>