<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('util');
		$this->load->model('m_navbar');
		$this->data['navbar'] = navbar_format($this->m_navbar->get_navbars());
		// $this->data['title'] = '杭州协创实业有限公司';
	}	

	public function index($page_index = 1)
	{
		$this->load->library('pager');
		$this->load->model('m_article');
		$page_config = $this->config->item('pager');
		$this->data['news'] = $this->m_article->get_article_by_time('0', $page_index-1, $page_config['page_size']);
		$this->data['title'] = $this->config->item('news_title').$this->config->item('title');
		
		$page_config['total_row'] = $this->m_article->get_article_count();
		
		$page_config['cur_page'] = $page_index;
		$this->data['pagination'] = $this->pager->create($page_config);

		$this->load->view('news', $this->data);
	}

	public function cache_total_row($total_row)
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		if ( ! $article_total_row = $this->cache->get('article_total_row'))
		{
		    $article_total_row = $total_row;
		    $this->cache->save('article_total_row', $article_total_row, 600);
		}
	}

	public function article($id='1')
	{
		if (!is_numeric($id)) {
			show_404();
			return;
		}
		if (intval($id) < 0) {
			show_404();
			return;	
		}
		$id = intval($id);
		$this->load->model('m_article');
		$this->data['article'] = $this->m_article->get_article_by_id($id);

		if (!isset($this->data['article'])) {
			show_404();
			return;		
		}
		$this->data['article']['other'] =pre_next_format($this->m_article->get_article_title($id), $id);
		
		$this->data['title'] = $this->data['article']['title'].'--'.$this->config->item('title');
		$this->load->view('article', $this->data);
	}
}