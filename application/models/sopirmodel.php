<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
    /**
     Class sopirmodel
	 @author IT-PJBS
	 
	 Model untuk Sopir
  */
	 
  class Sopirmodel extends CI_Model
  {
	 public function get_all_sopir()
	 {
		//select db dengan views dari sqlyog
	    //$this->db->from('VIEW_STATUS_SOPIR');
		$this->db->from('SOPIR');
	    return $this->db->get();
	 }	 
	 //End of function get_all_sopir
	 
	 function insert_data_sopir($data)
	 {
		//insert db
	    $this->db->insert('SOPIR',$data);
	 }
     //End of function insert_data_sopir
	 
	 function delete_data_sopir($id)
	 {
		 $this->db->where('ID_SOPIR',$id);
   		 $this->db->delete('SOPIR');	
	 }
	 //End of function delete_data_sopir
	 
	 function get_sopir_by_id($id)
	 {
	   $this->db->from('SOPIR');
	   $this->db->where('ID_SOPIR',$id);
	   return $this->db->get();
	 }
	 //End of function get_sopir_by_id
	 
	 function update_data_sopir($data,$id)
	 {
	   $this->db->where('ID_SOPIR',$id);
	   $this->db->update('SOPIR',$data);
	 }
	 //End of function update_data_sopir
	 
	 //--------------------------
	 function get_all_lokasi()
	 {
	    $this->db->from('LOKASI');
	    return $this->db->get();
	 }
	 function get_all_status_sopir()
	 {
	    $this->db->from('STATUS_SOPIR');
	    return $this->db->get();
	 }
	 //End of function get_all_status_sopir
	 
	 function get_available_sopir()
	 {
	   $this->db->where('ID_STATUS_SOPIR','1');
	   return $this->db->get('SOPIR');
	 }
	 //End of function get_available_sopir
  }
  //End of class Sopirmodel
  
   /**
    End of file: sopirmodel.php
	Location: ./application/models/sopirmodel.php
  */
