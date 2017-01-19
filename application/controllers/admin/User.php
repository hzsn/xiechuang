<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('/admin/login');
	}

	public function login()
	{
		$this->load->view('/admin/login');
	}

	public function do_login()
	{
		$this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]',
            array(
            	'required' => 'You must provide a %s.',
            	'min_length' => '请输入6~12位密码',
            	'max_length' => '请输入6~12位密码',
            	)
        );
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('useremail', 'Email', 'trim|required|valid_email', array('valid_email' =>'账号格式不正确'));
        $this->form_validation->set_rules('captchaValue','captchaValue','callback_captchaValue_check');

        $data['code'] = 0;
        $data['msg'] = '';
        if ($this->form_validation->run() == FALSE)
        {
        	$data['code'] = 1;
        	$data['msg'] = '数据验证错误';
        	$data['error'] = array(
        		'useremail'=>form_error('useremail'),
        		'password'=>form_error('password'),
                'captchaValue'=>form_error('captchaValue')
        		);
        	echo(json_encode($data));
        }
        else
        {
        	$data['code'] = 0;
        	$data['msg'] = '登录成功';
            $this->session->profile = $this->input->post('useremail');
            $data['profile'] = $this->session->profile;
        	echo(json_encode($data));
        }
	}

    public function logout()
    {
        if (isset($_SESSION['profile'])) {
            unset($_SESSION['profile']);
            redirect('/admin/user/login');
        }
    }

    public function get_code(){
      $this->load->library('captcha');
      $code = $this->captcha->getCaptcha();
      $this->session->set_flashdata('code', $code);
      $this->captcha->showImg();
     }

     public function captchaValue_check($str){
        if ($str != $this->session->flashdata('code')) {
            $this->form_validation->set_message('captchaValue_check', '验证码错误');
            return false;
        }
        return true;
     }
}