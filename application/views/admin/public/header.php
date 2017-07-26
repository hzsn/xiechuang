<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- header -->
<div class="layui-header header header-demo">
  <div class="layui-main">
    <a class="logo" href="<?php echo site_url('/admin/')?>" rel="index">
      <img src="<?php echo $this->config->item('small_logo');?>" alt="协创">
    </a>
    <ul class="layui-nav">
      <li class="layui-nav-item ">
        <a href="<?php echo site_url('/')?>" target="_blank">官网首页</a>
      </li>
      <li class="layui-nav-item">
        <a id="clean-btn" href="javascript:;">清除缓存</a>
      </li>
      <li class="layui-nav-item">
			<a href="<?php echo site_url('/admin/user/logout');?>">
	        <i class="iconfont icon-exit"></i>退出</a>
		</li>
    <span class="layui-nav-bar"></span></ul>
  </div>
</div>
<!-- header end-->
<!-- slide -->
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <div class="user-box">
      	<img src="<?php echo $this->config->item('small_logo');?>" alt="touxiang">
      	<p>您好！<?php echo $this->session->profile->useremail;?>，欢迎登录</p>
      </div>
<ul id="xc-admin-nav" class="layui-nav layui-nav-tree site-demo-nav">
  <li class="layui-nav-item">
  	<a class="layui-item-link" href="<?php echo site_url('/admin');?>" rel="/admin">后台首页</a>
  </li>
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">网站管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd>
        <a class="layui-item-link" href="<?php echo site_url('/admin/page');?>" rel="/admin/page">基本信息</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">资讯管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd class="">
        <a class="layui-item-link" href="<?php echo site_url('/admin/news');?>" rel="/admin/news">资讯列表</a>
      </dd>
      <dd class="">
        <a class="layui-item-link" href="<?php echo site_url('/admin/news#edit');?>">资讯编辑</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">上传管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd>
        <a class="layui-item-link" href="javascript:;">员工风采</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
<span class="layui-nav-bar"></span></ul>
    </div>
  </div>
<!-- slide end -->
<script>
layui.use(['jquery','element'], function(){
  var $ = layui.jquery;
  $(function(){
    var pathname = window.location.pathname.replace(/\/+$/, '');
    $('.layui-item-link').each(function(){
      if ($(this).attr('rel')!='' && pathname == $(this).attr('rel')) {
          $(this).parent().addClass('layui-this');
        }
    });
  });

  $('#clean-btn').on('click', function(){
      $.ajax({
          url:'/admin/page/clean',
          type:'POST',
          error:function(xhr, errMsg){
            console.log(xhr, errMsg);
          },
          success:function(data){
            console.log(data);
          },
        });
      });  
  });

  
</script>
