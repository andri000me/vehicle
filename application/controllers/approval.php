<?php
	/**
	  File home.php
	  author IT-PJBS
	*/
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	class Approval extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
        
		public function index()
		{
		   $this->load->model('usermodel');
		   $this->load->model('requestmodel');
		   
		   $level = $this->session->userdata('level');
		   $id = $this->session->userdata('nid');
		   
		   $subdit = $this->requestmodel->filter_request($id);
		   //$dir = $this->session->userdata('direktorat_id');
		   $dir = $this->session->userdata('subdit');
		   
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['approval'] = $this->requestmodel->show_request($subdit);
		   //$data['approval'] = $this->requestmodel->show_request2($dir);
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   
		   $level = $this->session->userdata('level');
		   
		   if($level == 1)
		     redirect('approval/approval_admin');
		   else
		   {
		      $this->template->set('title','Daftar Request Masuk');
		      $this->template->load('template_refresh','manajer/approval/dataapproval',$data);
		   }
		}
		//End of function index
		
		public function print_form()
		{
			//slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('usermodel');
		   $this->load->model('requestmodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $id = $this->session->userdata('nid');
		   
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   
		   $id = $this->uri->segment(3);
		   $data['surat'] = $this->appr_admin_model->get_data_surat($id);
		   
		   $level = $this->session->userdata('level');
		  
		   $this->load->view('admin/approval/print_admin',$data);
		}
		//End of function print_form
	 		
		function edit_approval($val,$id)
		{
		   //slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('usermodel');
		   $this->load->model('requestmodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $this->auth->restrict();
		   $this->auth->check_menu(3);  
		   
		   $id = $this->uri->segment(3);
		   $val= $this->uri->segment(4);
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
      	
			  $data_request = array(
				 'ID_STATUS_REQUEST' =>$val,
				 'APPROVED_BY' => $this->session->userdata('nama')
			  );
			  $this->requestmodel->edit_data_request($data_request,$id);
			  redirect('approval');
		}
		//End of function edit_approval
		
//----------------------  Approval untuk Admin  ------------------------------------------------
        
		public function approval_admin()
		{
		   $this->load->model('usermodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   //$data['level']= $level;
		   $this->load->model('appr_admin_model');
		   
		   $data['approval'] = $this->appr_admin_model->show_request();
		   // if($level == 6)
		   	// {	$data['approval'] = $this->appr_admin_model->show_request_jkt();}
		   // else
			// {	$data['approval'] = $this->appr_admin_model->show_request();	}
			
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Request Masuk');
		   $this->template->load('template_refresh','admin/approval/dataapproval',$data);
		}
		//End of function approval_admin
		
		public function pending_request()
		{
		   $this->load->model('usermodel');
		   $this->load->model('requestmodel');
		   
		   $level = $this->session->userdata('level');
		   $id = $this->session->userdata('nid');
		   
		   //$subdit = $this->requestmodel->filter_request($id);
		   $data['approval'] = $this->requestmodel->show_all_request();
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   
		   $level = $this->session->userdata('level');
		   
		    $this->template->set('title','Daftar Request Masuk');
		    $this->template->load('template_refresh','admin/approval/pending_request',$data);   
		
		}
		//End of function pending_request
		
		public function semua_approval()
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   
		   $this->load->model('appr_admin_model');
		   $data['approval'] = $this->appr_admin_model->show_all_operasional();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(4); 
		   $this->template->set('title','Daftar Request Masuk | eFormC');
		   $this->template->load('template','admin/approval/dataapproval_lengkap',$data);
		}
		//End of function semua_approval
		
		function insert_op()
		{
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();

		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_request', 'id_request', 'trim|required');
		  $this->form_validation->set_rules('id_sopir', 'id_sopir', 'trim|required');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('jam_keluar', 'jam_keluar', 'trim|required');
		  $this->form_validation->set_rules('jam_kembali', 'jam_kembali', 'trim|required');
		  $this->form_validation->set_rules('tgl_berangkat', 'tgl_berangkat', 'trim|required');
		  $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id_req = $this->uri->segment(3);
	      $data['approval'] = $this->appr_admin_model->show_request1($id_req);
		  
		  //$tgl_kembali = $this->appr_admin_model->show_request1($id_req)->row()->TGL_KEMBALI;		
		  $tgl_kembali = $this->appr_admin_model->get_tgl_kembali($id_req);
		  $waktu_kembali = $this->appr_admin_model->get_waktu_kembali($id_req);
		  $waktu_berangkat = $this->appr_admin_model->get_waktu_berangkat($id_req);
		  //echo $waktu_berangkat." - ".$waktu_kembali."<br/><br/>";
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $data['level']=$level;
			 
			 //$data['approval'] = $this->appr_admin_model->show_request();
		  	 
		  	 
			 $data['jenis_operasional'] = $this->appr_admin_model->tampil_jenis_operasional();
			 
			 if($level==6)
			 {
				$data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif_jkt(); 
				$data['sopir'] = $this->appr_admin_model->get_sopir_booked2_jkt($waktu_kembali);
				$data['sopir2'] = $this->appr_admin_model->get_sopir_booked3_jkt($waktu_berangkat); 
				$data['mobil_aktif'] = $this->appr_admin_model->get_mobil_aktif_jkt();
				$data['mobil'] = $this->appr_admin_model->get_mobil_booked2_jkt($waktu_kembali);
                $data['mobil2'] = $this->appr_admin_model->get_mobil_booked3_jkt($waktu_berangkat);
			 }else
			 {
				$data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif(); 
				$data['sopir'] = $this->appr_admin_model->get_sopir_booked2($waktu_kembali);
				$data['sopir2'] = $this->appr_admin_model->get_sopir_booked3($waktu_berangkat);
				$data['mobil_aktif'] = $this->appr_admin_model->get_mobil_aktif();
				$data['mobil'] = $this->appr_admin_model->get_mobil_booked2($waktu_kembali);
                $data['mobil2'] = $this->appr_admin_model->get_mobil_booked3($waktu_berangkat);
			 }
			 
			 //$data['mobil'] = $this->appr_admin_model->get_mobil_booked($tgl_kembali);
		     //$data['sopir'] = $this->appr_admin_model->get_sopir_booked($tgl_kembali);
			 
			 //Untuk sewa
			 $this->load->model('suppliermodel');
			 $data['harian'] = $this->suppliermodel->get_supplier_harian();
			 
			 $this->load->model('kendaraanmodel');
			 $data['kendaraan'] = $this->kendaraanmodel->get_all_jenis_kendaraan();
			 
			 //-----------------------
			 /*Reimburse*/
			  $data['jenis_reimburse'] = $this->appr_admin_model->get_jenis_reimburse();
			 
			 //-----------------------

		     $this->template->set('title', 'Form Tambah Subdit Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/insert_operasional', $data);
		  }
		  else
		  {
		     /*$this->load->model('datemodel');
			 $tgl_berangkat = $this->datemodel->format_tanggal($this->input->post('tgl_berangkat'));
			 $tgl_kembali = $this->datemodel->format_tanggal($this->input->post('tgl_kembali'));*/
             $tgl_berangkat = $this->input->post('tgl_berangkat');	
             $tgl_kembali = $this->input->post('tgl_kembali');	

             $tgl_berangkat = date('d-M-Y',strtotime($tgl_berangkat));
			 $tgl_kembali = date('d-M-Y',strtotime($tgl_kembali));			 
			  
		     $data = array(
			 	'TGL_BERANGKAT' => $tgl_berangkat,
			 	'ID_KENDARAAN' => $this->input->post('id_kendaraan'),
				'ID_SOPIR' => $this->input->post('id_sopir'),
				'ID_REQUEST' => $this->input->post('id_request'),
				'JAM_KELUAR' => $this->input->post('jam_keluar'),
				'JAM_KEMBALI' => $this->input->post('jam_kembali'),
				
				'KM_AWAL' => '',
				'KM_AKHIR' => '',
				'ID_JENIS_BBM' => '2',
				'LITER_BBM' => '',
				
				'TGL_KEMBALI' => $tgl_kembali,
				'ID_STATUS_OPERASIONAL' => '5',
				'KETERANGAN' => '',
				'APPROVED_BY' => $this->session->userdata('nama')
			 );
			 
			 $id =  $this->input->post('id_request');
			 $id_s = $this->input->post('id_sopir');
			 $id_m = $this->input->post('id_kendaraan');
			 
			 $data2 = array(
			 'ID_STATUS_REQUEST' => '3'
			 );
			 
			 $data3 = array(
			 'ID_STATUS_SOPIR' => '5'
			 );
			 
			 $data4 = array(
			 'ID_STATUS_KENDARAAN' => '5'
			 );
			 
			 if($id_s == 0)
			 {
			     $data3 = array(
			       'ID_STATUS_SOPIR' => '1'
			      );
			 }
			 
			 $this->appr_admin_model->insert_data_operasional($data);
			 $this->appr_admin_model->update_request_op($data2,$id);
			 $this->appr_admin_model->update_sopir_2($data3,$id_s);
			 $this->appr_admin_model->update_mobil_2($data4,$id_m);
			 
			 redirect('approval/approval_admin');
		  } //End of else
		  
		}
		//End of function insert_op
		
	   function update_op($id)
	   {
		 //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(1);
		 
		 $this->load->model('appr_admin_model');
		 
		 $param = $this->uri->segment(3);
		 $extension = explode("-", $param);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		 
		 $this->load->model('datemodel');
		 $tgl_kembali = $this->datemodel->format_tanggal($this->input->post('tgl_kembali')); 
		 
		 $tgl_kembali = date('d-M-Y',strtotime($tgl_kembali));
		 
		 $data2 = array(
		     'TGL_KEMBALI' => $tgl_kembali,
			 'JAM_KEMBALI'=> $this->input->post('jam_kembali'),
			 'ID_STATUS_OPERASIONAL' => '1'
			 );
			 
		 $data3 = array(
			 'ID_STATUS_SOPIR' => '1'
			 );
			 
		 $data4 = array(
			 'ID_STATUS_KENDARAAN' => '1'
			 );
			 
		 $this->appr_admin_model->update_operasional($data2,$id);
		 $this->appr_admin_model->update_sopir_2($data3,$id_s);
		 $this->appr_admin_model->update_mobil_2($data4,$id_m);
		 
		 //echo $id."-".$id_s."-".$id_m;
		 
		 redirect('approval/semua_approval');
	   }
	   //End of function semua_approval
	   
	   //halaman reject
		function hal_op_reject() 
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('usermodel');
		   $level = $this->session->userdata('level');
		   $data['level']= $level;
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   
		   $this->load->model('appr_admin_model');
		   if($level==6)
		   {$data['approval'] = $this->appr_admin_model->show_operasional_jkt();}else
		   {$data['approval'] = $this->appr_admin_model->show_operasional();}
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Pembatalan Operasional | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/approval/hal_update_rej',$data);
		}
		//proses reject
		function up_op_reject()
		{
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();

		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(1);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_sopir', 'id_sopir', 'trim|required');
		  $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  $this->form_validation->set_rules('id_operasional', 'id_operasional', 'trim|required');
		  //$this->form_validation->set_rules('jam_keluar', 'jam_keluar', 'trim|required');
		  //$this->form_validation->set_rules('jam_kembali', 'jam_kembali', 'trim|required');
		  //$this->form_validation->set_rules('tgl_berangkat', 'tgl_berangkat', 'trim|required');
		  //$this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $id = $this->uri->segment(3);
			 $data['approval'] = $this->appr_admin_model->show_operasional1($id);
		  	 //$data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif();
		  	 //$data['mobil_aktif'] = $this->appr_admin_model->get_mobil_aktif();

		     $this->template->set('title', 'Form Pembatalan Operasional | Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/insert_operasional_reject', $data);
		  }
		  else
		  {
		     $data2 = array(
			 	'ID_KENDARAAN' => $this->input->post('id_kendaraan'),
				'ID_SOPIR' => $this->input->post('id_sopir'),
				'ID_STATUS_OPERASIONAL' => '2',
				'KETERANGAN' => $this->input->post('ket')
			 );
			 
			 $id = $this->input->post('id_operasional');
			 $id_s = $this->input->post('id_sopir');
			 $id_m = $this->input->post('id_kendaraan');
			 
			 
			 
			 //-----
			 
			  $cek_sopir = $this->appr_admin_model->check_sopir_booked($id_s, $id);
					 
					 if($cek_sopir) //Jika sopir masih dipesan pada operasional lain yg msh blum berangkat
					 {
					    $data3 = array(
						   'ID_STATUS_SOPIR' => '5'
						 );
					 }
					 else
					 {
					    $data3 = array(
						   'ID_STATUS_SOPIR' => '1'
						 );
					 }
					 
					 $cek_kendaraan = $this->appr_admin_model->check_kendaraan_booked($id_m, $id);
					 
					 if($cek_kendaraan) //Jika kendaraan masih dipesan pada operasional lain yg msh blum berangkat
					 {
					    $data4 = array(
						 'ID_STATUS_KENDARAAN' => '5'
						 );
					 }
					 else
					 {
					    $data4 = array(
						 'ID_STATUS_KENDARAAN' => '1'
						 );
					 }			
			 
			 //--------------
	         $data = array(
			 'ID_STATUS_REQUEST' => '2'
			 );
			 $id_r =  $this->input->post('id_request');
			 
			 //data2
			 /*echo $id."<br/>";
		     echo $id_s."<br/>";
			 echo $id_m."<br/>";
			 echo $id_r."<br/>";
			 
			 echo $cek_sopir."<br/>";
			 echo $cek_kendaraan."<br/>";
			 print_r($data3); echo "<br/>";
			 print_r($data4); echo "<br/>";
			 print_r($data); echo "<br/>";
			 print_r($data2); echo "<br/>";*/
			 
			 $this->appr_admin_model->update_request_op($data,$id_r); 
			 //---------
			 
			 $this->appr_admin_model->update_operasional($data2,$id);
			 $this->appr_admin_model->update_sopir_2($data3,$id_s);
			 $this->appr_admin_model->update_mobil_2($data4,$id_m);
			 
			 redirect('approval/approval_admin');
		  } //End of else
		  
		} //End of function up_op_reject
		
		function lihat_operasional()
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $data['level'] = $level;
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   if($level==6){
		   $data['approval'] = $this->appr_admin_model->show_all_operasional_jkt();}else
		  {$data['approval'] = $this->appr_admin_model->show_all_operasional();}
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Operasional | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/approval/data_operasional',$data);
		}
		// End of function lihat_operasional
		
	    function edit_operasional()
		{
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $level = $this->session->userdata('level');
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(2);
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('id_sopir', 'id_sopir', 'trim|required');
		 $this->form_validation->set_rules('id_kendaraan', 'id_kendaraan', 'trim|required');
		  
		 $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		 
		 $ids = $this->uri->segment(3);
		 $extension = explode("-", $ids);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		 
		 //echo $extension[1]." ".$extension[2];
		 
		 $id_req = $this->appr_admin_model->get_id_request($id);
         $waktu_kembali = $this->appr_admin_model->get_waktu_kembali($id_req);
         $waktu_berangkat = $this->appr_admin_model->get_waktu_berangkat($id_req);
		  
		  if($this->form_validation->run() == FALSE)
           {
		      $data['menu'] = $this->usermodel->get_menu_for_level($level);
	          $data['op'] = $this->appr_admin_model->get_operasional_by_id($id);
			  //$data['status'] = $this->appr_admin_model->get_status_operasional();
			  
			  $data['current_sopir'] = $this->appr_admin_model->get_current_sopir($id_s);
			  $data['current_mobil'] = $this->appr_admin_model->get_current_mobil($id_m);
			  
              $data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif();
              $data['mobil_aktif'] = $this->appr_admin_model->get_mobil_aktif();

              $data['mobil'] = $this->appr_admin_model->get_mobil_booked2($waktu_kembali);
              $data['sopir'] = $this->appr_admin_model->get_sopir_booked2($waktu_kembali);
			 
              $data['mobil2'] = $this->appr_admin_model->get_mobil_booked3($waktu_berangkat);
              $data['sopir2'] = $this->appr_admin_model->get_sopir_booked3($waktu_berangkat);
			  
		      $this->template->set('title', 'Form Edit Operasional | Aplikasi Monitoring Kendaraan Dinas');
			  $this->template->load('template','admin/approval/edit_operasional', $data);
		   } //End of if
           else
           {
		      //$status_op = $this->input->post('ID_STATUS_OPERASIONAL');
			  $id_sopir = $this->input->post('id_sopir');
			  $id_kendaraan = $this->input->post('id_kendaraan');
			  
			  /*if($status_op == 3)
			    $status_op = 1;*/
		 
			  $data2 = array(
				 'ID_SOPIR' => $id_sopir,
			     'ID_KENDARAAN' => $id_kendaraan
			  );
		  
			/*--------------------------------------------------------------------------*/
			//Mengubah status sopir dan kendaraan (lama) yang diganti
		    $cek_sopir = $this->appr_admin_model->check_sopir_booked($id_s, $id);
					 
		    if($cek_sopir) //Jika sopir masih dipesan pada operasional lain yg msh blum berangkat
			{
			   $data3 = array(
				  'ID_STATUS_SOPIR' => '5' //Mengupdate status Sopir dari 'Sedang Bertugas' ke 'Dipesan'
				);
			}
			else
			{
			   $data3 = array(
				  'ID_STATUS_SOPIR' => '1'  //Mengupdate status Sopir dari 'Sedang Bertugas' ke 'Tersedia'
			   );
			}		
					 
		    $cek_kendaraan = $this->appr_admin_model->check_kendaraan_booked($id_m,$id);
					 
			if($cek_kendaraan) //Jika kendaraan masih dipesan pada operasional lain yg msh blum berangkat
		    {
			    $data4 = array(
					'ID_STATUS_KENDARAAN' => '5'  //Mengupdate status Kendaraan dari 'Sedang digunakan' ke 'Dipesan'
				 );
		     }
			else
			{
			    $data4 = array(
				   'ID_STATUS_KENDARAAN' => '1'  //Mengupdate status Kendaraan dari 'Sedang digunakan' ke 'Tersedia'
				 );
			 } 
			 
			 if($id_s == 0)
			 {
			     $data3 = array(
			       'ID_STATUS_SOPIR' => '1'
			      );
			 }
			
			/*--------------------------------------------------------------------------*/
			
			//Mengubah status sopir dan kendaraan (baru) yang diganti
			 //Mengupdate status Sopir menjadi 'Stand by' 
			  $data5 = array(
				   'ID_STATUS_SOPIR' => '5'
			  );
			  
			  //Mengupdate status Kendaraan menjadi 'Stand by'
			  $data6 = array(
				  'ID_STATUS_KENDARAAN' => '5'
			  );		

				if($id_sopir == 0)
				 {
					 $data5 = array(
					   'ID_STATUS_SOPIR' => '1'
					  );
				 }		  
			
			/*--------------------------------------------------------------------------*/
			
			//echo "ID_SOPIR: ".$id_s." -> ".$id_sopir."<br/>";
			//echo "ID_KENDARAAN: ".$id_m." -> ".$id_kendaraan."<br/>";
				 
			$this->appr_admin_model->update_operasional($data2,$id);
			$this->appr_admin_model->update_sopir_2($data3,$id_s);
			$this->appr_admin_model->update_mobil_2($data4,$id_m);
			$this->appr_admin_model->update_sopir_2($data5,$id_sopir);
			$this->appr_admin_model->update_mobil_2($data6,$id_kendaraan);
				 
			redirect('approval/lihat_operasional');
			   
		   } //End of else		    	
		 
		}
		// End of function edit_operasional
		
	   function berangkat()
	   {
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $level = $this->session->userdata('level');
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(2);
		 
		 $ids = $this->uri->segment(3);
		 $extension = explode("-", $ids);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		
		//Cek apakah kendaraan dan sopir telah kembali apa belum
		$cek_kendaraan = $this->appr_admin_model->check_kendaraan_berangkat($id_m);
		$cek_sopir = $this->appr_admin_model->check_sopir_berangkat($id_s);

        //Jika kendaraan dan sopir sama2 telah kembali
        if(!$cek_kendaraan && !$cek_sopir)
        {
			  //Mendapatkan waktu saat ini
			  date_default_timezone_set('Asia/Bangkok');
			  $tgl_berangkat = date('d-m-Y');
			  $jam_keluar = date('H:i:s');
			  
			  $tgl_berangkat = date('d-M-Y',strtotime($tgl_berangkat));
			
			  //Mengupdate status operasional dari 'Stand by' ke 'Berangkat'
			  $data2 = array(
				  'ID_STATUS_OPERASIONAL' => '4',
				  'TGL_BERANGKAT' => $tgl_berangkat,
				  'JAM_KELUAR' => $jam_keluar
			  );
			  
			  //Mengupdate status Sopir dari 'Stand by' ke 'Sedang Bertugas'
			  $data3 = array(
				   'ID_STATUS_SOPIR' => '2'
			  );
			  
			  //Mengupdate status Kendaraan dari 'Stand by' ke 'Sedang Digunakan'
			  $data4 = array(
				  'ID_STATUS_KENDARAAN' => '2'
			  );		

				if($id_s == 0)
				 {
					 $data3 = array(
					   'ID_STATUS_SOPIR' => '1'
					  );
				 }		  
					   
			   $this->appr_admin_model->update_operasional($data2,$id);
			   $this->appr_admin_model->update_sopir_2($data3,$id_s);
			   $this->appr_admin_model->update_mobil_2($data4,$id_m);
     
        }
		else
		  echo '<script type="text/javascript">alert("Sopir/Kendaraan masih belum kembali pada Operasional lainnya!");</script>'; 
		  
		  //End of if cek_kendaraan && cek_sopir
		  
		  redirect('approval/lihat_operasional');	   		
		}
		// End of function berangkat
		
	   function kembali()
	   {
		  //slider-------------
		 $this->load->model('slidermodel');
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $level = $this->session->userdata('level');
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(2);
		 
		 $ids = $this->uri->segment(3);
		 $extension = explode("-", $ids);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		
		  //Mendapatkan waktu saat ini
		  date_default_timezone_set('Asia/Bangkok');
          $tgl_kembali = date('d-m-Y');
          $jam_kembali = date('H:i:s');
		  
		  $tgl_kembali = date('d-M-Y',strtotime($tgl_kembali));
		
		  //Mengupdate status operasional dari 'Berangkat' ke 'Kembali'
		  $data2 = array(
			  'ID_STATUS_OPERASIONAL' => '1',
			  'TGL_KEMBALI' => $tgl_kembali,
              'JAM_KEMBALI' => $jam_kembali
		  );
		  
		   $cek_sopir = $this->appr_admin_model->check_sopir_booked($id_s, $id);
					 
		    if($cek_sopir) //Jika sopir masih dipesan pada operasional lain yg msh blum berangkat
			{
			   $data3 = array(
				  'ID_STATUS_SOPIR' => '5' //Mengupdate status Sopir dari 'Sedang Bertugas' ke 'Dipesan'
				);
			}
			else
			{
			   $data3 = array(
				  'ID_STATUS_SOPIR' => '1'  //Mengupdate status Sopir dari 'Sedang Bertugas' ke 'Tersedia'
			   );
			}		
					 
		    $cek_kendaraan = $this->appr_admin_model->check_kendaraan_booked($id_m,$id);
					 
			if($cek_kendaraan) //Jika kendaraan masih dipesan pada operasional lain yg msh blum berangkat
		    {
			    $data4 = array(
					'ID_STATUS_KENDARAAN' => '5'  //Mengupdate status Kendaraan dari 'Sedang digunakan' ke 'Dipesan'
				 );
		     }
			else
			{
			    $data4 = array(
				   'ID_STATUS_KENDARAAN' => '1'  //Mengupdate status Kendaraan dari 'Sedang digunakan' ke 'Tersedia'
				 );
			 } 
			 
			 if($id_s == 0)
			 {
			     $data3 = array(
			       'ID_STATUS_SOPIR' => '1'
			      );
			 }
				   
		   $this->appr_admin_model->update_operasional($data2,$id);
		   $this->appr_admin_model->update_sopir_2($data3,$id_s);
		   $this->appr_admin_model->update_mobil_2($data4,$id_m);
				 
		   redirect('approval/lihat_operasional');
			   		
		}
		// End of function kembali
		
		
		//-------------- Tambahan fungsi untuk Sewa, Voucher dan Reimburse -----------------------
		
		function insert_sewa()
		{
		   $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();

		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_request', 'id_request', 'trim|required');
		  $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
		  //$this->form_validation->set_rules('no_polisi', 'no_polisi', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id_req = $this->uri->segment(3);
	      $data['approval'] = $this->appr_admin_model->show_request1($id_req);
		  
		  $tgl_kembali = $this->appr_admin_model->get_tgl_kembali($id_req);
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $data['jenis_operasional'] = $this->appr_admin_model->tampil_jenis_operasional();
			 
			 $this->load->model('suppliermodel');
			 $data['harian'] = $this->suppliermodel->get_supplier_harian();
			 
			 $this->load->model('kendaraanmodel');
			 $data['kendaraan'] = $this->kendaraanmodel->get_all_jenis_kendaraan();
			 
			 $data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif();
             $data['sopir'] = $this->appr_admin_model->get_sopir_booked($tgl_kembali);

		     $this->template->set('title', 'Form Tambah Subdit Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/insert_operasional', $data);
		  }
		  else
		  {
             $tgl_sewa = $this->input->post('tgl_sewa');
             
             $tgl_sewa = date('d-M-Y',strtotime($tgl_sewa));		 
			  
		     $data = array(
			    'ID_REQUEST' => $this->input->post('id_request'),
			 	'TGL_SEWA' => $tgl_sewa,
			 	'ID_SUPPLIER' => $this->input->post('id_supplier'),
				'ID_JENIS_KENDARAAN' => $this->input->post('id_jenis_kendaraan'),
				'NO_POLISI' => $this->input->post('no_polisi'),
				//'BIAYA_SEWA' => $this->input->post('biaya_sewa'),
				'ID_SOPIR' => $this->input->post('id_sopir')
			 );
			 
			 $id =  $this->input->post('id_request');
			 $id_s = $this->input->post('id_sopir');
			 
			 $data2 = array(
			     'ID_STATUS_REQUEST' => '3'
			 );
			 
			 $data3 = array(
				 'ID_STATUS_SOPIR' => '2'
			  );
			  
			  if($id_s == 0)
			  {
			     $data3 = array(
				    'ID_STATUS_SOPIR' => '1'
			     );
			  }
			 
			 //echo $this->input->post('id_request')."<br/>".$tgl_sewa."<br/>".$this->input->post('id_supplier')."<br/>".$this->input->post('id_jenis_kendaraan')."<br/>".$this->input->post('no_polisi')."<br/>".$this->input->post('biaya_sewa');
			 
			 $this->appr_admin_model->insert_data_sewa($data);
			 $this->appr_admin_model->update_request_op($data2,$id);
			 $this->appr_admin_model->update_sopir_2($data3,$id_s);
			 
			 redirect('approval/lihat_sewa');
		  } //End of else
		
		}
		//End of function insert_sewa
		
		function lihat_sewa()
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['sewa'] = $this->appr_admin_model->show_all_sewa();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Sewa Operasional | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/approval/data_sewa',$data);
		}
		// End of function lihat_reimburse
		
		// start of function biaya sewa
		function update_sewa()
		{
		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('biaya_sewa', 'biaya_sewa', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id_req = $this->uri->segment(3);
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 
			 $data['approval'] = $this->appr_admin_model->show_sewa_id_sewa($id_req);

		     $this->template->set('title', 'Update Sewa Kendaraan Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/biaya_sewa', $data);
		  }
		  else
		  {
			 $id = $this->uri->segment(3);
			 $biaya=$this->input->post('biaya_sewa');
			 //Mendapatkan waktu saat ini
		 	 date_default_timezone_set('Asia/Bangkok');
         	 $tgl_pengembalian = date('d-m-Y');
			 
			 $tgl_pengembalian = date('d-M-Y',strtotime($tgl_pengembalian));
		
		  	//Mengupdate status sewa dari 'Sedang digunakan' ke 'Sudah dikembalikan'
		  	$data = array(
			  'BIAYA_SEWA' =>$biaya,
			  'ID_STATUS_SEWA' => '1',
			  'TGL_PENGEMBALIAN' => $tgl_pengembalian
		  	);
		  
		   	$id_s = $this->appr_admin_model->get_id_sopir_sewa($id);
		   
		   	$data2 = array(
				    'ID_STATUS_SOPIR' => '1'
			     );
		  	$this->appr_admin_model->update_sewa($data,$id);
		   	$this->appr_admin_model->update_sopir_2($data2,$id_s);
				 
		  	redirect('approval/lihat_sewa');
		  } //End of else
		
		}
		// end of biaya sewa
		
		function insert_voucher()
		{
		  $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();

		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_request', 'id_request', 'trim|required');
		  //$this->form_validation->set_rules('kode_voucher', 'kode_voucher', 'trim|required');
		  $this->form_validation->set_rules('tgl_pemberian', 'tgl_pemberian', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id_req = $this->uri->segment(3);
	      $data['approval'] = $this->appr_admin_model->show_request1($id_req);
		  
		  //echo $this->input->post('kode_voucher')." ".$this->input->post('id_request')
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $data['jenis_operasional'] = $this->appr_admin_model->tampil_jenis_operasional();

		     $this->template->set('title', 'Form Tambah Subdit Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/insert_operasional', $data);
		  }
		  else
		  {
             $tgl_pemberian = $this->input->post('tgl_pemberian');		
             $tgl_pemberian = date('d-M-Y',strtotime($tgl_pemberian));
			  
		     $data = array(
			    'KODE_VOUCHER' => $this->input->post('kode_voucher'),
			 	'TGL_PEMBERIAN' => $tgl_pemberian,
			 	//'NILAI_VOUCHER' => $this->input->post('nilai_voucher'),
				'ID_REQUEST' => $this->input->post('id_request'),
				'KETERANGAN' => $this->input->post('keterangan')
			 );
			 
			 $id =  $this->input->post('id_request');
			 
			 $data2 = array(
			 'ID_STATUS_REQUEST' => '3'
			 );
			 
			 $this->appr_admin_model->insert_data_voucher($data);
			 $this->appr_admin_model->update_request_op($data2,$id);
			 
			 redirect('approval/lihat_voucher');
		  } //End of else
		   
		}
		//End of function insert_voucher
		
		function lihat_voucher()
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['voucher'] = $this->appr_admin_model->show_all_voucher();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Operasional | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/approval/data_voucher',$data);
		}
		// End of function lihat_voucher
		
		function insert_reimburse()
		{
		   $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();

		  $this->load->model('usermodel');
		  $level = $this->session->userdata('level');
		  
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('id_request', 'id_request', 'trim|required');
		  $this->form_validation->set_rules('tgl_pemberian', 'tgl_pemberian', 'trim|required');
		  
		  $this->form_validation->set_error_delimiters('<span style="color:#FF0000">', '</span>');
		  
		  $id_req = $this->uri->segment(3);
	      $data['approval'] = $this->appr_admin_model->show_request1($id_req);
		  
		  if($this->form_validation->run() == FALSE)
		  { 			 
		     $data['menu'] = $this->usermodel->get_menu_for_level($level);
			 $data['jenis_operasional'] = $this->appr_admin_model->tampil_jenis_operasional();
			 $data['jenis_reimburse'] = $this->appr_admin_model->get_jenis_reimburse();

		     $this->template->set('title', 'Form Tambah Subdit Baru Aplikasi Monitoring Kendaraan Dinas');
			 $this->template->load('template','admin/approval/insert_operasional', $data);
		  }
		  else
		  {
             $tgl_pemberian = $this->input->post('tgl_pemberian');	
             $tgl_pemberian = date('d-M-Y',strtotime($tgl_pemberian));		 
			  
		     $data = array(
			    'ID_JENIS_REIMBURSE' => $this->input->post('id_jenis_reimburse'),
				'ID_REQUEST' => $this->input->post('id_request'),
				'KETERANGAN' => $this->input->post('keterangan'),
			 	'TGL_PEMBERIAN' => $tgl_pemberian			
			 );
			 
			 $id =  $this->input->post('id_request');
			 
			 $data2 = array(
			 'ID_STATUS_REQUEST' => '3'
			 );
			 
			 $this->appr_admin_model->insert_data_reimburse($data);
			 $this->appr_admin_model->update_request_op($data2,$id);
			 
			 redirect('approval/lihat_reimburse');
		  } //End of else
		  
		}
		//End of function insert_reimburse
		
		function lihat_reimburse()
		{
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   $data['reimburse'] = $this->appr_admin_model->show_all_reimburse();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Operasional | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/approval/data_reimburse',$data);
		}
		// End of function lihat_reimburse
		

	}
	//End of class Approval
	?>