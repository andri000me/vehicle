<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
		  
		  <div class="fleft" style="margin-left:10px;">
                      </div>
			<div class="clear"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Update Sewa</h3>
                      
                    </div>
                    
 					<div class="fleft" style="margin-left:10px;">
                            <?php 
								$row = $approval->row();
								echo form_open('approval/update_sewa/'.$row->ID_SEWA_KENDARAAN);
								?>
                            <table class="table-condensed">
                                <tr>
                                	<td class=""><span  class="inp_panel">Pemohon</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                    	<span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->PEMOHON;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Jenis Kendaraan</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                        <span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->JENIS_KENDARAAN;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">No Polisi</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                        <span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->NO_POLISI;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Supplier</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
                                        <span  class="inp_panel" style="font-weight:bold">
                                    	<?php echo $row->NAMA_INSTANSI;?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Biaya Sewa</span></td>
                                    <td><span  class="inp_panel">:</span></td>
                                    <td>
            							<?php 
										   echo form_input('biaya_sewa', '');
										   echo form_error('biaya_sewa');
										 ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""></td>
                                    <td></td>
                                    <td>
                                    	<input type="submit" class="btn2 btn2-primary btn2-small" value="Simpan"/>
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
 