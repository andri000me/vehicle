<?php
	
  echo "User ID : ".$this->session->userdata('user_id')."<br/>";	
  echo "NID : ".$this->session->userdata('nid')."<br/>";
  echo "Nama : ".$this->session->userdata('nama')."<br/>";
  echo "Level ID : ".$this->session->userdata('level')."<br/>";
  echo "Jabatan ID : ".$this->session->userdata('jabatan_id')."<br/>";
  echo "Subdirektorat ID : ".$this->session->userdata('subdit_id')."<br/>";
  echo "LOGIN SUKSES!";


?>
