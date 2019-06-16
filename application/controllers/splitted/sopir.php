<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File sopir.php
	  author IT-PJBS
	  
	  Controller untuk Sopir
	*/
	
	class Sopir extends CI_Controller
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
		  $this->load->model('sopirmodel');
		  
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  
		  //$data['status_sopir'] = $this->sopirmodel->get_all_status_sopir();
		  $data['datasopir'] = $this->sopirmodel->get_all_sopir();
	 
		  $this->template->set('title','Manajemen data sopir | Aplikasi Monitoring Kendaraan Dinas');
		  $this->template->load('template','admin/sopir/sopir_index',$data);
	     
	   }
	   //End of function index
	   
	   function insert_sopir()
	   {
	       $this->load->model('usermodel');
		   $this->load->model('sopirmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('id_sopir', 'id_sopir', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('status', 'status', 'trim|required');
		   
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  
			  $data['status_sopir'] = $this->sopirmodel->get_all_status_sopir();

			  $this->template->set('title','Tambah Data Sopir Baru | MyWebApplication.com');
			  $this->template->load('template','admin/sopir/insert_sopir_form',$data);
		   }
		   else
		   {
			  $data_sopir = array(
				 'id_sopir' =>$this->input->post('id_sopir'),
				 'nama' =>$this->input->post('nama'),
				 'id_status_sopir' =>$this->input->post('status')
			  );
			  
			  $this->sopirmodel->insert_data_sopir($data_sopir);
			  redirect('sopir/index');
		   }
		  
	   }
	   //End of funtion insert_sopir
	   
	   function edit_sopir()
	   {
		   $this->load->model('usermodel');
		   $this->load->model('sopirmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('id_sopir', 'id_sopir', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('status', 'status', 'trim|required');
		   
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  $data['status_sopir'] = $this->sopirmodel->get_all_status_sopir();
      		  $data['sopir'] = $this->sopirmodel->get_sopir_by_id($id);
			  
			  $this->template->set('title','Edit Data Sopir | MyWebApplication.com');
			  $this->template->load('template','admin/sopir/edit_sopir_form',$data);
		   }
		   else
		   {
			  $data_sopir = array(
				 'id_sopir' =>$this->input->post('id_sopir'),
				 'nama'   =>$this->input->post('nama'),
				 'id_status_sopir'   =>$this->input->post('status')
			  );
			  
			  $this->sopirmodel->update_data_sopir($data_sopir,$id);
			  redirect('sopir/index');
		   }
		
	   }
	   //End of function edit_sopoir
	   
	   function delete_sopir()
	   {
	      $this->load->model('sopirmodel');
		  $this->auth->restrict();
		  $this->auth->check_menu(1);  
		   
		  $id = $this->uri->segment(3);
		  $this->sopirmodel->delete_data_sopir($id);
		  redirect('sopir/index');
	   }
	   //End of function delete_sopir
	   
	}
	//End of class Sopir
	
	/**
	   End of file: sopir.php
	   Location: ./application/controllers/sopir.php
	*/