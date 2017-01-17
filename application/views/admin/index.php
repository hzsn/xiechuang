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
        <td>PHP Version:</td>
        <td><?php echo phpversion();?></td>
      </tr>
    </tbody>
  </table>
  <!-- 网站基本信息 end-->
  
 </div>
<?php require_once('public/footer.php') ;?>