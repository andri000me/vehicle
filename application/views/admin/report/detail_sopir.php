<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
								  <td><?php echo anchor('report/sopir', 'Operasional Sopir', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
								  <td><?php echo anchor('report/detail_sopir', 'Detail Operasional Sopir', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					 
			<div class="clear"></div>
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Operasional Sopir</h3>
				   <?php
				    //echo anchor('jamop/hitungjam2','Ubah Rentang Waktu', array('class' => 'btn2 btn2-warning btn2-small',));
				   ?>
                </div>
                <hr>
				
				<div class="row-fluid">
				    	
                        <div class="span12" style="font-size:11px;">
						
						  <?php
					   
					        $tanggal = explode('|', $tgl);
					   
					        //echo $tanggal[0]." s/d ".$tanggal[1];
					        //echo "<br/><br/>";
					   
				     	 ?>
						 
						 <?php echo form_open('report/detail_sopir');?>
                            <table class="table-condensed">
							    <tr>
								   <td class=""><span  class="inp_panel">Sopir</span></td>
								   <td>
								       <?php
									      $sopir_list = array();
									   
                                          foreach($driver_aktif->result() as $row_sopir)
                                             $sopir_list[$row_sopir->NAMA] = $row_sopir->NAMA;
											
										  echo form_dropdown('id_sopir', $sopir_list, set_value('id_sopir'));
                                          echo form_error('id_sopir');
									   ?>
								   </td>
								<tr>
							
                                <tr>
                                	<td class=""><span  class="inp_panel">Tanggal Awal</span></td>
                                    <td>
									   <?php
										  $date = date('01-m-Y');
										  
										  $data = array(
											   'name'        => 'date',
											   'id'          => 'inputDatepic',
											   'class'       => 'inputDatepic',
											   'value'       => $date
											   );
									   
										  echo form_input($data);
										  echo form_error('date');
									   ?>
									</td>
                                </tr>
								
								<tr>
								     <td class=""><span  class="inp_panel">Tanggal Akhir</span></td>
                                    <td>
									   <?php
										  $date = date('d-m-Y');
										  
										  $data = array(
											   'name'        => 'date1',
											   'id'          => 'inputDatepic2',
											   'class'       => 'inputDatepic2',
											   'value'       => $date
											   );
									   
										  echo form_input($data);
										  echo form_error('date1');
									   ?>
									</td>
								</tr>
								
								<tr>
                                	<td class=""><span  class="inp_panel">Status Dinas</span></td>
                                    <td>
                                    	<select name="id_tipe_spj">
                                        	<option value="1">1.Dalam kota tugas operasional</option>
                                            <option value="2">2.Luar kota</option>
                                            
                                        </select>
                                        <?php echo form_error('id_tipe_spj');?>
                                    </td>
                                </tr>
								
								<tr>
								    <td>
                                    	<input type="submit" class="btn2 btn2-warning btn2-small" value="Lihat"/>
                                    </td>
								</tr>
                            
                            </table>
                         <?php echo form_close();?>
						 
					<div class="sprtr_1"></div>           
                         <!-- ini adalah tanggal -->
                    <div class="block">
                            <div class="block-content collapse in">
                                <div class="span12 chart">
                                    <h5>
									  <?php $tanggal = explode('|', $tgl);
					                        echo $tanggal[0]." s/d ".$tanggal[1]." ".$tanggal[2]; ?>
							        </h5>
                                </div>
                            </div>
                    </div>
						 
						 <!--------------------------------------------------------------------------------------------------------------- -->
                	
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" style="display:block">
                                <thead>
                                    <tr>
                                        <th width="2%">NO</th>
                                        <th width="15%">NAMA </th>
										<th width="20%">SOPIR / KENDARAAN</th>
                                        <th width="15%">WAKTU BERANGKAT</th>
										<th width="15%">WAKTU KEMBALI</th>
										<th width="25%">TUJUAN</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
									    $no = 1;
										foreach($user->result() as $row)
										{  
										   //$data = explode('|', $row);
										?>
										<tr>
										  <td> <?php echo $no; $no++; ?>&nbsp; </td>
										  <td> <?php echo $row->PEMOHON; ?>&nbsp; </td>
                                          <td> <?php echo $row->NAMA_SOPIR." - ".$row->JENIS_KENDARAAN." ".$row->NO_POLISI; ?>&nbsp; </td>
										  <td> <?php echo $row->TGL_BERANGKAT." ".$row->JAM_KELUAR; ?>&nbsp; </td>
										  <td> <?php echo $row->TGL_KEMBALI." ".$row->JAM_KEMBALI; ?>&nbsp; </td>
										  <td> <?php echo $row->KETERANGAN_TUJUAN; ?>&nbsp; </td>
										</tr>
										<?php
										}
									    ?>   
                             
                                </tbody>
                                
                            </table>
                        </div>
                        
		             <div class="clear"></div>
					 
					 <div class="sprtr_1"></div>           
                    
            
                 </div>
             </div>
         </div>

<br/><br/>


