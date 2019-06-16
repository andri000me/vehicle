<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/lokasi', 'Lokasi', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>  <!-- End of div class fleft -->
					
					<hr />
					 
					  <div class="clear"></div>
					 
					  <div class="clear"></div>
					    
						<!-- TABEL SUPPLIER  --------------------------------------------------------------------------------->
						<div class="panel90">
                	       <div class="judul_pjbs">
                    	      <h3> Daftar Contact Person Supplier </h3>
							  
							  <?php 
					              echo anchor('master/insert_detail_cp','Tambah Data', 
					                          array('class' => 'btn2 btn2-warning btn2-small' ));  
					         ?>
							 
							 <br/><br/>
							  
                           </div> <!--- End of div class judul_pjbs --->
						   
						   <div class="row-fluid">
                             <div class="span12">
							 
							    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								   <thead>
								      <tr>
								        <th width='5%'>ID</th>
									    <th width='20%'>NAMA INSTANSI</th>
									    <th width='20%'>CONTACT PERSON</th>
										<th width='10%'>NO TELPON</th>
										<th width='15%'>HANDPHONE</th>
										<th width='15%'>EMAIL</th>
										<th width='15%'>OPSI</th>
									  </tr>
								   </thead>
								   <tbody>
								      
									  <?php
										   foreach($detail_cp->result() as $row)
										   {  ?>
										   <tr>
											   <td> <?php echo $row->ID_DETAIL_CONTACT_PERSON; ?> </td>
											   <td> <?php echo $row->NAMA_INSTANSI; ?>&nbsp; </td>
											   <td> <?php echo $row->CONTACT_PERSON; ?>&nbsp; </td>
											   <td> <?php echo $row->NO_TELPON; ?>&nbsp; </td>
											   <td> <?php echo $row->HANDPHONE; ?>&nbsp; </td>
											   <td> <?php echo $row->EMAIL; ?>&nbsp; </td>
											   <td align='center'>
												   <?php
													   echo anchor('master/edit_detail_cp/'.$row->ID_DETAIL_CONTACT_PERSON, 'Edit', 'class="btn2 btn2-info btn2-mini"');
													   echo '  ';
													   echo anchor('master/delete_detail_cp/'.$row->ID_DETAIL_CONTACT_PERSON, 'Hapus', 'class="btn2 btn2-danger btn2-mini"');
												   ?>
											   </td>
										   </tr>
										   <?php

										   }   ?>
										   
								   </tbody>
								</table>
								
								<br/><br/>
								
								<?php echo anchor('master/supplier', 'Lihat Daftar Supplier.'); ?>
							 
							 </div> <!-- End of div class row-fluid -->
						   </div> <!-- End of div class span12 -->
						   
						</div> <!--- End of div class panel90 --->
		 
		             <div class="clear"></div>
            
                 </div> <!--- End of div class content_pjbs --->
             </div> <!--- End of div id content_pjbs --->
         </div>

<br/><br/>
