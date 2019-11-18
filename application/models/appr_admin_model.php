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
	 
	 function tampil_jenis_operasional()
	 {
	    $this->	db->from('JENIS_OPERASIONAL');
	    return $this->db->get();
	 }	
//-----------------------------------------------
	 function show_request1($id)
	 {
		$this->db->from('VIEW_REQUEST');
		// $this->db->where('ID_REQUEST', $id);
		$this->db->where('NID', $id);
	    return $this->db->get();
	 }
	 
	 function get_tgl_kembali($id)
	 {
	    $query = $this->db->query("
		   SELECT *
		   FROM REQUEST
		   WHERE ID_REQUEST = '$id' 
		");
		
		$tgl_kembali = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
		     $tgl_kembali = $row->TGL_KEMBALI;
		}
		
		return $tgl_kembali;
	 }
	 
	 function get_waktu_kembali($id)
	 {
	    $query = $this->db->query("
		   SELECT *
		   FROM REQUEST
		   WHERE ID_REQUEST = '$id' 
		");
		
		$waktu_kembali = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
		     //$waktu_kembali = $row->TGL_KEMBALI." ".$row->JAM_KEMBALI;
			 $waktu_kembali = $row->TGL_KEMBALI;
		}
		
		return $waktu_kembali;
	 }
	 
	 function get_waktu_berangkat($id)
	 {
	    $query = $this->db->query("
		   SELECT *
		   FROM REQUEST
		   WHERE ID_REQUEST = '$id' 
		");
		
		$waktu_kembali = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
		     //$waktu_berangkat = $row->TGL_BERANGKAT." ".$row->JAM_KELUAR;
			 $waktu_berangkat = $row->TGL_BERANGKAT;
		}
		
		return $waktu_berangkat;
	 }
	 
	 function show_request()
	 {
		//$this->db->from('VIEW_REQUEST_ASS');
		$this->db->from('VIEW_REQUEST');
		$this->db->where('STATUS',4);
	    return $this->db->get();
	 }
	 function show_request_jkt()//gabungan dari request_model=show_all_request_jkt dan view_request_ass
	 {
		return $this->db->query("
			SELECT
			  REQ.ATAS_NAMA,
			  REQ.TGL_BERANGKAT,
			  REQ.JAM_KELUAR,
			  REQ.TGL_KEMBALI,
			  REQ.JAM_KEMBALI,
			  REQ.KETERANGAN_TUJUAN,
			  REQ.KEPERLUAN,
			  REQ.ID_REQUEST
			FROM
			  REQUEST REQ,
			  PAYROLL_PJBS2.SYS_USERS US,
			  PAYROLL_PJBS2.EMP_DETAIL EMP
			WHERE 
			  REQ.ID_STATUS_REQUEST = '1'
              AND 
			  ROWNUM <= 100
			  AND
			  REQ.ID_PEMOHON = US.ID
			  AND
			  US.USERNAME = EMP.NID
			  AND
			  EMP.LOKASI_ID='16'
			ORDER BY
              REQ.ID_REQUEST DESC
			");
	 }
	 function show_all_operasional()
	 {
		//$this->db->from('VIEW_OPERASIONAL');
		$this->db->from('PEMINJAMAN');
	    return $this->db->get();
	 }
	 
	 function show_all_operasional_jkt()
	 {
		return $this->db->query('
	SELECT  "ID_OPERASIONAL",
            "TGL_BERANGKAT",
            "ID_REQUEST",
            "JAM_KELUAR",
            "JAM_KEMBALI",
            "KM_AWAL",
            "KM_AKHIR",
            "ID_JENIS_BBM",
            "LITER_BBM",
            "TGL_KEMBALI",
            "ID_STATUS_OPERASIONAL",
            "KETERANGAN_TUJUAN",
            "KETERANGAN",
            "ID_SOPIR",
            "ID_KENDARAAN",
            "ID_PEMOHON",
            "PEMOHON",
            "NO_POLISI",
            "NAMA_SOPIR",
            "ID_JENIS_KENDARAAN",
            "JENIS_KENDARAAN",
            "STATUS_OPERASIONAL",
            "ID_TIPE_SPJ",
            "TIPE_SPJ"
     FROM   (  SELECT   OP.ID_OPERASIONAL,
                        OP.TGL_BERANGKAT,
                        OP.ID_REQUEST,
                        OP.JAM_KELUAR,
                        OP.JAM_KEMBALI,
                        OP.KM_AWAL,
                        OP.KM_AKHIR,
                        OP.ID_JENIS_BBM,
                        OP.LITER_BBM,
                        OP.TGL_KEMBALI,
                        OP.ID_STATUS_OPERASIONAL,
                        RQ.KETERANGAN_TUJUAN,
                        OP.KETERANGAN,
                        OP.ID_SOPIR,
                        OP.ID_KENDARAAN,
                        RQ.ID_PEMOHON,
                        RQ.ATAS_NAMA AS PEMOHON,
                        KR.NO_POLISI,
                        SP.NAMA AS NAMA_SOPIR,
                        KR.ID_JENIS_KENDARAAN,
                        JK.JENIS_KENDARAAN,
                        SO.STATUS_OPERASIONAL,
                        RQ.ID_TIPE_SPJ,
                        TS.TIPE_SPJ
                 FROM   OPERASIONAL OP,
                        KENDARAAN KR,
                        SOPIR SP,
                        REQUEST RQ,
                        STATUS_OPERASIONAL SO,
                        JENIS_KENDARAAN JK,
                        TIPE_SPJ TS,
						PAYROLL_PJBS2.SYS_USERS SU,
						PAYROLL_PJBS2.EMP_DETAIL ED
                WHERE       OP.ID_KENDARAAN = KR.ID_KENDARAAN
                        AND OP.ID_SOPIR = SP.ID_SOPIR
                        AND OP.ID_REQUEST = RQ.ID_REQUEST
                        AND OP.ID_STATUS_OPERASIONAL = SO.ID_STATUS_OPERASIONAL
                        AND KR.ID_JENIS_KENDARAAN = JK.ID_JENIS_KENDARAAN
                        AND RQ.ID_TIPE_SPJ = TS.ID_TIPE_SPJ
						AND RQ.ID_PEMOHON = SU.ID
						AND SU.USERNAME = ED.NID
						AND ED.LOKASI_ID = 16
             ORDER BY   OP.ID_OPERASIONAL DESC)
    	WHERE   ROWNUM <= 100
		');
	 }
	 
	 function show_operasional()
	 {
		//$this->db->from('VIEW_OPERASIONAL');
		$this->db->from('PEMINJAMAN');
		$this->db->where('STATUS', 5);
	    return $this->db->get();
	 }
	 
	 function show_operasional_jkt()
	 {
		return $this->db->query('
	SELECT  "ID_OPERASIONAL",
            "TGL_BERANGKAT",
            "ID_REQUEST",
            "JAM_KELUAR",
            "JAM_KEMBALI",
            "KM_AWAL",
            "KM_AKHIR",
            "ID_JENIS_BBM",
            "LITER_BBM",
            "TGL_KEMBALI",
            "ID_STATUS_OPERASIONAL",
            "KETERANGAN_TUJUAN",
            "KETERANGAN",
            "ID_SOPIR",
            "ID_KENDARAAN",
            "ID_PEMOHON",
            "PEMOHON",
            "NO_POLISI",
            "NAMA_SOPIR",
            "ID_JENIS_KENDARAAN",
            "JENIS_KENDARAAN",
            "STATUS_OPERASIONAL",
            "ID_TIPE_SPJ",
            "TIPE_SPJ"
     FROM   (  SELECT   OP.ID_OPERASIONAL,
                        OP.TGL_BERANGKAT,
                        OP.ID_REQUEST,
                        OP.JAM_KELUAR,
                        OP.JAM_KEMBALI,
                        OP.KM_AWAL,
                        OP.KM_AKHIR,
                        OP.ID_JENIS_BBM,
                        OP.LITER_BBM,
                        OP.TGL_KEMBALI,
                        OP.ID_STATUS_OPERASIONAL,
                        RQ.KETERANGAN_TUJUAN,
                        OP.KETERANGAN,
                        OP.ID_SOPIR,
                        OP.ID_KENDARAAN,
                        RQ.ID_PEMOHON,
                        RQ.ATAS_NAMA AS PEMOHON,
                        KR.NO_POLISI,
                        SP.NAMA AS NAMA_SOPIR,
                        KR.ID_JENIS_KENDARAAN,
                        JK.JENIS_KENDARAAN,
                        SO.STATUS_OPERASIONAL,
                        RQ.ID_TIPE_SPJ,
                        TS.TIPE_SPJ
                 FROM   OPERASIONAL OP,
                        KENDARAAN KR,
                        SOPIR SP,
                        REQUEST RQ,
                        STATUS_OPERASIONAL SO,
                        JENIS_KENDARAAN JK,
                        TIPE_SPJ TS,
						PAYROLL_PJBS2.SYS_USERS SU,
						PAYROLL_PJBS2.EMP_DETAIL ED
                WHERE       OP.ID_KENDARAAN = KR.ID_KENDARAAN
                        AND OP.ID_SOPIR = SP.ID_SOPIR
                        AND OP.ID_REQUEST = RQ.ID_REQUEST
                        AND OP.ID_STATUS_OPERASIONAL = SO.ID_STATUS_OPERASIONAL
                        AND KR.ID_JENIS_KENDARAAN = JK.ID_JENIS_KENDARAAN
                        AND RQ.ID_TIPE_SPJ = TS.ID_TIPE_SPJ
						AND RQ.ID_PEMOHON = SU.ID
						AND SU.USERNAME = ED.NID
						AND ED.LOKASI_ID = 16
						AND SO.ID_STATUS_OPERASIONAL = 5
             ORDER BY   OP.ID_OPERASIONAL DESC)
    	WHERE   ROWNUM <= 100
		');
	 }
	 
	 function show_operasional1($id)
	 {
		$this->db->from('VIEW_OPERASIONAL');
		$this->db->where('ID_REQUEST', $id);
	    return $this->db->get();
	 }
	 
	 function show_operasional_user($id)
	 {
		$this->db->from('VIEW_OPERASIONAL');
		// $this->db->where('ID_PEMOHON', $id);
		$this->db->where('NID', $id);
	    return $this->db->get();
	 }
	 
//-----------------------------------------------	 
	 function approval($data)
	 {
	   $this->db->where('ID_REQUEST', $data);
	   return $this->db->get('VIEW_REQUEST_ASS');
	 }
//-----------------insert dan ubah status request jadi selesai------------------------------	 
	 function insert_data_operasional($data)
	 {
	    $this->db->insert('OPERASIONAL',$data);
	 }
	 function update_request_op($data2,$id)
	 {
	   $this->db->where('ID_REQUEST',$id);
	   $this->db->update('REQUEST',$data2);
	 }
	 
	 function update_sopir_2($data3,$id_s)
	 {
	   $this->db->where('ID_SOPIR',$id_s);
	   $this->db->update('SOPIR',$data3);
	 }
	 function update_mobil_2($data4,$id_m)
	 {
	   $this->db->where('ID_KENDARAAN',$id_m);
	   $this->db->update('KENDARAAN',$data4);
	 }
	 function update_operasional($data2,$id)
	 {
	   $this->db->where('ID_OPERASIONAL',$id);
	   $this->db->update('OPERASIONAL',$data2);
	 }
//get data aktif
	 function get_driver_aktif()
	 {
	   //$this->db->from('VIEW_DRIVER_AKTIF');
	   $this->db->from('SOPIR');
	   return $this->db->get();
	 }
	 function get_driver_aktif_jkt()
	 {
	   //$this->db->from('VIEW_DRIVER_AKTIF');
	   //$this->db->where('KODE_LOKASI','KP');
	   //$this->db->where('KODE_LOKASI','ALL');
	   //return $this->db->get();
	   return $this->db->query("
	   		SELECT * FROM VIEW_DRIVER_AKTIF WHERE KODE_LOKASI='KR' OR KODE_LOKASI='ALL'
	   ");
	 }
	 function get_mobil_aktif()
	 {
	   // $this->db->from('VIEW_MOBIL_AKTIF');
	   $this->db->from('KENDARAAN');
	   return $this->db->get();
	 }
	 
	 function get_mobil_aktif_jkt()
	 {
	   $this->db->from('VIEW_MOBIL_AKTIF');
	   $this->db->where('ID_LOKASI',6);
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
  
  function get_mobil_booked_jkt($tgl_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN
       WHERE TGL_BERANGKAT > TO_DATE('".$tgl_kembali."','DD-MM-YYYY')
	   AND ID_LOKASI = '6'
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
  
  function get_mobil_booked2_jkt($waktu_kembali)
  {
     
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN2
	   WHERE ID_LOKASI = '6'
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
  
  function get_mobil_booked3_jkt($waktu_berangkat)
  {
     
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_KENDARAAN2
	   WHERE ID_LOKASI = '6'
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
  
  function get_sopir_booked_jkt($tgl_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR
       WHERE TGL_BERANGKAT > TO_DATE('".$tgl_kembali."', 'DD-MM-YYYY')
	   AND KODE_LOKASI = 'KR'
	   OR KODE_LOKASI = 'ALL'
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
  
  function get_sopir_booked2_jkt($waktu_kembali)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR2
	   WHERE KODE_LOKASI = 'KR' OR KODE_LOKASI = 'ALL'
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
  
  function get_sopir_booked3_jkt($waktu_berangkat)
  {
    $query = $this->db->query("
	   SELECT *
       FROM VIEW_BOOKED_SOPIR2
	   WHERE KODE_LOKASI = 'KR' OR KODE_LOKASI = 'ALL'
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
  
  function get_status_sopir_op_jkt()
  {
     $this->db->from('VIEW_DAFTAR_SOPIR_OP');
	 $this->db->where('KODE_LOKASI',"KR");
	 return $this->db->get();
  } //End of function get_status_sopir_op
	
	//----------------------  Model untuk voucher, sewa, dan reimburse -------------
	
	function insert_data_sewa($data)
	{
	   $this->db->insert('SEWA_KENDARAAN',$data);
	}
	//End of function insert_data_sewa
	
	function insert_data_voucher($data)
	{
	   $this->db->insert('VOUCHER',$data);
	}
	//End of function insert_data_voucher
	
	function get_jenis_reimburse()
	{
	   $this->db->from('JENIS_REIMBURSE');
	   return $this->db->get();
	}
	 //End of function get_jenis_reimburse
	 
	function insert_data_reimburse($data)
	{
	   $this->db->insert('REIMBURSE',$data);
	}
	//End of function insert_data_reimburse
	
	function show_all_sewa()
	{
	  $this->db->from('VIEW_SEWA');
	  return $this->db->get();
	}
	//End of function show_all_sewa
	
	function show_sewa_user($id)
	{
	  $this->db->from('VIEW_SEWA');
	  $this->db->where('ID_PEMOHON', $id);
	  return $this->db->get();
	}
	//End of function show_sewa_user
	
	// start of show sewa id sewa
	function show_sewa_id_sewa($id)
	{
	  $this->db->from('VIEW_SEWA');
	  $this->db->where('ID_SEWA_KENDARAAN', $id);
	  return $this->db->get();
	}
	//End of show sewa id sewa
	
	function update_sewa($data,$id)
	 {
	   $this->db->where('ID_SEWA_KENDARAAN',$id);
	   $this->db->update('SEWA_KENDARAAN',$data);
	 }
	 //End of function update_sewa
	
	function show_all_voucher()
	{
	  $this->db->from('VIEW_VOUCHER');
	  return $this->db->get();
	}
	//End of function show_all_voucher
	
	function show_voucher_user($id)
	{
	  $this->db->from('VIEW_VOUCHER');
	  // $this->db->where('ID_PEMOHON', $id);
	  $this->db->where('NID', $id);
	  return $this->db->get();
	}
	//End of function show_voucher_user
	
	function show_all_reimburse()
	{
	  $this->db->from('VIEW_REIMBURSE');
	  return $this->db->get();
	}
	//End of function show_all_reimburse
	
	function show_reimburse_user($id)
	{
	  $this->db->from('VIEW_REIMBURSE');
	  // $this->db->where('ID_PEMOHON', $id);
	  $this->db->where('NID', $id);
	  return $this->db->get();
	}
	//End of function show_reimburse_user
	
	function get_id_sopir_sewa($id)
	 {
	    $query = $this->db->query("
		   SELECT ID_SOPIR
		   FROM SEWA_KENDARAAN
		   WHERE ID_SEWA_KENDARAAN = '$id' 
		");
		
		$id_sopir = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
		     $id_sopir = $row->ID_SOPIR;
		}
		
		return $id_sopir;
	 }
	 //End of function get_id_sopir_sewa
	 
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
	 
	 function get_current_sopir($id)
	 {
	    $this->db->from('SOPIR');
		$this->db->where('ID_SOPIR', $id);
	    $query = $this->db->get();
		
		$data_sopir = "";
		
		if($query->num_rows() > 0)
		{
		   foreach($query->result() as $row)
			 $data_sopir = $row->ID_SOPIR."-".$row->NAMA;
		}
		
		//echo $data_sopir."<br/>";
		return $data_sopir;
	 }
	 //End of function get_current_sopir
	 
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
	
	
  }
