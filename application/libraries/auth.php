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
	  //cek di database
	  //$this->CI->db->from('USER');
	  //Cek User
	  $this->CI->db->from('USERS');
	  $this->CI->db->where('USERNAME', $username);
	  $this->CI->db->where('PASSWORD', md5($password));
	  $this->CI->db->where('STATUS', 1);
	  $result = $this->CI->db->get();
	  $userdata = $result->row();
	  
	  //Cek DIVISI
	  $this->CI->db->from('VIEW_KARYAWAN');
	  $this->CI->db->where('NID', $username); 
	  $result2 = $this->CI->db->get();
	  $subdata = $result2->row();
	  
	  if($result->num_rows() == 0){
			return false;  //Username dan password tsb tidak ada
			}
	  else
	  {
	  	 //$this->CI->db->from('TIPE_USER');
		 //$this->CI->db->where('ID_TIPE_USER', $userdata->ID_TIPE_USER);
		 
		 //$result2 = $this->CI->db->get();
		 //$userdata2 = $result2->row();
		 //Mengambil informasi user dari database
		 $session_data = array(
			 'id_user' => $userdata->ID_USER,
			 'nid'     => $username,
			 'pass'    => $password,
			 // 'nama'    => $userdata->NAMA,
			 'nama'    => $subdata->NID,
			 //'unit'    => $userdata->KODE_DISTRIK,
			 //'tipe'    => $userdata2->TIPE_USER,
			 'level'   => $userdata->TIPE_USER,
			 'jabatan_id'	=> $subdata->KODE_JABATAN,
			 //'subdit_id'	=> $subdata->DIREKTORAT_SUB_ID,
			 'subdit'	=> $subdata->KODE_DIVISI
			 //'direktorat_id'	=> $subdata->DIREKTORAT_ID
			 //'level'   => $userdata->ID_TIPE_USER
		 );
		 
		 //Membuat session
		 $this->CI->session->set_userdata($session_data);

		 return true;
	  } //End of else
   }
   //End of function do_login

	/* SSO */
    public function autoAuthenticate($username,$credential)
    {
		ini_set ('soap.wsdl_cache_enabled', 0);
        $wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';
        $CI =& get_instance();
		
        $cl = new SoapClient($wsdl);
        $rv = $cl->loginToken(15, $username, $credential);
        if($rv->RESPONSE == "1")
        {
            $this->getLoginInformation($rv);
			return $rv;
		}
		else
			return $rv;
				
    }

    public function autoGroupAuthenticate($username,$credential, $groupId)
    {
		ini_set ('soap.wsdl_cache_enabled', 0);
        $wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';
        $CI =& get_instance();
		
        $cl = new SoapClient($wsdl);
        $rv = $cl->loginGroup(15, $username, $credential, $groupId);
        if($rv->RESPONSE == "1")
        {
            $this->getLoginInformation($rv);
			return $rv;
		}
		else
			return $rv;
				
    }	
	

    public function portalAuthenticate($username,$credential)
    {
		ini_set ('soap.wsdl_cache_enabled', 0);
        $wsdl = 'http://portal.pjbservices.com/index.php/portal_login?wsdl';
        $CI =& get_instance();
		
        $cl = new SoapClient($wsdl);
        $rv = $cl->loginAplikasi(15, $username, $credential);
        if($rv->RESPONSE == "1")
        {
            $this->getLoginInformation($rv);
			return $rv;
		}
		else
			return $rv;
				
    }	
	
   function getLoginInformation($rv)
   {
		 //$this->CI->db->from('PAYROLL_PJBS2.SYS_USERS');
		 $this->CI->db->from('USERS');
		 $this->CI->db->where('USERNAME', $rv->NID);
		 $result = $this->CI->db->get();
		 $userdata = $result->row();
	  
		 //$this->CI->db->from('PAYROLL_PJBS2.EMP_DETAIL');
		 $this->CI->db->from('KARYAWAN');
	     $this->CI->db->where('NID', $rv->NID); 
		 $hasil= $this->CI->db->get();
		 $subdata = $hasil->row();
		 
		 
		 if($subdata->JABATAN_ID == 5 || $subdata->JABATAN_ID == 6 || $subdata->JABATAN_ID == 3 || $subdata->JABATAN_ID == 14)
		   $level_user = 2;
		 //Mengambil informasi user dari database
		 if($userdata->USERNAME == '8410346RB' || $userdata->USERNAME == 'ADMIN' || $subdata->JABATAN_ID == 4 || $userdata->USERNAME == '9114139KP')
		   $level_user = 1;
		 if($userdata->USERNAME == 'OPERATOR')
		   $level_user = 4;
		 if($userdata->USERNAME == 'DRIVER')
		   $level_user = 5;
		 if($userdata->USERNAME == 'ADMINJKT' || $userdata->USERNAME == '6712580KR')
		   $level_user = 6;
		  
		 $username = $userdata->USERNAME;
		   
		 //$this->CI->db->from('PAYROLL_PJBS2.COMP_DIREKTORAT_SUB');
		 $this->CI->db->from('SUBDIT');
	     $this->CI->db->where('ID', $subdata->DIREKTORAT_SUB_ID); 
		 $hasil2= $this->CI->db->get();
		 
		 $subdata2 = $hasil2->row();
		 
		 //Mengambil informasi user dari database
		 $session_data = array(
		     'user_id' => $userdata->ID,
			 'nama'    => $rv->PEGAWAI,
			 //'nid'=> $userdata->USERNAME,
			 'nid'=> $rv->NID,
			 'level'   => $rv->KODE_GROUP,
			 'jabatan_id' => $subdata->JABATAN_ID,
			 'subdit_id' => $subdata->DIREKTORAT_SUB_ID,
			 'subdit' => $subdata2->NAMA,
			 'direktorat_id' => $subdata->DIREKTORAT_ID
		 );
		 
		 //Membuat session
		 $this->CI->session->set_userdata($session_data);
		
   }
	/* END  */		


	
   //Untuk mengecek apakah user sudah login/belum
   function is_logged_in()
   {
      //if($this->CI->session->userdata('user_id') == '')
		if($this->CI->session->userdata('id_user') == '')
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