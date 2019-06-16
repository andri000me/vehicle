<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h4>Form Tambah Data Lokasi</h4>
                      <?php 
					   echo anchor('master/lokasi','Batal', array('class' => 'btn2 btn2-warning fleft'));  
					   ?>
                    </div>
                    <hr>
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
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 

<?php echo anchor('home/logout', 'Logout'); ?>