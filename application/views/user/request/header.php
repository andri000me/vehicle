<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
             <div class="card-header card-header-primary">
				 <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'request/'?>">
                            <i class="material-icons">assignment</i> Form C
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'request/daftar_request'?>">
                            <i class="material-icons">verified_user</i> Request
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'request/daftar_operasional'?>">
                            <i class="material-icons">train</i> Operasional
                          </a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'request/daftar_voucher'?>">
                            <i class="material-icons">local_atm</i> Voucher
                          </a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'request/daftar_reimburse'?>">
                            <i class="material-icons">screen_share</i> Reimburse
                          </a>
                        </li>
                      </ul>
                    </div>
                 </div>
             </div>