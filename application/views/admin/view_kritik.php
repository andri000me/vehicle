<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					  <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('home/', 'Dashboard', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
                                  
								  <td><?php echo anchor('#', 'View Kritik & Saran', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					 
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Monitoring Kritik & Saran</h3>
                   <!-- Link kritik & saran-->
                   
                </div>
                <hr>
				<div class="row-fluid">
                		
                        <div class="span12" style="font-size:11px;">
                            
	<!-------- -------------------------------------------------------------------------------->
	                     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID USER</th>
										<th>NAMA USER</th>
										<th>WAKTU INPUT</th>
                                        <th>KRITIK & SARAN</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php					
									$no = 1;
									foreach($kritik->result()as $row)
									{
								?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->ID_USER; ?></td>
										<td><?php echo $row->NAMA; ?></td>
										<td><?php echo $row->WAKTU_MASUK; ?></td>
                                        <td><?php echo $row->KOMENTAR; ?></td>
                                    </tr>
                                 <?php 
								 	$no++;
								 	} 
								 ?>
                                </tbody>
                                
                            </table>

	<!-------- -------------------------------------------------------------------------------->
							
                        </div>
                        
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>
