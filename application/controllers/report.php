<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Report extends CI_Controller {
     
	public function __construct()
	   {
	      parent::__construct();
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $this->auth->restrict();
		  $this->auth->check_menu(4);
		  $this->load->library('form_validation');
	   }
	   
	   
	public function index()
	{
	   //slider-------------
	//    $this->load->model('slidermodel');
	//    $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
	   $this->load->model('usermodel');
	   // $level = $this->session->userdata('level');
	   // $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 
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
	 
	  public function reimburse()
	  {
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          
          $tgl_awal = $this->input->post('date');
          $tgl_akhir = $this->input->post('date1');
		  
		  $data_op 		= array();
		  $reimburse	= $this->reportmodel->hitung_reimburse($tgl_awal, $tgl_akhir);
		  foreach($reimburse->result() as $k){
			  array_push($data_op,$k->ID_REIMBURSE."^".$k->KETERANGAN."^".$k->TGL_PEMBERIAN."^".$k->NOMINAL);
		  }
		  $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		  $data['op'] = $data_op;
		  $this->template->set('title','Report Transaksi Reimburse');
		  $this->template->load('template_refresh','admin/report/reimburse', $data);
		  
	  }
	  //End of function operasional
	 
	   public function request()
	   {
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  	
          $tgl_awal 	= $this->input->post('date');
          $tgl_akhir	= $this->input->post('date1');
		  
		  $data_op		= array();
		  $requestx		= $this->reportmodel->hitung_request($tgl_awal, $tgl_akhir);
		  foreach($requestx->result() as $k){
			  array_push($data_op,$k->NAMA."^".$k->TGL_BERANGKAT."^".$k->KEPERLUAN."^".$k->TUJUAN."^".$k->STATUS);
		  }
		  $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		  $data['op'] = $data_op;
		  $this->template->set('title','Report Permintaan Peminjaman Kendaraan');
		  $this->template->load('template_refresh','admin/report/request', $data);
		  
		  // if ($this->form_validation->run() == FALSE)
		  // {
				// $data = array(
				// 'tgl_awal'	=> '',
				// 'tgl_akhir'	=> '',
				// 'requestx'	=> $requestx
				// );
				
				// $this->template->set('title','Report Permintaan Peminjaman Kendaraan');
				// $this->template->load('template_refresh','admin/report/request', $data);
		  // } 
		  // else
		  // {
			// $data = array(
				// 'tgl_awal'	=> $tgl_awal,
				// 'tgl_akhir'	=> $tgl_akhir,
				// 'requestx'	=> $requestx
				// );
			// $this->template->set('title','Report Permintaan Peminjaman Kendaraan');
			// $this->template->load('template_refresh','admin/report/request', $data);
		  // }
	   }
	   //End of function 
	 
	  public function kendaraan()
	   {
		  $this->form_validation->set_rules('date', 'date', 'trim|required');
		  $this->form_validation->set_rules('date1', 'date1', 'trim|required');
		  
          $tgl_awal		= $this->input->post('date');
		  $tgl_akhir	= $this->input->post('date1'); 
		  
		  $data_op		= array();
		  $kendaraan	= $this->reportmodel->hitung_kendaraan($tgl_awal, $tgl_akhir);
		  foreach($kendaraan->result() as $k){
			  array_push($data_op,$k->ID_PEMINJAMAN."^".$k->NAMA."^".$k->NAMA_KENDARAAN."^".$k->KETERANGAN."^".$k->TGL_PEMINJAMAN);
		  }
		  $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		  $data['op'] = $data_op;
		  $this->template->set('title','Report Transaksi Kendaraan');
		  $this->template->load('template_refresh','admin/report/kendaraan', $data);
	   }
	   //End of function kendaraan
	 //------------------------------------------------------------------------------------------------------------------------------------
	 
    public function request_print()
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
        // $data['driver'] = $this->reportmodel->get_driver();
		$awal	= $this->input->post('date');
		$akhir	= $this->input->post('date1');
		$data['request'] = $this->reportmodel->hitung_request($awal,$akhir);
         
        // Load view "pdf_report" untuk menampilkan hasilnya       
        // $this->load->view('admin/report_all_driver', $data);
		$this->load->view('admin/report_request', $data);
		
    }
	//End of function all_driver

}