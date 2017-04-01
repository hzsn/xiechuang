<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="/static/layui-v1.0.9/css/layui.css">
	<script src="/static/layui-v1.0.9/layui.js"></script>
</head>
<body>
<input type="file" name="file" class="layui-upload-file">

<a href="http://www.layui.com" class="layui-btn" target="">一个可跳转的按钮</a>

<table id="container" class="layui-table" lay-skin="row">
		  <colgroup>
		    <col width="47%">
		    <col width="37%">
		    <col width="8%">
		    <col width="8%">
		    <col>
		  </colgroup>
  	</table>

<table id="container1" class="layui-table" lay-skin="line">
	<colgroup>
		<col width="47%">
		<col width="37%">
		<col width="8%">
		<col width="8%">
		<col>
	</colgroup>
</table>
</body>

<script type="text/javascript">
	layui
		.config({base:'/static/layui-v1.0.9/lay/ext/'})
		.use(['upload', 'mupload', 'layer'],function(){
		layui.mupload({
 			container:'#container',
 			url:'/admin/file/upload',
 			complete:function(res){
 				console.log(res);
 			}
 		});
 		layui.mupload({
 			container:'#container1',
 			url:'/admin/file/upload',
 			complete:function(res){
 				console.log(res);
 			}
 		});

	});

	console.log('0x = ', 0xa);	
</script>
</html>