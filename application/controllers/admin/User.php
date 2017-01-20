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
        //设置验证规则
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]',
            array(
            	'required' => 'You must provide a %s.',
            	'min_length' => '请输入6~20位密码',
            	'max_length' => '请输入6~20位密码',
            	)
        );
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('useremail', 'Email', 'trim|required|valid_email', array('valid_email' =>'账号格式不正确'));
        $this->form_validation->set_rules('captchaValue','captchaValue','callback_captchaValue_check');
        //返回数据
        $data['code'] = 0;
        $data['msg'] = '登录成功';
        //先验证数据格式是否正确
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
            return;
        }
        //再与数据库进行验证
        $user = $this->check_user($this->input->post('useremail'), $this->input->post('password'));
        if ($user == false) {
            $data['code'] = 1;
            $data['msg'] = '用户名或密码错误';
            echo(json_encode($data));
            return;   
        }
        //验证通过，则存入session
        $this->session->profile = $user;
        //登录成功后，跳转路径
        $data['url'] = '/admin';
        echo(json_encode($data));
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

    private function check_user($useremail, $password){
        $this->load->model('m_user');
        $user = $this->m_user->get_user_by_email($useremail, $password);
        if (!isset($user) || $user->password != $password) {
            return false;
        }
        return $user;
    }
}