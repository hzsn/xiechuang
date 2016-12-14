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
		$this->load->helper('util');
		$this->load->model('m_navbar');
		$this->data['navbar'] = navbar_format($this->m_navbar->get_navbars());
		$this->data['title'] = $this->config->item('title');
	}

	public function welcome($value='')
	{
		$this->load->view('welcome_message');
	}

	public function index()
	{
		$this->load->helper('url');
		// $this->output->cache(1);
		$this->load->model('m_commen');
		$this->data['carousel'] = $this->m_commen->get_carousels();

		$this->data['cooperator']['title'] = $this->config->item('cooperator_title');
		$this->data['cooperator']['item'] = $this->m_commen->get_cooperators();

		$this->load->model('m_article');
		$this->data['news']['item'] = $this->m_article->get_article_by_time('1');
		$this->data['news']['title'] = $this->config->item('news_title');
		$this->data['business'] = get_business();
		$this->data['brief'] = get_brief_intr();

		$this->load->view('index', $this->data);
	}

	public function test($value='')
	{
		$this->load->model('m_article');
		$this->data['news']['item'] = $this->m_article->get_article_by_time('1');	
		$this->load->view('test', $this->data);
	}

	public function team($value='')
	{
		$this->data['title'] = $this->config->item('team_title').$this->config->item('title');
		$this->load->view('team', $this->data);
	}

	public function news($value='')
	{
		$this->load->model('M_article');
		$this->data['news'] = $this->m_article->get_article_by_time('0');
		$this->data['title'] = $this->config->item('news_stitle').$this->config->item('title');
		$this->load->view('news', $this->data);	
	}

	
}
