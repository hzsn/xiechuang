<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cons');
		$this->load->helper('util');
		$this->load->model('m_commen');
		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('title');
	}

	/**
	 * 加载首页
	 * @return 加载首页
	 */
	public function index()
	{
		//缓存首页页面
		$this->output->cache(1);
		//获取轮播数据
		$this->data['carousel'] = $this->m_commen->get_carousels();

		$this->load->model('m_article');
		//获取首页显示的最新资讯
		$this->data['news'] = news_format($this->m_article->get_article_by_time(1, 0, 3));
		//获取经营业务的数据
		$this->data['business'] = get_business();
		//获取公司简介的数据
		$this->data['brief'] = get_brief_intr();
		//加载首页面
		$this->load->view('index', $this->data);
	}
	
	/**
	 * 加载团队页面
	 * @return 加载的团队介绍的页面
	 */
	public function team()
	{
		$this->data['title'] = $this->config->item('team_title').$this->config->item('title');
		$this->data['team_title'] = $this->config->item('team_title');
		$this->load->view('team', $this->data);
	}

	public function aboutxc($value='')
	{
		//缓存首页页面
		$this->output->cache(1);
		$this->data['title'] = $this->config->item('aboutxc_title').$this->config->item('title');
		$this->data['aboutxc_title']  = $this->config->item('aboutxc_title');
		$this->data['cooperator']['item'] = $this->m_commen->get_cooperators();
		$this->load->view('aboutxc', $this->data);
	}

	/**
	 * 加载联系我们页面
	 */
	public function contact()
	{
		//缓存首页页面
		$this->output->cache(1);
		$this->data['title'] = $this->config->item('contact_title').$this->config->item('title');
		$this->data['contact_title']  = $this->config->item('contact_title');
		//查询中心的信息
		$this->data['cangkus'] = $this->m_commen->get_cangkus();
		$this->load->view('contact', $this->data);	
	}

	public function joinus($value='')
	{
		$this->data['title'] = $this->config->item('joinus_title').$this->config->item('title');
		$this->data['joinus_title']  = $this->config->item('joinus_title');
		$this->load->view('joinus', $this->data);	
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

	/**
	 * 测试函数（可删除）
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function test($value='')
	{
		$this->load->view('test', array('title'=>'测试页面'));
		// $this->load->model('m_commen');
		// $this->data['carousel'] = $this->m_commen->get_carousels();

		// $this->data['cooperator']['title'] = $this->config->item('cooperator_title');
		// $this->data['cooperator']['item'] = $this->m_commen->get_cooperators();

		// $this->load->model('m_article');
		// $this->data['news'] = news_format($this->m_article->get_article_by_time(0, 3));
		
		// $this->data['business'] = get_business();
		// $this->data['brief'] = get_brief_intr();
		// $this->load->view('index_old', $this->data);
	}
}
