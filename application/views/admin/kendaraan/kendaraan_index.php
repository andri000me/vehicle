<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/lokasi', 'Lokasi', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>  <!-- End of div class fleft -->
					
					<hr />
					 
					  <div class="clear"></div>
					    
						<!-- TABEL KENDARAAN  --------------------------------------------------------------------------------->
						<div class="panel90">
                	       <div class="judul_pjbs">
                    	      <h3> Daftar Kendaraan </h3>
							  
							  <?php 
					              echo anchor('master/insert_kendaraan','Tambah Data', array('class' => 'btn2 btn2-warning btn2-small' ));  
					              echo ' ';
					              echo anchor('master/detail_kendaraan_dinas','Detail Kendaraan Dinas', array('class' => 'btn2 btn2-warning btn2-small' ));
                                  echo ' ';
								  echo anchor('master/jenis_kendaraan','Jenis Kendaraan', array('class' => 'btn2 btn2-warning btn2-small')); 
								  
					         ?>
							 
							 <br/><br/>
							  
                           </div> <!--- End of div class judul_pjbs --->
						   
						   <div class="row-fluid">
                             <div class="span12">
							 
							    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								   <thead>
								      <tr>
								        <th width='20%'>ID KENDARAAN</th>
									    <th width='20%'>JENIS KENDARAAN</th>
									    <!--<th width='15%'>TAHUN</th>-->
										<th width='15%'>NO POLISI</th>
										<th width='15%'>STATUS</th>
										<th width='15%'>OPSI</th>
									  </tr>
								   </thead>
								   <tbody>
								      
									  <?php
										   foreach($kendaraan->result() as $row)
										   {  ?>
										   <tr>
											   <td> <?php echo $row->ID_KENDARAAN; ?>&nbsp; </td>
											   <td> <?php echo $row->JENIS_KENDARAAN; ?>&nbsp; </td>
											   <!--<td> <?php //echo $row->TAHUN; ?>&nbsp; </td>-->
											   <td> <?php echo $row->NO_POLISI; ?>&nbsp; </td>
											   
											   <?php 
												
														  $a = $row->STATUS_KENDARAAN;
														  switch ($a) { 
															 case 'Dikembalikan': 
														        $badge = "label";
													            break; 
													         case 'Tersedia': 
														        $badge = "label label-success";
													            break; 
													         case 'Sedang digunakan/Beroperasi': 
														       $badge = "label label-info";
													            break;
													         case 'Sedang diperbaiki': 
														        $badge = "label label-warning";
													            break; 
													         case 'Dipesan (Booked)': 
														        $badge = "label label-important";
													            break;
															 
													     }
										       ?>
											   
											   <td> <span class="<?php echo $badge;?>"> <?php echo $row->STATUS_KENDARAAN; ?>&nbsp; </span></td>
											   <td align='center'>
												   <?php
													   echo anchor('master/edit_kendaraan/'.$row->ID_KENDARAAN, 'Edit', 'class="btn2 btn2-info btn2-mini"');
													   echo '  ';
													   echo anchor('master/delete_kendaraan/'.$row->ID_KENDARAAN, 'Hapus', 'class="btn2 btn2-danger btn2-mini"');
												   ?>
											   </td>
										   </tr>
										   <?php

										   }   ?>
										   
								   </tbody>
								</table>
								
								<br/><br/>
								
								<?php //echo anchor('kendaraan/view_detail_kd', 'Lihat Detail Kendaraan Dinas.'); ?>
							 
							 </div> <!-- End of div class row-fluid -->
						   </div> <!-- End of div class span12 -->
						   
						</div> <!--- End of div class panel90 --->
		 
		             <div class="clear"></div>
            
                 </div> <!--- End of div class content_pjbs --->
             </div> <!--- End of div id content_pjbs --->
         </div>

<br/><br/>
