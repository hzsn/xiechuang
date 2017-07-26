<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ;?>
<div class="layui-layout layui-layout-admin">
 <?php require_once('public/header.php') ;?>
 <div class="layui-body">
  	<input type="file" name="files" class="layui-upload-file">
  	<fieldset class="layui-elem-field layui-field-title">
	  <legend>文件信息</legend>
	</fieldset>
	  <table id="layui-upload-table" class="layui-table" lay-skin="line">
		  <colgroup>
		    <col width="47%">
		    <col width="37%">
		    <col width="8%">
		    <col width="8%">
		    <col>
		  </colgroup>
  	</table>

	<ul id="filelist"></ul>
 </div>
 <!-- <script type="text/javascript" src="/static/layui-v1.0.9/lay/modules/upload.js"></script> -->
 <!-- <script type="text/javascript" src="/static/js/mupload.js"></script> -->
 <script type="text/javascript">
 	// console.log(layui, layui.mupload);
 	layui.config({base:'/static/layui-v1.0.9/lay/ext/'}).use(['upload','mupload'],function(){
 		layui.mupload({
 			container:'#layui-upload-table',
 			url:'/admin/file/upload/',
 			complete:function(res){
 				console.log(res);
 			}
 		});

 		layui.upload({
		  url: '上传接口url'
		  ,success: function(res){
		    console.log(res); //上传成功返回值，必须为json格式
		  }
		});
		// console.log($.ajax());  
 	});
 </script>
 <script type="text/javascript">
 	// layui.config({base:'/static/layui-v1.0.9/lay/ext/'}).use(['upload','layer', 'element', 'jquery', 'mupload'], function(){
 	// 	var layer = layui.layer,
 	// 		element = layui.element(),
 	// 		$ = layui.jquery;
 	// 	layui.mupload({
 	// 		container:'#layui-upload-table',
 	// 		url:'/admin/file/upload',
 	// 		complete:function(res){
 	// 			console.log(res);
 	// 		}
 	// 	});

 	// });
 </script>

 <script type="text/javascript">
 

 </script>
<?php require_once('public/footer.php') ;?>