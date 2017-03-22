<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 		
*/
class News extends CI_Controller
{
	private $data;

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('util');
		$this->data['title'] = $this->config->item('title');
	}

	private function get_articles($value='')
	{
		$this->load->model('m_article');

	}

	public function index($page_index=1)
	{
		$this->load->model('m_article');
		if(!preg_match("/^\d+$/", $page_index)){
				$page_index = 1;
		}
		$page_size = 10;
		$this->data['article'] = $this->m_article->get_articles_by_ts($page_index);
		if(!isset($_SESSION['article_total_count'])){
			$_SESSION['article_total_count'] = $this->m_article->get_article_count('', 1);
		}
		$this->data['article_total_count'] = $_SESSION['article_total_count']%$page_size ? (int)$_SESSION['article_total_count']/$page_size : (int)$_SESSION['article_total_count']/$page_size+1;
		$this->load->view('admin/news', $this->data);
	}

	public function edit($article_id = ''){
		echo 'server';
	}	
}