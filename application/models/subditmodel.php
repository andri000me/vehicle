<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Subditmodel
	 @author IT-PJBS
	 
	 Model untuk Subdit dan Jabatan
  */
  
  class Subditmodel extends CI_Model
  {
     function get_all_subdit()
	 {
        //$this->db->from('SUBDIT');
		$this->db->from('DIVISI');
        return $this->db->get();		
	 }
	 // End of function get_all_subdit
	 
	 function insert_data_subdit($data)
	 {
	   $this->db->insert('DIVISI', $data);
	 }
	 //End of function insert_data_subdit
	 
	 function get_subdit_by_id($id)
	 {
	   $this->db->where('ID_DIVISI', $id);
	   return $this->db->get('DIVISI');
	 }
	 //End of function get_subdit_by_id
	 
	 function update_data_subdit($data, $id)
	 {
	   $this->db->where('ID_DIVISI', $id);
	   $this->db->update('DIVISI', $data);
	 }
	 //End of function update_data_subdit
	 
	 function delete_subdit($id)
	 {
	   $this->db->where('ID_DIVISI', $id);
	   $this->db->delete('DIVISI');
	 }//End of function delete_subdit
	 
	 //------------------ Model untuk JABATAN --------------------
	 
	 function get_all_jabatan()
	 {
	    //$this->db->from('VIEW_DIVISI_JABATAN');
		$this->db->from('VIEW_JABATAN');		
		return $this->db->get();
	 }
	 //End of function get_all_jabatan
	 
	 function get_list_jabatan()
	 {
        $this->db->where('ID_JENIS_JABATAN', '1');	   
	    $this->db->from('JABATAN');		
		return $this->db->get();
	 }
	 //End of function get_list_jabatan
	 
	 function get_jenis_jabatan()
	 {
	   	$this->db->from('JENIS_JABATAN');		
		return $this->db->get();
	 }
	 //End of function get_jenis_jabatan
	 
	 function insert_data_jabatan($data)
	 {
	   $this->db->insert('JABATAN', $data);
	 }
	 //End of function insert_data_jabatan
	 
	 function get_jabatan_by_id($id)
	 {
	   $this->db->where('ID_JABATAN', $id);
	   return $this->db->get('JABATAN');
	 }
	 //End of function get_jabatan_by_id
	 
	 function update_data_jabatan($data, $id)
	 {
	   $this->db->where('ID_JABATAN', $id);
	   $this->db->update('JABATAN', $data);
	 }
	 //End of function update_data_jabatan
	 
	 function delete_jabatan($id)
	 {
	    $this->db->where('KODE_JABATAN', $id);
		$this->db->delete('JABATAN');
	 }
	 //End of function delete_jabatan
	 
  }
  //End of class Subditmodel
  
  /**
    End of file: subditmodel.php
	Location: ./application/models/subditmodel.php
  */