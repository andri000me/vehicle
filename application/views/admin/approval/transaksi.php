<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="content">	
 	<div class="container-fluid">
 		<div class="row">
		<a href="<?php echo base_url().''.$this->uri->segment(0).'approval/insert_op/';?>" class="made-with-mk">
			<div class="brand"><i class="material-icons">library_add</i></div>
			<div class="made-with">Tambah <strong>Transaksi</strong></div>
		</a>
 			<div class="col-md-12 ml-auto mr-auto">
			 <div class="page-categories">
			 <!-- Header -->
			 <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" role="tablist">
				<li class="nav-item">
				 <a class="nav-link active" data-toggle="tab" href="#operasional" role="tablist">
				  <i class="material-icons">crop_rotate</i> Operasional
				 </a>
				</li>
				<li class="nav-item">
				 <a class="nav-link" data-toggle="tab" href="#reimburse" role="tablist">
				  <i class="material-icons">move_to_inbox</i> Reimburse
				 </a>
				</li>
				<li class="nav-item">
				 <a class="nav-link" data-toggle="tab" href="#voucher" role="tablist">
				  <i class="material-icons">monetization_on</i> Voucher
				 </a>
				</li>
				<li class="nav-item">
				 <a class="nav-link" data-toggle="tab" href="#pending" role="tablist">
				  <i class="material-icons">help_outline</i> Pending Request
				 </a>
				</li>
             </ul>
			 <!-- Menu -->
			 <div class="tab-content tab-space tab-subcategories">
			  <div class="tab-pane active" id="operasional">
				<?php include "data_operasional.php";?>
			  </div>
			  <div class="tab-pane" id="reimburse">
				<?php include "data_reimburse.php";?>
			  </div>
			  <div class="tab-pane" id="voucher">
				<?php include "data_voucher.php";?>
			  </div>
			  <div class="tab-pane" id="pending">
				<?php include "data_pending.php";?>
			  </div>
			</div>
		</div>
	</div>