<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Requestmodel extends CI_Model
  {
  	 public function tampil_request()
	 {
		//select db dengan views dari sqlyog
	    $this->db->from('REQUEST');
	    return $this->db->get();
	 }	
	 //End of function tampil_requests
	 
	 function get_request($id)
	 {
	    /*$this->db->where('ID_PEMOHON', $id);
		$this->db->from('REQUEST');
	    return $this->db->get();*/
		
		return $this->db->query("
		   SELECT 
			  RQ.ID_REQUEST,
			  RQ.TGL_BERANGKAT,
			  RQ.JAM_KELUAR,
			  RQ.TGL_KEMBALI,
			  RQ.JAM_KEMBALI,
			  RQ.KETERANGAN_TUJUAN,
			  RQ.KEPERLUAN,
			  RQ.ID_STATUS_REQUEST,
			  SR.STATUS_REQUEST
			FROM 
			  REQUEST RQ,
			  STATUS_REQUEST SR
			WHERE 
			  RQ.ID_STATUS_REQUEST = SR.ID_STATUS_REQUEST
			  AND
			  RQ.ID_PEMOHON = '$id'
			ORDER BY 
			  ID_REQUEST DESC
		");
	 }
	 
	 function show_request($subdit)
	 {	
	 	/*$this->db->select('VIEW_REQUEST.ID_REQUEST,VIEW_REQUEST.ID_USER,VIEW_REQUEST.ATAS_NAMA,VIEW_REQUEST.TGL_BERANGKAT,VIEW_REQUEST.JAM_KELUAR,VIEW_REQUEST.JAM_KEMBALI,VIEW_REQUEST.WAKTU_MASUK,VIEW_REQUEST.STATUS_REQUEST,VIEW_REQUEST.KEPERLUAN');
		$this->db->from('VIEW_REQUEST');
		$this->db->join('VIEW_KARYAWAN','VIEW_REQUEST.ATAS_NAMA = VIEW_KARYAWAN.NAMA');
		$this->db->where('VIEW_KARYAWAN.KODE_SUBDIT',$subdit);*/
		//$this->db->where('VIEW_REQUEST.STATUS_REQUEST','Pending');
		
		//Menampilkan daftar request dgn status = 1 (pending) berdasarkan id subdit yg sama dengan user
		return $this->db->query("
			SELECT
			  REQ.ID_REQUEST,
			  US.ID AS ID_USER,
			  REQ.ATAS_NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.JAM_KELUAR,
			  REQ.JAM_KEMBALI,
			  REQ.WAKTU_MASUK,
			  SR.STATUS_REQUEST,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  STATUS_REQUEST SR,
			  PAYROLL_PJBS2.SYS_USERS US,
			  PAYROLL_PJBS2.EMP_DETAIL EMP
			WHERE 
			  REQ.ID_PEMOHON = US.ID
			  AND 
			  REQ.ID_STATUS_REQUEST = SR.ID_STATUS_REQUEST
			  AND
			  US.USERNAME = EMP.NID
			  AND
			  REQ.ID_STATUS_REQUEST = '4'
			  AND
			  EMP.DIREKTORAT_SUB_ID = '".$subdit."'
			ORDER BY
              REQ.ID_REQUEST DESC
			");	  
	 }
	 //End of function show_request
	 
	 function show_request2($dir)
	 {	
		//Menampilkan daftar request dgn status = 1 (pending) berdasarkan id direktorat yg sama dengan user
		return $this->db->query("
			SELECT
			  REQ.ID_REQUEST,
			  US.ID AS ID_USER,
			  REQ.ATAS_NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.JAM_KELUAR,
			  REQ.JAM_KEMBALI,
			  REQ.WAKTU_MASUK,
			  SR.STATUS_REQUEST,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  STATUS_REQUEST SR,
			  PAYROLL_PJBS2.SYS_USERS US,
			  PAYROLL_PJBS2.EMP_DETAIL EMP
			WHERE 
			  REQ.ID_PEMOHON = US.ID
			  AND 
			  REQ.ID_STATUS_REQUEST = SR.ID_STATUS_REQUEST
			  AND
			  US.USERNAME = EMP.NID
			  AND
			  REQ.ID_STATUS_REQUEST = '4'
			  AND
			  EMP.DIREKTORAT_ID = '".$dir."'
			ORDER BY
              REQ.ID_REQUEST DESC
			");	  
	 }
	 //End of function show_request2
	 
	 function show_all_request()
	 {	
		return $this->db->query("
			SELECT
			  REQ.ID_REQUEST,
			  US.ID AS ID_USER,
			  REQ.ATAS_NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.JAM_KELUAR,
			  REQ.JAM_KEMBALI,
			  REQ.WAKTU_MASUK,
			  SR.STATUS_REQUEST,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  STATUS_REQUEST SR,
			  PAYROLL_PJBS2.SYS_USERS US,
			  PAYROLL_PJBS2.EMP_DETAIL EMP
			WHERE 
			  REQ.ID_PEMOHON = US.ID
			  AND 
			  REQ.ID_STATUS_REQUEST = SR.ID_STATUS_REQUEST
			  AND
			  US.USERNAME = EMP.NID
			  AND
			  REQ.ID_STATUS_REQUEST = '4'
			ORDER BY
              REQ.ID_REQUEST DESC
			");	  
	 }
	 
	 function show_all_request_jkt()
	 {	
		return $this->db->query("
			SELECT
			  REQ.ID_REQUEST,
			  US.ID AS ID_USER,
			  REQ.ATAS_NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.JAM_KELUAR,
			  REQ.JAM_KEMBALI,
			  REQ.WAKTU_MASUK,
			  SR.STATUS_REQUEST,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  STATUS_REQUEST SR,
			  PAYROLL_PJBS2.SYS_USERS US,
			  PAYROLL_PJBS2.EMP_DETAIL EMP
			WHERE 
			  REQ.ID_PEMOHON = US.ID
			  AND 
			  REQ.ID_STATUS_REQUEST = SR.ID_STATUS_REQUEST
			  AND
			  US.USERNAME = EMP.NID
			  AND
			  REQ.ID_STATUS_REQUEST = '4'
			  AND
			  EMP.LOKASI_ID='16'
			ORDER BY
              REQ.ID_REQUEST DESC
			");	  
	 }
	 //End of function show_all_request
	 
	 function filter_request($id)
	 {
	 	//$query = $this->db->query("SELECT KODE_SUBDIT FROM VIEW_KARYAWAN WHERE ID_KARYAWAN='".$id."'");
		$query = $this->db->query(" SELECT DIREKTORAT_SUB_ID FROM PAYROLL_PJBS2.EMP_DETAIL WHERE NID = '".$id."' ");
		$row=$query->row();
		$id_subdit=$row->DIREKTORAT_SUB_ID;
		return $id_subdit;
	 }
	 //End of function filter_request
	 
	 function ambil_nama($id)
	 {
		//$query = $this->db->query("SELECT NAMA FROM VIEW_KARYAWAN WHERE ID_KARYAWAN='".$id."'");
		$query = $this->db->query("
		   SELECT NAMA FROM PAYROLL_PJBS2.EMP_DETAIL WHERE NID = '".$id."'
		   ");
		   
		$row=$query->row();
		$nama=$row->NAMA;
		return $nama;
	 }
	 //End of function ambil_nama
	 
	 function insert_data_request($data)
	 {
	    $this->db->insert('REQUEST',$data);
	 }	 
	 //End of function insert_data_request
	 
	 function pilih_request_by_id($id)
	 {
	   $this->db->from('REQUEST');
	   $this->db->where('ID_REQUEST',$id);
	   return $this->db->get();
	 }
	 //End of function pilih_request_by_id
	 
	 function edit_data_request($data,$id)
	 {
	   $this->db->where('ID_REQUEST',$id);
	   $this->db->update('REQUEST',$data);
	 }
	 //End of function edit_data_request
	 
  }
