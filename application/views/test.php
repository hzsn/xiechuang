<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<!-- <head>
	<link rel="stylesheet" type="text/css" href="/static/css3animate/css/animations.css">
	<link href="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head> -->
<?php require_once('public/head.php'); ?>
<body>

<?php 
	echo phpinfo();
?>

<div style="height: 550px; background: url('http://img.infinitynewtab.com/wallpaper/689.jpg');"></div>
</body>


<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<script src="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.js"></script>
<script type="text/javascript">
	
	$(function(){
	    $('#fullpage').fullpage({
	        'verticalCentered': false,
	        'css3': true,
	        'sectionsColor': ['#fff', 'red', '#254587', '#695684'],
	        //anchors: ['page1', 'page2', 'page3', 'page4'],
	        'navigation': true,
	        'navigationPosition': 'right',
	        'navigationTooltips': ['fullPage.js', 'Powerful', 'Amazing', 'Simple']
	    })

	})

</script>
</html>