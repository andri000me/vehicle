<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					    
						<div class="panel90">
                	       <div class="judul_pjbs">
                    	      <h3> Laporan </h3>
                           </div> <!--- End of div class judul_pjbs --->
						   
						   <div class="row-fluid">
                             <div class="span12">
							 
							    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								   <thead>
								      <tr>
									     <th width='10%'> </th>
										 <th width='40%'> </th>
                                         <th width='10%'> </th>
										 <th width='40%'> </th>
									  </tr>
								   </thead>
								   
								   <tbody>
								      <tr>
										 <td> 
										    <?php 
											   $img = img(base_url().'/asset/images/icon/operasional.jpg');
											   echo anchor('report/operasional', $img); 
											 ?> 
										 </td>
										 <td><br/><h4>Data Operasional<h4>&nbsp;</td>
										 
										 <td> 
										     <?php 
											    $img = img(base_url().'/asset/images/icon/op_user.png');
											    echo anchor('report/user', $img); 
											  ?> 
										</td>
										 <td><br/><h4>Operasional User<h4>&nbsp;</td>
									  </tr>
									  
									   <tr>
									     <td> 
										    <?php 
											    $img = img(base_url().'/asset/images/icon/kendaraan.png');
											    echo anchor('report/kendaraan', $img); 
											?> 
										 </td>
										 <td><br/><h4>Operasional Kendaraan<h4>&nbsp;</td>
									   
										 <td> 
										   <?php 
										      $img = img(base_url().'/asset/images/icon/sopir.jpg');
										      echo anchor('report/sopir', $img); ?> 
											</td>
										 <td><br/><h4>Operasional Sopir<h4>&nbsp;</td>
									  </tr>
									  
								   </tbody>
								</table>
							 
							 </div>  <!--- End of div class span12 --->
						   </div>  <!--- End of div class row-fluid --->
						   		 
						 </div> <!-- End of div class panel90 -->
		 
		             <div class="clear"></div>
                
            
                 </div>
             </div>
         </div>

<br/><br/>
