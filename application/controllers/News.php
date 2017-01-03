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

	private function get_article_item($page_index=1, $cato_id = 1, $base_link_url = '/news/'){
		if (!is_numeric($page_index) || intval($page_index) < 0) {
			show_404();
		}
		$page_index = intval($page_index);
		$this->load->library('pager');
		$this->load->model('m_article');
		//加载配置文件
		$page_config = $this->config->item('pager');
		
		//设置分页总数	
		$row = $this->get_total_row($cato_id);
		if (!$row) {
			redirect('/404');
		}
		$page_config['total_row'] = $row;
		$page_config['base_link_url'] = $base_link_url;
		//查询数据
		$this->data['news'] = $this->m_article->get_article_by_time($cato_id, $page_index-1, $page_config['page_size']);
		if (!$this->data['news']) {
			redirect('/404');
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
		$this->get_article_item($page_index, 1);
		//设置title
		$this->data['title'] = $this->config->item('news_title').$this->config->item('title');
		//设置页面中的title
		$this->data['news_title'] = $this->config->item('news_title');
				
		$this->load->view('news', $this->data);
	}

	/**
	 * 获取行业新闻
	 * @param  integer $page_index 当前页码
	 * @return 加载新闻页面
	 */
	public function other($page_index = 1)
	{
		//设置title
		$this->data['title'] = $this->config->item('news_other_title').$this->config->item('title');
		//设置页面中的title
		$this->data['news_title'] = $this->config->item('news_other_title');
		$this->get_article_item($page_index, 2, '/news/other/');
		$this->load->view('news', $this->data);
	}

	/**
	 * 获取获取员工风采数据
	 * @param  integer $page_index 当前页码
	 * @return 加载员工风采页面
	 */
	public function staff($groupname='groups', $page_index = 1)
	{
		//设置title
		$this->data['title'] = $this->config->item('staff_title').$this->config->item('title');
		$this->load->library('pager');
		$this->load->model('m_commen');
		//加载配置文件
		$page_config = $this->config->item('pager');
		$this->data['staffgroups']['code'] = 0;
		$this->data['staffgroups']['t'] = $groupname;
		$this->data['staffgroups']['msg'] = '';
		$this->data['staffgroups']['item'] = [];
		if ($groupname == 'groups') {
			if(!preg_match("/^\d+$/", $page_index)){
				redirect('/404');
			}
			$this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
			$total_row = $this->cache->get('staffgroups_total_row');
			if (!$total_row) {
				$total_row = $this->m_commen->get_groups_total_row();
				if ($total_row > 0 and $this->cache->save('staffgroups_total_row', $total_row, 300)) {
			    	$page_config['total_row'] = $total_row;
			    }
			}else{
				$page_config['total_row'] = $total_row;
			}			
			$page_config['base_link_url'] = '/news/staff/'.$groupname.'/';
			//设置当前页码
			$page_config['cur_page'] = $page_index;
			$page_config['page_size'] = 9;
			//获取分页组件
			$this->data['pagination'] = $this->pager->create($page_config);
			$this->data['staffgroups']['item'] = $this->m_commen->get_gallerys($page_index-1, $page_config['page_size']);
		}else{
			if(!preg_match("/^group_\d+$/", $groupname)){
				redirect('/404');
			}
			$group_id = substr($groupname, strripos($groupname, '_')+1);
			$groups = $this->m_commen->get_gallery_by_groupid($group_id);
			
			if (isset($groups)) {
				$this->data['staffgroups']['title'] = $groups->name;
				$this->data['staffgroups']['item'] = json_decode($groups->img_path);	
			}
		}
		if (!$this->data['staffgroups']['item']) {
			$this->data['staffgroups']['code'] = 1;
			$this->data['staffgroups']['msg'] = '<h4 class="text-center">暂无数据</h4>';
		}
		$this->load->view('staff', $this->data);
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
			redirect('/404');
		}
		$this->data['article']['other'] =pre_next_format($this->m_article->get_article_title($id), $id);
		//设置页面中的title
		
		$this->data['article_title'] = $this->config->item('news_title');
		$this->data['title'] = $this->data['article']['title'].$this->config->item('title');
		
		$this->load->view('article', $this->data);
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