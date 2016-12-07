<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- header -->
<header style="height: 150px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">				
					<img class="" src="/static/img/logo.png" alt="杭州协创实业有限公司" height ="150px">
					<div class="xc-logo-box">
						<div class="xc-logo-zh">杭州协创实业有限公司</div>
						<div class="xc-logo-en">Hangzhou Xiechuang Industries Co.,Ltd</div>
					</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<!-- <div class="tel">400-8273-666</div> -->
				<h2 class="fl-r tel"><span class="glyphicon glyphicon-phone-alt"></span> <span class="tel-text">400-8273-666</span></h2>
				<!-- <div class="fl-r">
					<img src="/static/img/tel.png">
				</div> -->
			</div>
		</div>
	</div>
</header>
<!-- header end -->
<!-- 导航条  -->
<nav class="xc-nav-bar">
	<div class="container">
		<div class="navbar-collapse collapse" role="navigation">
	      <ul class="nav navbar-nav">
	        <?php 
	        $szNavText = array(
	        	array('name' => '首页', 'url' => '/'),
	        	array('name' => '官网商城', 'url' => 'http://carsociety.cn/', 'target' =>'_blank'),
	        	array(
	        		'name' => '企业动态',
	        		'url'  =>'/',
	        		'subName' => array(
	        			array('name' => '最新动态', 'url' => '/news'),
	        			array('name' => '行业动态', 'url' => '/'),
	        			array('name' => '员工风采', 'url' => '/'),
	        		)
	        		),
	        	array(
	        		'name' => '关于协创',
	        		'url' => '/',
	        		'subName' => array(
	        				array('name' => '团队介绍','url' => '/team'),
	        			)
	        		),
	        	array('name'=>'合作伙伴', 'url' => '/'),
	        	array('name'=>'联系我们',
	        			'url' => '/',
	        			'subName' => array(['name'=> '诚招英才','url'=> '/']))
	        );

	        $len = count($szNavText);
	        for($i = 0; $i < $len; $i++){
	        	if (array_key_exists("subName",$szNavText[$i])) {
	        		$subli = '';
	        		foreach ($szNavText[$i]['subName'] as $subObj) {
	        			
	        			$subli .= '<li><a href="'.$subObj['url'].'">'.$subObj['name'].'</a></li>';
	        		}
	        		$li = '<li class="dropdown"><a href="'.$szNavText[$i]['url'].'">'.$szNavText[$i]['name'].'</a><ul class="dropdown-menu" role="menu">'.$subli.'</ul></li>';
			        echo($li);
	        	}else{
	        		echo('<li><a href="'.$szNavText[$i]['url'].'">'.$szNavText[$i]['name'].'</a></li>');
	        	}
	        }
	        ?>
	      </ul>
	      
	    </div>
	</div>
</nav>
<!-- 导航条 end -->
<script type="text/javascript">
	$(function () {
		$('.dropdown').hover(function () {
	  		$(this).addClass('open');
	  	},function(){
	  		$(this).removeClass('open');
	  	});
	})
</script>