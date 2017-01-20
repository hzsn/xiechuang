<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 	
*/
class M_user extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_user_by_email($useremail='')
	{
		return $this->db->get_where('xc_user', array('useremail' => $useremail))->row();
	}
}