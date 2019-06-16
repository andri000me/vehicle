<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Lokasimodel extends CI_Model
  {
	 public function get_all_lokasi()
	 {
		//select db dengan views dari sqlyog
	    $this->db->from('LOKASI');
	    return $this->db->get();
	 }	 
	 function insert_data_lokasi($data)
	 {
	    $this->db->insert('LOKASI',$data);
	 }	 
	 function delete_data_lokasi($id)
	 {
		 $this->db->where('ID_LOKASI',$id);
   		 $this->db->delete('LOKASI');	 
	 }
	 function get_lokasi_by_id($id)
	 {
	   $this->db->from('lokasi');
	   $this->db->where('ID_LOKASI',$id);
	   return $this->db->get();
	 }
	 function update_data_lokasi($data,$id)
	 {
	   $this->db->where('ID_LOKASI',$id);
	   $this->db->update('LOKASI',$data);
	 }
  }
