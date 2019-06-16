<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Jamopmodel
	 @author IT-PJBS
  */
  
  class Jamopmodel extends CI_Model
  {
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
	 
	 function hitung_jamop_sopir($tgl_mulai, $tgl_akhir, $id_sopir)
	 {
	    $query = $this->db->query("
                 SELECT ID_OPERASIONAL, TGL_BERANGKAT, TGL_KEMBALI, JAM_KELUAR, JAM_KEMBALI
                 FROM OPERASIONAL
				 WHERE TGL_KEMBALI >= TO_DATE('".$tgl_mulai."','DD-MM-YYYY')
				 AND TGL_KEMBALI <= TO_DATE('".$tgl_akhir."','DD-MM-YYYY')
				 AND ID_SOPIR = '".$id_sopir."'
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
	 
	 
  }
  //End of class Jamopmodel
  
  /**
    End of file: jamopmodel.php
	Location: ./application/models/jamopmodel.php
  */