<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File sopir.php
	  author IT-PJBS
	  
	  Controller untuk Lokasi
	*/
	
	class Lokasi extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   //Index untuk manajemen supplier
	   public function index()
	   {
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
	      $this->load->model('usermodel');
		  $this->load->model('lokasimodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $data['datalokasi'] = $this->lokasimodel->get_all_lokasi();
		   
		  $this->template->set('title','Daftar Lokasi | Aplikasi Monitoring Kendaraan Dinas');
		  $this->template->load('template','admin/lokasi/lokasi_index',$data);
	     
	   }
	   //End of function index
	   
	   function insert_lokasi()
	   {
		   $this->load->model('usermodel');
		   $this->load->model('lokasimodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);

			  $this->template->set('title','Tambah data Baru | MyWebApplication.com');
			  $this->template->load('template','admin/driver/insert_lokasi',$data);
		   }
		   else
		   {
			  $data_lokasi = array(
				 'id_lokasi' =>$this->input->post('id_lokasi'),
				 'lokasi' =>$this->input->post('lokasi')
			  );
			  $this->lokasimodel->insert_data_lokasi($data_lokasi);
			  redirect('master/lokasi');
		   }
		  
	   }
	   //End of funtion insert_lokasi
	   
	   function edit_lokasi()
	   {
		   $this->load->model('usermodel');
		   $this->load->model('lokasimodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   
		   $this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
      		  $data['lokasi'] = $this->lokasimodel->get_lokasi_by_id($id);
			  
			  $this->template->set('title','Edit data Driver | MyWebApplication.com');
			  $this->template->load('template','admin/lokasi/edit_lokasi',$data);
		   }
		   else
		   {
			  $data_lokasi = array(
				 'id_lokasi' =>$this->input->post('id_lokasi'),
				 'lokasi'   =>$this->input->post('lokasi')
			  );
			  $this->lokasimodel->update_data_lokasi($data_lokasi,$id);
			  redirect('lokasi/index');
		   }
	   }
	   //End of function edit_lokasi
	   
	   function delete_lokasi()
	   {
		 $this->load->model('lokasimodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);  
		   
		 $id = $this->uri->segment(3);
		 $this->lokasimodel->delete_data_lokasi($id);
		 redirect('lokasi/index');
	   }
	   //End of function delete_lokasi
	   
	}
	//End of class Lokasi
	
	/**
	   End of file: lokasi.php
	   Location: ./application/controllers/lokasi.php
	*/