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
		$this->load->database('test');
	}
	/**
	 * 查询轮播图片
	 * @param  string
	 * @return [type]
	 */
	public function get_carousels($size = '4')
	{
		$query = $this->db->get_where('xc_carousel', array('status' => 0), 0, $size);
		return $query->result_array();
	}

	/**
	 * 查询合作伙伴
	 * @return [type] [description]
	 */
	public function get_cooperators()
	{
		$query = $this->db->get_where('xc_cooperator', array('status' => 0));
		return $query->result_array();
	}
}