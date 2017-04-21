<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Log Class 记录请求的信息
*/
class XCLog
{
	protected $CI;

	function __construct()
	{
		$this->CI =& get_instance();	
	}

	public function index()
	{
		log_message('xcinfo', $_SERVER['REMOTE_ADDR'].'; '.$_SERVER['REQUEST_URI'].'; HTTP_REFERER='.(array_key_exists('HTTP_REFERER', $_SERVER) ? substr($_SERVER['HTTP_REFERER'], 0, 64) : ''));
	}
}