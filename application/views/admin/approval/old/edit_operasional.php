<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>

                    <div class="clear"></div>

             <div class="clear"></div>
				
             <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					<hr>
					    
			<div class="clear"></div>				
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Update Data Operasional</h3>
                    </div>
                    <hr>
 					<div class="fleft" style="margin-left:10px;">
					      <?php 
								$row = $op->row();
								echo form_open('approval/edit_operasional/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN);
						  ?>
					
                            <table class="table-condensed">                             
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Berangkat</span></td>
               
									<td>
									   <?php
										  
										  $this->load->model('datemodel');
										  $tgl = new Datemodel();
										  
										  //$tgl_berangkat = $tgl->format_tanggal2($row->TGL_BERANGKAT);
										 
										  $data = array(
											   'name'        => 'date',
											   'id'          => 'inputDatepic',
											   'class'       => 'inputDatepic',
											   'value'       => $row->TGL_BERANGKAT
											   );
									   
										  echo form_input($data);
										  echo form_error('date');
									   ?>
						         </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Jam Berangkat</span></td>
                                    <td>
                                       <div class="input-append bootstrap-timepicker">
                                         <input id="timepicker4" type="text" class="input-small" name="jam_out" value="<?php echo $row->JAM_KELUAR; ?>" >
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
									   <?php echo form_error('jam_out');?>
                                    </td>
                                </tr>
								
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Kembali</span></td>
                             
									<td>
									   <?php
										  
										  $this->load->model('datemodel');
										  $tgl = new Datemodel();
										  
										  //$tgl_kembali = $tgl->format_tanggal2($row->TGL_KEMBALI);
										 
										  $data = array(
											   'name'        => 'date1',
											   'id'          => 'inputDatepic2',
											   'class'       => 'inputDatepic2',
											   'value'       => $row->TGL_KEMBALI
											   );
									   
										  echo form_input($data);
										  echo form_error('date1');
									   ?>
						         </td>
                                </tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Jam Kembali</span></td>
                                    <td>
                                       <div class="input-append bootstrap-timepicker">
                                         <input id="timepicker5" type="text" class="input-small" name="jam_in" value="<?php echo $row->JAM_KEMBALI; ?>">
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
									   <?php echo form_error('jam_in');?>
                                    </td>
                                </tr>
								
								<tr>
                                  <td class="inp_panel">Status</td>
                                  <td>
						             <?php 
										//Menampilkan dropdown level
										foreach($status->result() as $row_status)
										   $status_list[$row_status->ID_STATUS_OPERASIONAL] = $row_status->STATUS_OPERASIONAL;
			  
										 echo form_dropdown('ID_STATUS_OPERASIONAL', $status_list, $row->ID_STATUS_OPERASIONAL);
										 echo form_error('ID_STATUS_OPERASIONAL');
									 ?>
						   
					     </td>
				       </tr>
					
                                <tr>
                                	<td class=""></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Kirim"/>
                                        <input type="reset" class="btn2 btn2-danger btn2-small" value="Reset"/>
                                    </td>
                               </tr>
                            </table>
                            <?php echo form_close();?>
                     </div>
         
                
                </div>
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
		 
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  