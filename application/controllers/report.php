<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Report extends CI_Controller {
     
	public function index()
	{
	   //slider-------------
	//    $this->load->model('slidermodel');
	//    $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	   $this->load->model('usermodel');
	   $level = $this->session->userdata('level');
	   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
	   $this->auth->restrict();
	   $this->auth->check_menu(1);
		 
	   $this->template->set('title','Report');
	//    $this->template->load('template', 'admin/report/report_index', $data);
		$this->template->load('template_refresh', 'admin/report/report_index', $data);
	 }
	 //End of function index  
	 
	 public function print_form_report_operasional()
		{
			//slider-------------
		   $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   
		   $this->load->model('usermodel');
		   $this->load->model('reportmodel');
		   
		   $level = $this->session->userdata('level');
		   //$id = $this->session->userdata('nid');
		   
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(5); 
		   
		   $tgl1 = $this->uri->segment(3);
		   $tgl2 = $this->uri->segment(4);
		   
		   $data['user'] = $this->reportmodel->lihat_data_operasional($tgl1, $tgl2);
		   $data['tgl'] = $tgl1.'|'.$tgl2;
		   
		   $level = $this->session->userdata('level');
		  
		   $this->load->view('admin/report/print_report_operasional',$data);
		}
		//End of function print_form
	 
	  public function operasional()
	  {
	     $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");	  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
		  }
		  //End of else
		   
		   //$data['user'] = $this->reportmodel->lihat_detail_op_user($tgl_awal, $tgl_akhir, $nama);
		   $data['user'] = $this->reportmodel->lihat_data_operasional($tgl_awal, $tgl_akhir);
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   //$data['op'] = $data_op;
		   $this->template->set('title','Data Operasional| eFormC');
		   $this->template->load('template','admin/report/operasional', $data);
		  
	  }
	  //End of function operasional
	 
	   public function user()
	   {
	      $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");	  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
		  }
		  //End of else
		  
		   $data['user'] = $this->reportmodel->hitung_jml_operasional_user($tgl_awal, $tgl_akhir);
		   $user = $this->reportmodel->hitung_jml_operasional_user($tgl_awal, $tgl_akhir);
		   
		   $nama = array();
		   $jmlop = array();
		   
		   foreach($user->result() as $row)
		   {
		      //echo $row->PEMOHON." ".$row->JML_OPERASIONAL."<br/>";
			  array_push($nama, $row->PEMOHON);
			  array_push($jmlop, $row->JML_OPERASIONAL);
		   }
		   
		   $data['nama'] = json_encode($nama);
		   $data['jmlop'] = json_encode($jmlop);
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   //$data['op'] = $data_op;
		   $this->template->set('title','Operasional User | eFormC');
		   $this->template->load('template','admin/report/jmlop_user', $data);
		  
	   }
	   //End of function user
	   
	  public function detail_user()
	  {
	     $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");	  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
		  }
		  //End of else
		   $data['list'] = $this->reportmodel->get_daftar_user($tgl_awal, $tgl_akhir);
		   
		   $nama = $this->input->post('nama');
		   //$data['user'] = $this->reportmodel->lihat_detail_op_user($tgl_awal, $tgl_akhir, $nama);
		   $data['user'] = $this->reportmodel->lihat_detail_op_user($tgl_awal, $tgl_akhir, $nama);
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   //$data['op'] = $data_op;
		   $this->template->set('title','Detail Operasional User | eFormC');
		   $this->template->load('template','admin/report/detailop_user', $data);
		  
	  }
	  //End of function detail_user
	 
	  public function kendaraan()
	   {
	      $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");	  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
		  }
		  //End of else
		  
		   $kendaraan = $this->reportmodel->get_daftar_kendaraan_op();
		  
		   foreach($kendaraan->result() as $row)
		   {
			 //echo $row->ID_KENDARAAN."<br/>";
		     $jam_op = $this->reportmodel->hitung_jamop_kendaraan($tgl_awal, $tgl_akhir, $row->ID_KENDARAAN);
             //echo "<br/>------------------------------------------------------------------------------------------<br/><br/>";
				 
		     array_push($data_op, $row->NO_POLISI."|".$row->JENIS_KENDARAAN."|".$jam_op);
		   }
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   $data['op'] = $data_op;
		   $this->template->set('title','Operasional Kendaraan | eFormC');
		   $this->template->load('template','admin/report/jamop_kendaraan', $data);
		  
	   }
	   //End of function kendaraan
	   
	  public function detail_kendaraan()
	  {
	     $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");	  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
		  }
		  //End of else
		   
		   $id_kendaraan = $this->input->post('id_kendaraan');
		   $data['user'] = $this->reportmodel->lihat_operasional_kendaraan($tgl_awal, $tgl_akhir, $id_kendaraan);
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   //$data['op'] = $data_op;
		   
		   $this->load->model('appr_admin_model');
		   //$data['mobil_aktif'] = $this->appr_admin_model->get_mobil_aktif();
		   $data['mobil_aktif'] = $this->appr_admin_model->get_daftar_kendaraan_op();
		   
		   $this->template->set('title','Detail Operasional Kendaraan | eFormC');
		   $this->template->load('template','admin/report/detail_kendaraan', $data);
		  
	  }
	  //End of function detail_kendaraan
	   
	   public function sopir()
	   {
	      $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		   
		  $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");
		  $tipe_spj = 1;
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		    //do nothing
		  } 
		  else
		  {	  
	         $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');
			 $tipe_spj = $this->input->post('id_tipe_spj');
		  }
		  //End of else
		  
		  $kendaraan = $this->reportmodel->get_daftar_sopir_op();
		  
		   foreach($kendaraan->result() as $row)
		   {
			  //echo $row->ID_KENDARAAN."<br/>";
		      //$jam_op = $this->reportmodel->hitung_jamop_sopir($tgl_awal, $tgl_akhir, $row->ID_SOPIR);
			  $jam_op = $this->reportmodel->hitung_jamop_sopir($tgl_awal, $tgl_akhir, $row->ID_SOPIR, $tipe_spj);
              //echo "<br/>------------------------------------------------------------------------------------------<br/><br/>";
				 
		      array_push($data_op, $row->ID_SOPIR."|".$row->NAMA."|".$jam_op);
		    }
			
		   if($tipe_spj == 1)
		      $tipe = 'Dinas Dalam Kota';
		   else if($tipe_spj == 2)
		      $tipe = 'Dinas Luar Kota';
			  
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir.'|'.$tipe;  
		   //$data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   $data['op'] = $data_op;
		   $this->template->set('title','Operasional Sopir | eFormC');
		   $this->template->load('template','admin/report/jamop_sopir',$data);
		 
	   }
	   //End of function sopir
	   
	  public function detail_sopir()
	  {
	     $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $level = $this->session->userdata('level');
		  $data['menu'] = $this->usermodel->get_menu_for_level($level);
		  $this->auth->restrict();
		  $this->auth->check_menu(4); 
		  
		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $data_op = array();	
          $tgl_awal = date("01-m-Y");
          $tgl_akhir = date("d-m-Y");
          $tipe_spj = 1;			  
		   
		  if ($this->form_validation->run() == FALSE)
		  {
		     //do nothing
		  } 
		  else
		  { 
		     $this->load->model('datemodel');
			 //$tgl_awal = $this->datemodel->format_tanggal($this->input->post('date'));
             //$tgl_akhir = $this->datemodel->format_tanggal($this->input->post('date1'));	
			 $tgl_awal = $this->input->post('date');
             $tgl_akhir = $this->input->post('date1');	
			 $tipe_spj = $this->input->post('id_tipe_spj');
		  }
		  //End of else
		   
		   $id_sopir = $this->input->post('id_sopir');
		   //$data['user'] = $this->reportmodel->lihat_operasional_sopir($tgl_awal, $tgl_akhir, $id_sopir);
		    $data['user'] = $this->reportmodel->lihat_operasional_sopir($tgl_awal, $tgl_akhir, $id_sopir, $tipe_spj);
		   
		   if($tipe_spj == 1)
		      $tipe = 'Dinas Dalam Kota';
		   else if($tipe_spj == 2)
		      $tipe = 'Dinas Luar Kota';
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir.'|'.$tipe;
		   //$data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   //$data['op'] = $data_op;
		   
		   $this->load->model('appr_admin_model');
		   //$data['driver_aktif'] = $this->appr_admin_model->get_driver_aktif();
		   $data['driver_aktif'] = $this->appr_admin_model->get_daftar_sopir_op();
		   
		   $this->template->set('title','Detail Operasional Sopir | eFormC');
		   $this->template->load('template','admin/report/detail_sopir', $data);
		  
	  }
	  //End of function detail_sopir
	  
	 //------------------------------------------------------------------------------------------------------------------------------------
	 
    public function all_driver()
    {
        // Load library FPDF
        $this->load->library('fpdf');
         
        // Load Database
        $this->load->database();
         
        /* buat konstanta dengan nama FPDF_FONTPATH, kemudian kita isi value-nya
           dengan alamat penyimpanan FONTS yang sudah kita definisikan sebelumnya.
           perhatikan baris $config['fonts_path']= 'system/fonts/';
           didalam file application/config/config.php
        */           
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
         
        // Load model "karyawan_model"
        $this->load->model('reportmodel');
         
        /* Kita akses function get_all didalam karyawan_model
           function get_all merupakan fungsi yang dibuat untuk mengambil
           seluruh data karyawan didalam database.
        */
        $data['driver'] = $this->reportmodel->get_driver();
         
        // Load view "pdf_report" untuk menampilkan hasilnya       
        $this->load->view('admin/report_all_driver', $data);
		
    }
	//End of function all_driver
	
	public function karyawan()
	{
	}
	 //End of function karyawan
	
}