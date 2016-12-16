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
				<h2 class="fl-r tel">
				<span class="glyphicon glyphicon-phone-alt"></span>
				<span class="tel-text"><?php echo $this->config->item('tel');;?></span>
				</h2>
			</div>
		</div>
	</div>
</header>
<!-- header end -->
<!-- 导航条  -->
<nav class="xc-nav-bar">
	<div class="container">
		<div class="navbar-collapse collapse" role="navigation">
	      <ul class="nav navbar-nav" id="navbar-nav">
	        <?php
	        foreach ($navbar as $key => $value) {
	        	if (array_key_exists("subNavBar",$value) && $value['subNavBar']) {
	        		$subli = '';
	        		foreach ($value['subNavBar'] as $subObj) {
	        			$subli .= '<li><a class="text-center" href="'.$subObj['url'].'" rel="'.$subObj['rel'].'" target="'.$subObj['target'].'">'.$subObj['name'].'</a></li>';
	        		}
	        		$li = '<li class="dropdown"><a href="'.$value['url'].'" rel="'.$value['rel'].'">'.$value['name'].'</a><ul class="dropdown-menu" role="menu">'.$subli.'</ul></li>';
			        echo($li);
	        	}else{
	        		echo('<li class=""><a href="'.$value['url'].'" rel="'.$value['rel'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>');
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

		var pathname = window.location.pathname;
		if (pathname == '/') {
			pathname = '/index';
		}
		$('#navbar-nav>li.xc-active').removeClass('xc-active');
		$('#navbar-nav>li>a').each(function(i, e){
			if ((pathname).indexOf($(this).attr('rel')) > -1 && $(this).attr('rel')!='') {
		      $(this).parent().addClass('xc-active');
		    }
		});
		
		$('.dropdown').each(function(i, e){ 
			$(this).children('.dropdown-menu').css({
				'min-width':$(this).width()+'px',
			});
		});

	})
</script>