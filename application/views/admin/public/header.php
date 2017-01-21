<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- header -->
<div class="layui-header header header-demo">
  <div class="layui-main">
    <a class="logo" href="/admin/" rel="index">
      <img src="/static/img/logo-small.png" alt="协创">
    </a>
    <ul class="layui-nav">
      <li class="layui-nav-item ">
        <a href="http://hzxcsy.xlgp.xc" target="_blank">官网首页</a>
      </li>
      <li class="layui-nav-item">
        <a href="/demo/">清除缓存</a>
      </li>
      <li class="layui-nav-item">
			<a href="/admin/user/logout">
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
      	<img src="/static/img/logo-small.png" alt="touxiang">
      	<p>您好！<?php echo $this->session->profile->useremail;?>，欢迎登录</p>
      </div>
<ul id="xc-admin-nav" class="layui-nav layui-nav-tree site-demo-nav">
  <li class="layui-nav-item">
  	<a class="layui-item-link" href="/admin" rel="/admin">后台首页</a>
  </li>
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">网站管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd>
        <a class="layui-item-link" href="/admin/page" rel="/admin/page">基本信息</a>
      </dd>
      <dd>
        <a class="layui-item-link" href="/admin/page/test" rel="/admin/page/test">测试页面</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">资讯管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd class="">
        <a class="layui-item-link" href="/admin/news" rel="/admin/news">资讯列表</a>
      </dd>
      <dd class="">
        <a class="layui-item-link" href="/demo/button.html">栏目列表</a>
      </dd>
    </dl>
  </li>
  
  <li class="layui-nav-item layui-nav-itemed">
    <a class="javascript:;" href="javascript:;">导航管理<span class="layui-nav-more"></span></a>
    <dl class="layui-nav-child">
      <dd class="">
        <a class="layui-item-link" href="/demo/layer.html">
          <i class="layui-icon"></i><cite>弹出层</cite>
        </a>
      </dd>
       <dd class="">
        <a class="layui-item-link" href="/demo/layim.html">
          <i class="layui-icon" style="position: relative; top: 3px;"></i>
          <cite>即时通讯</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/laydate.html">
          <i class="layui-icon" style="top: 1px;"></i><cite>日期时间选择</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/laypage.html">
          <i class="layui-icon"></i><cite>多功能分页</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/laytpl.html">
          <i class="layui-icon"></i><cite>模板引擎</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/layedit.html">
          <i class="layui-icon"></i>
          <cite>富文本编辑器</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/upload.html">
          <i class="layui-icon"></i>
          <cite>文件上传</cite>
        </a>
      </dd>
       <dd class="">
        <a href="/demo/tree.html">
          <i class="layui-icon"></i>
          <cite>树形菜单</cite>
        </a>
      </dd>
      <dd class="">
        <a href="/demo/util.html">
          <i class="layui-icon"></i>
          <cite>工具块</cite>
        </a>
      </dd>
      <dd class="">
        <a href="/demo/flow.html">
          <i class="layui-icon"></i>
          <cite>流加载</cite>
        </a>
      </dd>
      <dd class="">
        <a href="/demo/code.html">
          <i class="layui-icon" style="top: 1px;"></i>
          <cite>代码修饰器</cite>
        </a>
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

  
});
</script>
