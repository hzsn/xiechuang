<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Commen extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('cons');
		$this->load->helper('util');
		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('title');
	}

	public function error404($value='')
	{
		$this->data['code'] = '1';
		$this->data['message'] = '没有数据';
		$this->data['title'] = $this->config->item('404_title').$this->config->item('title');
		$this->load->view('errors/404', $this->data);
	}
}