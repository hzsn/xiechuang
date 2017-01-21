<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 		
*/
class News extends CI_Controller
{
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('util');
		$this->data['title'] = $this->config->item('title');
	}

	public function index($value='')
	{
		$this->load->view('admin/news', $this->data);
	}
}