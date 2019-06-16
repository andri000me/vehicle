<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('home/', 'Dashboard', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                                  <td><?php echo anchor('jamop/kendaraan', 'Jam Operasional Kendaraan', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
								  <td><?php echo anchor('jamop/sopir', 'Jam Operasional Sopir', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					  <div class="clear"></div>
					 
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Jam Operasional Kendaraan</h3>
				   <?php
				    //echo anchor('jamop/hitungjam','Ubah Rentang Waktu', array('class' => 'btn2 btn2-warning btn2-small',));
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
						 
						 <?php echo form_open('jamop/kendaraan');?>
                            <table class="table-condensed">
							
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
								    <td>
                                    	<input type="submit" class="btn2 btn2-warning btn2-small" value="Hitung"/>
                                    </td>
								</tr>
                            
                            </table>
                         <?php echo form_close();?>
						 
                	<!------------------------------------------------------------------------------------------------------------- -->
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2" style="display:none">
                                <thead>
                                    <tr>
                                        <th width="10%;">NO</th>
                                        <th width="25%">NO POLISI</th>
										<th width="40%">JENIS KENDARAAN</th>
                                        <th width="25%">JAM OPERASIONAL</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
									    $no = 1;
										foreach($op as $row)
										{  
										   $data = explode('|', $row);
										?>
										<tr>
										  <td> <?php echo $no; $no++; ?>&nbsp; </td>
										  <td> <?php echo $data[0]; ?>&nbsp; </td>
                                          <td> <?php echo $data[1]; ?>&nbsp; </td>
										  <td> <?php echo $data[2]; ?>&nbsp; </td>
										</tr>
										<?php
										}
									    ?>   
                             
                                </tbody>
                                
                            </table>
                        </div>
                        
		             <div class="clear"></div>
					 
					 <div class="sprtr_1"></div>           
                         <!-- ini adalah graph jon -->
                    <div class="block">
                            <div class="block-content collapse in">
                                <div class="span12 chart">
                                    <h5>
									  <?php $tanggal = explode('|', $tgl);
					                        echo $tanggal[0]." s/d ".$tanggal[1]; ?>
							        </h5>
                                    <div id="hero-bar" style="height: 250px;"></div>
                                </div>
                            </div>
                    </div>
                         <!-- akhir graph -->    
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>

<script src="<?php echo base_url();?>asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/moris-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/raphael-min.js"></script>
<script>
        // Morris Bar Chart
        Morris.Bar({
            element: 'hero-bar',
            data:[
			<?php foreach($op as $rows){  $datas = explode('|', $rows); ?>
                {device: '<?php echo $datas[1]; ?>' , sells: <?php echo $datas[2]; ?>},
                
           		
            <?php }?>],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Total Jam'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });

</script>
