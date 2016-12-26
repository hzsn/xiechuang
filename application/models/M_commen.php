<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_commen extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 查询轮播图片
	 * @param  integer $size 查询轮播图片的份数，默认4份
	 * @return array 返回数组数据，查询失败返回为空
	 */
	public function get_carousels($size = 4)
	{
		$query = $this->db->get_where('xc_carousel', array('status' => 0), 0, $size);
		return $query->result_array();
	}

	/**
	 * 查询合作伙伴
	 * @return array 返回查询结果
	 */
	public function get_cooperators()
	{
		$query = $this->db->get_where('xc_cooperator', array('status' => 0));
		return $query->result_array();
	}

	/**
	 * 查询中心库的信息
	 * @return arrary 返回查询结果，若无数据则返回空
	 */
	public function get_cangkus()
	{
		$query = $this->db->get_where('xc_cangku', array('status' => 0));
		return $query->result_array();	
	}

}