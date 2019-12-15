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
	}
?>