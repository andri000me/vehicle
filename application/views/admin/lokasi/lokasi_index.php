<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                    
                    <div class="judul_pjbs">
                    </div>
                    
                    <div class="fleft">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/lokasi', 'Lokasi', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
                              </tr>
                          </table>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <hr />
                    <div class="clear"></div>
             
                	<div class="judul_pjbs">
                      <h3>Lokasi</h3>
                      <?php 
					  echo anchor('#','Tambah Lokasi', 
					  array(
					  		'class' => 'btn2 btn2-warning btn2-small',
							'data-toggle' => 'modal',
							'data-target' => '#myModal'
							));  
					  
					  //echo ' ';
					  
					  /*echo anchor('report/all_lokasi','Print', 
					  array(
					  		'class' => 'btn2 btn2-small',
							'target' => '_blank'
							)); */ 
					  ?>
                      
                      <hr>
                    </div>
                    
                    
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Lokasi</th>
                                        <th>Lokasi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($datalokasi->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->KODE_LOKASI;?></td>
                                        <td><?php echo $row->LOKASI;?></td>
                                        <td>
                                        	<a href="
                                            <?php echo 'edit_lokasi/' .$row->ID_LOKASI; ?>
                                            " class="btn2 btn2-info btn2-mini">Edit</a>
                                            
                                            <a href="
                                            <?php echo 'delete_lokasi/'.$row->ID_LOKASI; ?>
                                            " class="btn2 btn2-danger btn2-mini">Delete</a>
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
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:320px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>~ Tambah Lokasi</h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_lokasi');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span class="inp_panel">Kode Lokasi</span></td>
                                    <td>
                                    	<input type="text" placeholder="ID" name="kode_lokasi"/>
            							<?php echo form_error('kode_lokasi');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Lokasi</span></td>
                                    <td>
                                    	<input type="text" placeholder="Indramayu" name="lokasi"/>
                                        <?php echo form_error('lokasi');?>
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
 