<?php

class Monitoring_model extends CI_Model {
       
    /*function tampil_kendaraan()
    {
		$this->db->from('VIEW_MONITORING');
        return $this->db->get();        
    } */
	
	function kendaraan()
    {
		return $this->db->from('KENDARAAN')->count_all_results();
    }
	
	function sopir()
    {
		return $this->db->from('SOPIR')->count_all_results();
    }
	
	function reimburse()
    {
		$Y = date('Y');
		$this->db->select_sum('NOMINAL');
		// $this->db->where(date('Y',strtotime('TGL_PEMBERIAN')), $Y);
		$query = $this->db->get('REIMBURSE')->row();
		return number_format($query->NOMINAL);
		//return $this->db->from('REIMBURSE')->count_all_results();
    }
	
	function request()
    {
		return $this->db->from('REQUEST')->count_all_results();
    }
	
	function pending($stat)
    {
		$this->db->where('STATUS', $stat);
		$this->db->from('VIEW_REQUEST');
        return $this->db->get();        
    }
	
	function profile($id)
    {
		$this->db->where('USERNAME', $id);
		$this->db->from('USERS');
        return $this->db->get();        
    }
	
	function kendaraan_chart($stat)
    {
		$this->db->where('STATUS', $stat);
		return $this->db->from('KENDARAAN')->count_all_results();        
    }
	
}
?>