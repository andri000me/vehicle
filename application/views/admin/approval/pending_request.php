<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 		 
		
		 <!-------------------------------------------------------------------------------------------------------------------------------->
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1">
                  
                     </div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Approval</h3>
				   
				   <?php echo anchor('approval/approval_admin', 'Kembali', array('class' => 'btn2 btn2-small btn2-warning')); ?>
				   <br/>
                </div>
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>ID PEMOHON</th>
                                        <th>ATAS NAMA</th>
                                        <th>TANGGAL</th>
                                        <th>JAM KELUAR</th>
                                        <th>JAM KEMBALI</th>
                                        <th>REQUEST MASUK</th>
                                        <th>STATUS REQUEST</th>
                                        <th>KEPERLUAN</th>
                                        <th>APPROVAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                	<?php
										
										echo form_open('approval/edit_approval');
										
										foreach($approval->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->ID_USER; ?> </td>
                                        <td><?php echo $row->ATAS_NAMA; ?></td>
                                        <td><?php echo $row->TGL_BERANGKAT; ?></td>
                                        <td><?php echo $row->JAM_KELUAR; ?></td>
                                        <td><?php echo $row->JAM_KEMBALI; ?></td>
                                        <td><?php echo $row->WAKTU_MASUK; ?></td>
                                        <td><?php echo $row->STATUS_REQUEST; ?></td>
                                        <td><?php echo $row->KEPERLUAN; ?></td>
                                        <td>
                                           
											<?php 
											  echo anchor('approval/edit_approval/'.$row->ID_REQUEST.'/1', 'Ya', array('class' => 'btn2 btn2-info btn2-mini'));
                                              echo "&nbsp;";											  
											  echo anchor('approval/edit_approval/'.$row->ID_REQUEST.'/2', 'Tidak', array('class' => 'btn2 btn2-danger btn2-mini')); 
											?>
										
                                        </td>
                                    </tr>
                                    <?php }
										echo form_close();
									 ?>
                                 </tbody>
                            </table>
                        </div>
       				</div>
             </div>  <!-- End of div class panel90 -->
		 
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>
