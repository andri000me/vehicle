<?php
   
   if(!defined('BASEPATH'))
     exit('No direct script allowed');
	 
	/**
	  File home.php
	  @author IT-PJBS
	  
	  Controller untuk Jam Operasional
	*/
	
	class Jadwal extends CI_Controller
	{
	   public function __construct()
	   {
	      parent::__construct();
	   }
	   //End of constructor
	   
	   public function index()
	   {
	       $this->load->model('slidermodel');
		   $data['dataslider'] = $this->slidermodel->get_all_slider();
		   $this->load->model('usermodel');
		   $this->load->model('jadwalmodel');
		   
		   $level = $this->session->userdata('level');
		   $data['menu'] = $this->usermodel->get_menu_for_level($level);
		   if($level == 6)
		   {$data['jadwal'] = $this->jadwalmodel->view_jadwal_op_3days_jkt();}else
		   {$data['jadwal'] = $this->jadwalmodel->view_jadwal_op_3days();}
		   
		   $this->auth->restrict();
		   $this->auth->check_menu(1); 
		   $this->template->set('title','Jadwal Operasional untuk 3 hari | Aplikasi Monitoring Kendaraan Dinas');
		   $this->template->load('template_refresh','jadwal_op',$data);
		  
	   }
	   //End of function index
	   
	}
	//End of class Jadwal
	
	/**
	   End of file: jadwal.php
	   Location: ./application/controllers/jadwal.php
	*/