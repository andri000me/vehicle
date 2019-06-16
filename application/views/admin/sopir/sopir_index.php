<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                   
				     <div class="fleft">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-primary' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/lokasi', 'Lokasi', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>  <!-- End of div class fleft -->
					
					<hr />
					 
					  <div class="clear"></div>
				   
                	<div class="judul_pjbs">
                      <h3>Daftar Sopir</h3>
					  <div class="fleft">
					  <?php
					      echo anchor('master/insert_sopir', 'Tambah Data', array('class' => 'btn2 btn2-warning btn2-small' ));
						  /*echo anchor('#','Tambah Data', 
					 		array(
					  		'class' => 'btn2 btn2-warning btn2-small',
							'data-toggle' => 'modal',
							'data-target' => '#myModal'
							));*/
					  ?>
					  </div>
                     
                      <hr>
                    </div>
                    
                    
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>NID Sopir</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($datasopir->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->NID;?>&nbsp;</td>
                                        <td><?php echo $row->NAMA;?>&nbsp;</td>
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
											}
										?>
                                        <td><?php echo $row->LOKASI;?></td>
                                        <td><span class="<?php echo $badge;?>"><?php echo $row->STATUS_SOPIR;?></span></td>
                                        <td>
                                        	
											<?php 
											   echo anchor('master/edit_sopir/'.$row->ID_SOPIR, 'Edit', 'class="btn2 btn2-info btn2-mini"');
											   echo '  ';
											   echo anchor('master/delete_sopir/'.$row->ID_SOPIR, 'Hapus','class="btn2 btn2-danger btn2-mini"');
											?>
											
                                        </td>
                                       
                                    </tr>
                                <?php
								}
								?>
                                </tbody>
                            </table>
                       </div>
                       </div>
                </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 
 <!-- insert --> 
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>.: Tambah Data Sopir :. </h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_sopir');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">NID</span></td>
                                    <td>
                                    	<input type="text" placeholder="SPR001" name="nid"/>
            							<?php echo form_error('id_sopir');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Rudi Haryadi" name="nama"/>
                                        <?php echo form_error('nama');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Kode Lokasi</span></td>
                                    <td>
                                    	<input type="text" placeholder="KP" name="lokasi"/>
                                        <?php echo form_error('lokasi');?>
                                    </td>
                                </tr>                               
                                <tr>
                                	<td class=""><span  class="inp_panel">Status</span></td>
                                    <td>
                                    	<select class="span2" name="status">
                                            <option value="1">Aktif (tersedia)</option>
                                            <option value="2">Bertugas (tidak tersedia)</option>
                                            <option value="3">Sopir Direksi</option>
                                            <option value="0">Non-Aktif (keluar)</option>
                                            <option value="4">Absen (tidak hadir)</option>
                                        </select>
                                        <?php echo form_error('status');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Tambah"/>
                                        <input type="reset" class="btn2 btn2-danger btn2-small" value="Reset"/>
                                    </td>
                               </tr>
                               
                            </table>
                            <?php echo form_close();?>
                </div>
            </div>
      </div>
<!-- /.end insert --> 
 