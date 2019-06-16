<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Kendaraanmodel
	 @author IT-PJBS
	 
	 Model untuk Kendaraan dan Detail Kendaraan Dinas
  */
  
  class Kendaraanmodel extends CI_Model
  {
     function get_all_kendaraan()
	 {
        $this->db->from('VIEW_KENDARAAN');
        return $this->db->get();		
	 }
	 
	 function get_all_kendaraan_aktif()
	 {
        $this->db->from('VIEW_KENDARAAN_AKTIF');
        return $this->db->get();		
	 }
	 // End of function get_all_kendaraan
	 
	 function insert_data_kendaraan($data)
	 {
	   $this->db->insert('KENDARAAN', $data);
	 }
	 //End of function insert_data_kendaraan
	 
	 function get_kendaraan_by_id($id)
	 {
	   $this->db->where('ID_KENDARAAN', $id);
	   return $this->db->get('KENDARAAN');
	 }
	 //End of function get_kendaraan_by_id
	 
	 function update_data_kendaraan($data, $id)
	 {
	   $this->db->where('ID_KENDARAAN', $id);
	   $this->db->update('KENDARAAN', $data);
	 }
	 //End of function update_data_kendaraan
	 
	 function delete_kendaraan($id)
	 {
	   $this->db->where('ID_KENDARAAN', $id);
	   $this->db->delete('KENDARAAN');
	 }//End of function delete_kendaraan
	 
	 //------------------ Model untuk DETAIL_KENDARAAN_DINAS ----------------
	 
	 function get_all_detail_kd()
	 {
	    $this->db->from('VIEW_DETAIL_KENDARAAN_DINAS');		
		return $this->db->get();
	 }
	 //End of function get_all_detail_kd
	 
	 function insert_data_detail_kd($data)
	 {
	   $this->db->insert('DETAIL_KENDARAAN_DINAS', $data);
	 }
	 //End of function insert_data_detail_kd
	 
	 function get_detail_kd_by_id($id)
	 {
	   $this->db->where('ID_DETAIL_KENDARAAN_DINAS', $id);
	   return $this->db->get('DETAIL_KENDARAAN_DINAS');
	 }
	 //End of function get_detail_kd_by_id
	 
	 function update_data_detail_kd($data, $id)
	 {
	   $this->db->where('ID_DETAIL_KENDARAAN_DINAS', $id);
	   $this->db->update('DETAIL_KENDARAAN_DINAS', $data);
	 }
	 //End of function update_data_detail_kd
	 
	 function delete_detail_kd($id)
	 {
	    $this->db->where('ID_DETAIL_KENDARAAN_DINAS', $id);
		$this->db->delete('DETAIL_KENDARAAN_DINAS');
	 }
	 //End of function delete_detail_kd
	 
	 //-------------- Model tambahan yang diperlukan untuk DETAIL KENDARAAN DINAS -----------
	 
	 function get_all_status_kendaraan()
	 {
	    $this->db->from('STATUS_KENDARAAN');
        return $this->db->get();	
	 }
	 //End of function get_all_status_kendaraan
	 
	 function get_all_jenis_kendaraan()  
	 {
        $this->db->from('JENIS_KENDARAAN');
        return $this->db->get();		
	 }
	 //End of function get_all_jenis_kendaraan
	 
	 function get_all_tipe_kd()
	 {
        $this->db->from('TIPE_KENDARAAN_DINAS');
        return $this->db->get();		
	 }
	 // End of function get_all_tipe_kd
	 
	 function get_all_sopir() 
	 {
        $this->db->from('SOPIR');
        return $this->db->get();		
	 }
	 
	 function get_all_sopir_aktif() 
	 {
        return $this->db->query("SELECT * FROM SOPIR WHERE ID_STATUS_SOPIR <> '0'");		
	 }
	 // End of function get_all_sopir
	 //sementara, nanti sebaiknya diredirect ke supirmodel saja
	 
	 function get_all_lokasi()
	 {
        $this->db->from('LOKASI');
        return $this->db->get();		
	 }
	 // End of function get_all_lokasi
	 
	 function get_available_kendaraan()
	 {
	   //$this->db->query('ID_STATUS_KENDARAAN','1');
	   //return $this->db->get('KENDARAAN');
	   return $this->db->query("SELECT * FROM KENDARAAN WHERE ID_STATUS_KENDARAAN = '1'");
	 }
	 //End of function get_available_kendaraan
	 
	 //------------------ Model untuk JENIS_KENDARAAN_DINAS ----------------
	 
	 function get_all_jenis_kd() /*sama degn get_all_jenis_kendaraan*/
	 {
	    $this->db->from('JENIS_KENDARAAN');		
		return $this->db->get();
	 }
	 //End of function get_all_detail_kd
	 
	 function insert_data_jenis_kd($data)
	 {
	   $this->db->insert('JENIS_KENDARAAN', $data);
	 }
	 //End of function insert_data_detail_kd
	 
	 function get_jenis_kd_by_id($id)
	 {
	   $this->db->where('ID_JENIS_KENDARAAN', $id);
	   return $this->db->get('JENIS_KENDARAAN');
	 }
	 //End of function get_detail_kd_by_id
	 
	 function update_data_jenis_kd($data, $id)
	 {
	   $this->db->where('ID_JENIS_KENDARAAN', $id);
	   $this->db->update('JENIS_KENDARAAN', $data);
	 }
	 //End of function update_data_detail_kd
	 
	 function delete_jenis_kd($id)
	 {
	    $this->db->where('ID_JENIS_KENDARAAN', $id);
		$this->db->delete('JENIS_KENDARAAN');
	 }
	 //End of function delete_detail_kd
	 
  }
  //End of class Kendaraanmodel
  
  /**
    End of file: kendaraanmodel.php
	Location: ./application/models/kendaraanmodel.php
  */