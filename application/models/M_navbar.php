<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_navbar extends CI_Model{
	
	function __construct(){
		
	}

	public function get_navbars($value='')
	{	
		$this->db->order_by('sort', 'ASC');
		$query = $this->db->get_where('xc_navbar', array('status' => 0));
		return $query->result_array();

	}

}