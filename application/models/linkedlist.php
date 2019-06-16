<?php 

/**
  Title: Single linked list
  Description: Implementasi single linked list di PHP
*/

class ListNode
{
   public $data;
   public $next;
   
   function __construct($data)
   {
      $this->data = $data;
	  $this->next = NULL;
   }
   // End of constructor
   
   function readNode()
   {
      return $this->data;
   }
   // End of function readNode
}
// End of class ListNode

class LinkedList
{
   private $firstNode;  
   private $lastNode;   
   private $count;      
   
   function __construct()
   {
      $this->firstNode = NULL;
	  $this->lasNode = NULL;
	  $this->count = 0;
   }
   // End of constructor
   
   public function isEmpty()
   {
     return ($this->firsNode == NULL);
   }
   // End of function isEmpty
   
   public function insertFirst($data)
   {
     $link = new ListNode($data);
	 $link->next = $this->firstNode;
	 $this->firstNode = &$link;
	 
	 if($this->lastNode == NULL)
	   $this->lastNode = &$link;
	   
	 $this->count++;
   }
   // End of function insertFirst
   
   public function insertLast($data)
   {
      if($this->firstNode != NULL)
	  {
	    $link  = new ListNode($data);
        $this->lastNode->next = $link;
		
		$this->lastNode = &$link;
		$this->count++;
	  } // End of if
	  else
	    $this->insertFirst($data);
   }
   // End of function insertLast
   
   public function deleteFirst()
   {
      $temp = $this->firstNode;
	  $this->firstNode = $this->firstNode->next;
	  
	  if($this->firstNode != NULL)
	     $this->count--;
	  
	  return $temp;
   }
   // End of function deleteFirst
   
   public function deleteLast()
   {
      if($this->firstNode != NULL)
	  {
	     if($this->firstNode->next == NULL)
		 {
		    $temp = $this->firstNode;
			
		    $this->firstNode = NULL;
			$this->lastNode = NULL;
			$this->count--;
			
			return $temp;
		 } // End of if
		 else
		 {
		    $previousNode = $this->firstNode;
			$currentNode = $this->firstNode->next;
			
			while($currentNode->next != NULL)
			{
			   $previousNode = $currentNode;
			   $currentNode = $currentNode->next;
			} // End of while
			
			$previousNode->next = NULL;
			$this->lastNode = $previousNode;
			$this->count--;
			
			return $currentNode;
		 } // End of else
	    
	  } // End of if
	  
   }
   // End of function deleteLast
   
   public function deleteNode($key)
   {
      $current = $this->firstNode;
	  $previous = $this->firstNode;
	  
	  while($current->data != $key)
	  {
	     if($current->next == NULL)
		    return NULL;
		else
		{
		   $previous = $current;
		   $current = $current->next;
		} // End of else
		
		if($current == $this->firstNode)
		{
		   if($this->count == 1)
		      $this->lastNode = $this->firstNode;
		   
		   $this->firstNode = $this->firstNode->next;
		} // End of if
		else
		{
		   if($this->lastNode == $current)
		      $this->lastNode = $previous;
		   
		   $previous->next = $current->next;
		} // End of else
		 
	  } // End of while
	  $this->count--;
   }
   // End of function deleteNode
   
   public function find($key)
   {
      $current = $this->firstNode;
	  
	  while($current->data != NULL)
	  {
	     if($current->next == NULL)
		    return NULL;
		  else
		    $current = $current->next;
	  } // End of while
	  
	  return $current;
   }
   // End of function find
   
   public function readNode($nodePos)
   {
      if($nodePos <= $this->count)
	  {
	     $current = $this->firstNode;
		 $pos = 1;
		 
		 while($pos != $nodePos)
		 {
		    if($current->next == NULL)
			   return NULL;
			else
			   $current = $current->next;
			   
			$pos++;
		 } //End of while
		 
		 return $current->data;
	  } // End of if
	  else
	    return NULL;
	  
   }
   // End of function readNode
   
   public function totalNodes()
   {
      return $this->count;
   } 
   // End of function totalNodes
   
   public function readList()
   {
      $listData = array();
	  $current = $this->firstNode;
	  
	  while($current != NULL)
	  {
	     array_push($listData, $current->data);
		 $current = $current->next;
	  } // End of while
	  
	  return $listData;
   }
   // End of function readList
   
   public function reverseList()
   {
      if($this->firstNode != NULL)
	  {
	     if($this->firstNode->next != NULL)
		 {
		    $current = $this->firstNode;
		    $new = NULL;
		 
			 while($current != NULL)
			 { 
				$temp = $current->next;
				$current->next = $new;
				$new = $current;
				$current = $temp;
			 } // End of while
			 
			 $this->firstNode = $new;
		 } // End of if
		 
	  } // End of if
	  
   }
   // End of function reverseList
   
}
// End of class Linkedlist

?>