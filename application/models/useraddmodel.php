<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Useraddmodel extends CI_Model
  {
	 public function get_all_user()
	 {
	    $this->db->from('VIEW_USERS');
	    return $this->db->get();
	 }	 
	 function insert_data_user($data)
	 {
	    $this->db->insert('USERS',$data);
	 }	 
	 function delete_data_user($id)
	 {
		 $this->db->where('ID_USER',$id);
   		 $this->db->delete('USERS');	 
	 }
	 function get_user_by_id($id)
	 {
	   $this->db->from('USERS');
	   $this->db->where('ID_USER',$id);
	   return $this->db->get();
	 }
	 function update_data_user($data,$id)
	 {
	   // $this->db->where('ID_USER',$id);
	   $this->db->where('USERNAME',$id);
	   $this->db->update('USERS',$data);
	 }
  }
