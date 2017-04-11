<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<script type="text/javascript">
	$(function () {
		// var body_width = 1000, logo_width = 220;
		// navbar_width = $('#navbar-nav').width();
		// var $nav_li = $('#navbar-nav>li');
		// padding_width = Math.floor((body_width - logo_width - navbar_width)/($nav_li.length*2));
		// $('#navbar-nav li').each(function(i, e){
		// 	$(this).children('a').css({
		// 		'padding-left':padding_width + "px",
		// 		'padding-right':padding_width + "px",
		// 	});
		// });

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

	})
</script>
<!-- header -->
<header>
	<div class="container">
			<div class="row" >
			<a class="pull-left" href="/"><img class="" src="<?php echo base_url($this->config->item('logo'))?>" alt="杭州协创实业有限公司" height ="120px"></a>
			<div class="" style="height: 60px;padding-right: 20px;">
				<div class="pull-right" style="margin-top: 10px;">
					<span class="tel">
						<span class="glyphicon glyphicon-earphone" style="color: #9f9f9f"></span>
						<span class="tel-text"><?php echo $this->config->item('tel');?></span>
					</span>
					<span class="xc-btn-icon" style="background-image: url(<?php echo base_url($this->config->item('weixin')['logo']);?>)">
						<img src="<?php echo $this->config->item('weixin')['csh1'];?>" style="width: 150px;">
					</span>
				</div>
			</div>
			<!-- 导航条  -->
			<nav class="xc-nav-bar pull-left">
					<div class="navbar-collapse collapse" role="navigation">
				      <ul class="nav navbar-nav" id="navbar-nav">
				         <?php
				         	$len = count($navbar);
				         	$lastli = '';
					        foreach ($navbar as $key => $value) {
					        	if (array_key_exists("subNavBar",$value) && $value['subNavBar']) {
					        		$subli = '';
					        		foreach ($value['subNavBar'] as $subObj) {
					        			$subli .= '<li><a href="'.site_url($subObj['url']).'" rel="'.$subObj['rel'].'" target="'.$subObj['target'].'">'.$subObj['name'].'</a></li>';
					        		}
					        		
					        		if ($key == $len-1) {
					        			$lastli = 'last-li';
					        		}
					        		$li = '<li class="dropdown '.$lastli.'"><a href="'.site_url($value['url']).'" rel="'.$value['rel'].'">'.$value['name'].'</a><ul class="dropdown-menu" role="menu">'.$subli.'</ul></li>';
							        echo($li);
					        	}else{
					        		echo('<li class=""><a href="'.site_url($value['url']).'" rel="'.$value['rel'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>');
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
