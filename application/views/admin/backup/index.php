<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
		 
		 <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					    
						<!-- isi dengan table atau tampilan -->
						Ini adalah halaman Home untuk 'Admin'
						<br/><br/>
						
						<?php 
						    
							 echo "User ID : ".$this->session->userdata('user_id')."<br/>";	
							 echo "NID : ".$this->session->userdata('nid')."<br/>";
							 echo "Nama : ".$this->session->userdata('nama')."<br/>";
							 echo "Level ID : ".$this->session->userdata('level')."<br/>";
							 echo "Jabatan ID : ".$this->session->userdata('jabatan_id')."<br/>";
							 echo "Subdirektorat ID : ".$this->session->userdata('subdit_id')."<br/>";
						   
						?>
		 
		             <div class="clear"></div>
                
			         <br><br><br><br>
            
                 </div>
             </div>
         </div>

<br/><br/>
