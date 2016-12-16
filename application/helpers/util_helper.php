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
    function cache_navbar(){
        $CI =& get_instance();

        $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $navbar = $CI->cache->get('navbar');
        if ($navbar) {
            return $navbar;
        }else{
            $CI->load->model('m_navbar');
            $navbar = navbar_format($CI->m_navbar->get_navbars());
            if ($navbar) {
                $CI->cache->save('navbar', $navbar, 300);    
            }
        }
        return $navbar;
    }
}

if (!function_exists('navbar_format')) {
    /**
     * @param  array 导航条中的菜单数组
     * @return array 格式化后的菜单数组
     *
     * subNavBar    子菜单数组
     */
    function navbar_format(array $array)
    {
        if (!is_array($array) || empty($array)) {
            return [];
        }
        $szPNavbar = [];
        $szCNavbar = [];
         foreach ($array as $value) {
            if ($value['pid'] == 0) {
                $value['subNavBar'] = [];
                array_push($szPNavbar, $value);
            }else{
                array_push($szCNavbar, $value);
            }
        }
        
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
