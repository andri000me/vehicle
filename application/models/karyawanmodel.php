<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Karyawanmodel extends CI_Model
  {
	 public function tampil_karyawan()
	 {
		//select db dengan views dari sqlyog
	    $this->db->from('VIEW_KARYAWAN');
	    return $this->db->get();
	 }	 
	 function insert_data_karyawan($data)
	 {
		//insert db
	    $this->db->insert('KARYAWAN',$data);
	 }	 
	 function ambil_data()
	 {
	 	$this->db->from('JABATAN');
		return $this->db->get();
	 }
	 function delete_data_karyawan($id)
	 {
		 $this->db->where('ID_KARYAWAN',$id);
   		 $this->db->delete('KARYAWAN');	 
	 }
	 function pilih_karyawan_by_id($id)
	 {
	   $this->db->from('KARYAWAN');
	   $this->db->where('ID_KARYAWAN',$id);
	   return $this->db->get();
	 }
	 function edit_data_karyawan($data,$id)
	 {
	   $this->db->where('ID_KARYAWAN',$id);
	   $this->db->update('KARYAWAN',$data);
	 }
  }