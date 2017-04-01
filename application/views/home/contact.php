<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('<?php echo base_url($this->config->item('banner')['contact']); ?>');">
	<h1 class="text-center"><span><?php echo $contact_title;?></span></h1>
</div>
<div class="container text-center">
	<div class="row">
		<p class="text-box" style="line-height: 2em; margin: 40px 0 20px 0">
			公司始终以诚信、创新、专业、服务来赢得客户的信赖， 几年的汽配行业磨练，我们有太多的收获，面对未来，我们将恪守诚信经营，用心服务.我们将不断提高服务质量，逐步形成一套优质，我们的服务触及全国每一个角落，在全国任何地方的用户都能得到周到细致的服务。(测试数据)
		</p>
		<div class="col-md-4 contact-item-box">
			<span class="glyphicon glyphicon-earphone"></span>
			<p><?php echo $this->config->item('tel') ;?></p>
		</div>
		<div class="col-md-4 contact-item-box">
			<span class="glyphicon glyphicon-envelope"></span>
			<p><?php echo $this->config->item('email');?></p>
		</div>
		<div class="col-md-4 contact-item-box">
			<span class="glyphicon glyphicon-map-marker"></span>
			<p><?php echo $this->config->item('address');?></p>
		</div>
	</div>
	<h3><del>关于地图功能，建议使用公司的账号实现此功能 此行文字需要删除</del></h3>
	<div class="contact-map-box" id="amap-container">
		<p class="text-center">地图显示</p>
	</div>
	<div id="address-box" class="xc-margin-top">
		<h3><del>此处可以显示公司的各个中心库的信息（名称，地址，联系方式等）此行文字需要删除</del></h3>
		<?php 
			if ($cangkus) {
				$len = count($cangkus);
				$divs = [];
				foreach ($cangkus as $key => $value) {
					array_push($divs, '<div class="col-md-6" data-index="'.$key.'"><div class="panel panel-default text-left">');
					array_push($divs, '<div class="panel-heading">'.$value['name'].'</div>');
					array_push($divs, '<div class="panel-body">');
					array_push($divs, '<p>地址：'.$value['address'].'</p>');
					array_push($divs, '<p>联系电话：'.$value['phone'].'</p>');
					array_push($divs, '<p>电子邮箱：'.$value['email'].'</p>');
					array_push($divs, '</div>');
					array_push($divs, '</div></div>');
					
					if ($key%2 == 1 || $key == $len-1) {
						echo '<div class="row">'.join('',$divs).'</div>';
						$divs = [];
					}
				}
			}
		 ?>
	</div>
</div>
<?php require_once('public/footer.php') ?>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=cd74d160d2bc29712cf306b9db4815d0"></script>
<script type="text/javascript" src="<?php echo base_url('/static/js/xc-amap.js');?>"></script>
<script type="text/javascript">
 XCAMap.createAMap('amap-container',{'email':'<?php echo $this->config->item('email'); ?>'});
</script>
</body>
</html>