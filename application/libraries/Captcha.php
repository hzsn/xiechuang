<?php

class Captcha
{
    //图片的宽度
    private $width;
    private $height;
    private $codeNum;
    private $code;
    private $im;
    //数字显示的总宽度（数字显示在中心区域）
    private $center_width;

    function __construct($width=171, $height=40, $codeNum=4){
        $this->width = $width;
        $this->height = $height;
        $this->codeNum = $codeNum;
        //center_width的值根据width值而设
        $this->center_width = 100;
    }

    function showImg(){
        //创建图片
        $this->createImg();
        //设置干扰元素
        $this->setDisturb();
        //设置验证码
        $this->setCaptcha();
        //输出图片
        $this->outputImg();
    }

    function getCaptcha(){ 
        $this->createCode();
        return $this->code;
    }

    private function createImg(){
        $this->im = imagecreatetruecolor($this->width, $this->height);
        $bgColor = imagecolorallocate($this->im, 255, 255, 255);
        imagefill($this->im, 0, 0, $bgColor);
    }

    private function setDisturb(){ 
        $area = ($this->width * $this->height) / 20;
        $disturbNum = ($area > 250) ? 250 : $area;
        //加入点干扰
        for ($i = 0; $i < $disturbNum; $i++) {
            $rgb = rand(120, 140);
            $color = imagecolorallocate($this->im, $rgb, $rgb, $rgb);
            imagesetpixel($this->im, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
        }
    }

    private function createCode(){
        $str = "0123456789";

        for ($i = 0; $i < $this->codeNum; $i++) {
            $this->code .= $str{rand(0, strlen($str) - 1)};
        }
    }

    private function setCaptcha(){
        for ($i = 0; $i < $this->codeNum; $i++) {
            $color = imagecolorallocate($this->im, 247, 7, 9);
            $size = rand(floor($this->height), floor($this->height));
            //数字显示的起始点x坐标
            $start_point = floor(($this->width - $this->center_width)/2);
            $x = floor($this->center_width / ($this->codeNum-1)) * $i + $start_point;
            $y = $this->height/2-7;
            imagechar($this->im, $size, $x, $y, $this->code{$i}, $color);
        }
    }

    private function outputImg(){
        if (imagetypes() & IMG_JPG) {
            header('Content-type:image/jpeg');
            imagejpeg($this->im);
        } elseif (imagetypes() & IMG_GIF) {
            header('Content-type: image/gif');
            imagegif($this->im);
        } elseif (imagetype() & IMG_PNG) {
            header('Content-type: image/png');
            imagepng($this->im);
        } else {
            die("Don't support image type!");
        }
    }

}