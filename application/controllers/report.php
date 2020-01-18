<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Report extends CI_Controller {
     
	public function __construct()
	   {
	      parent::__construct();
		  $this->load->model('usermodel');
		  $this->load->model('reportmodel');
		   
		  $this->auth->restrict();
		  // $this->auth->check_menu(4);
		  $this->auth->check_menu(5);
		  $this->load->library('form_validation');
		  define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	   }
	 
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
		  
		  if(isset($_POST['submit2'])){
			  $this->load->library('fpdf');
			  $data['request'] = $reimburse;
			  $this->load->view('admin/report/report_reimburse', $data);
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
		  
		  if(isset($_POST['submit2'])){
			  $this->load->library('fpdf');
			  $data['request'] = $requestx;
			  $this->load->view('admin/report/report_request', $data);
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
		  
		  if(isset($_POST['submit2'])){
			  $this->load->library('fpdf');
			  $data['request'] = $kendaraan;
			  $this->load->view('admin/report/report_kendaraan', $data);
		  }
		  
		  $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		  $data['op'] = $data_op;
		  $this->template->set('title','Report Transaksi Kendaraan');
		  $this->template->load('template_refresh','admin/report/kendaraan', $data);
	   }
	   //End of function kendaraan
}