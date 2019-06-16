<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File kendaraan.php
	  author IT-PJBS
	  
	  Controller untuk Kendaraan dan Detail_Kendaraan_Dinas
	*/
	
	class Kendaraan extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   //Index untuk manajemen kendaraan
	   public function index()
	   {
		 $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     
	     $this->load->model('kendaraanmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
	     $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		 $this->template->set('title', 'Manajemen Kendaraan Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/kendaraan/kendaraan_index', $data);	 
	   }
	   //End of function index
	   
	   function insert_kendaraan()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('id_jenis_kendaraan', 'id_jenis_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('no_polisi', 'no_polisi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $data['jenis_kendaraan'] = $this->kendaraanmodel->get_all_jenis_kendaraan();
	         //$data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
			 
		     $this->template->set('title', 'Form Tambah Kendaraan Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/kendaraan/insert_kendaraan_form', $data);
		  }//End of if
		  else
		  {
		     $data_kendaraan = array(
			    'id_kendaraan' => $this->input->post('id_kendaraan'),
				'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan'),
				'tahun' => $this->input->post('tahun'),
				'no_polisi' => $this->input->post('no_polisi')
			 );
			 
			 $this->kendaraanmodel->insert_data_kendaraan($data_kendaraan);
			 
			 redirect('kendaraan/index');
		  } //End of else
		  
	   }
	   //End of funtion insert_kendaraan
	   
	   function edit_kendaraan()
	   {
		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('id_jenis_kendaraan', 'id_jenis_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('no_polisi', 'no_polisi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
          	  
          $id = $this->uri->segment(3);	
          
           if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  
			  $data['status_kendaraan'] = $this->kendaraanmodel->get_all_status_kendaraan();
			  $data['jenis_kendaraan'] = $this->kendaraanmodel->get_all_jenis_kendaraan();
	          $data['kendaraan'] = $this->kendaraanmodel->get_kendaraan_by_id($id);
			  
		      $this->template->set('title', 'Form Edit Kendaraan Aplikasi Monitoring Kendaraan Dinas');
			  $this->template->load('template','admin/kendaraan/edit_kendaraan_form', $data);
		   } //End of if
           else
           {
		       $data_kendaraan = array(
			     'id_kendaraan' => $this->input->post('id_kendaraan'),
				 'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan'),
				 'tahun' => $this->input->post('tahun'),
				 'no_polisi' => $this->input->post('no_polisi'),
				 'id_status_kendaraan' => $this->input->post('id_status_kendaraan'),
			   );
			   
			   $this->kendaraanmodel->update_data_kendaraan($data_kendaraan, $id);
			   
			   redirect('kendaraan/index');
		   } //End of else		   
		
	   }
	   //End of function edit_kendaraan
	   
	   function delete_kendaraan()
	   {
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('kendaraanmodel');
		 
		 $id = $this->uri->segment(3);
		 $this->kendaraanmodel->delete_kendaraan($id);
		 
		 redirect('kendaraan/index');
	   }
	   //End of function delete_kendaraan
	   
	   //------------------------------ Detail_Kendaraan_Dinas Controller ---------------------------------------//
	   
	   function view_detail_kd()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kendaraanmodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['detail_kd'] = $this->kendaraanmodel->get_all_detail_kd();
		 
		 $this->template->set('title', 'Manajemen Detail Kendaraan Dinas Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/kendaraan/detail_kendaraan_dinas', $data);
	   }
	   //End of function view_detail_kd
	   
	   function insert_detail_kd()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kendaraanmodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		 //$this->form_validation->set_rules('', 'id_kendaraan_dinas', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		     $data['tipe_kd'] = $this->kendaraanmodel->get_all_tipe_kd();
			 
			 $this->load->model('subditmodel');
		     $data['pengguna'] = $this->subditmodel->get_all_jabatan();
			 
		     $data['sopir'] = $this->kendaraanmodel->get_all_sopir();
		     $data['lokasi'] = $this->kendaraanmodel->get_all_lokasi();
	         //$data['detail_kd'] = $this->kendaramodel->get_all_detail_kd();
			 
		     $this->template->set('title', 'Form Tambah Detail Kendaraan Dinas Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/kendaraan/insert_detail_kd_form', $data);
		  }//End of if
		  else
		  {
		      $data_detail_kd = array(
				  'id_kendaraan' => $this->input->post('id_kendaraan'),
				  'id_tipe_kendaraan_dinas' => $this->input->post('id_tipe_kendaraan_dinas'),
				  'id_pengguna' => $this->input->post('id_pengguna'),
				  'id_sopir' => $this->input->post('id_sopir'),
				  'id_lokasi' => $this->input->post('id_lokasi'),
				  'tgl_serah_terima' => $this->input->post('tgl_serah_terima')
			  );
			  
			  $this->kendaraanmodel->insert_data_detail_kd($data_detail_kd);
			  
			  redirect('kendaraan/view_detail_kd');
		  } //End of else
	     
	   }
	   //End of function insert_detail_kd
	   
	   function edit_detail_kd()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  //$this->form_validation->set_rules('id_kendaraan_dinas', 'id_kendaraan_dinas', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
			
	        $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		    $data['tipe_kd'] = $this->kendaraanmodel->get_all_tipe_kd();
			
		    $this->load->model('subditmodel');
		    $data['pengguna'] = $this->subditmodel->get_all_jabatan();
			
		    $data['sopir'] = $this->kendaraanmodel->get_all_sopir();
		    $data['lokasi'] = $this->kendaraanmodel->get_all_lokasi();
	        $data['detail_kd'] = $this->kendaraanmodel->get_detail_kd_by_id($id);
			
		    $this->template->set('title', 'Form Edit Detail Kendaraan Dinas Aplikasi Monitoring Kendaraan Dinas');
			$this->template->load('template','admin/kendaraan/edit_detail_kd_form', $data);
		  
		  } //End of if
		  else
		  {
		     $data_detail_kd = array( 
				  'id_kendaraan' => $this->input->post('id_kendaraan'),
				  'id_tipe_kendaraan_dinas' => $this->input->post('id_tipe_kendaraan_dinas'),
				  'id_pengguna' => $this->input->post('id_pengguna'),
				  'id_sopir' => $this->input->post('id_sopir'),
				  'id_lokasi' => $this->input->post('id_lokasi'),
				  'tgl_serah_terima' => $this->input->post('tgl_serah_terima')
			  );
			  
			  $this->kendaraanmodel->update_data_detail_kd($data_detail_kd, $id);
			  
			  redirect('kendaraan/view_detail_kd');
		  } //End of else
		  
	   }
	   //End of function edit_detail_kd
	   
	   function delete_detail_kd()
	   {
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('kendaraanmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->kendaraanmodel->delete_detail_kd($id);
		 
		  redirect('kendaraan/view_detail_kd');
	   }
	   //End of function_delete_detail_kd
	   
	}
	//End of class Kendaraan
	
	/**
	   End of file: kendaraan.php
	   Location: ./application/controllers/kendaraan.php
	*/