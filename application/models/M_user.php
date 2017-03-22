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

	public function get_user_by_email($useremail='', $password='')
	{
		$sql = "`useremail`='".$useremail."' AND `password`=PASSWORD('".$password."')";
		$this->db->where($sql);
		return $this->db->get('xc_user')->row();
	}
}