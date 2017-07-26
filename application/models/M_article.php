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
 * @param  integer $cato_id 文章分类的id
 * @param int $size 需要查询的条目数
 * @param int $$index 查询数据的起始数
 * @return array 返回查询结果集，若无结果，返回空
 */
	public function get_article_by_time($cato_id = 1, $index = 0, $size = 8)
	{
		$this->db->order_by('create_time', 'DESC');
		$this->db->limit($size,$index*$size);
		$this->db->select('id, title, summary, create_time, create_user, pv, item_img');
		$param = [
			'status'=>0
		];
		if (!empty($cato_id)) {
			$param['cato_id'] = $cato_id;
		}
		$query = $this->db->get_where('xc_article', $param);
		return $query->result_array();
	}
	/**
	 * 根据最新时间与状态查询
	 * @return [type] [description]
	 */
	public function get_articles_by_ts($index = 0, $size = 10){
		$this->db->order_by('a.create_time', 'DESC');
		$this->db->order_by('a.status', 'ASC');

		$this->db->limit($size,$index*$size);
		$this->db->join('xc_category as c', 'a.cato_id = c.id', 'left');

		$this->db->select('a.id, a.title, a.pv, a.cato_id, a.status, c.name as cato_name, c.en_name as cato_en_name, a.create_time');
		$query = $this->db->get_where('xc_article as a');
		return $query->result_array();
	}	



	/**
	 * 根据id查询文章
	 * @param  integer $id 文章id
	 * @return arrary 返回文章信息,若查无此文，则返回空    
	 */
	public function get_article_by_id($id=0, $status = 0)
	{
		$query = $this->db->get_where('xc_article', array('status' => $status, 'id'=>$id));
		return $query->row_array();
	}
	/**
	 * 根据id,查询前一条和后一条数据
	 * @param  integer $id [查询id]
	 * @return array      以数组形式返回查询的结果，若没有结果，返回为空；
	 */
	public function get_article_title($id=0)
	{
		$sql = '(select id, title from xc_article where id < '.$id.' and status = 0 order by id desc limit 1)';
		$sql .= 'union all';
		$sql .= '(select id, title from xc_article where id > '.$id.' and status = 0 order by id limit 1);';

		$query = $this->db->query($sql);

		return $query->result_array();
	}

	/**
	 * 返回文章表的纵记录数
	 * @param  integer $cato_id 分类的id
	 * @return integer 返回数据表中的记录数，若无数据，则返回0;
	 */
	public function get_article_count($cato_id, $total=0)
	{
		$total_row = 0;
		if($total == 0){
			$total_row = $this->db->query('select count(1) as total_row from xc_article where status = 0 and cato_id = '.$cato_id.';')->row()->total_row;
		}
		else {
			$total_row = $this->db->query('select count(1) as total_row from xc_article')->row()->total_row;
		}
		return $total_row;
	}

	/**
	 * 新增浏览量
	 * @param int $article_id 文章id
	 */
	public function add_pv($article_id, $num = 1)
	{
		$this->db->set('pv', 'pv+'.$num, FALSE);
		$this->db->where('id', $article_id);
		$this->db->update('xc_article');
		if ($this->db->affected_rows() == 1) {
				return true;
		}

		return  FALSE;

	}
}