<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
 <!---------------------------------------------------------------------------------------------------- -->
 
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	<div class="judul_pjbs">
                      <h3>Insert Data Slider</h3>
                      <?php 
					   echo anchor('master/slider','<< Slider', 
					   array(
					  		'class' => 'btn2 btn2-warning fleft'
							));  
					   ?>
                    </div>
                    <hr>
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
             <!-- End of div class panel90 -->
		 
		 <div class="clear"></div>
                
		 <br><br><br><br>
          
        </div> <!-- End of div id content_pjbs -->
    </div> <!-- End of div  class content_pjbs -->
 </div>  
 