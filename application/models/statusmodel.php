<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Statusmodel extends CI_Model
  {
	 public function get_all_status()
	 {
	    $this->db->from('STATUS_USER');
	    return $this->db->get();
	 }	 
  }
