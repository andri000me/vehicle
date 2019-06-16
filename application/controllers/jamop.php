<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File home.php
	  @author IT-PJBS
	  
	  Controller untuk Jam Operasional
	*/
	
	class Jamop extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   public function index()
	   {}
	   //End of function index
	   
	   public function kendaraan()
	   {
	      $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('jamopmodel');
		   
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
		  
		   $kendaraan = $this->jamopmodel->get_daftar_kendaraan_op();
		  
		   foreach($kendaraan->result() as $row)
		   {
			 //echo $row->ID_KENDARAAN."<br/>";
		     $jam_op = $this->jamopmodel->hitung_jamop_kendaraan($tgl_awal, $tgl_akhir, $row->ID_KENDARAAN);
             //echo "<br/>------------------------------------------------------------------------------------------<br/><br/>";
				 
		     array_push($data_op, $row->NO_POLISI."|".$row->JENIS_KENDARAAN."|".$jam_op);
		   }
		   
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   $data['op'] = $data_op;
		   $this->template->set('title','Ubah Tanggal | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/jamop_kendaraan', $data);
		  
	   }
	   //End of function hitungjam
	   
	   public function sopir()
	   {
	      $this->load->model('slidermodel');
		  $data['dataslider'] = $this->slidermodel->get_all_slider();
		 
		  $this->load->model('usermodel');
		  $this->load->model('jamopmodel');
		   
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
		  
		  $kendaraan = $this->jamopmodel->get_daftar_sopir_op();
		  
		   foreach($kendaraan->result() as $row)
		   {
			  //echo $row->ID_KENDARAAN."<br/>";
		      $jam_op = $this->jamopmodel->hitung_jamop_sopir($tgl_awal, $tgl_akhir, $row->ID_SOPIR);
              //echo "<br/>------------------------------------------------------------------------------------------<br/><br/>";
				 
		      array_push($data_op, $row->ID_SOPIR."|".$row->NAMA."|".$jam_op);
		    }
			  
		   $data['tgl'] = $tgl_awal.'|'.$tgl_akhir;
		   $data['op'] = $data_op;
		   $this->template->set('title','Jam Operasional Sopir | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template','admin/jamop_sopir',$data);
		 
	   }
	   //End of function hitungjam2
	   
	}
	//End of class Jamop
	
	/**
	   End of file: jamop.php
	   Location: ./application/controllers/jamop.php
	*/