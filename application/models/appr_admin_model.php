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
	 
	 function request()
	 {
		$this->db->from('VIEW_REQUEST');
		$this->db->where('STATUS', 1);
	    return $this->db->get();
	 }
	 
	 function generate_code($cek)
	 {
		 switch($cek){
			 case 'k':
				$table = 'PEMINJAMAN';
			 break;
			 case 'r':
				$table = 'REIMBURSE';
			 break;
		 }
		 $this->db->select("RIGHT(ID_$table,2) as kode", FALSE);
		 $this->db->order_by("ID_$table",'DESC');    
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
//-----------------------------------------------
	 function show_request1($id)
	 {
		$this->db->from('VIEW_REQUEST');
		// $this->db->where('ID_REQUEST', $id);
		$this->db->where('NID', $id);
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
		$this->db->where('STATUS', 5);
	    return $this->db->get();
	 }
	 
	 function show_operasional1($id)
	 {
		$this->db->from('VIEW_OPERASIONAL');
		$this->db->where('ID_REQUEST', $id);
	    return $this->db->get();
	 }
	 
//-----------------------------------------------	 
	 function approval($data)
	 {
	   $this->db->where('ID_REQUEST', $data);
	   return $this->db->get('VIEW_REQUEST_ASS');
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
	 function update_operasional($data2,$id)
	 {
	   $this->db->where('ID_OPERASIONAL',$id);
	   $this->db->update('OPERASIONAL',$data2);
	 }
	 
	 function get_mobil_aktif()
	 {
	   // $this->db->from('VIEW_MOBIL_AKTIF');
	   $this->db->from('KENDARAAN');
	   $this->db->where('STATUS', 1);
	   return $this->db->get();
	 }
	 
	 function get_daftar_sopir_op()
	 {
	   $this->db->from('VIEW_DAFTAR_SOPIR_OP');
	   return $this->db->get();
	 }
	 
	 function get_daftar_kendaraan_op()
	 {
	   $this->db->from('VIEW_DAFTAR_KENDARAAN_OP');
	   return $this->db->get();
	 }
	
	//------------
	
	//get daftar status operasional
    function get_all_status_op()  
	{
       $this->db->from('STATUS_OPERASIONAL');
       return $this->db->get();		
	}
	
	function get_operasional_by_id($id)
	{
	  $this->db->from('OPERASIONAL');
	  $this->db->where('ID_OPERASIONAL',$id);
	  return $this->db->get();
	}
	
	function get_status_operasional()
	 {
	    $this->	db->from('STATUS_OPERASIONAL');
	    return $this->db->get();
	 }	
	
	 /*function show_operasional()
	 {
		$this->db->from('VIEW_OPERASIONAL');
		$this->db->where('ID_STATUS_OPERASIONAL', 3);
	    return $this->db->get();
	 }*/
	 
	 //--------------------
	 
  function get_mobil_booked($tgl_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN
       WHERE TGL_BERANGKAT > TO_DATE('".$tgl_kembali."','DD-MM-YYYY')
	");
	
	$data = ""; 
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    $data .= $row->ID_KENDARAAN."/";
		$data .= $row->TGL_BERANGKAT."/";
		$data .= $row->NO_POLISI."/";
		$data .= $row->JENIS_KENDARAAN."|";
	  }
    }
	else
	  $data = "kosong!!";
	
	return $data;
  } //End of function get_mobil_booked
  
  //Jika waktu berangkat request 1 > waktu kembali request 2
  function get_mobil_booked2($waktu_kembali)
  {
     
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN2
	");
	
	$data = ""; 
	$notavb = array();
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    $waktu_berangkat = $row->TGL_BERANGKAT." ".$row->JAM_KELUAR;
		
	    $diff = $this->db->query("
			    SELECT 
			   (TO_DATE('".$waktu_berangkat."','DD-MM-YYYY HH24:MI:SS')-TO_DATE('".$waktu_kembali."','DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
	    $minutes_diff = $diff->row()->DIFF;
		
		/*echo "get mobil booked2: <br/>";
	    echo "waktu berangkat: ".$waktu_berangkat."<br/>";
	    echo "waktu kembali: ".$waktu_kembali."<br/>";
     	echo "minutes_diff: ".$minutes_diff."<br/>";*/
			
		if($minutes_diff >= 60)
		{
		   $data .= $row->ID_KENDARAAN."/";
		   $data .= $row->TGL_BERANGKAT."/";
		   $data .= $row->NO_POLISI."/";
		   $data .= $row->JENIS_KENDARAAN."|";
		}
		else
		{		   
		   if(!in_array($row->ID_KENDARAAN, $notavb))
		     array_push($notavb, $row->ID_KENDARAAN);
		}
	
	  }
    }
	else
	  $data = "kosong!!";
	
	//echo "data kendaraan: ".$data."<br/><br/>";

	$selected_data = "";
	
	/*foreach ($notavb as $not)
	  echo $not."<br/>";*/
	
	$list_mobil = explode('|', $data);
						 
	for($i = 0; $i < count($list_mobil)-1; $i++)
	{
	   $data_mobil = explode('/', $list_mobil[$i]);										 
	   //echo $list_mobil[$i]."<br/>";
	   
	   if(!in_array($data_mobil[0], $notavb))
	     $selected_data .= $list_mobil[$i]."|";
	   
	}
	
	/*echo $selected_data."<br/>";
	return $data;*/
	/*echo "Selected data:<br/>";
	print_r($selected_data);
	echo "<br/><br/>";*/
	return $selected_data;
  } //End of function get_mobil_booked2
  
  function get_mobil_booked3($waktu_berangkat)
  {
     
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN2
	");
	
	$data = ""; 
	$notavb = array();
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    $waktu_kembali = $row->TGL_KEMBALI." ".$row->JAM_KEMBALI;
		
	    $diff = $this->db->query("
			    SELECT 
			   (TO_DATE('".$waktu_berangkat."','DD-MM-YYYY HH24:MI:SS')-TO_DATE('".$waktu_kembali."','DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
	    $minutes_diff = $diff->row()->DIFF;
		
		/*echo "get mobil booked3: <br/>";
	    echo "waktu berangkat: ".$waktu_berangkat."<br/>";
	    echo "waktu kembali: ".$waktu_kembali."<br/>";
     	echo "minutes_diff: ".$minutes_diff."<br/>";*/
			
		if($minutes_diff >= 60)
		{
		   $data .= $row->ID_KENDARAAN."/";
		   $data .= $row->TGL_BERANGKAT."/";
		   $data .= $row->NO_POLISI."/";
		   $data .= $row->JENIS_KENDARAAN."|";
		}
		else
		{		   
		   if(!in_array($row->ID_KENDARAAN, $notavb))
		     array_push($notavb, $row->ID_KENDARAAN);
		}
	
	  }
    }
	else
	  $data = "kosong!!";
	
	//echo "data kendaraan: ".$data."<br/><br/>";

	$selected_data = "";
	
	/*foreach ($notavb as $not)
	  echo $not."<br/>";*/
	
	$list_mobil = explode('|', $data);
						 
	for($i = 0; $i < count($list_mobil)-1; $i++)
	{
	   $data_mobil = explode('/', $list_mobil[$i]);										 
	   //echo $list_mobil[$i]."<br/>";
	   
	   if(!in_array($data_mobil[0], $notavb))
	     $selected_data .= $list_mobil[$i]."|";
	   
	}
	
	/*echo $selected_data."<br/>";
	return $data;*/
	/*echo "Selected data:<br/>";
	print_r($selected_data);
	echo "<br/><br/>";*/
	return $selected_data;
  } //End of function get_mobil_booked3
  
  function get_sopir_booked($tgl_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR
       WHERE TGL_BERANGKAT > TO_DATE('".$tgl_kembali."', 'DD-MM-YYYY')
	");
	
	$data = "";
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    $data .= $row->ID_SOPIR."/";
		$data .= $row->TGL_BERANGKAT."/";
		$data .= $row->NAMA."|";
	  }
    }
	else
	  $data = "kosong!!";
	
	return $data;
  } //End of function get_sopir_booked
  
   //Jika waktu berangkat request 1 > waktu kembali request 2
  function get_sopir_booked2($waktu_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR2

	");
	
	$data = "";
	$notavb = array();
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    //$waktu_berangkat = $row->TGL_BERANGKAT." ".$row->JAM_KELUAR;
		$waktu_berangkat = $row->TGL_BERANGKAT;
		
	    $diff = $this->db->query("
			    SELECT 
			   (TO_DATE('".$waktu_berangkat."','DD-MM-YYYY HH24:MI:SS')-TO_DATE('".$waktu_kembali."','DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
	    $minutes_diff = $diff->row()->DIFF;
		
		/*echo "get sopir booked2: <br/>";
	    echo "waktu berangkat: ".$waktu_berangkat."<br/>";
	    echo "waktu kembali: ".$waktu_kembali."<br/>";
     	echo "minutes_diff: ".$minutes_diff."<br/>";*/
		
		if($minutes_diff >= 60 || $row->ID_SOPIR == 0)
		{
		   $data .= $row->ID_SOPIR."/";
		   $data .= $row->TGL_BERANGKAT."/";
		   $data .= $row->NAMA."|";
		}
		else
		{		   
		   if(!in_array($row->ID_SOPIR, $notavb))
		     array_push($notavb, $row->ID_SOPIR);
		}
	 
	  }
    }
	else
	  $data = "kosong!!";
	  
	//echo "data sopir: ".$data."<br/><br/>";
	
	$selected_data = "";
	
	/*foreach ($notavb as $not)
	  echo $not."<br/>";*/
	
	$list_sopir = explode('|', $data);
						 
	for($i = 0; $i < count($list_sopir)-1; $i++)
	{
	   $data_sopir = explode('/', $list_sopir[$i]);										 
	   //echo $list_mobil[$i]."<br/>";
	   
	   if(!in_array($data_sopir[0], $notavb))
	     $selected_data .= $list_sopir[$i]."|";
	   
	}
	
	//return $data;
	/*echo "Selected data:<br/>";
	print_r($selected_data);
	echo "<br/><br/>";*/
	return $selected_data;
  } //End of function get_sopir_booked2
  
  function get_sopir_booked3($waktu_berangkat)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR2

	");
	
	$data = "";
	$notavb = array();
	
	if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
	    $waktu_kembali = $row->TGL_KEMBALI." ".$row->JAM_KEMBALI;
		
	    $diff = $this->db->query("
			    SELECT 
			   (TO_DATE('".$waktu_berangkat."','DD-MM-YYYY HH24:MI:SS')-TO_DATE('".$waktu_kembali."','DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
	    $minutes_diff = $diff->row()->DIFF;
		
		/*echo "get sopir booked3: <br/>";
	    echo "waktu berangkat: ".$waktu_berangkat."<br/>";
	    echo "waktu kembali: ".$waktu_kembali."<br/>";
     	echo "minutes_diff: ".$minutes_diff."<br/>";*/
		
		if($minutes_diff >= 60 || $row->ID_SOPIR == 0)
		{
		   $data .= $row->ID_SOPIR."/";
		   $data .= $row->TGL_BERANGKAT."/";
		   $data .= $row->NAMA."|";
		}
		else
		{		   
		   if(!in_array($row->ID_SOPIR, $notavb))
		     array_push($notavb, $row->ID_SOPIR);
		}
	 
	  }
    }
	else
	  $data = "kosong!!";
	  
	//echo "data sopir: ".$data."<br/><br/>";
	
	$selected_data = "";
	
	/*foreach ($notavb as $not)
	  echo $not."<br/>";*/
	
	$list_sopir = explode('|', $data);
						 
	for($i = 0; $i < count($list_sopir)-1; $i++)
	{
	   $data_sopir = explode('/', $list_sopir[$i]);										 
	   //echo $list_mobil[$i]."<br/>";
	   
	   if(!in_array($data_sopir[0], $notavb))
	     $selected_data .= $list_sopir[$i]."|";
	   
	}
	
	//return $data;
	/*echo "Selected data:<br/>";
	print_r($selected_data);
	echo "<br/><br/>";*/
	return $selected_data;
  } //End of function get_sopir_booked3
  
  function check_kendaraan_booked($id_kendaraan, $id_operasional)
  {
     $query = $this->db->query("
	     SELECT *
		 FROM OPERASIONAL
		 WHERE ID_STATUS_OPERASIONAL = 5
		 AND ID_KENDARAAN = ".$id_kendaraan."
		 AND ID_OPERASIONAL <> ".$id_operasional."
	 ");
	 
	 if($query->num_rows() > 0)
	   return true;
	 
     return false;
  } //End of function check_kendaraan_booked
  
  function check_kendaraan_berangkat($id_kendaraan)
  { 
	 $query = $this->db->query("
	     SELECT
		  KD.ID_KENDARAAN AS ID_KENDARAAN,
		  KD.NO_POLISI    AS NO_POLISI
		FROM 
		  KENDARAAN KD,
		  DETAIL_KENDARAAN_DINAS DK
		WHERE 
		  KD.ID_KENDARAAN = DK.ID_KENDARAAN
		  AND DK.ID_TIPE_KENDARAAN_DINAS = '5'
		  AND KD.ID_STATUS_KENDARAAN = '2'
		  AND KD.ID_KENDARAAN = ".$id_kendaraan."
	 ");
	 
	 if($query->num_rows() > 0)
	   return true;
	 
     return false;
  } //End of function check_kendaraan_berangkat
	
  function check_sopir_booked($id_sopir, $id_operasional)
  {
     $query = $this->db->query("
	     SELECT *
		 FROM OPERASIONAL
		 WHERE ID_STATUS_OPERASIONAL = 5
		 AND ID_SOPIR = ".$id_sopir."
		 AND ID_OPERASIONAL <> ".$id_operasional."
	 ");
	 
	 if($query->num_rows() > 0)
	   return true;
	 
     return false;
  } //End of function check_sopir_booked	
  
  function check_sopir_berangkat($id_sopir)
  {
	 $query = $this->db->query("
	     SELECT
		  SOPIR.ID_SOPIR AS ID_SOPIR, 
		  SOPIR.NID AS NID,
		  SOPIR.NAMA     AS NAMA,
		  SOPIR.ID_STATUS_SOPIR AS ID_STATUS_SOPIR,
		  STATUS_SOPIR.STATUS_SOPIR AS STATUS_SOPIR
		FROM SOPIR, STATUS_SOPIR
		WHERE SOPIR.ID_STATUS_SOPIR <> 3
		AND SOPIR.ID_SOPIR <> '0'
		AND SOPIR.ID_STATUS_SOPIR = STATUS_SOPIR.ID_STATUS_SOPIR
		AND SOPIR.ID_STATUS_SOPIR = 2
		AND SOPIR.ID_SOPIR = ".$id_sopir."
	 ");
	 
	 if($query->num_rows() > 0)
	   return true;
	 
     return false;
  } //End of function check_sopir_berangkat	
  
  function get_status_sopir_op()
  {
     $this->db->from('VIEW_DAFTAR_SOPIR_OP');
	 return $this->db->get();
  } //End of function get_status_sopir_op
  
	//----------------------  Model untuk reimburse -------------
	
	function insert_reimburse($data)
	{
	   $this->db->insert('REIMBURSE',$data);
	}
	//End of function insert_data_reimburse
	
	function show_all_reimburse()
	{
	  //$this->db->from('VIEW_REIMBURSE');
	  $this->db->from('REIMBURSE');
	  return $this->db->get();
	}
	//End of function show_all_reimburse
	
	 //----------------- Untuk Print Form --------------------
	 
	 function get_data_surat($id)
	 {
	   $this->db->from('VIEW_SURAT');
	   $this->db->where('ID_OPERASIONAL', $id);
	   return $this->db->get();
	 }
	 //End of function get_data_surat
	 
	  //------------- Untuk Edit Operasional -----------------
	 
	 function get_id_request($id)
	 {
	     $this->db->select('ID_REQUEST');
	     $this->db->from('OPERASIONAL');
		 $this->db->where('ID_OPERASIONAL', $id);
	     $query = $this->db->get();
		 
		$id_req = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
			 $id_req = $row->ID_REQUEST;
		}
		
		//echo $id_req."<br/>";
		return $id_req;
	 }
	 //End of function get_id_request
	 
	 function get_current_mobil($id)
	 {
	    $this->db->from('VIEW_KENDARAAN');
		$this->db->where('ID_KENDARAAN', $id);
	    $query = $this->db->get();
		
		$data_kendaraan = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
			 $data_kendaraan = $row->ID_KENDARAAN."-".$row->JENIS_KENDARAAN."-".$row->NO_POLISI;
		}
		
		//echo $data_kendaraan."<br/>";
		return $data_kendaraan;
	 }
	 //End of function get_current_mobil
	 
	//Insert Detail Transaksi
	function insert_detail($data)
	 {
	    $this->db->insert_batch('TRANS_DETAIL',$data);
	 }
	
  }
