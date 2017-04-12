<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 权限控制类
*/
class Auth
{
	protected $CI;
	protected $allowed_url = ['/get_code/'];
	protected $only_post = ['/file/'];

	public function __construct()
	{
		$this->CI =& get_instance();
	}



	public function login($value='')
	{
		//判断是否进入后台页面
		if (preg_match('/admin/', $_SERVER['REQUEST_URI'])) {
			//不拦截允许的uri
			foreach ($this->allowed_url as $key => $val)
			{
				if (preg_match($val, $_SERVER['REQUEST_URI']))
				{
					return;
				}
			}
			//判断是否登录
			if (!isset($this->CI->session->profile)) {
				if (!($_SERVER['REQUEST_METHOD'] == "POST" && preg_match('/\/do_login/', $_SERVER['REQUEST_URI'])) && !preg_match('/\/login/', $_SERVER['REQUEST_URI'])) {
					redirect(site_url('/admin/user/login'));
				}
			}else{
				if (($_SERVER['REQUEST_METHOD'] == "POST" && preg_match('/\/do_login/', $_SERVER['REQUEST_URI'])) ||preg_match('/\/login/', $_SERVER['REQUEST_URI'])) {
					redirect(site_url('/admin'));
				}
				//只允许post提交
				foreach ($this->only_post as $key => $value) {
					if(preg_match($value, $_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_METHOD'] != "POST"){
						redirect(site_url('/admin'));
					}	
				}
				
			}


		}
	}
}