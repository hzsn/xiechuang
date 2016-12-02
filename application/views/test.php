<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<link rel="stylesheet" type="text/css" href="/static/css3animate/css/animations.css">
	<link href="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.css" rel="stylesheet">
</head>
<body>
<div id="fullpage" class="fullpage">
	<div class='animatedParent animateOnce section header fp-auto-height fp-section active' data-sequence='500' style="overflow: hidden;">
		<h2 class='animated bounceInDown' data-id='1'>It Works!</h2>
		<h2 class='animated bounceInDown' data-id='2'>This animation will start 500ms after</h2>
		<h2 class='animated bounceInDown' data-id='3'>This animation will start 500ms after</h2>
	</div>
	<div class="section fp-section" style=""></div>
	<div class="section fp-section" style=""></div>
	<div class="section fp-section fp-auto-height">
		<div style="height: 200px ; background: #000;"></div>
	</div>
</div>
</body>

<!-- <script src="//cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script> -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<script src="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.js"></script>
<script type="text/javascript">
	
	$(function(){
	    $('#fullpage').fullpage({
	        'verticalCentered': false,
	        'css3': true,
	        'sectionsColor': ['#254875', '#00FF00', '#254587', '#695684'],
	        //anchors: ['page1', 'page2', 'page3', 'page4'],
	        'navigation': true,
	        'navigationPosition': 'right',
	        'navigationTooltips': ['fullPage.js', 'Powerful', 'Amazing', 'Simple']
	    })
	})

</script>
</html>