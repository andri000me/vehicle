<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                    
                    <div class="judul_pjbs">
                      <h3>
                      <?php
                      echo anchor('master','Master Data');
					  ?>
                      </h3>
                    </div>
                    
                    <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/subdit', 'Subdit', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/karyawan', 'Karyawan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/user', 'User', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/slider', 'Slider', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
                              </tr>
                          </table>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <hr />
                    <div class="clear"></div>
             
                	<div class="judul_pjbs">
                      <h4>Master Data Slider</h4>
                      <?php 
					  echo anchor('#','Tambah Slider', 
					  array(
					  		'class' => 'btn2 btn2-warning btn2-small',
							'data-toggle' => 'modal',
							'data-target' => '#myModal'
							));  
					  ?>
                      
                      
                    </div>
                    <hr>
                    
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Text</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($dataslider->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td class=""><div class="foto_login"><img src="<?php echo base_url();?>/asset/images/banner/<?php echo $row->GAMBAR;?>"></div><br><?php echo $row->GAMBAR;?></td>
                                        <td><?php echo $row->JUDUL;?></td>
                                        <td><?php echo $row->TEXT;?></td>
                                        <td>
                                        	<a href="
                                            <?php echo 'edit_slider/' .$row->ID_SLIDER; ?>
                                            " class="btn2 btn2-info btn2-mini">Edit</a>
                                            
                                            <a href="
                                            <?php echo 'delete_slider/'.$row->ID_SLIDER; ?>
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
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>.: Tambah Slider :. </h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                			
                            <?php echo form_open_multipart('master/insert_slider');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span class="inp_panel">Judul Slider</span></td>
                                    <td>
                                    	<input type="text" placeholder="max 50 karakter"  maxlength="50" name="judul"/>
            							<?php echo form_error('judul');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Gambar 480 x 325 px</span></td>
                                    <td>
                                        <input type="file" name="userfile" class="inputfile" />
                                          <!--<input type="file" name="gambar" class="inputfile"/>-->
                                        <?php echo form_error('userfile');?>
                                    </td>
                                </tr>                               
                                <tr>
                                	<td class=""><span  class="inp_panel">Text</span></td>
                                    <td>
                                    	<textarea name="text"></textarea>
                                        <?php echo form_error('text');?>
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
 