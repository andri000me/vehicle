<?php 
 
	 
  class Kritikmodel extends CI_Model
  {
  
 	 public function __construct()
	{
		parent::__construct();
	}
	//insert
	 function insert_kritik($data)
	 {
	    $this->db->insert('KOMENTAR',$data);
	 }	 
	 //tampil
	 function tampil_kritik()
	 {
	   $this->db->from('KOMENTAR');
	   return $this->db->get();
	 }
  }
?>