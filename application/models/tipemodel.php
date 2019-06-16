<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Tipemodel extends CI_Model
  {
	 public function get_all_tipe()
	 {
	    $this->db->from('TIPE_USER');
	    return $this->db->get();
	 }	 
  }
