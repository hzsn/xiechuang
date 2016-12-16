<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<footer class="">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-4 text-left">
			<h3>联系我们</h3>
			<p><?php echo $this->config->item('tel');?></p>
			<p><?php echo $this->config->item('email');?></p>
			<p><?php echo $this->config->item('address');?></p>
		</div>
		<div class="col-md-4 col-lg-4 text-left">
			<h3>关于我们</h3>
			<p><a href="/aboutxc">公司简介</a></p>
			<p><a href="/news">公司新闻</a></p>
			<p><a href="/">企业文化</a></p>
			<p><a href="/joinus">诚征英才</a></p>
		</div>
		<div class="col-md-4 col-lg-4">
			<img src="/static/img/csh_weixin.jpg" width="150" height="150">
			<img src="/static/img/csh_weixin.jpg" width="150" height="150">
		</div>
	</div>
	<div class="row">
		<p>Copyright © 2016 Hangzhou Xiechuang Industries Co.,Ltd</p>
		<p>杭州协创实业有限公司版权所有|网站备案/许可证号：浙ICP备00000000号-0（测试数据）</p>
	</div>
	</div>
</footer>