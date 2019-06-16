<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File subdit.php
	  author IT-PJBS
	  
	  Controller untuk Subdit dan Jabatan
	*/
	
	class Subdit extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   //Index untuk manajemen subdit
	   public function index()
	   {
	     //Load model 'usermodel'
		 $this->load->model('usermodel');
		 //Level untuk user ini
		 $level = $this->session->userdata('level');
	     
	     $this->load->model('subditmodel');
	     //Mencegah user yang belum login mengakses halaman ini
		 $this->auth->restrict();
		 //Mencegah user mengakses menu yang tidak boleh dibuka
		 $this->auth->check_menu(1);
		 
		  //Ambil menu dari database sesuai dengan level
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['subdit'] = $this->subditmodel->get_all_subdit();
		 $this->template->set('title', 'Manajemen Subdit Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/subdit/subdit_index', $data);	 
	   }
	   //End of function index
	   
	   function insert_subdit()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_subdit', 'id_subdit', 'trim|required');
		  $this->form_validation->set_rules('subdit', 'subdit', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
	         $data['subdit'] = $this->subditmodel->get_all_subdit();
		     $this->template->set('title', 'Form Tambah Subdit Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/subdit/insert_subdit_form', $data);
		  }//End of if
		  else
		  {
		     $data_subdit = array(
			    'id_subdit' => $this->input->post('id_subdit'),
				'subdit' => $this->input->post('subdit')
			 );
			 
			 $this->subditmodel->insert_data_subdit($data_subdit);
			 
			 redirect('subdit/index');
		  } //End of else
		  
	   }
	   //End of funtion insert_subdit
	   
	   function edit_subdit()
	   {
		  $this->load->model('subditmodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_subdit', 'id_subdit', 'trim|required');
		  $this->form_validation->set_rules('subdit', 'subdit', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
          
          //Mendapatkan id dari segmen ke-3 URI		  
          $id = $this->uri->segment(3);	
          
           if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
	          $data['subdit'] = $this->subditmodel->get_subdit_by_id($id);
		      $this->template->set('title', 'Form Edit Subdit Aplikasi Monitoring Kendaraan Dinas');
			  $this->template->load('template','admin/subdit/edit_subdit_form', $data);
		   } //End of if
           else
           {
		      $data_subdit = array(
			    'id_subdit' => $this->input->post('id_subdit'),
				'subdit' => $this->input->post('subdit')
			   );
			   
			   $this->subditmodel->update_data_subdit($data_subdit, $id);
			   
			   redirect('subdit/index');
		   } //End of else		   
		
	   }
	   //End of function edit_subdit
	   
	   function delete_subdit()
	   {
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('subditmodel');
		 
		 $id = $this->uri->segment(3);
		 $this->subditmodel->delete_subdit($id);
		 
		 redirect('subdit/index');
	   }
	   //End of function delete_subdit
	   
	   //------------------------------ Jabatan Controller ---------------------------------------//
	   
	   function view_jabatan()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('subditmodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['jabatan'] = $this->subditmodel->get_all_jabatan();
		 $this->template->set('title', 'Manajemen Jabatan Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/subdit/jabatan', $data);
	   }
	   //End of function view_jabatan
	   
	   function insert_jabatan()
	   {
	     $this->load->model('subditmodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('subditmodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
		 $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
	         $data['subdit'] = $this->subditmodel->get_all_subdit();
			 $data['jabatan'] = $this->subditmodel->get_all_jabatan();
		     $this->template->set('title', 'Form Tambah Jabatan Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/subdit/insert_jabatan_form', $data);
		  }//End of if
		  else
		  {
		      $data_jabatan = array(
			      'id_jabatan' => $this->input->post('id_jabatan'), 
				  'jabatan' => $this->input->post('jabatan'),
				  'id_subdit' => $this->input->post('id_subdit')
			  );
			  
			  $this->subditmodel->insert_data_jabatan($data_jabatan);
			  
			  redirect('subdit/view_jabatan');
		  } //End of else
	     
	   }
	   //End of function jabatan
	   
	   function edit_jabatan()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
		  $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
	        $data['jabatan'] = $this->subditmodel->get_jabatan_by_id($id);
			$data['subdit'] = $this->subditmodel->get_all_subdit();
		    $this->template->set('title', 'Form Edit Jabatan Aplikasi Monitoring Kendaraan Dinas');
			$this->template->load('template','admin/subdit/edit_jabatan_form', $data);
		  
		  } //End of if
		  else
		  {
		     $data_jabatan = array(
			      'id_jabatan' => $this->input->post('id_jabatan'), 
				  'jabatan' => $this->input->post('jabatan'),
				  'id_subdit' => $this->input->post('id_subdit') 
			  );
			  
			  $this->subditmodel->update_data_jabatan($data_jabatan, $id);
			  
			  redirect('subdit/view_jabatan');
		  } //End of else
		  
	   }
	   //End of function edit_jabatan
	   
	   function delete_jabatan()
	   {
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('subditmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->subditmodel->delete_jabatan($id);
		 
		  redirect('subdit/view_jabatan');
	   }
	   //End of function_delete_jabatan
	   
	}
	//End of class Subdit
	
	/**
	   End of file: subdit.php
	   Location: ./application/controllers/subdit.php
	*/