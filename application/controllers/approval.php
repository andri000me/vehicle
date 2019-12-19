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
		   $this->load->model('appr_admin_model');
		   $data['approval'] = $this->appr_admin_model->show_all_operasional();
		   $data['reimburse'] = $this->appr_admin_model->show_all_reimburse();
		   $data['pending'] = $this->appr_admin_model->show_request();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','List Transaksi');
		   $this->template->load('template_refresh','admin/approval/transaksi',$data);
		}
		//-----------Transaksi--------------------
		function add_trans()
		{
		  $this->load->model('appr_admin_model');
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  
		  $data = array(
			'mobil_aktif'	=> $this->appr_admin_model->get_mobil_aktif(),
			'request'		=> $this->appr_admin_model->show_request(),
			'kode_k'		=> 'K'.$this->appr_admin_model->generate_code('K'),
			'kode_r'		=> 'R'.$this->appr_admin_model->generate_code('R')
		  );
		  
		  $this->template->set('title', 'Transaksi Operasional');
		  $this->template->load('template_refresh','admin/approval/insert_operasional', $data);
		}
		
		function edit_trans()
		{
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $this->auth->restrict();
		 $this->auth->check_menu(2);
		 
		 $id = $this->uri->segment(3);
		 $ids = substr($id,0,1);
		 switch($ids){
			case 'K':
				$jenis='Kendaraan';
			break;
			case 'R':
				$jenis='Reimburse';
			break;
		 }
		 
		 $data = array(
			'jenis'		=> $jenis,
			'transaksi'	=> $this->appr_admin_model->get_trans($id,$ids),
			'detail'	=> $this->appr_admin_model->get_detail($id,$ids),
			'mobil_aktif'=> $this->appr_admin_model->get_mobil_aktif(),
			'request'	=> $this->appr_admin_model->show_request()
		 );
		 
		 $this->template->set('title', 'Edit Transaksi Operasional');
		 $this->template->load('template_refresh','admin/approval/edit_operasional', $data);
		}
		//-----------End Transaksi--------------------
		
		//-----------Transaksi Peminjaman Kendaraan----
		function insert_op()
		{
		  $this->load->model('usermodel');
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  $id	= $this->input->post('no_trans');
		  $id_req = $this->input->post('request');
		  
		  $data = array(
			'ID_PEMINJAMAN' => $id,
			'NO_POLISI' => $this->input->post('kendaraan'),
			'STATUS' => '5',
			'KETERANGAN' => $this->input->post('keterangan')
			);
		  
		  $id_m	= $this->input->post('kendaraan');
		  $data_m = array(
			'STATUS' => '2' //Update Mobil Digunakan
		  );
		  
		  $this->appr_admin_model->insert_operasional($data);
		  $this->detail($id,$id_req,'PEMINJAMAN');
		  $this->update_request('baru',$id_req);
		  $this->appr_admin_model->update_mobil($data_m,$id_m);
		  redirect('approval');
		  
		}
		//End of function insert_op
		
		function edit_op()
		{
		  $this->load->model('usermodel');
		  $this->load->model('appr_admin_model');
		  
	      $this->auth->restrict();
		  $this->auth->check_menu(2);
		  $id	= $this->input->post('no_trans');
		  $id_ml= $this->input->post('kendaraan_lama');
		  $id_mb= $this->input->post('kendaraan_baru');
		  $id_rl = $this->input->post('request_lama');
		  $id_rb = $this->input->post('request_baru');
		  
		  $data = array(
			'NO_POLISI'		=> $this->input->post('kendaraan'),
			'KETERANGAN'	=> $this->input->post('keterangan'),
			'TGL_PEMINJAMAN'=> date('Y-m-d H:i:s')
			);
		  $data_baru = array(
			'STATUS' => '2'
		  );
		  $data_lama = array(
			'STATUS' => '1'
		  );
		  
		  //Update header
		  $this->appr_admin_model->update_operasional($data,$id);
		  //Update mobil
		  $this->appr_admin_model->update_mobil($data_baru,$id_mb);
		  $this->appr_admin_model->update_mobil($data_lama,$id_ml);
		  //Update request
		  $this->update_request('baru',$id_rb);
		  $this->update_request('lama',$id_rl);
		  //Update detail
		  $this->detail($id,$id_rb,'PEMINJAMAN');
		  $this->delete_detail($id_rl,'PEMINJAMAN');
		  
		  redirect('approval');
		  
		}
		//End of function edit_op
		
		//-----------End Transaksi Peminjaman Kendaraan----
		
		//-----------Detail Transaksi----------------
		// function insert_detail($id,$jenis){
			// // $no_trans = $this->input->post($id);
			// $id_req = $this->input->post('request');
			// $data = array();
			// $index = 0;
			// foreach($id_req as $req){
				// array_push($data,array(
					// 'ID_TRANS'	=>$id,
					// 'ID_REQUEST'=>$req,
					// 'TIPE'		=>$jenis
				// ));
				// $index++;
			// }
			// $this->appr_admin_model->insert_detail($data);
		// }
		
		function detail($id,$request,$jenis){
			$data = array();
			$index = 0;
			foreach($request as $req){
				array_push($data,array(
					'ID_TRANS'	=>$id,
					'ID_REQUEST'=>$req,
					'TIPE'		=>$jenis
				));
				$index++;
			}
			$this->appr_admin_model->insert_detail($data);
		}
		
		function delete_detail($request,$jenis){
			foreach($request as $req){
				$this->appr_admin_model->delete_detail($req,$jenis);
			}
		}
		//--------------End Detail Transaksi----------------
		
		function update_request($stat,$id){
			$s = ($stat=="baru"?3:1);
			// $id_req = $this->input->post('request_baru');
			$data = array();
			$i = 0;
			foreach($id as $req){
				array_push($data,array(
					'ID_REQUEST'=>$req,
					'STATUS'=>$s
				));
				$i++;
			}
			$this->appr_admin_model->update_request($data);
		}
		
	   function berangkat()
	   {
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
		
		
		//-------------- Transaksi Reimburse -----------------------
		
		function insert_reimburse()
		{
			$this->load->model('usermodel');
			$this->load->model('appr_admin_model');
			
			$this->auth->restrict();
			$this->auth->check_menu(2);
			  
			$id				= $this->input->post('no_reimburse');
			$id_req			= $this->input->post('request');
			$data = array(
				'ID_REIMBURSE'	=> $id,
				'KETERANGAN'	=> $this->input->post('keterangan'),
				'NOMINAL'		=> $this->input->post('nominal'),
			 	'TGL_PEMBERIAN' => $this->input->post('tgl_pemberian'),
				'LAMPIRAN'		=> $this->upload_file('lampiran')
			);
			
			$this->appr_admin_model->insert_reimburse($data);
			$this->detail($id,$id_req,'REIMBURSE');
			$this->update_request('baru',$id_req);
			redirect('approval');
		}
		
		function edit_reimburse()
		{
			$this->load->model('usermodel');
			$this->load->model('appr_admin_model');
			
			$this->auth->restrict();
			$this->auth->check_menu(2);
			  
			$id		= $this->input->post('no_reimburse');
			$id_rl	= $this->input->post('request_lama');
			$id_rb	= $this->input->post('request_baru');
			
			$data = array(
				'KETERANGAN'	=> $this->input->post('keterangan'),
				'NOMINAL'		=> $this->input->post('nominal'),
			 	'TGL_PEMBERIAN' => $this->input->post('tgl_pemberian'),
				'LAMPIRAN'		=> $this->upload_file('lampiran')
			);
			
			//Update header
			$this->appr_admin_model->update_reimburse($data,$id);
			//Update detail
			$this->detail($id,$id_rb,'REIMBURSE');
			$this->delete_detail($id_rl,'REIMBURSE');
			//Update request
			$this->update_request('baru',$id_rb);
			$this->update_request('lama',$id_rl);
			redirect('approval');
		}
		
		function lihat_reimburse()
		{
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   
		   $data['reimburse'] = $this->appr_admin_model->show_all_reimburse();
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(2); 
		   $this->template->set('title','Daftar Reimburse');
		   $this->template->load('template_refresh','admin/approval/data_reimburse',$data);
		}
		
		private function upload_file($file){
			$config['upload_path']		= './upload/reimburse';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['overwrite']		= true;
			$config['max_size']			= 10000;
		  
			$this->load->library('upload',$config);
			$upload = $this->upload->do_upload($file);
			if(!$upload){
				print_r($this->upload->display_errors());
			}else{
				$data = $this->upload->data();
				return $data['file_name'];
			}
		}
		//-------------- End Transaksi Reimburse -----------------------
		
		//--------------- Telegram --------------------
		public function telegramx($id){
			$this->load->model('telegram');
			$this->load->model('appr_admin_model');
			
			$peminjaman = $this->appr_admin_model->get_peminjaman($id)->row();
			// $chat_id = '403119565';
			$sopir = $peminjaman->NAMA;
			$chat_id = $peminjaman->CHAT_ID;
			$tgl = $peminjaman->TGL_PEMINJAMAN;
			$text = "Hi ,\nPeminjaman Kendaraan Dinas \n";
			$text .= "<b>nomor</b> : $sopir, \n";
			$text .= "<b>tanggal</b> : $tgl \n";
			$text .= "telah dibuat/diupdate!! \n";
			$text .= "Dengan detail penumpang sebagai berikut : \n";
			$text .= "Mohon bantuan untuk mengantarkan karyawan sampai tujuan \n";
			$text .= "Terima kasih";
			$send = $this->telegram->send->chat($chat_id)->text($text,"HTML")->send();
			$data['d'] = $send;
			$this->load->view('api_telegram',$data);
		}
	}
	?>