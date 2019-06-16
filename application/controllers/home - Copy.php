<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File home.php
	  @author IT-PJBS
	  
	  Controller untuk user dan menu
	*/
	
	class Home extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   public function index()
	   {
	     $this->load->model('slidermodel');
	     $this->load->model('monitoring_model');
		 
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
	     
	     if($this->auth->is_logged_in() == false)
		   $this->login();
		 else
		 {
		    //Load model 'usermodel'
			$this->load->model('usermodel');
			//Level untuk user ini
			$level = $this->session->userdata('level');
			$id_subdit = $this->session->userdata('subdit_id');
			//Ambil menu dari database sesuai dengan level
			$data['menu'] = $this->usermodel->get_menu_for_level($level);
			$data['subdit'] = $this->usermodel->get_user_subdit($id_subdit);
			
			$this->load->model('appr_admin_model');
			if($level==6)
			{$data['kendaraan'] = $this->monitoring_model->tampil_kendaraan_jkt();
			 $data['driver_aktif'] = $this->appr_admin_model->get_status_sopir_op_jkt();}else
			{$data['kendaraan'] = $this->monitoring_model->tampil_kendaraan();
			 $data['driver_aktif'] = $this->appr_admin_model->get_status_sopir_op();}
			
			$data['class1'] = 'alert alert-success';
			$data['title1'] = 'Kritik & Saran';
			$data['alert1'] = 'Data sudah tersimpan';
			$data['notif']  = $this->uri->segment(3);
			
		    //Set variabel $title
		    $this->template->set('title', 'Selamat datang di aplikasi Manajemen Kendaraan Dinas');
		    //Load file view 'index.php'
			if($level == 1)
		      $this->template->load('template_refresh', 'admin/index', $data);
			else if($level == 2)
			  $this->template->load('template_refresh', 'manajer/index', $data);
			else if($level == 3 || $level == 6)
			  $this->template->load('template_refresh', 'user/index', $data);
			else
			  $this->template->load('template_refresh', 'operator/index', $data);
			  
			 //$this->load->view('admin/sukses');
		 } //End of else
	      
	   }
	   //End of function index
	   
	   public function login()
	   {
	      $this->load->library('form_validation');
		  $this->form_validation->set_rules('username', 'Username', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">','</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {
		     $this->template->set('title', 'Halaman Login aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template_2','login_form');
		  } //End of if
		  else
		  {
		     $username = $this->input->post('username');
			 $password = $this->input->post('password');
			 $respon = $this->auth->portalAuthenticate($username,$password);
			 
			 if($respon->RESPONSE == "1")
			   redirect('home/index');   //Lemparkan ke halaman index user
			 elseif($respon->RESPONSE == "PAGE")
			 {
			 ?>
				<script>
					top.location.href = 'http://portal.pjbservices.com/<?php echo $respon->RESPONSE_LINK; ?>/?reqNID=<?php echo $respon->NID; ?>&reqAplikasiId=<?php echo $respon->APLIKASI_ID; ?>';
				</script>
			 <?php
			 }  
			 else
			 {
			    $this->template->set('title', 'Halaman Login aplikasi Monitoring Kendaraan Dinas');
			    $data['login_info'] = $respon->RESPONSE_MESSAGE;
				$this->template->load('template_2','login_form', $data);
			 } //End of else
		  }//End of else
		  
	   }
	   //End of function login

		// public function autologin()
		// {
		  // $reqGroupId = $this->input->get("reqGroupId");
		  // if($reqGroupId == "")
			  // $respon = $this->auth->autoAuthenticate($_GET['reqUser'],$_GET['reqToken']);
		  // else
			  // $respon = $this->auth->autoGroupAuthenticate($_GET['reqUser'],$_GET['reqToken'], $reqGroupId);
		  
			 // if($respon->RESPONSE == "1")
			   // redirect('home/index');   //Lemparkan ke halaman index user
			 // elseif($respon->RESPONSE == "PAGE")
			 // {
			 // ?>
				// <script>
					// top.location.href = 'http://portal.pjbservices.com/<?php echo $respon->RESPONSE_LINK; ?>/?reqNID=<?php echo $respon->NID; ?>&reqAplikasiId=<?php echo $respon->APLIKASI_ID; ?>';
				// </script>
			 // <?php
			 // }  
		  // else
		  // {
			    // $this->template->set('title', 'Halaman Login aplikasi Monitoring Kendaraan Dinas');
			    // $data['login_info'] = $respon->RESPON_MESSAGE;
				// $this->template->load('template_2','login_form', $data);
		  // }
		// }
		
	   public function logout()
	   {
	      if($this->auth->is_logged_in() == true)
		  {
		  /* DESTROY ALL SESSION */
		  $wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';
		  $cl = new SoapClient($wsdl);
		  $rv = $cl->destroyToken($this->session->userdata('nid'));	
		  
		  $this->auth->do_logout();  //Jika sedang login, destroy session
		  }	
		  redirect('home'); //Larikan ke halaman utama
	   }
	   //End of function logout
	   
	   public function assigning()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('sopirmodel');
		 $this->load->model('kendaraanmodel');
		 //$this->load->model('linkedlist');
		 
		 $data['list_sopir'] = $this->sopirmodel->get_available_sopir();
		 $data['list_kendaraan'] = $this->kendaraanmodel->get_available_kendaraan();
		 
		 $this->template->set('title','Assigning | Aplikasi Monitoring Kendaraan Dinas');
		 $this->template->load('template', 'admin/assigning', $data);
	   }
	   //End of function assigning
	   
	   public function master()
	   {
		 $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);

		 $this->auth->restrict();
		 $this->auth->check_menu(1);

		 $this->template->set('title','Manajemen Master Data | Aplikasi Monitoring Kendaraan Dinas');
		 $this->template->load('template', 'admin/master', $data);
	   }
	   //End of function master
	   
	}
	//End of class Home
	
	/**
	   End of file: home.php
	   Location: ./application/controllers/home.php
	*/