<?php
class Kritik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('slidermodel');
		$this->load->model('usermodel');
		$this->load->model('kritikmodel');
		 
		 $level = $this->session->userdata('level');
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 //$this->auth->restrict();
		 //$this->auth->check_menu(3); 
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('kritik', 'kritik', 'trim|required');
		 $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		 
		   if ($this->form_validation->run() == FALSE)
		   {
			  $this->template->set('title','Kritik & Saran | Aplikasi Manajemen Kendaraan Dinas');
		   	  $this->template->load('template','user/index',$data);  
		   }
		   else
		   {
		   	  $id    = $this->session->userdata('user_id');
			  $nama	 = $this->session->userdata('nama');
		   	  $cuap=$this->input->post('kritik');
              $kritik=nl2br($cuap);
			  $data1 = array(
				 'ID_USER'	=>$id,
				 'NAMA'		=>$nama,
				 'KOMENTAR'   =>$kritik
			  );
			  $this->kritikmodel->insert_kritik($data1);
			  $kritik_notif = $this->input->post('kritik_notif');
			  //echo '<script language="JavaScript">alert("Kritik & Saran Sudah Tersimpan"); window.location = "../home/";< /script>';
			  /*$data['attr'] = array(
                  'class' => 'alert alert-success',
                  'title' => 'Sukses!',
                  'alert' => 'Data sudah tersimpan!'
                  );*/
				  redirect('home/index/'.$kritik_notif);
			  //$this->template->load('template','home/index',$data);
		   }
	}
	
    
	function view_kritik()
	{
		$this->load->model('slidermodel');
		$this->load->model('usermodel');
		$this->load->model('kritikmodel');
		 
		 $level = $this->session->userdata('level');
		 $data['menu'] = $this->usermodel->get_menu_for_level($level);
		 $data['dataslider'] = $this->slidermodel->get_all_slider();
		 $data['kritik'] = $this->kritikmodel->tampil_kritik();
		 $this->template->set('title','Daftar Kritik & Saran | Manajemen Kendaraan Dinas');
		 $this->template->load('template','admin/view_kritik',$data);
	}
}
?>