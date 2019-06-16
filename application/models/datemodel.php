<?php 

  if(!defined('BASEPATH'))
     exit('No direct script access allowed');
	 
  /**
     Class Datemodel
	 @author IT-PJBS
	 
	 Model untuk format tanggal
  */
  
  class Datemodel extends CI_Model
  {
   
   //Fungsi untuk menyesuaikan format tanggal dari datepicker ke Oracle
      function format_tanggal($tanggal)
	  {  
	     $tgl = explode("-", $tanggal);
		 
	     if($tgl[1] == '1')
		    return $tgl[0].'-JAN-'.$tgl[2];
	     else if($tgl[1] == '2')
		    return $tgl[0].'-FEB-'.$tgl[2];
		 else if($tgl[1] == '3')
		    return $tgl[0].'-MAR-'.$tgl[2];
		 else if($tgl[1] == '4')
		    return $tgl[0].'-APR-'.$tgl[2];
		 else if($tgl[1] == '5')
		    return $tgl[0].'-MAY-'.$tgl[2];
		 else if($tgl[1] == '6')
		    return $tgl[0].'-JUN-'.$tgl[2];
		 else if($tgl[1] == '7')
		    return $tgl[0].'-JUL-'.$tgl[2];
		 else if($tgl[1] == '8')
		    return $tgl[0].'-AUG-'.$tgl[2];
		 else if($tgl[1] == '9')
		    return $tgl[0].'-SEP-'.$tgl[2];
		 else if($tgl[1] == '10')
		    return $tgl[0].'-OCT-'.$tgl[2];
	     else if($tgl[1] == '11')
		    return $tgl[0].'-NOV-'.$tgl[2];
		 else if($tgl[1] == '12')
		    return $tgl[0].'-DEC-'.$tgl[2];
	  }
	  //End of function format_tanggal
	 
	 //Fungsi untuk menyesuaikan format tanggal dari Oracle ke datepicker
	 function format_tanggal2($tanggal)
	  {  
	     $tgl = explode("-", $tanggal);
		 
	     if($tgl[1] == 'JAN')
		    return $tgl[0].'-1-'.$tgl[2];
	     else if($tgl[1] == 'FEB')
		    return $tgl[0].'-2-'.$tgl[2];
		 else if($tgl[1] == 'MAR')
		    return $tgl[0].'-3-'.$tgl[2];
		 else if($tgl[1] == 'APR')
		    return $tgl[0].'-4-'.$tgl[2];
		 else if($tgl[1] == 'MAY')
		    return $tgl[0].'-5-'.$tgl[2];
		 else if($tgl[1] == 'JUN')
		    return $tgl[0].'-6-'.$tgl[2];
		 else if($tgl[1] == 'JUL')
		    return $tgl[0].'-7-'.$tgl[2];
		 else if($tgl[1] == 'AUG')
		    return $tgl[0].'-8-'.$tgl[2];
		 else if($tgl[1] == 'SEP')
		    return $tgl[0].'-9-'.$tgl[2];
		 else if($tgl[1] == 'OCT')
		    return $tgl[0].'-10-'.$tgl[2];
	     else if($tgl[1] == 'NOV')
		    return $tgl[0].'-11-'.$tgl[2];
		 else if($tgl[1] == 'DEC')
		    return $tgl[0].'-12-'.$tgl[2];
	  }
	  //End of function format_tanggal2 
	  
  }
  //End of class Datemodel
  
  /**
    End of file: datemodel.php
	Location: ./application/models/datemodel.php
  */