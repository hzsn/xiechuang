<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<link rel="stylesheet" type="text/css" href="/static/css3animate/css/animations.css">
	<link href="//cdn.bootcss.com/fullPage.js/2.8.9/jquery.fullPage.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div id="fullpage" class="fullpage">
	
	<div id="domain-box" class="section fp-section ">
		
		<?php 
			$szDomain = [
						['name' => 'xiechuang.net.cn', 'price'=>29, 'desc' =>'协创拼音'],
						['name' => 'hzxiechuang.com.cn', 'price'=>29, 'desc' =>'杭州协创拼音'],
						['name' => 'hzxiechuang.com', 'price'=>55, 'desc' =>'杭州协创拼音'],
						['name' => 'hzxiechuang.cn', 'price'=>29, 'desc' =>'杭州协创拼音'],
						['name' => 'hzxiechuang.net', 'price'=>55, 'desc' =>'杭州协创拼音'],
						['name' => 'hzxcsy.com.cn', 'price'=>29, 'desc' =>'杭州协创实业拼音缩写'],
						['name' => 'hzxcsy.net', 'price'=>55, 'desc' =>'杭州协创实业拼音缩写'],
						['name' => 'hzxcsy.net.cn', 'price'=>29, 'desc' =>'杭州协创实业拼音缩写'],
						['name' => 'hzxcis.cn', 'price'=>29, 'desc' =>'Hangzhou Xiechuang Industries 首写字母和Industries末字母的缩写'],
						['name' => 'hzxcis.com', 'price'=>55, 'desc' =>'Hangzhou Xiechuang Industries 首写字母和Industries末字母的缩写'],
						];
		 ?>
		 <table class="table table-bordered text-center table-striped">
		      <caption>域名备选（价格来自阿里万网）</caption>
		      <thead>
		        <tr>
		          <th>Name</th>
		          <th>Price</th>
		          <th>备注</th>
		        </tr>
		      </thead>
		      <tbody>
		      	<?php foreach ($szDomain as $value) {
		      		$index = strpos($value['name'], '.');
					echo '<tr><td><a href="https://wanwang.aliyun.com/domain/searchresult/?keyword='.substr($value['name'], 0, $index).'&suffix='.substr($value['name'], $index).'" target="_blank">'.$value['name'].'</a></td><td>'.$value['price'].'</td><td>'.$value['desc'].'</td></tr>';
				} ?>
		      </tbody>
		    </table>
	</div>
	<div class='animatedParent animateOnce section fp-section' data-sequence='500' style="overflow: hidden;">
		<h2 class='animated bounceInDown' data-id='1'>It Works!</h2>
		<h2 class='animated bounceInDown' data-id='2'>This animation will start 500ms after</h2>
		<h2 class='animated bounceInDown' data-id='3'>This animation will start 500ms after</h2>
	</div>
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
	        'sectionsColor': ['#fff', 'red', '#254587', '#695684'],
	        //anchors: ['page1', 'page2', 'page3', 'page4'],
	        'navigation': true,
	        'navigationPosition': 'right',
	        'navigationTooltips': ['fullPage.js', 'Powerful', 'Amazing', 'Simple']
	    })

	})

</script>
</html>