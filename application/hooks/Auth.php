<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 权限控制类
*/
class Auth
{
	protected $CI;
	protected $allowed_url = ['/get_code/'];

	public function __construct()
	{
		$this->CI =& get_instance();
	}



	public function login($value='')
	{
		if (preg_match('/admin/', $_SERVER['REQUEST_URI'])) {
			
			foreach ($this->allowed_url as $key => $val)
			{
				if (preg_match($val, $_SERVER['REQUEST_URI']))
				{
					return;
				}
			}

			if (!isset($this->CI->session->profile)) {
				if (!($_SERVER['REQUEST_METHOD'] == "POST" && preg_match('/\/do_login/', $_SERVER['REQUEST_URI'])) && !preg_match('/\/login/', $_SERVER['REQUEST_URI'])) {
					redirect('/admin/user/login');
				}
			}else{
				if (($_SERVER['REQUEST_METHOD'] == "POST" && preg_match('/\/do_login/', $_SERVER['REQUEST_URI'])) ||preg_match('/\/login/', $_SERVER['REQUEST_URI'])) {
					redirect('/admin');
				}
			}
		}
	}
}