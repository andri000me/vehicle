<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

    <div>
    	     <div id="content_pjbs">
        	     <div class="content_pjbs">
            	
                     <div class="sprtr_1"></div>
					 
					 Selamat datang, <?php echo $this->session->userdata('nama'); ?>
                     <br/>
                     Ini adalah menu 'Assigning' untuk Admin.
                     <br/><br/><br/><br/>
					 
					 <?php
					   $this->load->model('linkedlist');
					   
					   $listSopir = new Linkedlist();
					   
					   foreach($list_sopir->result() as $row)
					   {
					     echo $row->ID_SOPIR.' '.$row->NAMA.'<br/>';
						 $listSopir->insertLast($row->ID_SOPIR);
					   }
					   
					   $count = $listSopir->totalNodes();
					   echo $count.'<br/><br/>';
					   
					   $first = $listSopir->deleteFirst();
					   $key = $listSopir->find('3');
					   $listSopir->deleteNode('3');
					   $last = $listSopir->deleteLast();
					   echo $first->data.' - '.$last->data.'<br/>';
					   
					   $listData = $listSopir->readList();
					   foreach($listData as $data)
					      echo $data.'<br/>';
						 
					   echo '<br/><br/>';
					   
					   $listKendaraan = new LinkedList();
					   
					   foreach($list_kendaraan->result() as $row)
					   {
					     echo $row->ID_KENDARAAN.' '.$row->NO_POLISI.'<br/>';
						 $listKendaraan->insertLast($row->ID_KENDARAAN);
					   }
					   
					   $count2 = $listKendaraan->totalNodes();
					   echo $count2;
					 
					 ?>
					 <br/><br/>
					 
                     <?php echo anchor('home/logout', 'Logout'); ?>
					 
				 </div> <!-- End of div class content_pjbs -->
		    </div> <!-- End of div id content_pjbs -->
	</div>
		 
		 
