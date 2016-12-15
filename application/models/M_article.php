<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_article extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

/**
 * 根据最新时间排序查询
 * @param  string $flag [标记查询的条件]
 * @param int $size 需要查询的条目数
 * @param int $$index 查询数据的起始数
 * @return array [返回查询结果集]
 */
	public function get_article_by_time($flag='0', $index = 0, $size = 8)
	{
		$this->db->order_by('create_time', 'DESC');
		$this->db->limit($size,$index*$size);

		if ($flag === '0') {
			$this->db->select('id, title, summary, create_time, create_user, pv, item_img');
			$query = $this->db->get_where('xc_article', array('status' => 0));
			return $query->result_array();	
		}elseif ($flag === '1') {
			$this->db->select('id,title,create_time');
			$query = $this->db->get_where('xc_article', array('status' => 0));
			return $query->result_array();
		}
		
	}

	public function get_article_by_id($id=0)
	{
		$query = $this->db->get_where('xc_article', array('status' => 0, 'id'=>$id));
		return $query->row_array();
	}

	public function get_article_title($id=0)
	{
		$this->db->select('id, title');
		$ids = [$id-1, $id+1];
		$this->db->where_in('id', $ids);
		$this->db->where('status', 0);
		$query = $this->db->get('xc_article');
		return $query->result_array();
	}

/**
 * 查询总行数
 * @param  string $value [description]
 * @return [type]        [description]
 */
	public function get_article_count()
	{
		// $this->db->cache_on();
		return $this->db->query('select count(1) as total_row from xc_article where status = 0;')->row()->total_row;
		// return $this->db->count_all('xc_article');
	}
}