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
	/**
	 * 查询相册的
	 * @return array 返回查询结果，若无数据则返回空
	 */
	public function get_gallerys($index = 1, $size = 6)
	{
		$this->db->limit($size,$index*$size);
		$this->db->select('id, cover_img_path, name');
		return $this->db->get_where('xc_galley_group', array('status' => 0))->result_array();
	}

 	public function get_gallery_by_groupid($groupid)
	{
		$select_array = [
			'id'=>'ID',
			'name'=>''
		];		
		$params = [
			'status'=>0,
			'id'=>$groupid
		];
		$this->db->select(implode(',', array_keys($select_array)));
		$groups = $this->db->get_where('xc_galley_group', $params)->row();
		if (!isset($groups))
		{
		    return [];
		}
		$params = [
			'status'=>0,
			'group_id'=>$groups->id
		];
		$select_array = [
			'id'=>'ID',
			'img_src'=>'src',
			'img_small_src'=>'smallSrc',
			'group_id'=>'groupId'
		];
		$this->db->select(implode(',', array_keys($select_array)));
		$query = $this->db->get_where('xc_galley', $params)->result_array();
		$result_array = [];
		foreach ($query as $key => $value) {
			$sztmp = [];
			foreach ($select_array as $k1 => $v1) {
				$sztmp[$v1] = $value[$k1];
			}
			array_push($result_array, $sztmp);
		}
		return [
			'title'=>$groups->name,
			'item' => $result_array
		];
	}

	public function get_groups_total_row()
	{
		return $this->db->query('select count(1) as total_row from xc_galley_group where status = 0;')->row()->total_row;
	}

	public function get_jobs()
	{
		$params = [
			'status'=>0
		];
		$select_array = [
			'id'=>'ID',
			'name'=>'职位名称',
			'address'=>'工作地点',
			'recruit_count'=>'招聘人数',
			'ability'=>'岗位职能',
			'requirement'=>'职位要求',
			'remark'=>'备注',
			'create_time'=>'发布时间'
		];
		$this->db->select(implode(',', array_keys($select_array)));
		$data = [
			'attr'=>$select_array,
			'jobs'=>$this->db->get_where('xc_job', $params)->result_array()
		];
		return $data;
	}

}