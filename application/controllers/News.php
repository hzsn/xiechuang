<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	
	/**
	 * 获取新闻总记录数
	 * @return [int] [返回新闻总记录数]
	 */
	private function get_total_row($cato_id = 1)
	{
		$this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
		$return = 0;
		$article_total_row = $this->cache->get('article_total_cato_'.$cato_id);
		//缓存总记录数
		if ( !$article_total_row )
		{
			$this->load->model('m_article');
		    $article_total_row = $this->m_article->get_article_count($cato_id);
		    if ($article_total_row > 0 and $this->cache->save('article_total_cato_'.$cato_id, $article_total_row, 300)) {
		    	$return = $article_total_row;
		    }
		}else{
			$return = $article_total_row;
		}
		return $return;
	}

	/**
	 * [get_article_item description]
	 * @param  integer $page_index    [description]
	 * @param  integer $cato_id       [description]
	 * @param  string  $base_link_url [description]
	 * @return [type]                 [description]
	 */
	private function get_article_item($page_index=1, $cato_id = 1, $base_link_url = '/news/cato/'){
		if(!preg_match("/^\d+$/", $page_index) || !preg_match("/^\d+$/", $cato_id)){
				redirect(site_url('/404'));
		}
		$page_index = intval($page_index);
		$this->load->library('pager');
		$this->load->model('m_article');
		//加载配置文件
		$page_config = $this->config->item('pager');
		
		//设置分页总数	
		$row = $this->get_total_row($cato_id);
		if (!$row) {
			redirect(site_url('/404'));
		}
		$page_config['total_row'] = $row;
		$page_config['base_link_url'] = site_url($base_link_url.$cato_id);
		//查询数据
		$this->data['news'] = $this->m_article->get_article_by_time($cato_id, $page_index-1, $page_config['page_size']);
		if (!$this->data['news']) {
			redirect(site_url('/404'));
		}
		//设置当前页码
		$page_config['cur_page'] = $page_index;
		//获取分页组件
		$this->data['pagination'] = $this->pager->create($page_config);
	}

	function __construct(){
		parent::__construct();
		$this->load->helper('util');
		$this->load->helper('cons');
		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('title');
		$this->output->set_header('Cache-Control: max-age=120');
	}	

	/**
	 * 获取公司咨询信息
	 * @param  integer $page_index 当前页码
	 * 加载新闻页面
	 */
	public function index($page_index = 1)
	{
		redirect(site_url('/news/cato'));
	}

	/**
	 * 获取资讯信息
	 * @param  integer $cato_id    资讯分类
	 * @param  integer $page_index 当前页码
	 * @return [type]              加载新闻页面
	 */
	public function cato($cato_id = 1, $page_index = 1)
	{
		$this->get_article_item($page_index, $cato_id);
		//设置title
		$this->data['title'] = $this->config->item('news_title').$this->config->item('title');
		//设置页面中的title
		$this->data['news_title'] = $this->config->item('news_title');
		$this->load->view('home/news', $this->data);
	}

	
	/**
	 * 获取文章信息
	 * @param  string $id [文章id]
	 * @return [type]     [description]
	 */
	public function article($id='1')
	{
		if (!is_numeric($id) || intval($id) < 0) {
			show_404();
		}
		$id = intval($id);
		$this->load->model('m_article');
		$this->data['article'] = $this->m_article->get_article_by_id($id);

		if (!isset($this->data['article'])) {
			redirect(site_url('/404'));
		}
		$this->data['article']['other'] =pre_next_format($this->m_article->get_article_title($id), $id);
		//设置页面中的title
		
		$this->data['article_title'] = $this->config->item('news_title');
		$this->data['title'] = $this->data['article']['title'].$this->config->item('title');
		
		$this->load->view('home/article', $this->data);
	}

/**
 * 增加浏览量
 * 获取页面传回的文章id,增加浏览量
 */
	public function add_pv()
	{
		//获取页面传回的文章id
		$id = $_POST['article_id'];
		$data = ['code'=>'0', 'msg'=>'OK'];
		if (!$id || !is_numeric($id) || intval($id) < 0) {
			$data['code'] = '1';
			$data['msg'] = '参数错误';
			echo(json_encode($data));
			return;
		}
		$data['pv'] = 1;
		$this->load->model('m_article');
		if(!$this->m_article->add_pv($id)){
			$data['code'] = '1';
			$data['msg'] = '更新失败';
		}
		echo(json_encode($data));
	}
}