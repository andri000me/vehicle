<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Monitoring</h3>
                </div>
                <hr>
				<div class="row-fluid">
						
                        <div class="span12" style="font-size:11px;">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="30%">Kendaraan</th>
                                        <th width="30%">Plat</th>
                                        <th width="30%">Status</th>
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
                                        <td><?php echo $row->JENIS_KENDARAAN; ?></td>
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
												<span class="label label-warning"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==3){
												?>
												<span class="label label-important"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==4){
												?>
												<span class="label label-important"><?php echo $row->STATUS_KENDARAAN; ?></span>
												<?php
												}
											else if($sta==5){
												?>
												<span class="label label-success"><?php echo $row->STATUS_KENDARAAN; ?></span>
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
							
							<!---------------------------------------------------------------------------------------------------------------------->
	
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
	
	<!----------------------------------------------------------------------------------------------------------------------->
							
                        </div>
                        
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>
