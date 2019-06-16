<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  class Slidermodel extends CI_Model
  {
	 public function get_all_slider()
	 {
	    $this->db->from('SLIDER');
	    return $this->db->get();
	 }	 
	 function insert_data_slider($data)
	 {
	     $this->db->insert('SLIDER',$data);
	 }	 
	 function delete_data_slider($id)
	 {
		 $this->db->where('ID_SLIDER',$id);
   		 $this->db->delete('slider');	 
	 }
	 function get_slider_by_id($id)
	 {
	   $this->db->from('SLIDER');
	   $this->db->where('ID_SLIDER',$id);
	   return $this->db->get();
	 }
	 function update_data_slider($data, $id)
	 {
	   $this->db->where('ID_SLIDER',$id);
	   $this->db->update('SLIDER',$data);
	 }
	 function id_count_slider(){
		$this->db->from('VIEW_SLIDER_COUNT');
		$data = $this->db->get();
		
		$row = $data->row();
		$count = $row->JUMLAH_ID_SLIDER;
		   
		return $count;
		}
  }
