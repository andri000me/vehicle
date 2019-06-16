<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


 
 <!---------------------------------------------------------------------------------------------------- -->
 <div>
    <div id="content_pjbs">
        <div class="content_pjbs">	
            	
          <div class="sprtr_1"></div>
		  
		  
		  <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('request/', 'Input Form C', array('class' => 'btn2 btn2-small btn2-primary' )); ?></td>
								  <td><?php echo anchor('request/daftar_request', 'Lihat Daftar Request', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
                              </tr>
                          </table>
                    </div>  <!-- End of div class fleft -->
					
					<hr />
					 
          <div class="clear"></div>
					    
			 <!-- isi dengan table atau tampilan -->
			 <div class="panel90">
                	
 					<div class="fleft" style="margin-left:10px;">
                            <?php echo form_open('request/index');?>
                            <table class="table-condensed">
                                <?php /*<tr>
                                	<td class=""><span  class="inp_panel">Atas Nama</span></td>
                                    <td>
                                    	<input type="text" placeholder="Nama Pemohon" name="nama"/>
                                         echo form_error('nama');
                                    </td>
                                </tr>*/?>                               
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Berangkat</span></td>
                                    <td>
                                    	<input type="text" name="date" class="inputDatepic" id="inputDatepic" value="<?php echo date("d-m-Y"); ?>"/>
                                        <?php echo form_error('date');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Kembali</span></td>
                                    <td>
                                    	<input type="text" name="date1" class="inputDatepic2" id="inputDatepic2" value="<?php echo date("d-m-Y"); ?>"/>
                                        <?php echo form_error('date1');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Jam Berangkat	</span></td>
                                    <td>
                                    	<input type="text" placeholder="<?php echo date("H:i");?>" name="jam_out" maxlength="5" class="span1"/>
                                        <?php echo form_error('jam_out');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Jam Kembali</span></td>
                                    <td>
                                    	<input type="text" placeholder="<?php echo date("H:i") ?>" name="jam_in" maxlength="5" class="span1"/>
                                        <?php echo form_error('jam_in');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Jumlah Penumpang</span></td>
                                    <td>
                                    	<input type="text" placeholder="9" name="jml_penumpang" class="span1" maxlength="1"/>
                                        <?php echo form_error('jml_penumpang');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Status Dinas</span></td>
                                    <td>
                                    	<select name="id_tipe_spj">
                                        	<option value="1">1.Dalam kota tugas operasional</option>
                                            <option value="2">2.Luar kota</option>
                                            <option value="3">3.Dalam kota pemakai utama</option>
                                        </select>
                                        <?php echo form_error('id_tipe_spj');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keterangan Tujuan</span></td>
                                    <td>
                                    	<textarea name="ket_tujuan"></textarea>
                                        <?php echo form_error('ket_tujuan');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td>
                                    	<textarea name="keperluan"></textarea>
                                        <?php echo form_error('keperluan');?>
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