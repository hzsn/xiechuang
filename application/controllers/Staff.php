<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{
	private $data;
	function __construct(){
		parent::__construct();
		$this->load->helper('util');
		$this->load->helper('cons');
		$this->data['navbar'] = cache_navbar();
		$this->data['title'] = $this->config->item('title');
	}

	public function group($page_index = 1)
	{
		
	}

	/**
	 * 获取获取员工风采数据
	 * @param  integer $page_index 当前页码
	 * @return 加载员工风采页面
	 */
	public function index($groupname='groups', $page_index = 1)
	{
		//设置title
		$this->data['title'] .= $this->config->item('staff_title');
		$this->load->library('pager');
		//加载配置文件
		$page_config = $this->config->item('pager');
		
		$this->data['staffgroups']['item'] = get_yuangong($groupname);
		$this->data['staffgroups']['code'] = 0;
		$this->data['staffgroups']['t'] = $groupname;
		$this->data['staffgroups']['msg'] = '';
		
		if (!$this->data['staffgroups']['item']) {
			$this->data['staffgroups']['code'] = 1;
			$this->data['staffgroups']['msg'] = '<h4 class="text-center">暂无数据</h4>';	
		}
		

		$page_config['total_row'] = count($this->data['staffgroups']);
		$page_config['base_link_url'] = '/news/staff/'.$groupname.'/';
		//设置当前页码
		$page_config['cur_page'] = $page_index;
		//获取分页组件
		$this->data['pagination'] = $this->pager->create($page_config);
		
		$this->load->view('staff', $this->data);
	}
}