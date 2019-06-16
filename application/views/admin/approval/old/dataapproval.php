<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Daftar Request Masuk</h3>
                   <?php 
					  echo anchor('approval/semua_approval','Daftar Operasional', 
					  array('class' => 'btn2 btn2-warning btn2-small'));   
					?>
                </div>
                 
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th min-width="20px">Atas Nama</th>
                                        <th min-width="50px">Keperluan</th>
                                        <th>Jam Keluar</th>
                                        <th>Jam Kembali</th>
                                        <th width="10px">Tanggal</th>
                                        <th width="10px">Approval</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<?php
										$no = 1;
										foreach($approval->result() as $row)
										{
									?>
                                    <tr class="odd gradeX">
                                        <td>
											<?php echo $no; ?>
                                        </td>
                                        <td>
											<?php echo $row->ATAS_NAMA; ?>
                                        </td>
                                        <td>
											<?php echo $row->KEPERLUAN; ?>
                                        </td>
                                        <td>
											<?php echo $row->JAM_KELUAR; ?>
                                        </td>
                                        <td>
											<?php echo $row->JAM_KEMBALI; ?>
                                        </td>
                                        <td>
											<?php echo $row->TGL_BERANGKAT; ?>
                                        </td>
                                        <td style="text-align:center;">
                                        <!--<a href="approval_admin/insert_op/<?php //echo $row->ID_REQUEST;?>" class="btn2 btn2-warning btn2-small">APPROVAL</a>-->
                                          <?php echo anchor('approval/insert_op/'.$row->ID_REQUEST,'Approval', array('class' => 'btn2 btn2-warning btn2-small')); ?>
										</td>
                                    </tr>
                                    <?php 
									$no++;
									}
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

