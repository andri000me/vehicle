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
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
                                  <td><?php echo anchor('master/lokasi', 'Lokasi', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>  <!-- End of div class fleft -->
					
					<hr />
					 
					  <div class="clear"></div>
					    
						<!-- TABEL KONTRAK  --------------------------------------------------------------------------------->
						<div class="panel90">
                	       <div class="judul_pjbs">
                    	      <h3> Daftar Kontrak </h3>
							  
							  <?php 
					              echo anchor('master/insert_kontrak','Tambah Data', array('class' => 'btn2 btn2-warning btn2-small' )).'&nbsp;';  	  
								  echo anchor('master/detail_kontrak','Detail Kontrak', array('class' => 'btn2 btn2-warning btn2-small' ));
					         ?>
							 
							 <br/><br/>
							  
                           </div> <!--- End of div class judul_pjbs --->
						   
						   <div class="row-fluid">
                             <div class="span12">
							 
							    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								   <thead>
								      <tr>
								        <th width='10%'>NO KONTRAK</th>
									    <th width='15%'>NAMA INSTANSI</th>
									    <th width='15%'>KONTRAK MULAI</th>
										<th width='15%'>KONTRAK AKHIR</th>
										<th width='15%'>NILAI KONTRAK</th>
										<th width='15%'>STATUS</th>
										<th width='15%'>OPSI</th>
									  </tr>
								   </thead>
								   <tbody>
								      
									  <?php
										   foreach($kontrak->result() as $row)
										   {  ?>
										   <tr>
											   <td> <?php echo $row->NO_KONTRAK; ?>&nbsp; </td>
											   <td> <?php echo $row->NAMA_INSTANSI; ?>&nbsp; </td>
											   <td> <?php echo $row->KONTRAK_MULAI; ?>&nbsp; </td>
											   <td> <?php echo $row->KONTRAK_AKHIR; ?>&nbsp; </td>
											   <td> <?php echo $row->NILAI_KONTRAK; ?>&nbsp; </td>
											   
											   <?php 
										
													$a = $row->STATUS_KONTRAK;
													switch ($a) { 
															 case 'Non-aktif / Habis': 
																$badge = "label";
															  break; 
															 case 'Aktif / Berlaku': 
																$badge = "label label-success";
															  break; 
															 
													}
												?>
											   
											   <td><span class="<?php echo $badge;?>"> <?php echo $row->STATUS_KONTRAK; ?>&nbsp; </span> </td>
											   <td align='center'>
												   <?php
													   echo anchor('master/edit_kontrak/'.$row->ID_KONTRAK, 'Edit', 'class="btn2 btn2-info btn2-mini"');
													   echo '  ';
													   echo anchor('master/delete_kontrak/'.$row->ID_KONTRAK, 'Hapus','class="btn2 btn2-danger btn2-mini"');
												   ?>
											   </td>
										   </tr>
										   <?php

										   }   ?>
										   
								   </tbody>
								</table>
								
								<br/><br/>
								
								<?php //echo anchor('kontrak/view_detail_kontrak', 'Lihat Detail Kontrak.'); ?>
							 
							 </div> <!-- End of div class row-fluid -->
						   </div> <!-- End of div class span12 -->
						   
						</div> <!--- End of div class panel90 --->
		 
		             <div class="clear"></div>
            
                 </div> <!--- End of div class content_pjbs --->
             </div> <!--- End of div id content_pjbs --->
         </div>

<br/><br/>
