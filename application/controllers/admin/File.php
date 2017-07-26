<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 上传类
*/
class File extends CI_Controller
{
	private $dir_path = './static/upload/';
    private $father_dir = '';
	private $sub_dir = [
        //员工相册的图片路径
		'gallery'=>'gallery/',
        //系统banner的图片路径
        'banner'=>'banner/',
        //系统基本信息所需的图片路径
        'commen'=>'commen/',
        //合作者，即服务品牌的图片路径
        'cooperator'=>'cooperator/',
        //新闻的图片路径
        'new'=>'new/',
        //其他的的图片路径
        'other'=>'other/',
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
        $this->father_dir = $filename.'/';
		return $dir_path.$filename;
	}

    public function upload($type='other')
    {
        $data['code'] = 1;
        $data['msg'] = '上传失败';

        if (!array_key_exists($type, $this->sub_dir)) {
            $data['obj']='上传路径错误, type = '.$type;
            echo(json_encode(($data)));
            return;
        }
        $config['upload_path']      = $this->get_dir($this->dir_path.$this->sub_dir[$type]);
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['file_name']        = date('YmdHis').rand(1000,9999);
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $data['obj'] = $error;
            echo(json_encode(($data)));
        }
        else
        {
            $data['code'] = 0;
            $data['msg'] = '上传成功';
            $data['obj']=[
                'file_name'=>$this->father_dir.$this->upload->data('file_name'),
                'client_name'=>$this->upload->data('client_name'),
            ];
            echo(json_encode($data));
        }
    }
}