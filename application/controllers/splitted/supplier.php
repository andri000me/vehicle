<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File supplier.php
	  author IT-PJBS
	  
	  Controller untuk Supplier dan Detail_Contact_Person
	*/
	
	class Supplier extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   //Index untuk manajemen supplier
	   public function index()
	   {
	     //Load model 'usermodel'
		 $this->load->model('usermodel');
		 //Level untuk user ini
		 $level = $this->session->userdata('level');
	     
	     $this->load->model('suppliermodel');
	     //Mencegah user yang belum login mengakses halaman ini
		 $this->auth->restrict();
		 //Mencegah user mengakses menu yang tidak boleh dibuka
		 $this->auth->check_menu(1);
		 
		  //Ambil menu dari database sesuai dengan level
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['supplier'] = $this->suppliermodel->get_all_supplier();
		 $this->template->set('title', 'Manajemen Supplier Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/supplier/supplier_index', $data);	 
	   }
	   //End of function index
	   
	   function insert_supplier()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('suppliermodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  $this->form_validation->set_rules('nama_instansi', 'nama_instansi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $data['status_supplier'] = $this->suppliermodel->get_status_supplier();
	         $data['supplier'] = $this->suppliermodel->get_all_supplier();
		     $this->template->set('title', 'Form Tambah Supplier Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/supplier/insert_supplier_form', $data);
		  }//End of if
		  else
		  {
		     $data_supplier = array(
			    'id_supplier' => $this->input->post('id_supplier'),
				'nama_instansi' => $this->input->post('nama_instansi'),
				'keterangan' => $this->input->post('keterangan'),
				'id_status_supplier' => $this->input->post('id_status_supplier')
			   );
			   
			 
			 $this->suppliermodel->insert_data_supplier($data_supplier);
			 
			 redirect('supplier/index');
		  } //End of else
		  
	   }
	   //End of funtion supplier
	   
	   function edit_supplier()
	   {
		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('suppliermodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  //$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  $this->form_validation->set_rules('nama_instansi', 'nama_instansi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
          
          //Mendapatkan id dari segmen ke-3 URI		  
          $id = $this->uri->segment(3);	
          
           if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  
			  $data['status_supplier'] = $this->suppliermodel->get_status_supplier();
	          $data['supplier'] = $this->suppliermodel->get_supplier_by_id($id);
		      $this->template->set('title', 'Form Edit Supplier Aplikasi Monitoring Kendaraan Dinas');
			  $this->template->load('template','admin/supplier/edit_supplier_form', $data);
		   } //End of if
           else
           {
		      $data_supplier = array(
				'nama_instansi' => $this->input->post('nama_instansi'),
				'keterangan' => $this->input->post('keterangan'),
				'id_status_supplier' => $this->input->post('id_status_supplier')
			   );
			   
			   $this->suppliermodel->update_data_supplier($data_supplier, $id);
			   
			   redirect('supplier/index');
		   } //End of else		   
		
	   }
	   //End of function edit_supplier
	   
	   function delete_supplier()
	   {
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('suppliermodel');
		 
		 $id = $this->uri->segment(3);
		 $this->suppliermodel->delete_supplier($id);
		 
		 redirect('supplier/index');
	   }
	   //End of function delete_supplier
	   
	   //------------------------------ Detail Contact Person Controller ---------------------------------------//
	   
	   function view_detail_cp()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('suppliermodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['detail_cp'] = $this->suppliermodel->get_all_detail_cp();
		 $this->template->set('title', 'Manajemen Contact Person Supplier Aplikasi Monitoring Kendaran Dinas');
         $this->template->load('template', 'admin/supplier/detail_contact_person', $data);
	   }
	   //End of function view_detail_cp
	   
	   function insert_detail_cp()
	   {
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('suppliermodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		 $this->form_validation->set_rules('contact_person', 'contact_person', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     //cek data
		     /*$data['id_sup'] = $this->input->post('id_supplier');
			 $data['cp'] = $this->input->post('contact_person');
			 $data['telp'] = $this->input->post('no_telpon');
			 $data['hp'] = $this->input->post('handphone');
			 $data['mail'] = $this->input->post('email');*/
			 //-------
			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
	         $data['detail_cp'] = $this->suppliermodel->get_all_detail_cp();
			 $data['supplier'] = $this->suppliermodel->get_all_supplier();
		     $this->template->set('title', 'Form Tambah Supplier Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/supplier/insert_detail_cp_form', $data);
		  }//End of if
		  else
		  {
		      $data_detail_cp = array(
			      'id_supplier' => $this->input->post('id_supplier'), 
				  'contact_person' => $this->input->post('contact_person'),
				  'no_telpon' => $this->input->post('no_telpon'),
				  'handphone' => $this->input->post('handphone'),
				  'email' => $this->input->post('email')
			  );
			  
			  $this->suppliermodel->insert_data_detail_cp($data_detail_cp);
			  
			  redirect('supplier/view_detail_cp');
		  } //End of else
	     
	   }
	   //End of function insert_detail_cp
	   
	   function edit_detail_cp()
	   {
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('suppliermodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  $this->form_validation->set_rules('contact_person', 'contact_person', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
	        $data['detail_cp'] = $this->suppliermodel->get_detail_cp_by_id($id);
			$data['supplier'] = $this->suppliermodel->get_all_supplier();
		    $this->template->set('title', 'Form Edit Supplier Aplikasi Monitoring Kendaraan Dinas');
			$this->template->load('template','admin/supplier/edit_detail_cp_form', $data);
		  
		  } //End of if
		  else
		  {
		     $data_detail_cp = array(
			      'id_supplier' => $this->input->post('id_supplier'), 
				  'contact_person' => $this->input->post('contact_person'),
				  'no_telpon' => $this->input->post('no_telpon'),
				  'handphone' => $this->input->post('handphone'),
				  'email' => $this->input->post('email')
			  );
			  
			  $this->suppliermodel->update_data_detail_cp($data_detail_cp, $id);
			  
			  redirect('supplier/view_detail_cp');
		  } //End of else
		  
	   }
	   //End of function edit_detail_cp
	   
	   function delete_detail_cp()
	   {
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('suppliermodel');
		 
		  $id = $this->uri->segment(3);

		  $this->suppliermodel->delete_detail_cp($id);
		 
		  redirect('supplier/view_detail_cp');
	   }
	   //End of function_delete_detail_cp
	   
	}
	//End of class Supplier
	
	/**
	   End of file: supplier.php
	   Location: ./application/controllers/supplier.php
	*/