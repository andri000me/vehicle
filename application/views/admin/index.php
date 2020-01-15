<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
	<div class="content">
        <div class="container-fluid">
        	<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">commute</i>
                  </div>
                  <p class="card-category">Kendaraan</p>
                  <h3 class="card-title"><?php echo $kendaraan;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people_alt</i>
                  </div>
                  <p class="card-category">Sopir</p>
                  <h3 class="card-title"><?php echo $sopir;?>
				   <small>Orang</small>
				  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">archive</i>
                  </div>
                  <p class="card-category">Reimburse</p>
                  <h3 class="card-title">Rp<?php echo $reimburse;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from System
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">question_answer</i>
                  </div>
                  <p class="card-category">Permintaan</p>
                  <h3 class="card-title">+<?php echo $requestx;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Pending:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">spellcheck</i> Persetujuan
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">chat</i> Transaksi
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <thead class="text-primary">
						  <th>#</th>
						  <th>Nama</th>
						  <th>Keperluan</th>
						  <th>Tujuan</th>
						  <th>Berangkat</th>
						</thead>
						<tbody>
						<?php foreach($approval->result() as $a){?>
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
                            <td><?php echo $a->NAMA;?></td>
							<td><?php echo $a->KEPERLUAN;?></td>
							<td><?php echo $a->TUJUAN;?></td>
							<td><?php echo date('d-M-Y',strtotime($a->TGL_BERANGKAT));?></td>
                          </tr>
						<?php }?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <thead class="text-primary">
						  <th>#</th>
						  <th>Nama</th>
						  <th>Keperluan</th>
						  <th>Tujuan</th>
						  <th>Berangkat</th>
						</thead>
						<tbody>
						<?php foreach($transaksi->result() as $t){?>
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
                            <td><?php echo $t->NAMA;?></td>
							<td><?php echo $t->KEPERLUAN;?></td>
							<td><?php echo $t->TUJUAN;?></td>
							<td><?php echo date('d-M-Y',strtotime($t->TGL_BERANGKAT));?></td>
                          </tr>
                        <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-md-5">
                <div class="card card-chart">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="material-icons">pie_chart</i>
                    </div>
                    <h4 class="card-title">Status Kendaraan</h4>
                  </div>
                  <div class="card-body">
                    <div class="ct-chart"></div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-12">
                        <h6 class="card-category">Legends</h6>
                      </div>
                      <div class="col-md-12">
                        <i class="fa fa-circle text-info"></i> Terpakai
                        <i class="fa fa-circle text-danger"></i> Tersedia
                      </div>
                    </div>
                  </div>
                </div>
            </div>
		  </div>
        </div>
    
<script src="<?php echo base_url();?>asset/js/plugins/chartist.min.js"></script>
<script type="text/javascript">
var data = {
  // labels: ['Terpakai', 'Tersedia'],
  series: [<?php echo $terpakai;?>, <?php echo $tersedia;?>]
};
var sum = function(a, b) { return a + b };
var options = {
  height: 200,
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
};
new Chartist.Pie('.ct-chart', data, options);
</script>