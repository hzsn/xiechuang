<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ;?>
<div class="layui-layout layui-layout-admin">
 <?php require_once('public/header.php') ;?>
 <div class="layui-body">
 <div class="layui-tab layui-tab-brief">
  <ul class="layui-tab-title">
    <li class="layui-this">资讯列表</li>
    <li>添加资讯</li>
    <li>栏目列表</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
      <blockquote class="layui-elem-quote"><h3>资讯列表</h3></blockquote>
    </div>
    <div class="layui-tab-item">
      <blockquote class="layui-elem-quote"><h3>添加资讯</h3></blockquote>
    </div>
    <div class="layui-tab-item">
      <blockquote class="layui-elem-quote"><h3>栏目列表</h3></blockquote>
    </div>
  </div>
</div>      
</div>
<?php require_once('public/footer.php') ;?>