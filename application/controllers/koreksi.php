<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	
	class Koreksi extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   
	   
	   public function index()
	   {
		   $this->load->model('usermodel');
		   $this->load->model('appr_admin_model');
		   $nid = $this->session->userdata('nid');
		   $data['approval'] = $this->appr_admin_model->show_approval($nid);
		   
		   $this->auth->restrict();
		   //$this->auth->check_menu(6); 
		   $this->auth->check_menu(3); 
		   $this->template->set('title','Persetujuan Permintaan E-FORM C');
		   // $this->template->load('template_refresh','operator/dataapproval_lengkap',$data);
		   $this->template->load('template_refresh','manajer/approval/dataapproval',$data);
	   }
	   
	   function edit_approval($val,$id)
		{
		   $this->load->model('requestmodel');
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(3);
		   
		   $id = $this->uri->segment(3);
		   $val= $this->uri->segment(4);
		   
		   $data_request = array(
				 'STATUS' =>$val,
				 'APPROVED_BY' => $this->session->userdata('nid')
				 );
			$this->requestmodel->edit_data_request($data_request,$id);
			redirect('koreksi');
		}
		//End of function edit_approval
		
	   function update_op($id)
	   {
		 $this->auth->restrict();
		 $this->auth->check_menu(3);
		 
		 $this->load->model('appr_admin_model');
		 
		 $url = $this->uri->segment(3);
		 $extension = explode("-", $url);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		 
		 
		 $data2 = array(
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
		 
		 redirect('koreksi/');
	   }
	   //End of function update_op
	   
	   function berangkat()
	   {
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $level = $this->session->userdata('level');
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(3);
		 
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
		  redirect('koreksi/');
			   		
		}
		// End of function berangkat
		
	   function kembali()
	   {
		 $this->load->model('usermodel');
		 $this->load->model('appr_admin_model');
		   
		 $level = $this->session->userdata('level');
	       
		 $this->auth->restrict();
		 $this->auth->check_menu(3);
		 
		 $ids = $this->uri->segment(3);
		 $extension = explode("-", $ids);
		 $id = $extension[0];
		 $id_s = $extension[1];
		 $id_m = $extension[2];
		
		  //Mendapatkan waktu saat ini
		  date_default_timezone_set('Asia/Bangkok');
          $tgl_kembali = date('d-m-Y');
          $jam_kembali = date('H:i:s');
		
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
					 
		    $cek_kendaraan = $this->appr_admin_model->check_kendaraan_booked($id_m, $id);
					 
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
				 
		   redirect('koreksi/');
			   		
		}
		// End of function kembali
		
		public function print_form()
		{
		   $this->load->model('usermodel');
		   $this->load->model('requestmodel');
		   $this->load->model('appr_admin_model');
		   
		   $level = $this->session->userdata('level');
		   $id = $this->session->userdata('nid');
		   
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(3); 
		   
		   $id = $this->uri->segment(3);
		   $data['surat'] = $this->appr_admin_model->get_data_surat($id);
		   
		   $level = $this->session->userdata('level');
		  
		   $this->load->view('operator/print_op',$data);
		}
		//End of function print_form
	}
?>