<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Reportmodel
	 @author IT-PJBS
  */ 
 
class Reportmodel extends CI_Model 
{
    function lihat_data_operasional($tgl_mulai, $tgl_akhir)
	{
	   $query = $this->db->query("
	      SELECT *
          FROM VIEW_OPERASIONAL
          WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
          AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
          AND ID_STATUS_OPERASIONAL = 1
	   ");
	   
	   return $query;
	}
	//End of function lihat_data_operasional

    function hitung_jml_operasional_user($tgl_mulai, $tgl_akhir)
    {
	   $query = $this->db->query("
	       SELECT ID_PEMOHON, PEMOHON, COUNT(ID_PEMOHON) AS JML_OPERASIONAL
           FROM VIEW_OPERASIONAL
           WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
           AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
		   AND ID_STATUS_OPERASIONAL = 1
           GROUP BY ID_PEMOHON, PEMOHON
	   ");
	   
	   return $query;
	}
     //end of function hitung_jml_operasional_user	
	 
	 function get_daftar_user($tgl_mulai, $tgl_akhir)
	 {
	    $query = $this->db->query("
		    SELECT ID_PEMOHON, PEMOHON
            FROM VIEW_OPERASIONAL
            WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
            AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
            AND ID_STATUS_OPERASIONAL = 1
		");
		
		return $query;
	 }
	 //end of function get_daftar_user
	 
	 function lihat_detail_op_user($tgl_mulai, $tgl_akhir, $nama)
	 {
	    $query = $this->db->query("
		  SELECT *
          FROM VIEW_OPERASIONAL
          WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
          AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
          AND ID_STATUS_OPERASIONAL = 1
          AND PEMOHON LIKE '%".$nama."%'
		");
		
		return $query;
	 }
	  
    function get_daftar_kendaraan_op()
	 {
		$query = $this->db->query("
		  SELECT KD.ID_KENDARAAN, KD.NO_POLISI, JK.JENIS_KENDARAAN
          FROM KENDARAAN KD, DETAIL_KENDARAAN_DINAS DK, JENIS_KENDARAAN JK
          WHERE KD.ID_KENDARAAN = DK.ID_KENDARAAN
          AND KD.ID_JENIS_KENDARAAN = JK.ID_JENIS_KENDARAAN
          AND DK.ID_TIPE_KENDARAAN_DINAS = '5'
		");
		
		return $query;
	 }
     //end of function get_daftar_kendaraan_op
	 
	 function get_daftar_sopir_op()
	 {
	   $query = $this->db->query("
		   SELECT ID_SOPIR, NAMA
           FROM SOPIR
           WHERE ID_STATUS_SOPIR != 3
		   AND ID_STATUS_SOPIR != 0
           AND ID_SOPIR != '0'
		");
		
		return $query;
	 }
     //end of function get_daftar_sopir_op
	 
     function hitung_jamop_kendaraan($tgl_mulai, $tgl_akhir, $id_kendaraan)
	 {
	    $query = $this->db->query("
                 SELECT ID_OPERASIONAL, TGL_BERANGKAT, TGL_KEMBALI, JAM_KELUAR, JAM_KEMBALI
                 FROM OPERASIONAL
				 WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
				 AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
				 AND ID_KENDARAAN = '".$id_kendaraan."'
                 ");
		
        $total = 0;
		
		if($query->num_rows() > 0)
        {
		  $total_minutes =0;
		  
          foreach($query->result() as $row)
          {  
		    $time_start = "'".$row->TGL_BERANGKAT." ".$row->JAM_KELUAR."'";
			$time_stop = "'".$row->TGL_KEMBALI." ".$row->JAM_KEMBALI."'";
			
			/*$diff = $this->db->query("
                             SELECT TIMESTAMPDIFF(MINUTE, ".$time_start.", ".$time_stop.") AS DIFF
						   ");*/
			$diff = $this->db->query("
			    SELECT 
			   (TO_DATE($time_stop,'DD-MM-YYYY HH24:MI:SS')-TO_DATE($time_start,'DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
		    /*echo $row->ID_OPERASIONAL." | ";
			echo $time_start." | ";
			echo $time_stop." | ";
			echo $diff->row()->DIFF." menit <br/>";*/
			
			$total_minutes += $diff->row()->DIFF;
			
		  }
		  
		  $total = $total_minutes/60;
		  
		  /*echo "<br/>";
		  echo "TOTAL MENIT : ".$total_minutes."<br/>";
		  echo "TOTAL JAM OPERASIONAL: ".$total;*/
		  
        } //End if		  
		
		return $total;
	 }
	 //End of function hitung_jamop_kendaraan
	 
	 function lihat_operasional_kendaraan($tgl_mulai, $tgl_akhir, $kendaraan)
	 {
	    $query = $this->db->query("
		    SELECT *
            FROM VIEW_OPERASIONAL
            WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
            AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
            AND ID_STATUS_OPERASIONAL = 1
            AND NO_POLISI LIKE '%".$kendaraan."%'
		");
		
		return $query;
	 }
	 
	 function hitung_jamop_sopir($tgl_mulai, $tgl_akhir, $id_sopir, $tipe_spj)
	 {
	    /*$query = $this->db->query("
                 SELECT ID_OPERASIONAL, TGL_BERANGKAT, TGL_KEMBALI, JAM_KELUAR, JAM_KEMBALI
                 FROM OPERASIONAL
				 WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
				 AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
				 AND ID_SOPIR = '".$id_sopir."'
                 ");*/
				 
		 $query = $this->db->query("
                 SELECT 
				   OP.ID_OPERASIONAL, 
				   OP.TGL_BERANGKAT, 
                   OP.TGL_KEMBALI, 
				   OP.JAM_KELUAR, 
				   OP.JAM_KEMBALI
                 FROM 
				   OPERASIONAL OP,
				   REQUEST RQ
				 WHERE 
				   OP.ID_REQUEST = RQ.ID_REQUEST
				   AND
				   OP.TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
				   AND 
				   OP.TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
				   AND 
				   OP.ID_SOPIR = '".$id_sopir."'
				   AND
				   RQ.ID_TIPE_SPJ = '".$tipe_spj."'
                 ");
		
        $total = 0;
		
		if($query->num_rows() > 0)
        {
		  $total_minutes =0;
		  
          foreach($query->result() as $row)
          {
		    $time_start = "'".$row->TGL_BERANGKAT." ".$row->JAM_KELUAR."'";
			$time_stop = "'".$row->TGL_KEMBALI." ".$row->JAM_KEMBALI."'";
			
			/*$diff = $this->db->query("
                             SELECT TIMESTAMPDIFF(MINUTE, ".$time_start.", ".$time_stop.") AS DIFF
						   ");*/
			
			$diff = $this->db->query("
			    SELECT 
			   (TO_DATE($time_stop,'DD-MM-YYYY HH24:MI:SS')-TO_DATE($time_start,'DD-MM-YYYY HH24:MI:SS')) * 24 * 60 DIFF
                FROM DUAL
			");
			
		    /*echo $row->ID_OPERASIONAL." | ";
			echo $time_start." | ";
			echo $time_stop." | ";
			echo $diff->row()->DIFF." menit <br/>";*/
			
			$total_minutes += $diff->row()->DIFF;
			
		  }
		  
		  $total = $total_minutes/60;
		  
		  /*echo "<br/>";
		  echo "TOTAL MENIT : ".$total_minutes."<br/>";
		  echo "TOTAL JAM OPERASIONAL: ".$total;*/
		  
        } //End if		  
		
		return $total;
	 }
	 //End of function hitung_jamop_sopir
	 
	 function lihat_operasional_sopir($tgl_mulai, $tgl_akhir, $sopir, $tipe_spj)
	 {
	    $query = $this->db->query("
		    SELECT *
            FROM VIEW_OPERASIONAL
            WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
            AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
            AND ID_STATUS_OPERASIONAL = 1
            AND NAMA_SOPIR LIKE '%".$sopir."%'
			AND ID_TIPE_SPJ = '".$tipe_spj."'
		");
		
		return $query;
	 }
	     

	//-------------------------------------------------------------------------------------
    function get_driver()
    {
		$this->db->from('VIEW_STATUS_SOPIR');
		//$this->db->where('ID_STATUS_SOPIR');
        return $this->db->get();        
    }      
}
//End of class Reportmodel
  
  /**
    End of file: reportmodel.php
	Location: ./application/models/reportmodel.php
  */