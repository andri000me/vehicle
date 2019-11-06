<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <!---------------------------------------------------------------------------------------------------- -->
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
                                        <th>NO</th>
                                        <th>TGL BERANGKAT</th>
                                        <th>TGL KEMBALI</th>
										<th>TUJUAN</th>
										<th>KEPERLUAN</th>
										<th>STATUS</th>
                                </thead>
                                <tbody>
                                <?php
								$no = 1;
                                foreach($request->result() as $row)
								{
								?>
                                    <tr>
                                        <td><?php echo $no;//$row->ID_REQUEST;?></td>
                                        <td><?php echo $row->TGL_BERANGKAT;?></td>
                                        <td><?php echo $row->TGL_KEMBALI;?></td>
										<td><?php echo $row->TUJUAN;?></td>
										<td><?php echo $row->KEPERLUAN;?></td>
										<td><?php echo reqStat($row->STATUS); ?></td>
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
 
 
 