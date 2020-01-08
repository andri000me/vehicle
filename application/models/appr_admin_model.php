<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Appr_admin_model extends CI_Model
  {
//-----------------------------------------------
  	 public function tampil_request()
	 {
	    $this->db->from('REQUEST');
	    return $this->db->get();
	 }
	 
	 function generate_code($cek)
	 {
		 $table = check_trans($cek);
		 $this->db->select("RIGHT(ID_$table,2) as kode", FALSE);
		 $this->db->order_by("ID_$table",'ASC');    
		 $this->db->limit(1);    
		 $query = $this->db->get($table);      //cek dulu apakah ada sudah ada kode di tabel.    
		 if($query->num_rows() <> 0){      
			 //jika kode ternyata sudah ada.      
			 $data = $query->row();      
			 $kode = intval($data->kode) + 1;    
		 }else{      
		 //jika kode belum ada      
		 $kode = 1;    
		 }
		 $m	= date('m');
		 $y = date('y');
		 $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
		 $kodefix = $m.''.$y.''.$kodemax;
		 return $kodefix;
	 }
	 
	 function get_request_detail($id)
	 {
		$this->db->from('VIEW_REQUEST');
		$this->db->where('ID_REQUEST', $id);
	    return $this->db->get();
	 }
	 
	 function show_request()
	 {
		//$this->db->from('VIEW_REQUEST_ASS');
		$this->db->from('VIEW_REQUEST');
		$this->db->where('STATUS',1);
	    return $this->db->get();
	 }
	 
	 function show_all_operasional()
	 {
		$this->db->from('VIEW_PEMINJAMAN');
	    return $this->db->get();
	 }
	 
	 function show_approval($nid)
	 {
		$this->db->from('VIEW_APPROVAL');
		$this->db->where('ATASAN',$nid);
		$this->db->where('STATUS',0);
	    return $this->db->get();
	 }
	 
	 function show_operasional()
	 {
		//$this->db->from('VIEW_OPERASIONAL');
		$this->db->from('PEMINJAMAN');
		// $this->db->where('STATUS', 5);
		$this->db->where('STATUS', 2);
	    return $this->db->get();
	 }
//-----------------insert dan ubah status request jadi selesai------------------------------	 
	 function insert_operasional($data)
	 {
	    $this->db->insert('PEMINJAMAN',$data);
	 }
	 function update_request($data)
	 {
	   $this->db->update_batch('REQUEST',$data,'ID_REQUEST');
	 }
	 
	 function update_mobil($data,$id)
	 {
	   $this->db->where('NO_POLISI',$id);
	   $this->db->update('KENDARAAN',$data);
	 }
	 function update_operasional($data,$id)
	 {
	   $this->db->where('ID_PEMINJAMAN',$id);
	   $this->db->update('PEMINJAMAN',$data);
	 }
	 
	 function get_mobil_aktif()
	 {
	   $this->db->from('KENDARAAN');
	   $this->db->where('STATUS', 1);
	   return $this->db->get();
	 }
	 
	//------------
  
	//----------------------  Model untuk reimburse -------------
	
	function insert_reimburse($data)
	{
	   $this->db->insert('REIMBURSE',$data);
	}
	//End of function insert_data_reimburse
	
	function update_reimburse($data,$id)
	{
	   $this->db->where('ID_REIMBURSE',$id);
	   $this->db->update('REIMBURSE',$data);
	}
	//End of function insert_data_reimburse
	
	function show_all_reimburse()
	{
	  $this->db->from('VIEW_REIMBURSE_DETAIL');
	  return $this->db->get();
	}
	//End of function show_all_reimburse
	
	 //----------------- Untuk Approval --------------------
	 
	 function admin($nid)
	 {
	   // $this->db->from('VIEW_SURAT');
	   $this->db->from('KARYAWAN');
	   $this->db->where('NID', $nid);
	   return $this->db->get();
	 }
	 //End of function get_data_surat
	 
	  //------------- Untuk Edit Operasional -----------------
	 
	 function get_trans($id,$j)
	 {
	    $table = check_trans($j);
		$this->db->from("VIEW_$table");
		$this->db->where("ID_$table", $id);
	    return $this->db->get();
	 }
	 
	//--------------Detail Transaksi--------------------------
	function insert_detail($data)
	 {
	    $this->db->insert_batch('TRANS_DETAIL',$data);
	 }
	
	function delete_detail($data,$j)
	 {
	   $this->db->where('ID_REQUEST',$data);
	   $this->db->where('TIPE',$j);
	   $this->db->delete('TRANS_DETAIL');
	 }
	
	function get_detail($id,$j){
		$table = check_trans($j);
		$this->db->from('VIEW_DETAIL');
		$this->db->where('ID_TRANS', $id);
		$this->db->where('TIPE', $table);
		return $this->db->get();
		
	}
	
	//------------ For Telegram ------------------
	function get_peminjaman($id)
	 {
		$this->db->from('VIEW_PEMINJAMAN');
		$this->db->where("ID_PEMINJAMAN", $id);
		// $this->db->where("STATUS", 5);
		$this->db->where("STATUS", 2);
	    return $this->db->get();
	 }
  }
