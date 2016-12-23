<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('dump')) {
    function dump($vars, $label = '', $return = false) {
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }
}

if (!function_exists('pre_next_format')) {
    
    function pre_next_format(array $array, $id){
        $_html = '';
        if (!is_array($array) || empty($array)) {
            $_html;
        }

        if (count($array) == 1) {

            if ($array[0]['id'] > $id) {
                $_class = 'text-right';
                $_title = '<span>下一篇:</span><a href="/article/'.$array[0]['id'].'">'.$array[0]['title'].'</a>';
                $_html = '<div class="col-md-6"><div class="xc-text-wrap text-left"><span>上一篇：无</span></div></div>';
                $_html .= '<div class="col-md-6"><div class="xc-text-wrap text-right">'.$_title.'</div></div>';
            }elseif ($array[0]['id'] < $id) {
                $_class = 'text-right';
                $_title = '<span>上一篇:</span><a href="/article/'.$array[0]['id'].'">'.$array[0]['title'].'</a>';
                $_html = '<div class="col-md-6"><div class="xc-text-wrap text-left">'.$_title.'</div></div>';
                $_html .= '<div class="col-md-6"><div class="xc-text-wrap text-right"><span>下一篇：无</span></div></div>';
            }
            return $_html;
        }elseif (count($array) == 2) {
            foreach ($array  as $key => $value) {
                
                if ($value['id'] > $id) {
                    $_class = 'text-right';
                    $_title = '<span>下一篇:</span><a href="/article/'.$value['id'].'">'.$value['title'].'</a>';
                }elseif ($value['id'] < $id) {
                    $_class = 'text-left';
                    $_title = '<span>上一篇:</span><a href="/article/'.$value['id'].'">'.$value['title'].'</a>';
                }
                $_html .= '<div class="col-md-6"><div class="xc-text-wrap '.$_class.'">'.$_title.'</div></div>';
            }
            return $_html;
        }
        return $_html;
    }
}

if (!function_exists('cache_navbar')) {
    /**
     * 缓存导航栏数据
     * @return array 导航栏数据
     */
    function cache_navbar(){
        $CI =& get_instance();

        $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $navbar = $CI->cache->get('navbar');
        if ($navbar) {
            return $navbar;
        }
        $CI->load->model('m_navbar');
        $navbar = navbar_format($CI->m_navbar->get_navbars());
        if ($navbar) {
            // 缓存时间为5分钟
            $CI->cache->save('navbar', $navbar, 300);    
        }
        return $navbar;
    }
}

if (!function_exists('navbar_format')) {
    /**
     * @param  array 导航条中的目录数组
     * @return array 格式化后的目录数组
     *
     * subNavBar    子目录数组
     */
    function navbar_format(array $array)
    {
        if (!is_array($array) || empty($array)) {
            return [];
        }
        //父目录数组
        $szPNavbar = [];
        //子目录数组
        $szCNavbar = [];
        //遍历目录数组，分离父目录与子目录
        foreach ($array as $value) {
            //父目录
            if ($value['pid'] == 0) {
                //创建子目录数组
                $value['subNavBar'] = [];
                //添加父目录到数组中
                array_push($szPNavbar, $value);
            }else{
                //添加子目录到数组中
                array_push($szCNavbar, $value);
            }
        }
        
        //遍历父目录与子目录
        //将子目录加入父目录的二级目录
        foreach ($szCNavbar as $value) {
            foreach ($szPNavbar as $p_key => $p_value) {
                if ($p_value['id'] == $value['pid']) {
                    array_push($szPNavbar[$p_key]['subNavBar'], $value);
                    break;
                }
            }
        }
        return $szPNavbar;
    }
}

if (!function_exists('news_format')) {
    
    function news_format(array $array){
        $re_arr['code'] =  0;
        if (!is_array($array) || empty($array)) {
            $re_arr['code'] = 1;
            $re_arr['msg'] = '暂无资讯';
            return $re_arr;
        }
        $div = '<div class="col-md-8"><div class="xc-news-i-box xc-news-large"><div class="col-md-6 xc-news-i-img"  style="background-image: url('.$array[0]['item_img'].');"><a class="xc-news-i-title text-right" href="/article/'.$array[0]['id'].'">'.$array[0]['title'].'</a><span class="xc-news-i-date" style="right: 0">'.explode(' ', $array[0]['create_time'])[0].'</span></div><div class="col-md-6 xc-height100"><div class="xc-news-i-content">'.$array[0]['summary'].'</div></div></div>';
        $len = count($array);
        if ($len == 1) {
            $div .= '</div>';
        }
        if ($len == 2) {
            $div .= '<div class="xc-news-i-box xc-news-large"><div class="col-md-6 xc-height100"><div class="xc-news-i-content">'.$array[1]['summary'].'</div></div><div class="col-md-6 xc-news-i-img"  style="background-image: url('.$array[1]['item_img'].');"><a class="xc-news-i-title text-right" href="/article/'.$array[1]['id'].'">'.$array[1]['title'].'</a><span class="xc-news-i-date" style="left: 0">'.explode(' ', $array[1]['create_time'])[0].'</span></div></div>';
            $div .= '</div>';
        }
        if ($len > 2) {
             $div .= '<div class="xc-news-i-box xc-news-large"><div class="col-md-6 xc-height100"><div class="xc-news-i-content">'.$array[1]['summary'].'</div></div><div class="col-md-6 xc-news-i-img"  style="background-image: url('.$array[1]['item_img'].');"><a class="xc-news-i-title text-right" href="/article/'.$array[1]['id'].'">'.$array[1]['title'].'</a><span class="xc-news-i-date" style="left: 0">'.explode(' ', $array[1]['create_time'])[0].'</span></div></div>';
            $div .= '</div>';
           $div .= '<div class="col-md-4 xc-news-i-box" style="padding-left: 0px;"><div class="xc-news-i-img" style="background-image: url('.$array[2]['item_img'].');height: 157.5px;"><a class="xc-news-i-title text-right" href="/article/'.$array[2]['id'].'">'.$array[2]['title'].'</a><span class="xc-news-i-date" style="right: 0">'.explode(' ', $array[2]['create_time'])[0].'</span>
                </div><div class="xc-height100 xc-news-small">
                   <div class="xc-news-i-content">'.$array[0]['summary'].'</div></div></div>';
        }
        $re_arr['item'] = $div;
        return $re_arr;
    }
}
