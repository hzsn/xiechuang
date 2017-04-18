<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<footer class="">
<div class="linear-line"></div>
<div class="container">
	<div class="row hidden-xs">
		<div class="col-md-4 col-lg-4 text-left">
			<h3>联系我们</h3>
			<p><?php echo $this->config->item('tel');?></p>
			<p><?php echo $this->config->item('email');?></p>
			<p><?php echo $this->config->item('address');?></p>
		</div>
		<div class="col-md-4 col-lg-4 text-left">
			<div class="col-md-6 col-lg-6 text-left">
				<h3>关于我们</h3>
				<p><a href="<?php echo site_url('/aboutxc');?>/aboutxc">公司简介</a></p>
				<p><a href="<?php echo site_url('/news');?>">公司新闻</a></p>
				<p><a href="<?php echo site_url('/news/staff/groups');?>">员工风采</a></p>
				<p><a href="<?php echo site_url('/contact/joinus');?>">诚聘英才</a></p>
			</div>
			<div class="col-md-6 col-lg-6 text-left">
				<!-- 此处可以再放一列 -->
			</div>
		</div>
		<div class="col-md-4 col-lg-4 text-right">
			<h2>
				<img src="<?php echo $this->config->item('weixin')['csh'];?>" width="129" height="129">
				<img src="<?php echo $this->config->item('weixin')['xc'];?>" width="129" height="129">
			</h2>
		</div>
	</div>
	<div class="row">
		<p>Copyright © 2017 Hangzhou Xiechuang Industries Co.,Ltd All Rights Reserved</p>
		<p>杭州协创实业有限公司版权所有|网站备案/许可证号：<?php echo $this->config->item('icp');?></p>
	</div>
	
</div>
</footer>
<script type="text/javascript">
	$(function(){
		
		var height = $(document).height() - $('body').height();
		//让footer固定在页面的底部，
		//如果body的height小于document的height的话,在footer前加一个适当高度的div，把页面撑开
		if (height > 0) {
			$('footer').before('<div style="height:'+height+'px;"></div>');
		}
	});
</script>