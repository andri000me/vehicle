<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 <div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
								  <td><?php echo anchor('report/user', 'Operasional User', array('class' => 'btn2 btn2-small btn2-primary')); ?></td>
								  <td><?php echo anchor('report/detail_user', 'Detail Operasional User', array('class' => 'btn2 btn2-small btn2-inverse')); ?></td>
                              </tr>
                          </table>
                      </div>
					  
					  <br/><br/>
					  <hr>
					 
			<div class="clear"></div>
						<!-- isi dengan table atau tampilan -->
		 	<div class="panel90">
                <div class="judul_pjbs">
                   <h3>Operasional User</h3>
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
						 
						 <?php echo form_open('report/user');?>
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
						 
						 <!--------------------------------------------------------------------------------------------------------------- -->
                	
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2" style="display:none">
                                <thead>
                                    <tr>
                                        <th width="10%;">NO</th>
                                        <th width="30%">ID USER</th>
										<th width="30%">NAMA</th>
                                        <th width="30%">JUMLAH OPERASIONAL</th>
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
										  <td> <?php echo $row->ID_PEMOHON; ?>&nbsp; </td>
                                          <td> <?php echo $row->PEMOHON; ?>&nbsp; </td>
										  <td> <?php echo $row->JML_OPERASIONAL; ?>&nbsp; </td>
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
                                    <!--<div id="hero-bar" style="height: 250px;"></div>-->
									
									<div id="grafik" style="min-width: 310px; min-heigt: 400px; height: auto; margin: 0 auto"></div>
                                </div>
                            </div>
                    </div>
                         <!-- akhir graph -->   
            
                 </div>
             </div>
         </div>

<br/><br/>

<script src="<?php echo base_url();?>asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/moris-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/raphael-min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>asset/js/highcharts.js"></script>

<script type="text/javascript">
$(function () {
        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Jumlah Operasional User'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: <?php echo $nama; ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Operasional',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: 'kali'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: '',
                data: <?php 
				      echo "[" ;
                       
                        foreach($user->result() as $rows)
						{
						  echo $rows->JML_OPERASIONAL.",";
                        }						
					  echo "]";
					  ?>
            }]
        });
    });
    
</script>

