<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Usermodel
	 @author IT-PJBS
  */
  
  class Usermodel extends CI_Model
  {
     public function get_menu_for_level($user_level)
	 {
	   $this->db->from('MENU');
	   $this->db->like('MENU_AKSES','+'.$user_level.'+');
	   $this->db->order_by('MENU_ID');
	   $result = $this->db->get();
	   
	   return $result;
	 }
	 //End of function get_menu_for_level
	 
	 function get_array_menu($id)
	 {
	    $this->db->select('MENU_AKSES');
		$this->db->from('MENU');
		$this->db->where('MENU_ID', $id);
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{
		   $row = $data->row();
		   $level = $row->MENU_AKSES;
		   $arr = explode('+', $level);
		   
		   return $arr;
		} //End of if
		else
		  die();
	 }
	 //End of function get_array_menu
	 
	 function get_data_user($id)
	 {
	   $this->db->query('
	      SELECT 
		  US.ID AS ID_USER,
		  US.FULLNAME AS NAMA,
		  US.USERNAME AS NID,
		  EMP.JABATAN_ID,
		  JB.KODE AS KODE_JABATAN,
		  JB.NAMA AS JABATAN,
		  EMP.DIREKTORAT_ID,
		  DIR.KODE AS KODE_DIREKTORAT,
		  DIR.NAMA AS DIREKTORAT,
		  EMP.DIREKTORAT_SUB_ID,
		  SUB.KODE AS KODE_SUBDIT,
		  SUB.NAMA AS SUBDIT
		FROM 
		  PAYROLL_PJBS2.SYS_USERS US,
		  PAYROLL_PJBS2.EMP_DETAIL EMP,
		  PAYROLL_PJBS2.EMP_JABATAN JB,
		  PAYROLL_PJBS2.COMP_DIREKTORAT DIR,
		  PAYROLL_PJBS2.COMP_DIREKTORAT_SUB SUB
		WHERE 
		  US.USERNAME = EMP.NID
		  AND
		  EMP.JABATAN_ID = JB.ID
		  AND
		  EMP.DIREKTORAT_ID = DIR.ID
		  AND
		  EMP.DIREKTORAT_SUB_ID = SUB.ID
	   ');
	   
	 }
	 //End of function get_data_user
	 
	 function get_user_subdit($id_subdit)
	 {
		$this->db->where('ID', $id_subdit);
		return $this->db->get('PAYROLL_PJBS2.COMP_DIREKTORAT_SUB');
	 }
	 //End of function get_user_subdit
	 
  }
  //End of class Usermodel
  
  /**
    End of file: usermodel.php
	Location: ./application/models/usermodel.php
  */