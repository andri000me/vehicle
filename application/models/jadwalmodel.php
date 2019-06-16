<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Jadwalmodel
	 @author IT-PJBS
  */
  
  class Jadwalmodel extends CI_Model
  {
     //--------------- Untuk Lihat Jadwal -------------------
	 
	 function view_jadwal_op_3days()
	 {
	    return $this->db->query("
		   SELECT * 
		   FROM VIEW_JADWAL_OPERASIONAL
		   WHERE TGL_BERANGKAT >= SYSDATE-2
		   AND TGL_BERANGKAT <= SYSDATE+1
		   AND ID_STATUS_OPERASIONAL <> 1
		   AND ID_STATUS_OPERASIONAL <> 2
		   ORDER BY ID_OPERASIONAL
		");
	 }
	 //End of function view_jadwal_op_3_days
	 
	 function view_jadwal_op_3days_jkt()
	 {
	    return $this->db->query("
		   SELECT * 
		   FROM VIEW_JADWAL_OPERASIONAL
		   WHERE TGL_BERANGKAT >= SYSDATE-2
		   AND TGL_BERANGKAT <= SYSDATE+1
		   AND ID_STATUS_OPERASIONAL <> 1
		   AND ID_STATUS_OPERASIONAL <> 2
		   AND ID_LOKASI = 6
		   ORDER BY ID_OPERASIONAL
		");
	 }
  }
  //End of class Jadwalmodel
  
  /**
    End of file: jadwalmodel.php
	Location: ./application/models/jadwalmodel.php
  */