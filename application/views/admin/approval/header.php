<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
             <div class="card-header card-header-primary">
				    <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'approval/lihat_operasional'?>">
						  <h6 class="card-title">Operasional</h6>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url().''.$this->uri->segment(0).'approval/reject'?>">
                          <h6 class="card-title">Pembatalan</h6>
                          </a>
                        </li>
                      </ul>
                    </div>
                 </div>
             </div>