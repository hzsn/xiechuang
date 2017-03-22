<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ;?>
<div class="layui-layout layui-layout-admin">
 <?php require_once('public/header.php') ;?>
 <div class="layui-body">
 <!-- 网站基本信息 -->
  <blockquote class="layui-elem-quote"><h3>网站基本信息</h3></blockquote>
  <table class="layui-table">
    <tbody>
      <tr>
        <td class="">HTTP_HOST:</td>
        <td><?php echo $_SERVER['HTTP_HOST'];?></td>
        <td>网站域名:</td>
        <td><?php echo $_SERVER['SERVER_NAME'];?></td>
      </tr>
      <tr>
        <td>网站名称:</td>
        <td><?php echo $this->config->item('title');?></td>
        <td>服务器:</td>
        <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
      </tr>
      <tr>
        <td>服务器IP:</td>
        <td><?php echo $_SERVER['SERVER_ADDR'];?></td>
        <td>您的IP:</td>
        <td><?php echo $_SERVER['REMOTE_ADDR'];?></td>
      </tr>
      <tr>
        <td>站点路径：</td>
        <td><?php echo $_SERVER['DOCUMENT_ROOT'];?></td>
        <td>备案号：</td><td><?php echo $this->config->item('icp');?></td>
      </tr>
      <tr>
        <td>PHP Version:</td><td><?php echo phpversion();?></td>
        <td>数据库信息:</td><td><?php echo $this->db->platform().' '.$this->db->version();?></td>
      </tr>
    </tbody>
  </table>
  <!-- 网站基本信息 end-->
  <div class="layui-w" style="">
    <div style="width: 33%;display: inline-block;">
      <fieldset class="layui-elem-field">
        <legend>资讯管理</legend>
        <div class="layui-field-box">
          <a class="layui-btn" href="/admin/news" rel="/admin/news"><i class="layui-icon">&#xe63c;</i> 查看资讯</a>
          <a class="layui-btn layui-btn-normal" href="javascript:;"><i class="layui-icon">&#xe608;</i> 添加资讯</a>
        </div>
      </fieldset>
    </div>
    <div style="width: 33%;display: inline-block;">
      <fieldset class="layui-elem-field">
        <legend>导航管理</legend>
        <div class="layui-field-box">
          <a class="layui-btn" href="javascript:;"><i class="layui-icon">&#xe63c;</i> 查看导航</a>
          <a class="layui-btn layui-btn-normal" href="javascript:;"><i class="layui-icon">&#xe608;</i> 添加导航</a>
        </div>
      </fieldset>
    </div>
    <div style="width: 33%;display: inline-block;">
      <fieldset class="layui-elem-field">
        <legend>网站管理</legend>
        <div class="layui-field-box">
          <a class="layui-btn" href="javascript:;"><i class="layui-icon">&#xe63c;</i> 查看网站</a>
          <a class="layui-btn layui-btn-normal" href="javascript:;"><i class="layui-icon">&#xe608;</i> 修改网站</a>
        </div>
      </fieldset>
    </div>
  </div>  
 </div>
<?php require_once('public/footer.php') ;?>