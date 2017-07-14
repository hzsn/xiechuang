<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('util');
		$this->data['title'] = $this->config->item('title');
	}

	/**
	 * 加载首页
	 * @return 加载首页
	 */
	public function index()
	{
		$this->load->view('admin/index', $this->data);
	}
	public function welcome()
	{
		$this->load->view('admin/welcome', $this->data);
	}

	public function upload($value='')
	{
		$this->load->view('admin/test', $this->data);
	}

	/**
	 * 默认404界面
	 * @return
	 */
	public function error_404()
	{
		$this->data['title'] = $this->config->item('404_title').$this->config->item('title');
		$this->load->view('errors/404', $this->data);
	}

	public function test(){
		$this->load->view('admin/test', $this->data);
	}
}
