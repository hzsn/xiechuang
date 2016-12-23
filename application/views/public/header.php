<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<script type="text/javascript"></script>
<!-- header -->
<header class="">
	<div class="container">
			<div class="row" >
			<a class="pull-left" href="/"><img class="" src="/static/img/logo.PNG" alt="杭州协创实业有限公司" height ="160px"></a>
				<div class="" style="height: 60px;padding-right: 20px;">
					<div class="pull-right">
						<span class="tel">
							<span class="glyphicon glyphicon-earphone" style="color: #9f9f9f"></span>
							<span class="tel-text"><?php echo $this->config->item('tel');;?></span>
						</span>
						<!-- <span class="tel" style="background-image: url(/static/img/tel.png);"></span> -->
						<span class="xc-btn-icon" style="background: url('/static/img/logo_weixin_small.png');" >
							<img src="/static/img/csh_weixin-2.jpg" style="width: 150px;">
						</span>
					</div>
				</div>
				<!-- 导航条  -->
				<nav class="xc-nav-bar" style="height: 100px">
						<div class="navbar-collapse collapse" role="navigation">
					      <ul class="nav navbar-nav" id="navbar-nav">
					         <?php
						        foreach ($navbar as $key => $value) {
						        	if (array_key_exists("subNavBar",$value) && $value['subNavBar']) {
						        		$subli = '';
						        		foreach ($value['subNavBar'] as $subObj) {
						        			$subli .= '<li><a href="'.$subObj['url'].'" rel="'.$subObj['rel'].'" target="'.$subObj['target'].'">'.$subObj['name'].'</a></li>';
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
				</nav>
				<!-- 导航条 end -->	
			</div>
	</div>
</header>
<!-- header end -->

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
			var w = $(this).width();
			$(this).children('.dropdown-menu').css({
				'min-width':(w+w/2)+'px',
			});
		});

		// $('.btn-icon').hover()

	})
</script>
