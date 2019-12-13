<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		<!-- start modal kritik & saran-->
         	<div id="myModal" class="modal fade" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="min-width:140px;width:auto;margin-left:-140px;display:none">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="judul_pjbs">
                  <h4>Kritik & Saran</h4>
              </div>
            </div>
            <div class="modal-body">
                <div class="fleft">
                <?php echo form_open('kritik/index');?>
                  <table class="table-condensed">
                      <tr><td class="" valign="top"><span class="inp_panel">Kritik & Saran</span></td><td><textarea name="kritik"></textarea>
                      <input type="hidden" name="kritik_notif" value="1" /></td></tr>
                      <tr>
                        <td class=""></td>
                        <td>
                            <input type="submit" class="btn2 btn2-warning btn2-small" value="Kirim" style="float:left"/>
                        </td>
                      </tr>
                   </table>
                <?php echo form_close(); ?>
                </div>
            </div>
      	</div>
        
            <!-- End modal kritik & saran-->
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					  <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('home/', 'Dashboard', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
								  <td><?php echo anchor('jadwal/', 'Jadwal Operasional', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('#', 'Kritik & Saran', array('class' => 'btn2 btn2-small btn2-inverse','data-toggle'=>'modal','data-target'=>'#myModal')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					 
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Monitoring Kendaraan</h3>
                </div>
                <hr>
				<div class="row-fluid">
                		
                        <div class="span12" style="font-size:11px;">
                            
	<!-------- -------------------------------------------------------------------------------->
	                     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KENDARAAN</th>
										<th>STATUS</th>
                                        <th>SOPIR</th>
                                        <th>TUJUAN</th>
                                        <th>WAKTU BERANGKAT</th>
										<th>WAKTU KEMBALI</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php
//ID_KENDARAAN ID_SOPIR 	ID_LOKASI 	ID_JENIS_KENDARAAN 	NO_POLISI 	ID_STATUS_KENDARAAN 	NAMA 	ID_JENIS_KEND 	JENIS_KENDARAAN 	STATUS_KENDARAAN 					
									$no = 1;
									foreach($kendaraan->result()as $row)
									{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->NO_POLISI; ?></td>
										
										<td>
                                        	<?php
                                            $sta = $row->ID_STATUS_KENDARAAN;
											if($sta==0){
												?>
												<span class="label"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==1){
												?>
												<span class="label label-info"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==2){
												?>
												<span class="label label-important"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==3){
												?>
												<span class="label label-success"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==4){
												?>
												<span class="label label-important"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==5){
												?>
												<span class="label label-warning"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											
											?>
                                        </td>
										
                                        <td><?php 
												$sopir = $row->SOPIR;
												if($sopir==""){
													echo"-";
												}else
												{
													echo $row->SOPIR;
												}
											?></td>
										<td><?php 
												$tujuan = $row->KETERANGAN_TUJUAN;
												if($tujuan==""){
													echo"-";
												}else
												{
													echo $row->KETERANGAN_TUJUAN;
												}
											?></td>
                                        <td><?php 
												$tgl = $row->TGL_BERANGKAT;
												if($tgl==""){
													echo"-";
												}else
												{
													echo $row->TGL_BERANGKAT."&nbsp;".$row->JAM_KELUAR;
												}
											?>
										</td>
										<td><?php 
												$tgl = $row->TGL_KEMBALI;
												if($tgl==""){
													echo"-";
												}else
												{
													echo $row->TGL_KEMBALI."&nbsp;".$row->JAM_KEMBALI;
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

	<!-------- -------------------------------------------------------------------------------->
					<hr>
					<div class="judul_pjbs">
                         <h3>Monitoring Sopir</h3>
                    </div>
					<br/><br/>
					
                          <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2" style="width:500px;">
                                <thead>
                                    <tr>
                                        <th width="20%" >ID</th>
                                        <th width="40%">NAMA SOPIR</th>
                                        <th width="40%">STATUS</th>
                                    </tr>
                                </thead>
								
								<tbody>
								    <?php

									foreach($driver_aktif->result()as $rowd)
									{
								   ?>
								
								   <tr>
								     <td><?php echo $rowd->NID; ?></td>
                                     <td><?php echo $rowd->NAMA; ?></td>
									 <td style="text-align:center">
											<?php
                                            $cek = $rowd->ID_STATUS_SOPIR;
											if($cek!=1 && $cek!=2){
												?>
                                                  <span class="label label-warning"><?php echo $rowd->STATUS_SOPIR; ?></span><br>
												<?php
                                                }
										    else if($cek == 2)
											{
											    ?>
												<span class="label label-important"><?php echo $rowd->STATUS_SOPIR; ?></span><br>
												<?php
											}
											else{
												?>
												<span class="label label-success"><?php echo $rowd->STATUS_SOPIR; ?></span><br>
												<?php
												}
											?>  
                                        </td>
								   </tr>
								   
								   <?php 
								 	
								 	} 
								   ?>
								</tbody>
								
						 </table>
					
						<!----- ----------------------------------------------------------->
							
                        </div>
                        
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>
