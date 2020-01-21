<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
	<div class="content">
        <div class="container-fluid">
          <div class="row">
			<div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Approval Information</h4>
                  <p class="card-category">Hasil persetujuan oleh Manajer Divisi terkait.</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
					  <th>Tujuan</th>
                      <th>Berangkat</th>
					  <th>Status</th>
                    </thead>
                    <tbody>
					<?php 
					$no=1;
					foreach($info->result() as $p){?>
                      <tr>
                        <td><?php echo $no;?></td>
						<td><?php echo $p->TUJUAN;?></td>
						<td><?php echo date('d-M-Y',strtotime($p->TGL_BERANGKAT));?></td>
						<td><?= reqStat($p->STATUS);?></td>
                      </tr>
					<?php $no++; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-rose">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#messages" data-toggle="tab">
                            <i class="material-icons">chat</i> Peminjaman
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="messages">
                      <table class="table">
                        <thead class="text-rose">
						  <th>#</th>
						  <th>Tujuan</th>
						  <th>Berangkat</th>
						  <th>Supir</th>
						  <th>Kendaraan</th>
						</thead>
						<tbody>
						<?php foreach($peminjaman->result() as $t){?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
							<td><?php echo $t->TUJUAN;?></td>
							<td><?php echo date('d-M-Y',strtotime($t->TGL_BERANGKAT));?></td>
                            <td><?php echo $t->SUPIR;?></td>
							<td><?php echo $t->KENDARAAN;?></td>
                          </tr>
                        <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		  </div>
        </div>
    </div>