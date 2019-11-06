<?php

class Monitoring_model extends CI_Model {
       
    /*function tampil_kendaraan()
    {
		$this->db->from('VIEW_MONITORING');
        return $this->db->get();        
    } */
	
	function tampil_kendaraan()
    {
		$this->db->from('VIEW_DASHBOARD');
        return $this->db->get();        
    }
	
	// function tampil_kendaraan_jkt()
    // {	       
		// $this->db->from('VIEW_DASHBOARD');
		// $this->db->where('ID_LOKASI',6);
        // return $this->db->get();
    // }
}
?>