<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
	  <div class="row"> 
		<div class=" col-md-4 ml-auto mr-auto">
          <div class="card card-login">
            <!--<form class="form" method="" action="">-->
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login Form</h4>
              </div>
              <div class="card-body">
				<?php echo form_open('home/login');?>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="username" required="" placeholder="Username">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
				<div class="card-footer text-center">
					<input type="submit" name="submit" value="Get Started" class="btn btn-outline-primary btn-round btn-lg btn-block">
				</div>
				<?php echo form_close(); ?>
              </div>
            </form>
          </div>
        </div> 