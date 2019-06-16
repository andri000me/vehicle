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
					    
						<!-- TABEL SUPPLIER  --------------------------------------------------------------------------------->
						<div class="panel90">							  
							 <div class="judul_pjbs">
                                  <h4>Jenis Kendaraan</h4>
                                  <?php 
                                   echo anchor('master/insert_jenis_kendaraan','Tambah Data', array('class' => 'btn2 btn2-warning fleft'));  
                                   ?>
                      
                             </div>
                             <hr />

						   <div class="row-fluid">
                             <div class="span12" style="font-size:11px">
							 
							    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								   <thead>
								      <tr>
								        <th width='8%'>ID</th>
									    <th width='80%'>Jenis Kendaraan</th>
                                        <th width='10%'>Opsi</th>
									  </tr>
								   </thead>
								   <tbody>
								      
									  <?php
										   foreach($datakendaraan->result() as $row)
										   {  ?>
										   <tr>
											   <td> <?php echo $row->ID_JENIS_KENDARAAN; ?> </td>
                                               <td> <?php echo $row->JENIS_KENDARAAN; ?> </td>
                                               <td align='center'>
                                                   <a href="
                                                    <?php echo 'edit_jenis_kendaraan/' .$row->ID_JENIS_KENDARAAN; ?>
                                                    " class="btn2 btn2-info btn2-mini">Edit</a>
                                                
                                                    <a href="
                                                    <?php echo 'delete_jenis_kendaraan/'.$row->ID_JENIS_KENDARAAN; ?>
                                                    " class="btn2 btn2-danger btn2-mini">Delete</a>
                                               </td>
										   </tr>
										   <?php

										   }   ?>
										   
								   </tbody>
								</table>
								<br>
						 </div> <!-- End of div class row-fluid -->
						   </div> <!-- End of div class span12 -->
						   
						</div> <!--- End of div class panel90 --->
		 
		             <div class="clear"></div>
            
                 </div> <!--- End of div class content_pjbs --->
             </div> <!--- End of div id content_pjbs --->
         </div>

<br/><br/>
