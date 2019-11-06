<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-12">
			  <div class="card card-nav-tabs">
				<!-- Header -->
			  	<?php include "header.php";?>					    
				<!-- isi dengan table atau tampilan -->
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTables-id">
						<thead class=" text-primary">
							<tr>
								<th>NO</th>
								<th>PEMOHON</th>
								<th>SOPIR / KENDARAAN</th>
								<th>WAKTU BERANGKAT</th>
								<th>WAKTU KEMBALI</th>
								<th>TUJUAN</th>
								<th>STATUS</th>
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
								<td><?php echo $row->NAMA_SOPIR."<br>-<br>".$row->JENIS_KENDARAAN."<br>".$row->NO_POLISI; ?>
								</td>
								<td><?php echo $row->TGL_BERANGKAT; ?></td>
								<td><?php echo $row->TGL_KEMBALI; ?></td>
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