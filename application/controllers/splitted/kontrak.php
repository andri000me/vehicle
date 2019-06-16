<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File kontrak.php
	  author IT-PJBS
	  
	  Controller untuk Kontrak dan Detail_Kontrak
	*/
	
	class Kontrak extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   //Index untuk manajemen kontrak
	   public function index()
	   {
		 $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     
	     $this->load->model('kontrakmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
	     $data['kontrak'] = $this->kontrakmodel->get_all_kontrak();
		 $this->template->set('title', 'Manajemen Kontrak Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/kontrak/kontrak_index', $data);	 
	   }
	   //End of function index
	   
	   function insert_kontrak()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kontrakmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('no_kontrak', 'no_kontrak', 'trim|required');
		  $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  $this->form_validation->set_rules('kontrak_mulai', 'kontrak_mulai', 'trim|required');
		  $this->form_validation->set_rules('kontrak_akhir', 'kontrak_akhir', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $this->load->model('suppliermodel');
			 $data['supplier'] = $this->suppliermodel->get_all_supplier();
	         //$data['kontrak'] = $this->kontrakmodel->get_all_kontrak();
			 
		     $this->template->set('title', 'Form Tambah Kontrak Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/kontrak/insert_kontrak_form', $data);
		  }//End of if
		  else
		  {
		     $data_kontrak = array(
			    'no_kontrak' => $this->input->post('no_kontrak'),
				'id_supplier' => $this->input->post('id_supplier'),
				'atas_nama' => $this->input->post('atas_nama'),
				'kontrak_mulai' => $this->input->post('kontrak_mulai'),
				'kontrak_akhir' => $this->input->post('kontrak_akhir'),
				'nilai_kontrak' => $this->input->post('nilai_kontrak')
			 );
			 
			 $this->kontrakmodel->insert_data_kontrak($data_kontrak);
			 
			 redirect('kontrak/index');
		  } //End of else
		  
	   }
	   //End of funtion insert_kontrak
	   
	   function edit_kontrak()
	   {
		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kontrakmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('no_kontrak', 'no_kontrak', 'trim|required');
		  $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  $this->form_validation->set_rules('kontrak_mulai', 'kontrak_mulai', 'trim|required');
		  $this->form_validation->set_rules('kontrak_akhir', 'kontrak_akhir', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
          
          //Mendapatkan id dari segmen ke-3 URI		  
          $id = $this->uri->segment(3);	
          
           if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  
			  $this->load->model('suppliermodel');
			  $data['supplier'] = $this->suppliermodel->get_all_supplier();
			  $data['status_kontrak'] = $this->kontrakmodel->get_all_status_kontrak();
	          $data['kontrak'] = $this->kontrakmodel->get_kontrak_by_id($id);
			  
		      $this->template->set('title', 'Form Edit Kontrak Aplikasi Monitoring Kendaraan Dinas');
			  $this->template->load('template','admin/kontrak/edit_kontrak_form', $data);
		   } //End of if
           else
           {
		      $data_kontrak = array(
			    'no_kontrak' => $this->input->post('no_kontrak'),
				'id_supplier' => $this->input->post('id_supplier'),
				'atas_nama' => $this->input->post('atas_nama'),
				'kontrak_mulai' => $this->input->post('kontrak_mulai'),
				'kontrak_akhir' => $this->input->post('kontrak_akhir'),
				'nilai_kontrak' => $this->input->post('nilai_kontrak'),
				'id_status_kontrak' => $this->input->post('id_status_kontrak')
			  );
			   
			   $this->kontrakmodel->update_data_kontrak($data_kontrak, $id);
			   
			   redirect('kontrak/index');
		   } //End of else		   
		
	   }
	   //End of function edit_kontrak
	   
	   function delete_kontrak()
	   {
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('kontrakmodel');
		 
		 $id = $this->uri->segment(3);
		 $this->kontrakmodel->delete_kontrak($id);
		 
		 redirect('kontrak/index');
	   }
	   //End of function delete_kontrak
	   
	   //------------------------------ Detail Kontrak ---------------------------------------//
	   
	   function view_detail_kontrak()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kontrakmodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['detail_kontrak'] = $this->kontrakmodel->get_all_detail_kontrak();
		 
		 $this->template->set('title', 'Manajemen Detail Kontrak Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/kontrak/detail_kontrak', $data);
	   }
	   //End of function view_detail_kontrak
	   
	   function insert_detail_kontrak()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kontrakmodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('no_kontrak', 'no_kontrak', 'trim|required');
		 $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
	         //$data['detail_kontrak'] = $this->kontrakmodel->get_all_detail_kontrak();
			 $this->load->model('kendaraanmodel');
			 $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
			 $data['kontrak'] = $this->kontrakmodel->get_all_kontrak();
			 
		     $this->template->set('title', 'Form Tambah Detail Kontrak Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/kontrak/insert_detail_kontrak_form', $data);
		  }//End of if
		  else
		  {
		      $data_detail_kontrak = array(
			      'no_kontrak' => $this->input->post('no_kontrak'), 
				  'id_kendaraan' => $this->input->post('id_kendaraan'),
				  'tagihan_per_bulan' => $this->input->post('tagihan_per_bulan')
			  );
			  
			  $this->kontrakmodel->insert_data_detail_kontrak($data_detail_kontrak);
			  
			  redirect('kontrak/view_detail_kontrak');
		  } //End of else
	     
	   }
	   //End of function insert_detail_kontrak
	   
	   function edit_detail_kontrak()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kontrakmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('no_kontrak', 'no_kontrak', 'trim|required');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
			
			$this->load->model('kendaraanmodel');
			$data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
			$data['kontrak'] = $this->kontrakmodel->get_all_kontrak();
	        $data['detail_kontrak'] = $this->kontrakmodel->get_detail_kontrak_by_id($id);
			
			
		    $this->template->set('title', 'Form Edit Detail Kontrak Aplikasi Monitoring Kendaraan Dinas');
			$this->template->load('template','admin/kontrak/edit_detail_kontrak_form', $data);
		  
		  } //End of if
		  else
		  {
		      $data_detail_kontrak = array(
			      'no_kontrak' => $this->input->post('no_kontrak'), 
				  'id_kendaraan' => $this->input->post('id_kendaraan'),
				  'tagihan_per_bulan' => $this->input->post('tagihan_per_bulan')
			  );
			  
			  $this->kontrakmodel->update_data_detail_kontrak($data_detail_kontrak, $id);
			  
			  redirect('kontrak/view_detail_kontrak');
		  } //End of else
		  
	   }
	   //End of function edit_detail_cp
	   
	   function delete_detail_kontrak()
	   {
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('kontrakmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->kontrakmodel->delete_detail_kontrak($id);
		 
		  redirect('kontrak/view_detail_kontrak');
	   }
	   //End of function delete_detail_kontrak
	   
	}
	//End of class Kontrak
	
	/**
	   End of file: kontrak.php
	   Location: ./application/controllers/kontrak.php
	*/