<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Navbar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index($value='')
	{
		$this->load->view('welcome_message');
	}
}