<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 
 <!---------------------------------------------------------------------------------------------------- -->
 <div id="content_pjbs">	
        <div class="content_pjbs">	
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
             		
                    <div class="sprtr_1"></div>
                    
                    <div class="judul_pjbs">
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
								  <td><?php echo anchor('master/user', 'User', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('master/slider', 'Slider', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <hr />
                    <div class="clear"></div>
             
                	<div class="judul_pjbs">
                      <h4>Data User</h4>
                      <?php 
					  echo anchor('#','Tambah Data', 
					  array(
					  		'class' => 'btn2 btn2-warning btn2-small',
							'data-toggle' => 'modal',
							'data-target' => '#myModal'
							));  
					  ?>
                      <div class="clear"></div>
                      
                      <hr>
                    </div>
                    
                    
                    
                	<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="18%">USERNAME</th>
                                        <th width="25%">NID</th>
                                        <th width="25%">NAMA</th>
                                        <th width="10%">TIPE USER</th>
                                        <th width="10%">STATUS</th>
                                        <th width="12%">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($user->result() as $row)
								{
								?>
                                    <tr class="odd gradeX">
                                        <td>&nbsp;<?php echo $row->USERNAME;?></td>
                                        <td>&nbsp;<?php echo $row->NID;?></td>
                                        <td>&nbsp;<?php echo $row->NAMA;?></td>
                                        <td>&nbsp;<?php echo $row->TIPE_USER;?></td>
                                        <td>&nbsp;<?php echo $row->STATUS_USER;?></td>
                                        <td>
                                        	<a href="
                                            <?php echo 'edit_user/' .$row->ID_USER; ?>
                                            " class="btn2 btn2-info btn2-mini">Edit</a>
                                            
                                            <a href="
                                            <?php echo 'delete_user/'.$row->ID_USER; ?>
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
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;display:none;margin-left:-170px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>Tambah User</h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('master/insert_user');?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span  class="inp_panel">Karyawan</span></td>
                                    <td>
										<?php
                                             foreach($id_jab->result() as $row)
                                             $karyawan_list[$row->ID_KARYAWAN] = $row->NID.' | '.$row->NAMA;
      
                                             echo form_dropdown('id_karyawan', $karyawan_list);
                                             echo form_error('id_karyawan');
                                        ?>
                                    </td>
                                </tr>
                            	<tr>
                                	<td class=""><span class="inp_panel">Username</span></td>
                                    <td>
                                    	<input type="text" placeholder="ID" name="username"/>
            							<?php echo form_error('username');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Password</span></td>
                                    <td>
                                    	<input type="password" placeholder="Indramayu" name="password"/>
                                        <?php echo form_error('password');?>
                                    </td>
                                </tr>  
                                <tr>
                                	<td class=""><span  class="inp_panel">Tipe User</span></td>
                                    <td>
										<?php 
                                             foreach($tipe->result() as $row_tipe)
                                             $tipe_list[$row_tipe->ID_TIPE_USER] = $row_tipe->TIPE_USER;
      
                                             echo form_dropdown('tipe_user', $tipe_list, '3');
                                             echo form_error('tipe_user');
                                        ?>
                                    </td>
                                </tr>       
                                <tr>
                                	<td class=""><span  class="inp_panel">Status User</span></td>
                                    <td>
										<?php 
                                             foreach($status->result() as $row_status)
                                             $status_list[$row_status->ID_STATUS_USER] = $row_status->STATUS_USER;
      
                                             echo form_dropdown('status_user', $status_list, '1');
                                             echo form_error('status_user');
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
 