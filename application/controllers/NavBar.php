<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class NavBar extends CI_Controller
{
	
	function __construct(argument)
	{
		parent::__construct();
		$this->load->helper('cont');

		var_dump($szNav);
	}
}