<?php
class Help extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('usermodel');
		 
		 $level = $this->session->userdata('level');
		 $this->auth->restrict();
		 $this->auth->check_menu(7);
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 $this->template->set('title','Alur Kerja Proses Bisnis');
		 $this->template->load('template_refresh','help',$data);
	}
}
?>