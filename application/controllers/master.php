<?php
   	/**
	  File master.php
	  @author IT-PJBS
	*/
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	
	class Master extends CI_Controller
	{

	   public function __construct()
	   {
	      parent::__construct();
	   }
	  
//---------------------- MENU MASTER ------------------------------------------------------------------
	   public function index()
	   {
		 
		 $this->load->model('usermodel');
		 // $level = $this->session->userdata('level');
		 // $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->template->set('title','Master Data');
		 // $this->template->load('template_refresh', 'admin/master', $data);
		 $this->template->load('template_refresh', 'admin/master');
	   }
	   //End of function index

//---------------------- Controller untuk SOPIR ------------------------------------------------
		function sopir()
		{
		  $this->load->model('usermodel');
		  $this->load->model('sopirmodel');
		  
		  //$level = $this->session->userdata('level');
		  //$data['menu'] = $this->usermodel->get_menu_for_level($level);
		  
		  $data['datasopir'] = $this->sopirmodel->get_all_sopir();
	 
		  $this->template->set('title','Driver Kendaraan');
		  $this->template->load('template_refresh', 'admin/sopir/index', $data);
		}
	 
		function insert_sopir()
		{
		   //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		
		   $this->load->model('usermodel');
		   $this->load->model('sopirmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   //$this->form_validation->set_rules('nid', 'nid', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('status', 'status', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
		   
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  
			  $data['status_sopir'] = $this->sopirmodel->get_all_status_sopir();
			  $data['lokasi'] = $this->sopirmodel->get_all_lokasi();

			  $this->template->set('title','Form Tambah Sopir Baru | eFormC');
			  $this->template->load('template','admin/sopir/insert_sopir_form',$data);
		   }
		   else
		   {
			  $data_sopir = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'ID_STATUS_SOPIR' =>$this->input->post('status'),
				 'KODE_LOKASI' =>$this->input->post('lokasi')
			  );
			  
			  $this->sopirmodel->insert_data_sopir($data_sopir);
			  redirect('master/sopir');
		   }
		   
		}
		
		function delete_sopir($id)
		{			
		  $this->load->model('sopirmodel');
		  $this->auth->restrict();
		  $this->auth->check_menu(1);  
		   
		  $id = $this->uri->segment(3);
		  $this->sopirmodel->delete_data_sopir($id);
		  redirect('master/sopir');
		}
		
		function edit_sopir()
		{
		   $this->load->model('usermodel');
		   $this->load->model('sopirmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('nid', 'nid', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('status', 'status', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
		   
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
			  $data['status_sopir'] = $this->sopirmodel->get_all_status_sopir();
      		  $data['sopir'] = $this->sopirmodel->get_sopir_by_id($id);
			  $data['lokasi'] = $this->sopirmodel->get_all_lokasi();
			  
			  $this->template->set('title','Edit Driver Kendaraan');
			  $this->template->load('template','admin/sopir/edit_sopir_form',$data);
		   }
		   else
		   {
			  $data_sopir = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA'   =>$this->input->post('nama'),
				 'ID_STATUS_SOPIR'   =>$this->input->post('status'),
				 'KODE_LOKASI' =>$this->input->post('lokasi')
			  );
			  
			  $this->sopirmodel->update_data_sopir($data_sopir,$id);
			  redirect('master/sopir');
		   }
		   
		}
//---------------------- end driver ------------------------------------------------

//----------------------- Controller untuk KENDARAAN ---------------------------------------------------

	  function kendaraan()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     
	     $this->load->model('kendaraanmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
	     $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		 $this->template->set('title', 'Kendaraan | eFormC');
         $this->template->load('template', 'admin/kendaraan/kendaraan_index', $data);	 
	   }
	   //End of function kendaraan
	   
	   function insert_kendaraan()
	   {
		  //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  //$this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('id_jenis_kendaraan', 'id_jenis_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('no_polisi', 'no_polisi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $data['status_kendaraan'] = $this->kendaraanmodel->get_all_status_kendaraan();
			 $data['jenis_kendaraan'] = $this->kendaraanmodel->get_all_jenis_kendaraan();
	         //$data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
			 
		     $this->template->set('title', 'Form Tambah Kendaraan Baru | eFormC');
			 $this->template->load('template','admin/kendaraan/insert_kendaraan_form', $data);
		  }//End of if
		  else
		  {
		     $data_kendaraan = array(
			    //'id_kendaraan' => $this->input->post('id_kendaraan'),
				'ID_JENIS_KENDARAAN' => $this->input->post('id_jenis_kendaraan'),
				//'tahun' => $this->input->post('tahun'),
				'NO_POLISI' => $this->input->post('no_polisi'),
				'ID_STATUS_KENDARAAN' => $this->input->post('id_status_kendaraan')
			 );
			 
			 $this->kendaraanmodel->insert_data_kendaraan($data_kendaraan);
			 
			 redirect('master/kendaraan');
		  } //End of else
		  
	   }
	   //End of funtion insert_kendaraan
	   
	   function edit_kendaraan()
	   {
		  //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  //$this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
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
			  
		      $this->template->set('title', 'Form Edit Kendaraan | eFormC');
			  $this->template->load('template','admin/kendaraan/edit_kendaraan_form', $data);
		   } //End of if
           else
           {
		       $data_kendaraan = array(
			     //'id_kendaraan' => $this->input->post('id_kendaraan'),
				 'ID_JENIS_KENDARAAN' => $this->input->post('id_jenis_kendaraan'),
				 //'tahun' => $this->input->post('tahun'),
				 'NO_POLISI' => $this->input->post('no_polisi'),
				 'ID_STATUS_KENDARAAN' => $this->input->post('id_status_kendaraan')
			   );
			   
			   $this->kendaraanmodel->update_data_kendaraan($data_kendaraan, $id);
			   
			   redirect('master/kendaraan');
		   } //End of else		   
		
	   }
	   //End of function edit_kendaraan
	   
	   function delete_kendaraan()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('kendaraanmodel');
		 
		 $id = $this->uri->segment(3);
		 $this->kendaraanmodel->delete_kendaraan($id);
		 
		 redirect('master/kendaraan');
	   }
	   //End of function delete_kendaraan
	   
	   //------------------------------ Controller untuk DETAIL_KENDARAAN_DINAS ---------------------------------------//
	   
	   function detail_kendaraan_dinas()  //renamed from view_detail_kd
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kendaraanmodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['detail_kd'] = $this->kendaraanmodel->get_all_detail_kd();
		 
		 $this->template->set('title', 'Detail Kendaraan Dinas | eFormC');
         $this->template->load('template', 'admin/kendaraan/detail_kendaraan_dinas', $data);
		 
	   }
	   //End of function detail_kendaraan_dinas
	   
	   function insert_detail_kd()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('kendaraanmodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan_aktif();
		     $data['tipe_kd'] = $this->kendaraanmodel->get_all_tipe_kd();
			 
			 $this->load->model('subditmodel');
		     $data['pengguna'] = $this->subditmodel->get_list_jabatan();
			 
		     $data['sopir'] = $this->kendaraanmodel->get_all_sopir_aktif();
		     $data['lokasi'] = $this->kendaraanmodel->get_all_lokasi();
	         //$data['detail_kd'] = $this->kendaramodel->get_all_detail_kd();
			 
		     $this->template->set('title', 'Form Tambah Detail Kendaraan Dinas Baru | eFormC');
			 $this->template->load('template','admin/kendaraan/insert_detail_kd_form', $data);
		  }//End of if
		  else
		  {
		      $this->load->model('datemodel');
              $tgl_serah_terima = $this->datemodel->format_tanggal($this->input->post('tgl_serah_terima'));
			  
			  //$tgl_serah_terima = $this->input->post('tgl_serah_terima');
			 
		      $data_detail_kd = array(
				  'ID_KENDARAAN' => $this->input->post('id_kendaraan'),
				  'ID_TIPE_KENDARAAN_DINAS' => $this->input->post('id_tipe_kendaraan_dinas'),
				  'ID_PENGGUNA' => $this->input->post('id_pengguna'),
				  'ID_SOPIR' => $this->input->post('id_sopir'),
				  'ID_LOKASI' => $this->input->post('id_lokasi'),
				  'TGL_SERAH_TERIMA' => $tgl_serah_terima
			  );
			  
			  $this->kendaraanmodel->insert_data_detail_kd($data_detail_kd);
			  
			  redirect('master/detail_kendaraan_dinas');
		  } //End of else
	     
	   }
	   //End of function insert_detail_kd
	   
	   function edit_detail_kd()
	   {
		  //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('kendaraanmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
			
	        $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		    $data['tipe_kd'] = $this->kendaraanmodel->get_all_tipe_kd();
			
		    $this->load->model('subditmodel');
		    $data['pengguna'] = $this->subditmodel->get_list_jabatan();
			
		    $data['sopir'] = $this->kendaraanmodel->get_all_sopir();
		    $data['lokasi'] = $this->kendaraanmodel->get_all_lokasi();
	        $data['detail_kd'] = $this->kendaraanmodel->get_detail_kd_by_id($id);
			
		    $this->template->set('title', 'Form Edit Detail Kendaraan Dinas | eFormC');
			$this->template->load('template','admin/kendaraan/edit_detail_kd_form', $data);
		  
		  } //End of if
		  else
		  {
		     $this->load->model('datemodel');
             $tgl_serah_terima = $this->datemodel->format_tanggal($this->input->post('tgl_serah_terima'));
			 
			 $data_detail_kd = array( 
				  'ID_KENDARAAN' => $this->input->post('id_kendaraan'),
				  'ID_TIPE_KENDARAAN_DINAS' => $this->input->post('id_tipe_kendaraan_dinas'),
				  'ID_PENGGUNA' => $this->input->post('id_pengguna'),
				  'ID_SOPIR' => $this->input->post('id_sopir'),
				  'ID_LOKASI' => $this->input->post('id_lokasi'),
				  'TGL_SERAH_TERIMA' => $tgl_serah_terima
			  );
			  
			  $this->kendaraanmodel->update_data_detail_kd($data_detail_kd, $id);
			  
			  redirect('master/detail_kendaraan_dinas');
		  } //End of else
		  
	   }
	   //End of function edit_detail_kd
	   
	   function delete_detail_kd()
	   {
		  //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('kendaraanmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->kendaraanmodel->delete_detail_kd($id);
		  
		  redirect('master/detail_kendaraan_dinas');
	   }
	   //End of function_delete_detail_kd

//---------------------- Controller untuk JENIS_KENDARAAN ------------------------------------------------
		function jenis_kendaraan()
		{
		  //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		  
		   $this->load->model('usermodel');
		   $this->load->model('kendaraanmodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['datakendaraan'] = $this->kendaraanmodel->get_all_jenis_kd();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Jenis Kendaraan | eFormC');
		   $this->template->load('template','admin/kendaraan/jenis_kendaraan',$data);
		}
		
		// End of function jenis_kendaraan
	 
		function insert_jenis_kendaraan()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		
		   $this->load->model('usermodel');
		   $this->load->model('kendaraanmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('jenis_kendaraan', 'jenis_kendaraan', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);

			  $this->template->set('title','Form Tambah Jenis Kendaraan Baru | eFormC');
			  $this->template->load('template','admin/kendaraan/insert_jenis_kendaraan',$data);
		   }
		   else
		   {
			  $data_jenis_kd = array(
				 'JENIS_KENDARAAN' =>$this->input->post('jenis_kendaraan')
			  );
			  $this->kendaraanmodel->insert_data_jenis_kd($data_jenis_kd);
			  redirect('master/jenis_kendaraan');
		   }
		}
		// End of function insert_jenis_kendaraan
		
		function delete_jenis_kendaraan($id)
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('kendaraanmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $id = $this->uri->segment(3);
		   $this->kendaraanmodel->delete_jenis_kd($id);
		   redirect('master/jenis_kendaraan');
		}
		
		// End of function delete_jenis_kendaraan
		
		function edit_jenis_kendaraan()
		{
		   //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		   $this->load->model('usermodel');
		   $this->load->model('kendaraanmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   
		   $this->form_validation->set_rules('jenis_kendaraan', 'jenis_kendaraan', 'trim|required');

		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
      		  $data['jenis_kendaraan'] = $this->kendaraanmodel->get_jenis_kd_by_id($id);
			  
			  $this->template->set('title','Form Edit Jenis Kendaraan | eFormC');
			  $this->template->load('template','admin/kendaraan/edit_jenis_kendaraan',$data);
		   }
		   else
		   {
			  $data_kendaraan = array(
				 'JENIS_KENDARAAN'   =>$this->input->post('jenis_kendaraan')
			  );
			  $this->kendaraanmodel->update_data_jenis_kd($data_kendaraan,$id);
			  redirect('master/jenis_kendaraan');
		   }
		}
		// End of function edit_jenis_kendaraan
		
//---------------------- end jenis kendaraan ------------------------------------------------

//-------------------------- Controller untuk SUBDIT ---------------------------------------------------
		//Index untuk manajemen subdit
	   function subdit()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
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
		 $this->template->set('title', 'Subdit | eFormC');
         $this->template->load('template', 'admin/subdit/subdit_index', $data);	 
	   }
	   //End of function index
	   
	   function insert_subdit()
	   {
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('kode_subdit', 'kode_subdit', 'trim|required');
		  $this->form_validation->set_rules('subdit', 'subdit', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
	         $data['subdit'] = $this->subditmodel->get_all_subdit();
		     $this->template->set('title', 'Form Tambah Subdit Baru | eFormC');
			 $this->template->load('template','admin/subdit/insert_subdit_form', $data);
		  }//End of if
		  else
		  {
		     $data_subdit = array(
			    'KODE_SUBDIT' => $this->input->post('kode_subdit'),
				'SUBDIT' => $this->input->post('subdit')
			 );
			 
			 $this->subditmodel->insert_data_subdit($data_subdit);
			 
			 redirect('master/subdit');
		  } //End of else
		  
	   }
	   //End of funtion insert_subdit
	   
	   function edit_subdit()
	   {
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('subditmodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('kode_subdit', 'kode_subdit', 'trim|required');
		  $this->form_validation->set_rules('subdit', 'subdit', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
          
          //Mendapatkan id dari segmen ke-3 URI		  
          $id = $this->uri->segment(3);	
          
           if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
	          $data['subdit'] = $this->subditmodel->get_subdit_by_id($id);
		      $this->template->set('title', 'Form Edit Subdit | eFormC');
			  $this->template->load('template','admin/subdit/edit_subdit_form', $data);
		   } //End of if
           else
           {
		      $data_subdit = array(
			    'KODE_SUBDIT' => $this->input->post('kode_subdit'),
				'SUBDIT' => $this->input->post('subdit')
			   );
			   
			   $this->subditmodel->update_data_subdit($data_subdit, $id);
			   
			   redirect('master/subdit');
		   } //End of else		   
		
	   }
	   //End of function edit_subdit
	   
	   function delete_subdit()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('subditmodel');
		 
		 $id = $this->uri->segment(3);
		 $this->subditmodel->delete_subdit($id);
		 
		 redirect('master/subdit');
	   }
	   //End of function delete_subdit

//-------------------------- Controller untuk JABATAN ---------------------------------------------------
	   //------------------------------ Jabatan Controller ---------------------------------------//
	   
	   function jabatan()  //renamed from view_jabatan
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	     $this->load->model('usermodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('subditmodel');

		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
	     $data['jabatan'] = $this->subditmodel->get_all_jabatan();
		 $this->template->set('title', 'Jabatan | eFormC');
         $this->template->load('template', 'admin/subdit/jabatan', $data);
	   }
	   //End of function view_jabatan
	   
	   function insert_jabatan()
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	    $this->load->model('subditmodel');
		 $level = $this->session->userdata('level');
	     $this->load->model('subditmodel');
		 
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('kode_jabatan', 'kode_jabatan', 'trim|required');
		 $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		 
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  {  
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
	         $data['subdit'] = $this->subditmodel->get_all_subdit();
			 $data['jabatan'] = $this->subditmodel->get_all_jabatan();
			 $data['jenis_jabatan'] = $this->subditmodel->get_jenis_jabatan();
			 
		     $this->template->set('title', 'Form Tambah Jabatan Baru | eFormC');
			 $this->template->load('template','admin/subdit/insert_jabatan_form', $data);
		  }//End of if
		  else
		  {
		      $data_jabatan = array(
			      'KODE_JABATAN' => $this->input->post('kode_jabatan'), 
				  'JABATAN' => $this->input->post('jabatan'),
				  'ID_SUBDIT' => $this->input->post('id_subdit'),
				  'ID_JENIS_JABATAN' => $this->input->post('id_jenis_jabatan')
			  );
			  
			  $this->subditmodel->insert_data_jabatan($data_jabatan);
			  
			  redirect('master/jabatan');
		  } //End of else
	     
	   }
	   //End of function jabatan
	   
	   function edit_jabatan()
	   {
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
	      $this->load->model('subditmodel');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('kode_jabatan', 'kode_jabatan', 'trim|required');
		  $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		 
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id = $this->uri->segment(3);	
		  
		  if($this->form_validation->run() == FALSE)
		  {
		    $data['menu'] = $this->usermodel->get_menu_for_level($level);
	        $data['jabatan'] = $this->subditmodel->get_jabatan_by_id($id);
			$data['subdit'] = $this->subditmodel->get_all_subdit();
			$data['jenis_jabatan'] = $this->subditmodel->get_jenis_jabatan();
			
		    $this->template->set('title', 'Form Edit Jabatan Aplikasi Monitoring Kendaraan Dinas');
			$this->template->load('template','admin/subdit/edit_jabatan_form', $data);
		  
		  } //End of if
		  else
		  {
		     $data_jabatan = array(
			      'KODE_JABATAN' => $this->input->post('kode_jabatan'), 
				  'JABATAN' => $this->input->post('jabatan'),
				  'ID_SUBDIT' => $this->input->post('id_subdit'),
                  'ID_JENIS_JABATAN' => $this->input->post('id_jenis_jabatan')				  
			  );
			  
			  $this->subditmodel->update_data_jabatan($data_jabatan, $id);
			  
			  redirect('master/jabatan');
		  } //End of else
		
	   }
	   //End of function edit_jabatan
	   
	   function delete_jabatan()
	   {
		  //slider-------------
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('subditmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->subditmodel->delete_jabatan($id);
		 
		  redirect('master/jabatan');
	   }
	   //End of function_delete_jabatan

//---------------------- Controller untuk LOKASI ------------------------------------------------
		function lokasi()
		{
		  //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		  
		   $this->load->model('usermodel');
		   $this->load->model('lokasimodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['datalokasi'] = $this->lokasimodel->get_all_lokasi();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Lokasi | eFormC');
		   $this->template->load('template','admin/lokasi/lokasi_index',$data);
		}
		// End of function lokasi
	 
		function insert_lokasi()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		
		   $this->load->model('usermodel');
		   $this->load->model('lokasimodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('kode_lokasi', 'kode_lokasi', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);

			  $this->template->set('title','Tambah Lokasi Baru | eFormC');
			  $this->template->load('template','admin/lokasi/insert_lokasi',$data);
		   }
		   else
		   {
			  $data_lokasi = array(
				 'KODE_LOKASI' =>$this->input->post('kode_lokasi'),
				 'LOKASI' =>$this->input->post('lokasi')
			  );
			  $this->lokasimodel->insert_data_lokasi($data_lokasi);
			  redirect('master/lokasi');
		   }
		}
		// End of function insert_lokasi
		
		function delete_lokasi($id)
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('lokasimodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $id = $this->uri->segment(3);
		   $this->lokasimodel->delete_data_lokasi($id);
		   redirect('master/lokasi');
		}
		//End of function delete_lokasi
		
		function edit_lokasi()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		   $this->load->model('usermodel');
		   $this->load->model('lokasimodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   
		   $this->form_validation->set_rules('kode_lokasi', 'kode_lokasi', 'trim|required');
		   $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
      		  $data['lokasi'] = $this->lokasimodel->get_lokasi_by_id($id);
			  
			  $this->template->set('title','Form Edit Lokasi | eFormC');
			  $this->template->load('template','admin/lokasi/edit_lokasi',$data);
		   }
		   else
		   {
			  $data_lokasi = array(
				 'KODE_LOKASI' =>$this->input->post('kode_lokasi'),
				 'LOKASI'   =>$this->input->post('lokasi')
			  );
			  $this->lokasimodel->update_data_lokasi($data_lokasi,$id);
			  redirect('master/lokasi');
		   }
		}
		//End of function edit_lokasi
//---------------------- end lokasi ------------------------------------------------
	   
//---------------------- MASTER KARYAWAN ----------------------------------------------

//---------------------- karyawan ------------------------------------------------
		
		function karyawan()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->ambil_data();
		   
		   $this->load->model('usermodel');
		   $this->load->model('karyawanmodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['karyawan'] = $this->karyawanmodel->tampil_karyawan();
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Karyawan | eForm');
		   $this->template->load('template','admin/karyawan/datakaryawan',$data);
		}
	    //End of function karyawan
		
		function insert_karyawan()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->ambil_data();		   
		   $level = $this->session->userdata('level');

		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('nid', 'nid', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
			   
			  $this->template->set('title','Form Tambah Karyawan Baru | eFormC');
			  $this->template->load('template','admin/karyawan/insert_karyawan',$data);
		   }
		   else
		   {
			  $data_karyawan = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'ID_JABATAN' =>$this->input->post('id_jabatan')
			  );
			  $this->karyawanmodel->insert_data_karyawan($data_karyawan);
			  redirect('master/karyawan');
		   }
		}
		//End of function insert_karyawan
		
		function edit_karyawan()
		{
		  //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		   $this->load->model('usermodel');
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->ambil_data();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('nid', 'nid', 'trim|required');
		   $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		   $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
      		  $data['karyawan'] = $this->karyawanmodel->pilih_karyawan_by_id($id);
			  
			  $this->template->set('title','Form Edit Karyawan | eFormC');
			  $this->template->load('template','admin/karyawan/edit_karyawan',$data);
		   }
		   else
		   {
			  $data_karyawan = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'ID_JABATAN' =>$this->input->post('id_jabatan')
			  );
			  
			  $this->karyawanmodel->edit_data_karyawan($data_karyawan,$id);
			  redirect('master/karyawan');
		   }
		}
		//End of function edit_karyawan
	   
	   function delete_karyawan($id)
	   {
		   $this->load->model('karyawanmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $id = $this->uri->segment(3);
		   $this->karyawanmodel->delete_data_karyawan($id);
		   redirect('master/karyawan');
	   }
	   //End of function delete_karyawan
	   
//---------------------- MASTER USER --------------------------------------------------

        function user()
		{
		  //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		  
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		    
		   $data['user'] = $this->useraddmodel->get_all_user();
		   
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->tampil_karyawan();
		   
		   $this->load->model('statusmodel');
		   $data['status'] = $this->statusmodel->get_all_status();
		   
		   $this->load->model('tipemodel');
		   $data['tipe'] = $this->tipemodel->get_all_tipe();
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','User | eFormC');
		   $this->template->load('template','admin/user/user_index',$data);
		}
	    //End of function User
		
		function insert_user()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $this->load->library('form_validation');
		   //$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required');
		   $this->form_validation->set_rules('username', 'username', 'trim|required');
		   $this->form_validation->set_rules('password', 'password', 'trim|required');
		   $this->form_validation->set_rules('tipe_user', 'tipe_user', 'trim|required');
		   $this->form_validation->set_rules('status_user', 'status_user', 'trim|required');
		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');

		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);

			  $this->template->set('title','Form Tambah User Baru | eFormC');
			  $this->template->load('template','admin/user/insert_user',$data);
		   }
		   else
		   {
			  $data_lokasi = array(
				 'ID_KARYAWAN' =>$this->input->post('id_karyawan'),
				 'USERNAME' =>$this->input->post('username'),
				 'PASSWORD' =>md5($this->input->post('password')),
				 'ID_TIPE_USER' =>$this->input->post('tipe_user'),
				 'ID_STATUS_USER' =>$this->input->post('status_user')
			  );
			  $this->useraddmodel->insert_data_user($data_lokasi);
			  redirect('master/user');
		   }
		}
		//End of function insert_user
		
		function delete_user($id)
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('useraddmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   
		   $id = $this->uri->segment(3);
		   $this->useraddmodel->delete_data_user($id);
		   redirect('master/user');
		}
		//End of function delete_user
		
		function edit_user()
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $this->load->library('form_validation');
		   
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->tampil_karyawan();
		   
		   $this->load->model('statusmodel');
		   $data['status'] = $this->statusmodel->get_all_status();
		   
		   $this->load->model('tipemodel');
		   $data['tipe'] = $this->tipemodel->get_all_tipe();
		   
		   //$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required');
		   $this->form_validation->set_rules('username', 'username', 'trim|required');
		   $this->form_validation->set_rules('tipe_user', 'tipe_user', 'trim|required');
		   $this->form_validation->set_rules('status_user', 'status_user', 'trim|required');

		   $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		   $id = $this->uri->segment(3);
		   
		   if ($this->form_validation->run() == FALSE)
		   {
			  $level = $this->session->userdata('level');
		  	  $data['menu'] = $this->usermodel->get_menu_for_level($level);
      		  $data['user'] = $this->useraddmodel->get_user_by_id($id);
			  
			  $this->template->set('title','Edit data User | MyWebApplication.com');
			  $this->template->load('template','admin/user/edit_user',$data);
		   }
		   else
		   {
			
		       $data_user = array(
					 'ID_KARYAWAN' =>$this->input->post('id_karyawan'),
					 'USERNAME' =>$this->input->post('username'),
					 'ID_TIPE_USER' =>$this->input->post('tipe_user'),
					 'ID_STATUS_USER' =>$this->input->post('status_user')
			   );
			  
			  $this->useraddmodel->update_data_user($data_user,$id);
			  redirect('master/user');
		   }
		}
		//End of function edit_user
	//End of function master
   }
	//End of class master
	
	/**
	   End of file: master.php
	   Location: ./application/controllers/master.php
	*/