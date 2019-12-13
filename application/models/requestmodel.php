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
	    $this->db->where('NID',$id);
		$this->db->from('REQUEST');
	    return $this->db->get();
	 }
	 
	 function show_operasional_user($id)
	 {
		$this->db->from('VIEW_PEMINJAMAN_DETAIL');
		$this->db->where('NID', $id);
	    return $this->db->get();
	 }
	 
	function show_voucher_user($id)
	{
	  $this->db->from('VIEW_VOUCHER_DETAIL');
	  $this->db->where('NID', $id);
	  return $this->db->get();
	}
	
	function show_reimburse_user($id)
	{
	  $this->db->from('VIEW_REIMBURSE_DETAIL');
	  $this->db->where('NID', $id);
	  return $this->db->get();
	}
	 
	 function show_request($subdit)
	 {	
	 	/*$this->db->select('VIEW_REQUEST.ID_REQUEST,VIEW_REQUEST.ID_USER,VIEW_REQUEST.ATAS_NAMA,VIEW_REQUEST.TGL_BERANGKAT,VIEW_REQUEST.JAM_KELUAR,VIEW_REQUEST.JAM_KEMBALI,VIEW_REQUEST.WAKTU_MASUK,VIEW_REQUEST.STATUS_REQUEST,VIEW_REQUEST.KEPERLUAN');
		$this->db->from('VIEW_REQUEST');
		$this->db->join('VIEW_KARYAWAN','VIEW_REQUEST.ATAS_NAMA = VIEW_KARYAWAN.NAMA');
		$this->db->where('VIEW_KARYAWAN.KODE_SUBDIT',$subdit);*/
		//$this->db->where('VIEW_REQUEST.STATUS_REQUEST','Pending');
			/*
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
			 */
		
		//Menampilkan daftar request dgn status = 1 (pending) berdasarkan id subdit yg sama dengan user
		return $this->db->query("
			SELECT
			  REQ.ID_REQUEST,
			  US.ID_USER,
			  EMP.NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.WAKTU_REQUEST,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  USERS US,
			  VIEW_KARYAWAN EMP
			WHERE 
			  REQ.NID = US.USERNAME
			  AND 
			  US.USERNAME = EMP.NID
			  AND
			  REQ.STATUS = '4'
			  AND
			  EMP.KODE_DIVISI = '".$subdit."'
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
			  US.ID_USER,
			  EMP.NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.TGL_KEMBALI,
			  REQ.WAKTU_REQUEST,
			  REQ.TUJUAN,
			  REQ.STATUS,
			  REQ.KEPERLUAN
			FROM
			  REQUEST REQ,
			  USERS US,
			  VIEW_KARYAWAN EMP
			WHERE 
			  REQ.NID = US.USERNAME
			  AND 
			  US.USERNAME = EMP.NID
			  AND
			  REQ.STATUS = '4'
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
	 	$query = $this->db->query("SELECT KODE_DIVISI FROM VIEW_KARYAWAN WHERE NID='".$id."'");
		//$query = $this->db->query(" SELECT DIREKTORAT_SUB_ID FROM PAYROLL_PJBS2.EMP_DETAIL WHERE NID = '".$id."' ");
		$row=$query->row();
		//$id_subdit=$row->DIREKTORAT_SUB_ID;
		$id_subdit=$row->KODE_DIVISI;
		return $id_subdit;
	 }
	 //End of function filter_request
	 
	 function ambil_nama($id)
	 {
		$query = $this->db->query("SELECT NAMA FROM KARYAWAN WHERE NID='".$id."'");
		// $query = $this->db->query("
		   // SELECT NAMA FROM PAYROLL_PJBS2.EMP_DETAIL WHERE NID = '".$id."'
		   // ");
		   
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
