<?php 
  
  if(!defined('BASEPATH'))
    exit('No direct script access allowed');
	
/**
  Auth library
  @author IT-PJBS
*/

class Auth
{
   var $CI = NULL;
   
   function __construct()
   {
      //get CI's object
	  $this->CI =& get_instance();
   }
   //End of constructor
   
   //Untuk validasi login
   function do_login($username, $password)
   {
      $passwd = sha1(md5($password));
	  
       //cek di database
	  $this->CI->db = $this->CI->load->database('payroll', true);
	  $this->CI->db->from('SYS_USERS');
	  $this->CI->db->where('USERNAME', $username); 
	  $this->CI->db->where('USERPASS', $passwd);
	  //$this->CI->db->where('USERPASS=MD5("'.$password.'")','',false);
	  $result = $this->CI->db->get();
	  
	  if($result->num_rows() == 0)
	     return false;  //Username dan password tsb tidak ada
	  else
	  {
	     $userdata = $result->row();
		 $level_user = 3;
		 
	     $this->CI->db->from('EMP_DETAIL');
	     $this->CI->db->where('NID', $username); 
		 $hasil= $this->CI->db->get();
		 
		 if($hasil->row->JABATAN_ID == 5)
		   $level_user = 2;
		 //Mengambil informasi user dari database
		 if($userdata->USERNAME = '8410346RB')
		   $level_user = 1;
		 
		 $session_data = array(
		     'user_id' => $userdata->ID,
			 'nama'    => $userdata->FULLNAME,
			 'id_kywn' => $userdata->USERNAME,
			 'level'   => $level_user
		 );
		 
		 //Membuat session
		 $this->CI->session->set_userdata($session_data);
		 return true;
	  } //End of else
   }
   //End of function do_login
   
   //Untuk mengecek apakah user sudah login/belum
   function is_logged_in()
   {
      if($this->CI->session->userdata('user_id') == '')
	    return false;
		
	  return true;
   }
   //End of function is_logged_in
   
   //Untuk validasi di setiap halaman yang mengharuskan autentifikasi
   function restrict()
   {
      if($this->is_logged_in() == false)
	    redirect('home/login');
   }
   //End of function restrict
   
   //Untuk mengecek menu
   function check_menu($idmenu)
   {
      $this->CI->load->model('usermodel');
	  $status_user = $this->CI->session->userdata('level');
      $allowed_level = $this->CI->usermodel->get_array_menu($idmenu);
      
      if(!in_array($status_user, $allowed_level))	 
        die("Maaf, Anda tidak berhak untuk mengakses halaman ini.");	  
   }
   //End of function check_menu
   
   //Untuk logout
   function do_logout()
   {
     $this->CI->session->sess_destroy();
   }
   //End of function do_logout

}
//End of class Auth

/**
  End of file auth.php
  Location: ./applicaton/libraries/auth.php
*/