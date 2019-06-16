<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Suppliermodel
	 @author IT-PJBS
	 
	 Model untuk Supplier dan Detail_Contact_Person
  */
  
  class Suppliermodel extends CI_Model
  {
     function get_all_supplier()
	 {
        $this->db->from('VIEW_SUPPLIER');
        return $this->db->get();		
	 }
	 // End of function get_all_supplier
	 
	 function insert_data_supplier($data)
	 {
	   $this->db->insert('SUPPLIER', $data);
	 }
	 //End of function insert_data_supplier
	 
	 function get_supplier_by_id($id)
	 {
	   $this->db->where('ID_SUPPLIER', $id);
	   return $this->db->get('SUPPLIER');
	 }
	 //End of function get_supplier_by_id
	 
	 function update_data_supplier($data, $id)
	 {
	   $this->db->where('ID_SUPPLIER', $id);
	   $this->db->update('SUPPLIER', $data);
	 }
	 //End of function update_data_supplier
	 
	 function delete_supplier($id)
	 {
	   $this->db->where('ID_SUPPLIER', $id);
	   $this->db->delete('SUPPLIER');
	 }//End of function delete_supplier
	 
	 function get_supplier_harian()
	 {
	   $this->db->where('ID_TIPE_SUPPLIER', 1);
	   return $this->db->get('SUPPLIER');
	 }
	 //End of function get_supplier_harian
	 
	 //------------------ Model untuk DETAIL_CONTACT_PERSON ----------------
	 
	 function get_all_detail_cp()
	 {
	    $this->db->from('VIEW_DETAIL_CP_SUPPLIER');		
		return $this->db->get();
	 }
	 //End of function get_all_detail_cp
	 
	 function insert_data_detail_cp($data)
	 {
	   $this->db->insert('DETAIL_CONTACT_PERSON', $data);
	 }
	 //End of function insert_data_detail_cp
	 
	 function get_detail_cp_by_id($id)
	 {
	   $this->db->where('ID_DETAIL_CONTACT_PERSON', $id);
	   return $this->db->get('DETAIL_CONTACT_PERSON');
	 }
	 //End of function get_detail_cp_by_id
	 
	 function update_data_detail_cp($data, $id)
	 {
	   $this->db->where('ID_DETAIL_CONTACT_PERSON', $id);
	   $this->db->update('DETAIL_CONTACT_PERSON', $data);
	 }
	 //End of function update_data_detail_cp
	 
	 function delete_detail_cp($id)
	 {
	    $this->db->where('ID_DETAIL_CONTACT_PERSON', $id);
		$this->db->delete('DETAIL_CONTACT_PERSON');
	 }
	 //End of function delete_detail_cp
	 
	 //----------------------------
	 
	 function get_status_supplier()
	 {
	    $this->db->from('STATUS_SUPPLIER');		
		return $this->db->get();
	 }
	 //End of function get_status_supplier
	 
	 function get_tipe_supplier()
	 {
	    $this->db->from('TIPE_SUPPLIER');		
		return $this->db->get();
	 }
	 //End of function get_tipe_supplier
  }
  //End of class Suppliermodel
  
  /**
    End of file: suppliermodel.php
	Location: ./application/models/suppliermodel.php
  */