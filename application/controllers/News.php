<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('util');
		// $this->load->model('m_navbar');
		// $this->data['navbar'] = navbar_format($this->m_navbar->get_navbars());
		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('title');
	}	

	/**
	 * 获取公司咨询信息
	 * @param  integer $page_index 当前页码
	 * 
	 */
	public function index($page_index = 1)
	{
		$this->load->library('pager');
		$this->load->model('m_article');
		//加载配置文件
		$page_config = $this->config->item('pager');
		//设置title
		$this->data['title'] = $this->config->item('news_title').$this->config->item('title');
		//设置页面中的title
		$this->data['news_title'] = $this->config->item('news_title');
		//设置分页总数		
		$page_config['total_row'] = $this->m_article->get_article_count();
		$row = $this->get_total_row();
		$this->data['code'] = '0';
		if (!$row) {
			redirect('/404');
		}
		//查询数据
		$this->data['news'] = $this->m_article->get_article_by_time('0', $page_index-1, $page_config['page_size']);
		
		//设置当前页码
		$page_config['cur_page'] = $page_index;
		//获取分页组件
		$this->data['pagination'] = $this->pager->create($page_config);

		$this->load->view('news', $this->data);
	}

	

	public function other($page_index = 1)
	{
		show_404();
	}

	/**
	 * 获取新闻总记录数
	 * @return [int] [返回新闻总记录数]
	 */
	public function get_total_row()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$return = 0;
		$article_total_row = $this->cache->get('article_total_row');
		//缓存总记录数
		if ( !$article_total_row )
		{
			$this->load->model('m_article');
		    $article_total_row = $this->m_article->get_article_count();
		    if ($article_total_row > 0 and $this->cache->save('article_total_row', $article_total_row, 300)) {
		    	$return = $article_total_row;
		    }
		}else{
			$this->cache->delete('article_total_row');
			$return = $article_total_row;
		}
		return $return;
	}

	public function article($id='1')
	{
		if (!is_numeric($id) || intval($id) < 0) {
			redirect('/404');
		}
		$id = intval($id);
		$this->load->model('m_article');
		$this->data['article'] = $this->m_article->get_article_by_id($id);

		if (!isset($this->data['article'])) {
			redirect('/404');
		}
		$this->data['article']['other'] =pre_next_format($this->m_article->get_article_title($id), $id);
		//设置页面中的title
		
		$this->data['article_title'] = $this->config->item('news_title');
		$this->data['title'] = $this->data['article']['title'].$this->config->item('title');
		
		$this->load->view('article', $this->data);
	}
}