<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 员工类
*/
class Staff extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('util');
		$this->load->helper('cons');
		$this->load->library('pager');
		$this->load->model('m_commen');

		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('staff_title').$this->config->item('title');
		$this->output->set_header('Cache-Control: max-age=120');
	}
	private function init(){
		//加载配置文件
		
		$this->data['staffgroups']['code'] = 0;
		$this->data['staffgroups']['type'] = '';
		$this->data['staffgroups']['msg'] = '';
		$this->data['staffgroups']['item'] = [];
	}
	/**
	 * 获取获取员工风采数据
	 * @param  integer $page_index 当前页码
	 * @return 加载员工风采页面
	 */
	public function index($page_index = 1)
	{
		$this->init();
		//加载配置文件
		$page_config = $this->config->item('pager');
		if(!preg_match("/^\d+$/", $page_index)){
				redirect(site_url('/404'));
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
		$page_config['base_link_url'] = site_url('/staff/');
		//设置当前页码
		$page_config['cur_page'] = $page_index;
		$page_config['page_size'] = 9;
		//获取分页组件
		$this->data['pagination'] = $this->pager->create($page_config);
		$this->data['staffgroups']['item'] = $this->m_commen->get_gallerys($page_index-1, $page_config['page_size']);

		if (!$this->data['staffgroups']['item']) {
			$this->data['staffgroups']['code'] = 1;
			$this->data['staffgroups']['msg'] = '<h4 class="text-center">暂无数据</h4>';
		}
		$this->data['staffgroups']['type'] = 'groups';
		$this->load->view('home/staff', $this->data);
	}

	public function item($group_id = 1){
		$this->init();
		//加载配置文件
		$page_config = $this->config->item('pager');
		
		if(!preg_match("/^\d+$/", $group_id)){
			redirect(site_url('/404'));
		}
		$groups = $this->m_commen->get_gallery_by_groupid($group_id);
		
		if (isset($groups['item'])) {
			$this->data['staffgroups']['title'] = $groups['title'];
			$this->data['staffgroups']['item'] = $groups['item'];
		}else{
			$this->data['staffgroups']['code'] = 1;
		}
		$this->load->view('home/staff', $this->data);
	}
}