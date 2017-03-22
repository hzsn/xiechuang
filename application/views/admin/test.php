<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ;?>
<div class="layui-layout layui-layout-admin">
 <?php require_once('public/header.php') ;?>
 <div class="layui-body">
  	<h1>测试页面</h1>
	<input type="file" name="file" class="layui-upload-file">
 </div>
 <script type="text/javascript">
 	layui.use(['upload','layer'], function(){
 		var layer = layui.layer;
 		layui.upload({
		  url: '/admin/file/upload'
		  ,success: function(res){
		     console.log(res);
		  }
		});      
 	});
 </script>
<?php require_once('public/footer.php') ;?>