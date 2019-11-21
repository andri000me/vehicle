<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
             <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="<?php echo base_url().''.$this->uri->segment(0).'approval/lihat_operasional'?>" role="tablist">
                      <i class="material-icons">crop_rotate</i> Operasional
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                      <i class="material-icons">move_to_inbox</i> Reimburse
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                      <i class="material-icons">monetization_on</i> Voucher
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
                      <i class="material-icons">help_outline</i> Pending Request
                    </a>
                  </li>
                </ul>