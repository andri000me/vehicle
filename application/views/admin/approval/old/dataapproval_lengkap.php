<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-------------------------------------------------------------------------------------------------------------------------------->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            
                     <div class="sprtr_1"></div>
					    
						 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                <div class="judul_pjbs">
                   <h3>Daftar Operasional</h3>
                   <?php 
					  echo anchor('approval/approval_admin',' Kembali', 
					  array('class' => 'btn2 btn2-warning btn2-small'));   
					?>
                </div>
                <hr>
				<div class="row-fluid">
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="2px">No</th>
                                        <th width="90px">Pemohon</th>
                                        <th width="80px">Driver</th>
                                        <th width="40px" style="text-align:center">Tanggal</th>
                                        <th width="40px" style="text-align:center">Jam</th>
                                        <th width="40px" style="text-align:center">Mobil</th>
                                        <th width="20px" style="text-align:center">Status</th>
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
											<?php echo $row->PEMOHON; ?>
                                        </td>
                                        <td>
											<?php echo $row->NAMA_SOPIR; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->TGL_BERANGKAT."<br>-<br>".$row->TGL_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->JAM_KELUAR."<br>-<br>".$row->JAM_KEMBALI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php echo $row->JENIS_KENDARAAN."<br>-<br>".$row->NO_POLISI; ?>
                                        </td>
                                        <td style="text-align:center">
											<?php //echo $row->STATUS_OPERASIONAL; ?>
                                            <br>
                                            <?php
                                            $cek = $row->ID_STATUS_OPERASIONAL;
											if($cek!=1){
												?>
                                                  <span class="label">Belum Kembali</span><br>
												  <?php //echo anchor('approval/update_op/'.$row->ID_OPERASIONAL.'-'.$row->ID_SOPIR.'-'.$row->ID_KENDARAAN,'Ubah', array('class' => 'btn2 btn2-warning btn2-small'));  
												         echo anchor('#', 'Ubah', array('class' => 'btn2 btn2-warning btn2-small', 'data-toggle' => 'modal', 'data-target' => '#myModal'));
                                                }
											else{
												?>
												<span class="label label-success">Kembali</span><br>
												<?php
												}
											?>  
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

<!-- insert --> 
       <div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4> Ubah Data Operasional</h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('approval/update_op/'.$row->ID_OPERASIONAL.'-'.$row->ID_SOPIR.'-'.$row->ID_KENDARAAN);?>
                            <table class="table-condensed">
                            	<tr>
                                	<td class=""><span class="inp_panel">Tanggal Kembali</span></td>
                                    <td>
                                    	 <?php
						                     $date = date('d-m-Y');
							  
												  $data = array(
													   'name'        => 'tgl_kembali',
													   'id'          => 'inputDatepic',
													   'class'       => 'inputDatepic',
													   'value'       => $date
													   );
											   
												  echo form_input($data);
												  echo form_error('tgl_kembali');
						                ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Jam Kembali</span></td>
                                    <td>
										<input type="text" value="<?php echo date('H:i'); ?>" name="jam_kembali" class="span1"/>
                                        <?php echo form_error('jam_kembali');?>
                                    </td>
                                </tr>                               
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Ubah"/>
                                        <input type="reset" class="btn2 btn2-danger btn2-small" value="Reset"/>
                                    </td>
                               </tr>
                               
                            </table>
                            <?php echo form_close();?>
                </div>
            </div>
      </div>
<!-- /.end insert --> 