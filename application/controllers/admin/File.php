<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 上传类
*/
class File extends CI_Controller
{
	private $dir_path = './static/upload/';
	private $sub_dir = [
		'gallery'=>'gallery/'
	];
	function __construct()
	{
		parent::__construct();
	}

	private function get_dir($dir_path){
		$filename = date('Ymd');
		
		if(!file_exists($dir_path.$filename)){
			mkdir($dir_path.$filename, 0755);
		}
		return $dir_path.$filename;
	}

	public function upload()
    {
        $config['upload_path']      = $this->get_dir($this->dir_path.$this->sub_dir['gallery']);
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']		= date('YmdHis').rand(1000,9999);
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $data['code'] = 1;
            $data['msg'] = '上传失败';
            $data['obj'] = '';
            echo(json_encode(($data)));
        }
        else
        {
        	$data['code'] = 0;
        	$data['msg'] = '上传成功';
        	$data['obj'] = [
        		'file_name' => $this->upload->data('file_name'),
        		'client_name' => $this->upload->data('client_name')
        	];
            echo(json_encode($data));
        }
    }
}