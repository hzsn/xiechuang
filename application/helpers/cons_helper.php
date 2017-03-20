<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_nav_bar')) {
	
	function get_nav_bar(){
		$szNav = array(
	        	array('name' => '首页', 'url' => '/', 'rel'=>'/index'),
	        	array('name' => '官网商城', 'url' => 'http://carsociety.cn/', 'target' =>'_blank', 'rel'=>'http://carsociety.cn/'),
	        	array(
	        		'name' => '企业动态',
	        		'url'  => '/news',
	        		'rel'  => '/news',
	        		'subName' => array(
	        			array('name' => '最新动态', 'url' => '/news', 'rel' => '/news'),
	        			array('name' => '行业动态', 'url' => '/news/other', 'rel' => '/news'),
	        			array('name' => '员工风采', 'url' => '/news/employee', 'rel' => '/news'),
	        		)
	        		),
	        	array(
	        		'name' => '关于协创',
	        		'url' => '/aboutxc',
	        		'rel' => '/aboutxc',
	        		'subName' => array(
	        				array('name' => '公司简介','url' => '/aboutxc/', 'rel' => '/aboutxc'),
	        				array('name' => '团队介绍','url' => '/aboutxc/team', 'rel' => '/aboutxc/team'),
	        			)
	        		),
	        	array('name'=>'合作伙伴', 'url' => '/cooperator', 'rel' => '/cooperator'),
	        	array('name'=>'联系我们',
	        			'url' => '/contact',
	        			'rel' => '/contact',
	        			'subName' => array(['name'=> '诚招英才','url'=> '/contact/joinus', 'rel'=> '/contact/joinus']))
	        );
		return $szNav;
	}
}

if (!function_exists('get_cooperator')) {
	function get_cooperator(){
		$data['item'] = [
					['name'=>'海马汽车','img_path'=>'logo-haima.png'],
					['name'=>'奇瑞汽车','img_path'=>'logo-qirui.png'],
					['name'=>'长安铃木','img_path'=>'logo-changanlingmu.png'],
					['name'=>'天津一汽','img_path'=>'logo-tianjinyiqi.png'],
					['name'=>'北汽幻速','img_path'=>'logo-beiqihuansu.png'],
					['name'=>'福田汽车','img_path'=>'logo-futian.png'],
					['name'=>'东风','img_path'=>'logo-dongfeng.png'],
					];
		$data['title'] = '合作伙伴';
		return $data;
	}
}

if (!function_exists('get_brief_intr')) {

	function get_brief_intr(){
		$data['title'] = '公司简介 / About US';
		$data['bg_img'] = '/static/img/DSC_6549_meitu_1.jpg';
		$data['brief_summary'] = '杭州协创实业有限公司是一家以汽车备件仓储管理，物流配送服务，汽车备件信息技术服务为主营业务，辅以整车销售的集团控股公司。
其实际管理和控股多家公司给全国各大主机厂提供专业的区域售后备件仓储与物流配送服务。
公司为各汽车品牌提供专业的汽车售后备件保障服务，有着丰富的汽车备件仓储和物流管理经验。
公司以“诚信、专业、服务、创新”为经营理念。倾力打造个性化服务品牌，为汽车厂家提供全方位、专业化的售后备件服务。';
		
		$data['brief_introduction'] = '<p>杭州协创实业有限公司是一家以汽车备件仓储管理，物流配送服务，汽车备件信息技术服务为主营业务，辅以整车销售的集团控股公司。</p><p>其实际管理和控股多家公司给全国各大主机厂提供专业的区域售后备件仓储与物流配送服务。</p><p>公司为各汽车品牌提供专业的汽车售后备件保障服务，有着丰富的汽车备件仓储和物流管理经验。</p><p>所辐射的省份已有17个，主要服务品牌包括一汽海马、奇瑞汽车、长安铃木、力帆汽车、天津一汽、福田、东风股份等。<br>对全国的汽车市场具有较为扎实的汽车备件仓储及配送服务运作经验。其中所管理的中心库连续多年位居全国服务榜首。<br>公司以“诚信、专业、服务、创新”为经营理念。倾力打造个性化服务品牌，为汽车厂家提供全方位、专业化的售后备件服务。</p><p>我们的使命，用最短的备件供货周期，及时满足顾客需求（高供应率），最大化提升售后服务满意度和优化库存带来的低库存金额，以获得良好的营业收益。<br>杭州协创为您提供：<br>舒适的工作环境：让您在舒适的工作环境中与充满理想的同仁共事，开拓广泛的视野。<br>专业的增值培训：为您提供专业知识培训、拓展培训，职位资格培训<br></p>';
		return $data;
	}
}

if (!function_exists('get_business')) {
	
	function get_business(){
		$data['title'] = '经营业务 / Business';
		$data['content'] = [
			['item_title' => '配件仓储与配送',
			'item_img' => '/static/img/csh_weixin-2.jpg',
			'item_desc' => '配件仓储与配送......................描述语...............'],
			['item_title' => '4S店',
			'item_img' => '/static/img/csh_weixin-2.jpg',
			'item_desc' => '4S店.................描述语.....................'],
			['item_title' => '修理厂',
			'item_img' => '/static/img/csh_weixin-2.jpg',
			'item_desc' => '修理厂.................描述语......................................'],
			['item_title' => '网络销售平台',
			'item_img' => '/static/img/csh_weixin-2.jpg',
			'item_desc' => '网络销售平台..........................................描述语.....................'],
		];
	return $data;
	}

}

