<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>我们的团队--杭州协创实业有限公司</title>

	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/static/css3animate/css/animations.css"/>
	<link href="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap-customer.css"/>
	<link rel="stylesheet" type="text/css" href="/static/css/xc-base.css"/>
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="/static/js/xc-base.js"></script>
</head>
<body>
	<div id="fullpage" class="fullpage">
		<div class="section fp-auto-height fp-section">
			<?php require_once('public/header.php') ?>
			<div class="xc-ban-titile">
				<h1 class="text-center" style="margin: 0 auto; line-height: 250px;">协创-团队介绍</h1>
			</div>
			<!-- <div style="height: 80px;" class="text-center">
				<h4 style="margin: 0; line-height: 80px;">众人拾柴火焰高</h4>
			</div> -->
		</div>
		<div class="section fp-section">
			<div class="text-center" style="position: absolute; width: 100%; height: 100%">
				<div style="margin-top: 50px; color: #fff">
					<h2>战略发展部</h2>
				</div>
			</div>
		</div>
		<div class="section fp-section">
			<div class="text-center" style="position: absolute; width: 100%; height: 100%">
				<div style="margin-top: 50px; color: #fff">
					<h2>客服部</h2>
				</div>
			</div>
		</div>
		<div class="section fp-section">
			<div class="text-center" style="position: absolute; width: 100%; height: 100%">
				<div style="margin-top: 50px; color: #fff">
					<h2>采购部</h2>
				</div>
			</div>
		</div>
		<div class="section fp-section">
			<div class="text-center" style="position: absolute; width: 100%; height: 100%">
				<div style="margin-top: 50px; color: #fff">
					<h2>技术部</h2>
				</div>
			</div>
		</div>
		<div class="section fp-section">
			<div class="text-center" style="position: absolute; width: 100%; height: 100%">
				<div style="margin-top: 50px; color: #fff">
					<h2>销售部</h2>
				</div>
			</div>
		</div>
		<div class="section fp-section fp-auto-height" style="">
			<?php require_once('public/footer.php') ?>
		</div>
	</div>
</body>
<script src="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.js"></script>
<script type="text/javascript">
	
	$(function(){
	    $('#fullpage').fullpage({
	        'verticalCentered': false,
	        'css3': true,
	        'sectionsColor': ['transparent', '#00d400', '#254587', '#0bccbf', '#8a2be2', '#432fac', 'transparent'],
	    })
	})

</script>
</html>