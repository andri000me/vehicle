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
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 $this->template->set('title','Master Data');
		 $this->template->load('template_refresh', 'admin/master');
	   }
	   //End of function index

//---------------------- Controller untuk SOPIR ------------------------------------------------
		function sopir()
		{
		  $this->load->model('usermodel');
		  $this->load->model('sopirmodel');
		  $data['datasopir'] = $this->sopirmodel->get_all_sopir();
		  $this->template->set('title','Driver Kendaraan');
		  $this->template->load('template_refresh', 'admin/sopir/index', $data);
		}
	 
		function insert_sopir()
		{
		   $this->load->model('usermodel');
		   $this->load->model('sopirmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $data_sopir = array(
				 'NID_SOPIR' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'STATUS' =>1,
				 'CHAT_ID' =>$this->input->post('telegram')
			  );
			  
		   $this->sopirmodel->insert_data_sopir($data_sopir);
		   redirect('master/sopir');
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
		   $id = $this->input->post('id');
		   $data['sopir'] = $this->sopirmodel->get_sopir_by_id($id);
		   $data_sopir = array(
				 'NID_SOPIR' =>$this->input->post('nid'),
				 'NAMA'   =>$this->input->post('nama'),
				 'STATUS'   =>$this->input->post('status'),
				 'CHAT_ID' =>$this->input->post('telegram')
			);
			$this->sopirmodel->update_data_sopir($data_sopir,$id);
			redirect('master/sopir');
		}
//---------------------- end driver ------------------------------------------------

//----------------------- Controller untuk KENDARAAN ---------------------------------------------------

	  function kendaraan()
	   {
		 $this->load->model('usermodel');
	     $this->load->model('kendaraanmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
	     $data['kendaraan'] = $this->kendaraanmodel->get_all_kendaraan();
		 $data['supir'] = $this->kendaraanmodel->get_driver();
		 $this->template->set('title', 'Kendaraan Dinas');
         $this->template->load('template_refresh', 'admin/kendaraan/index', $data);	 
	   }
	   //End of function kendaraan
	   
	   function insert_kendaraan()
	   {
		  $this->load->model('usermodel');
		  $this->load->model('kendaraanmodel');
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  $data_kendaraan = array(
			'NAMA_KENDARAAN' => $this->input->post('nama'),
			'NO_POLISI' => $this->input->post('nopol'),
			'STATUS' => $this->input->post('status'),
			'SOPIR' => $this->input->post('sopir')
			);
			 
		  $this->kendaraanmodel->insert_data_kendaraan($data_kendaraan);
		  redirect('master/kendaraan');
	   }
	   //End of funtion insert_kendaraan
	   
	   function edit_kendaraan()
	   {
		  $this->load->model('usermodel');
		  $this->load->model('kendaraanmodel');
		  $this->auth->restrict();
		  $this->auth->check_menu(1);
		  $id = $this->input->post('id');	
          $data_kendaraan = array(
			'NAMA_KENDARAAN' => $this->input->post('nama'),
			'NO_POLISI' => $this->input->post('nopol'),
			'STATUS' => $this->input->post('status'),
			'SOPIR' => $this->input->post('sopir')
			);
		  $this->kendaraanmodel->update_data_kendaraan($data_kendaraan, $id);
		  redirect('master/kendaraan');
	   }
	   //End of function edit_kendaraan
	   
	   function delete_kendaraan()
	   {
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
		 $this->load->model('usermodel');
		 $this->load->model('kendaraanmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 $data['detail_kd'] = $this->kendaraanmodel->get_all_detail_kd();
		 $this->template->set('title', 'Detail Kendaraan Dinas');
         $this->template->load('template_refresh', 'admin/kendaraan/detail_kendaraan_dinas', $data);
		 
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
//-------------------------- Controller untuk SUBDIT ---------------------------------------------------
		//Index untuk manajemen subdit
	   function subdit()
	   {
	    //Load model 'usermodel'
		 $this->load->model('usermodel');
		 $this->load->model('subditmodel');
	     //Mencegah user yang belum login mengakses halaman ini
		 $this->auth->restrict();
		 //Mencegah user mengakses menu yang tidak boleh dibuka
		 $this->auth->check_menu(1);
		 $data['subdit'] = $this->subditmodel->get_all_subdit();
		 $this->template->set('title', 'Divisi');
         $this->template->load('template_refresh', 'admin/subdit/sindex', $data);	 
	   }
	   //End of function index
	   
	   function insert_subdit()
	   {
	      $this->load->model('usermodel');
		  $this->load->model('subditmodel');
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  $data_subdit = array(
			    'KODE_DIVISI' => $this->input->post('kode_subdit'),
				'DIVISI' => $this->input->post('subdit')
			 );
		  $this->subditmodel->insert_data_subdit($data_subdit);
		  redirect('master/subdit');
		  
	   }
	   //End of funtion insert_subdit
	   
	   function edit_subdit()
	   {
		  $this->load->model('usermodel');
	      $this->load->model('subditmodel');
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  $id = $this->input->post('id_subdit');
		  $data = array(
			    'KODE_DIVISI' => $this->input->post('kode_subdit'),
				'DIVISI' => $this->input->post('subdit')
			   );
		  $this->subditmodel->update_data_subdit($data, $id);
		  redirect('master/subdit');
	   }
	   //End of function edit_subdit
	   
	   function delete_subdit()
	   {
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
	   
	   function jabatan() 
	   {
	     $this->load->model('usermodel');
		 $this->load->model('subditmodel');
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 $data['subdit'] = $this->subditmodel->get_all_subdit();
	     $data['jabatan'] = $this->subditmodel->get_all_jabatan();
		 $this->template->set('title', 'Jabatan Karyawan');
         $this->template->load('template_refresh', 'admin/subdit/jindex', $data);
	   }
	   //End of function view_jabatan
	   
	   function insert_jabatan()
	   {
	     $this->load->model('usermodel');
		 $this->load->model('subditmodel');
	     $this->auth->restrict();
		 $this->auth->check_menu(1);
		 $data_jabatan = array(
			      'KODE_JABATAN' => $this->input->post('kode_jabatan'), 
				  'NAMA_JABATAN' => $this->input->post('jabatan'),
				  'KODE_DIVISI' => $this->input->post('id_subdit'),
				  'JENIS' => $this->input->post('id_jenis_jabatan')
			  );
		$this->subditmodel->insert_data_jabatan($data_jabatan);
		redirect('master/jabatan'); 
	   }
	   //End of function jabatan
	   
	   function edit_jabatan()
	   {
		  $this->load->model('usermodel');
		  $this->load->model('subditmodel');
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  $data['subdit'] = $this->subditmodel->get_all_subdit();
		  $id = $this->input->post('id');
		  $data_jabatan = array(
			      'KODE_JABATAN' => $this->input->post('kode_jabatan'), 
				  'NAMA_JABATAN' => $this->input->post('jabatan'),
				  'KODE_DIVISI' => $this->input->post('id_subdit'),
                  'JENIS' => $this->input->post('jenis')				  
			  );
			  
		  $this->subditmodel->update_data_jabatan($data_jabatan, $id);
		  redirect('master/jabatan');
	   }
	   //End of function edit_jabatan
	   
	   function delete_jabatan()
	   {
		  $this->auth->restrict();
		  $this->auth->check_menu(1);
		 
		  $this->load->model('subditmodel');
		 
		  $id = $this->uri->segment(3);

		  $this->subditmodel->delete_jabatan($id);
		 
		  redirect('master/jabatan');
	   }
	   //End of function_delete_jabatan
	   
//---------------------- MASTER KARYAWAN ----------------------------------------------

//---------------------- karyawan ------------------------------------------------
		
		function karyawan()
		{
		   $this->load->model('karyawanmodel');
		   $this->load->model('usermodel');
		   
		   $data['id_jab'] = $this->karyawanmodel->ambil_data();
		   $data['karyawan'] = $this->karyawanmodel->tampil_karyawan();
		   $data['divisi'] = $this->karyawanmodel->divisi();
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Karyawan');
		   $this->template->load('template_refresh','admin/karyawan/index',$data);
		}
	    //End of function karyawan
		
		function insert_karyawan()
		{
		   $this->load->model('usermodel');
		   $this->load->model('karyawanmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $data_karyawan = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'KODE_JABATAN' =>$this->input->post('jabatan')
			  );
			$this->karyawanmodel->insert_data_karyawan($data_karyawan);
			redirect('master/karyawan');
		}
		//End of function insert_karyawan
		
		function edit_karyawan()
		{
		   $this->load->model('usermodel');
		   $this->load->model('karyawanmodel');
		   $this->auth->restrict();
		   $this->auth->check_menu(1);
		   $id = $this->input->post('id');
		   $data_karyawan = array(
				 'NID' =>$this->input->post('nid'),
				 'NAMA' =>$this->input->post('nama'),
				 'KODE_JABATAN' =>$this->input->post('jabatan')
			  );
			  
			$this->karyawanmodel->edit_data_karyawan($data_karyawan,$id);
			redirect('master/karyawan');
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
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		   $data['user'] = $this->useraddmodel->get_all_user();
		   $this->load->model('karyawanmodel');
		   $data['id_jab'] = $this->karyawanmodel->tampil_karyawan();
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','User Profile');
		   $this->template->load('template_refresh','admin/user/index',$data);
		}
	    //End of function User
		
		function insert_user()
		{
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $data_lokasi = array(
				 'USERNAME' =>$this->input->post('username'),
				 'PASSWORD' =>md5($this->input->post('password')),
				 'TIPE_USER' =>$this->input->post('tipe_user'),
				 'STATUS' =>1
			  );
			$this->useraddmodel->insert_data_user($data_lokasi);
			redirect('master/user');
		}
		//End of function insert_user
		
		function delete_user($id)
		{
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
		   $this->load->model('usermodel');
		   $this->load->model('useraddmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1);  
		   $id = $this->input->post('username');
		   $pass = md5($this->input->post('password'));
		   $data_user = array(
					 'TIPE_USER' =>$this->input->post('tipe_user'),
					 'STATUS' =>$this->input->post('status')
			   );
			if(!empty($pass)){
			   $data_user['PASSWORD']=$pass;
			}
			$this->useraddmodel->update_data_user($data_user,$id);
			redirect('master/user');
		}
		//End of function edit_user
	//End of function master
   }
	//End of class master
	
	/**
	   End of file: master.php
	   Location: ./application/controllers/master.php
	*/