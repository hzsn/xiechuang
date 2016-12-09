<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cons');
		$this->data['szNav'] = get_nav_bar();
		$this->data['title'] = '杭州协创实业有限公司';
	}
	public function index()
	{
		$this->data['carousel'] = get_carousel();
		$this->data['cooperator'] = get_cooperator();
		$this->data['news'] = get_news_item();
		$this->data['business'] = get_business();
		$this->data['brief'] = get_brief_intr();
		$this->load->view('index', $this->data);
	}

	public function test($value='')
	{
		$this->load->view('test');
	}

	public function team($value='')
	{
		$this->data['title'] = '我们的团队--杭州协创实业有限公司';
		$this->load->view('team', $this->data);
	}

	public function news($value='')
	{
		$this->data['title'] = '新闻动态--杭州协创实业有限公司';
		$this->load->view('news', $this->data);	
	}

	public function article($value='1')
	{
		$this->data['title'] = '文章标题--杭州协创实业有限公司';
		$this->load->view('article', $this->data);
	}
}
