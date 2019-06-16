<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Kontrakmodel
	 @author IT-PJBS
	 
	 Model untuk Kontrak dan Detail_Kontrak
  */
  
  class Kontrakmodel extends CI_Model
  {
     function get_all_kontrak()
	 {
        $this->db->from('VIEW_KONTRAK');
        return $this->db->get();		
	 }
	 // End of function get_all_kontrak
	 
	 function insert_data_kontrak($data)
	 {
	   $this->db->insert('KONTRAK', $data);
	 }
	 //End of function insert_data_kontrak
	 
	 function get_kontrak_by_id($id)
	 {
	   $this->db->where('ID_KONTRAK', $id);
	   return $this->db->get('KONTRAK');
	 }
	 //End of function get_kontrak_by_id
	 
	 function update_data_kontrak($data, $id)
	 {
	   $this->db->where('ID_KONTRAK', $id);
	   $this->db->update('KONTRAK', $data);
	 }
	 //End of function update_data_kontrak
	 
	 function delete_kontrak($id)
	 {
	   $this->db->where('ID_KONTRAK', $id);
	   $this->db->delete('KONTRAK');
	 }//End of function delete_kontrak
	 
	 //------------------ Model untuk DETAIL_KONTRAK ----------------
	 
	 function get_all_detail_kontrak()
	 {
	    $this->db->from('VIEW_DETAIL_KONTRAK');		
		return $this->db->get();
	 }
	 //End of function get_all_detail_kontrak
	 
	 function insert_data_detail_kontrak($data)
	 {
	   $this->db->insert('DETAIL_KONTRAK', $data);
	 }
	 //End of function insert_data_detail_kontrak
	 
	 function get_detail_kontrak_by_id($id)
	 {
	   $this->db->where('ID_DETAIL_KONTRAK', $id);
	   return $this->db->get('DETAIL_KONTRAK');
	 }
	 //End of function get_detail_kontrak_by_id
	 
	 function update_data_detail_kontrak($data, $id)
	 {
	   $this->db->where('ID_DETAIL_KONTRAK', $id);
	   $this->db->update('DETAIL_KONTRAK', $data);
	 }
	 //End of function update_data_detail_kontrak
	 
	 function delete_detail_kontrak($id)
	 {
	    $this->db->where('ID_DETAIL_KONTRAK', $id);
		$this->db->delete('DETAIL_KONTRAK');
	 }
	 //End of function delete_detail_kontrak
	 
	 //---------- Model lain yang dibutuhkan juga ----------------
	 
	 function get_all_jenis_kontrak()
	 {
        $this->db->from('JENIS_KONTRAK');
        return $this->db->get();		
	 }
	 // End of function get_all_jenis_kontrak
	 
	 function get_all_status_kontrak()
	 {
        $this->db->from('STATUS_KONTRAK');
        return $this->db->get();		
	 }
	 // End of function get_status_kontrak
	 
  }
  //End of class Kontrakmodel
  
  /**
    End of file: kontrakmodel.php
	Location: ./application/models/kontrakmodel.php
  */