<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <!---------------------------------------------------------------------------------------------------- -->
	<div class="content">
        <div class="container-fluid">
          <div class="row">
			<div class="col-md-12">
			  <div class="card card-nav-tabs">
				<div class="card-header card-header-primary">
				 <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#form" data-toggle="tab">
                            <i class="material-icons">assignment</i> Form C
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#request" data-toggle="tab">
                            <i class="material-icons">verified_user</i> Request
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#ops" data-toggle="tab">
                            <i class="material-icons">train</i> Operasional
                          </a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" href="#voucher" data-toggle="tab">
                            <i class="material-icons">local_atm</i> Voucher
                          </a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" href="#reimburse" data-toggle="tab">
                            <i class="material-icons">screen_share</i> Reimburse
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
			 <!--<div class="fleft" style="margin-left:10px;">
                        <table>
                              <tr>
                              	  <td><?php echo anchor('request/', 'Input Form C', array('class' => 'btn2 btn2-small btn2-warning' )); ?></td>
								  <td><?php echo anchor('request/daftar_request', 'Request', array('class' => 'btn2 btn2-small btn2-inverse' )); ?> </td>
								  <td><?php echo anchor('request/daftar_operasional', 'Operasional', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_sewa', 'Sewa', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_voucher', 'Voucher', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
								  <td><?php echo anchor('request/daftar_reimburse', 'Reimburse', array('class' => 'btn2 btn2-small btn2-inverse' )); ?></td>
                              </tr>
                          </table>
                    </div> -->
					    
			 <!-- isi dengan table atau tampilan -->
				<div class="card-body">
					<?php echo form_open('request/index');?>
					 <div class="row">
						<table class="table">                             
                                <tr>
                                	<td>Tanggal Berangkat</td>
									<td>
										   <?php
											  $date = date('d-m-Y');
											  
											  $data = array(
												   'name'        => 'date',
												   'id'          => 'inputDatepic',
												   'class'       => 'inputDatepic',
												   'value'       => $date,
												   'required'	 => 'required'
												   );
										   
											  echo form_input($data);
											  echo form_error('date');
										   ?>
								   </td>
                                </tr>
								
								<tr>
                                	<td>Jam Berangkat</td>
                                    <td>
                                       <div class="input-append bootstrap-timepicker">
                                         <input id="timepicker4" type="text" class="input-small" name="jam_out">
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
									   <?php echo form_error('jam_out');?>
                                    </td>
                                </tr>
								
                                <tr>
                                	<td>Tanggal Kembali</td>
									<td>
										   <?php
											  $date = date('d-m-Y');
											  
											  $data = array(
												   'name'        => 'date1',
												   'id'          => 'inputDatepic2',
												   'class'       => 'inputDatepic2',
												   'value'       => $date,
												   'required'	 => 'required'
												   );
										   
											  echo form_input($data);
											  echo form_error('date1');
										   ?>
								   </td>
                                </tr>
								
								<tr>
                                	<td>Jam Kembali</td>
                                    <td>
                                       <div class="input-append bootstrap-timepicker">
                                         <input id="timepicker5" type="text" class="input-small" name="jam_in" value="16:00:00" >
                                         <span class="add-on">
                                             <i class="icon-time"></i>
                                         </span>
                                       </div>
									   <?php echo form_error('jam_in');?>
                                    </td>
                                </tr>
								
								
                                <tr>
                                	<td>Jumlah Penumpang</td>
                                    <td>
                                    	<input type="text" placeholder="max 9" name="jml_penumpang" class="span1" maxlength="1" value="1" required/>
                                        <?php echo form_error('jml_penumpang');?>
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
                                	<td class=""><span  class="inp_panel">Keterangan Tujuan</span></td>
                                    <td>
                                    	<textarea name="ket_tujuan" required></textarea>
                                        <?php echo form_error('ket_tujuan');?>
                                    </td>
                                </tr>
                                <tr>
                                	<td class=""><span  class="inp_panel">Keperluan</span></td>
                                    <td>
                                    	<textarea name="keperluan" required></textarea>
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
					 </div>
					<?php echo form_close();?>
                </div>
			</div>
		</div>
	  </div>
	</div>
</div>