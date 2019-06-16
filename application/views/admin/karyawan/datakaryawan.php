<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                   
                    <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('master/supplier', 'Supplier', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/sopir', 'Sopir', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('master/kendaraan', 'Kendaraan', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/kontrak', 'Kontrak', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/subdit', 'Subdit', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                                  <td><?php echo anchor('master/karyawan', 'Karyawan', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('master/user', 'User', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('master/slider', 'Slider', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <hr />
                    <div class="clear"></div>
             
                	<div class="judul_pjbs">
                      <h4>Data Karyawan</h4>
                      <?php 
					  echo anchor('#','Tambah Data', 
					  array(
					  		'class' => 'btn2 btn2-warning btn2-small',
							'data-toggle' => 'modal',
							'data-target' => '#myModal'
							));  
					  ?>
                      <div class="btn2-group">
                        <button data-toggle="dropdown" class="btn2 btn2-primary dropdown-toggle">Print<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><?php echo anchor('report/all_karyawan', 'Semua Karyawan'); ?></li>
                          <li class="divider"></li>
                          <li><?php echo anchor('report/all_karyawan_lain', 'Lainnya'); ?></li>
                        </ul>
                      </div><!-- /btn-group -->
                      
                      <hr>
                    </div>
                    
                    
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="10%;">NID</th>
                                        <th width="30%;">NAMA KARYAWAN</th>
                                        <th width="20%;">JABATAN</th>
                                        <th width="10%;">SUBDIT</th>
                                        <th width="8%;">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
										foreach($karyawan->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->NID; ?></td>
                                        <td><?php echo $row->NAMA; ?></td>
                                        <td><?php echo $row->JABATAN; ?></td>
                                        <td><?php echo $row->SUBDIT; ?></td>
                                        <td align="center">
                                        	<a href="
                                            <?php echo 'edit_karyawan/' .$row->ID_KARYAWAN; ?>
                                            " class="btn2 btn2-info btn2-mini">Edit</a>
                                            
                                            <a href="
                                            <?php echo 'delete_karyawan/'.$row->ID_KARYAWAN; ?>
                                            " class="btn2 btn2-danger btn2-mini">Delete</a>
                                        </td>                                    
                                    </tr>
                                    <?php } ?>
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
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;display:none;margin-left:-170px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>Tambah Karyawan</h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_karyawan');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">NID</span></td>
                                    <td>
                                    	<input type="text" placeholder="NID" name="nid"/>
            							<?php echo form_error('id_karyawan');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Nama Karyawan" name="nama"/>
                                        <?php echo form_error('nama');?>
                                    </td>
                                </tr>                               
                                <tr>
                                	<td class=""><span  class="inp_panel">ID Jabatan</span></td>
                                    <td>					
										<?php 
                                             //Menampilkan dropdown level
                                             foreach($id_jab->result() as $row_jabatan)
                                             $jabatan_list[$row_jabatan->ID_JABATAN] = $row_jabatan->JABATAN;
      
                                             echo form_dropdown('id_jabatan', $jabatan_list, '0');
                                             echo form_error('id_jabatan');
                                        ?>
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
 