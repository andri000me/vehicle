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
								  <td><?php echo anchor('approval/approval_admin', 'Request', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('approval/lihat_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
								  <td><?php echo anchor('approval/hal_op_reject', 'Pembatalan', array('class' => 'btn2 btn2-small btn2-danger')); ?></td>
								  <td><?php echo anchor('approval/lihat_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('approval/lihat_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					<hr>
					    
			<div class="clear"></div>				
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Edit Sopir / Kendaraan</h3>
                    </div>
					
 					<div class="fleft" style="margin-left:10px;">
					      <?php 
								$row = $op->row();
								echo form_open('approval/edit_operasional/'.$row->ID_OPERASIONAL."-".$row->ID_SOPIR."-".$row->ID_KENDARAAN);
						  ?>
					
                            <table class="table-condensed">                             
							  
							  <tr>
                                	<td class=""><span  class="inp_panel">Sopir</span></td>
									<td>
						                <?php 
                                       $sopir_list = array();
									   
									    $sp =  explode('-', $current_sopir);
										$sopir_list[$sp[0]] = $sp[1];
									   
                                        foreach($driver_aktif->result() as $row_sopir)
                                           $sopir_list[$row_sopir->ID_SOPIR] = $row_sopir->NAMA;
										   
										$list_sopir = explode('|', $sopir);
						 
										 for($i = 0; $i < count($list_sopir)-1; $i++)
										 {
										   $data_sopir = explode('/', $list_sopir[$i]);										 
										   $sopir_list[$data_sopir[0]] = $data_sopir[2];
										 }
										 
										 //tambahan
										 
										 $list_sopir2 = explode('|', $sopir2);
						 
										 for($i = 0; $i < count($list_sopir2)-1; $i++)
										 {
										   $data_sopir2 = explode('/', $list_sopir2[$i]);										 
										   $sopir_list[$data_sopir2[0]] = $data_sopir2[2];
										 }
      
                                        echo form_dropdown('id_sopir', $sopir_list, $row->ID_SOPIR);
                                        echo form_error('id_sopir');
                                     ?>
					                 </td>
                                </tr>
                                <tr>
                                	<td><span  class="inp_panel">Mobil</span></td>
									<td>
						                <?php 
                                        $mobil_list= array();
										
										$mb =  explode('-', $current_mobil);
										$mobil_list[$mb[0]] = $mb[1]." - ".$mb[2];
									   
                                        foreach($mobil_aktif->result() as $row_mobil)
                                           $mobil_list[$row_mobil->ID_KENDARAAN] = $row_mobil->JENIS_KENDARAAN." - ".$row_mobil->NO_POLISI;
										   
										$list_mobil = explode('|', $mobil);
						 
										 for($i = 0; $i < count($list_mobil)-1; $i++)
										 {
										   $data_mobil = explode('/', $list_mobil[$i]);										 
										   $mobil_list[$data_mobil[0]] = $data_mobil[3]." - ".$data_mobil[2];
										 }
										 
										//tambahan
										$list_mobil2 = explode('|', $mobil2);
						 
										 for($i = 0; $i < count($list_mobil2)-1; $i++)
										 {
										   $data_mobil2 = explode('/', $list_mobil2[$i]);										 
										   $mobil_list[$data_mobil2[0]] = $data_mobil2[3]." - ".$data_mobil2[2];
										 }
      
                                        echo form_dropdown('id_kendaraan', $mobil_list, $row->ID_KENDARAAN);
                                        echo form_error('id_kendaraan');
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