<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png'); color: #fff">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;"><?php echo $aboutxc_title;?></h1>
</div>
<div class="container">
	<div class="row xc-aboutxc-box">
		<div>
			<h2>公司介绍</h2>
			<p>杭州协创实业有限公司是一家以汽车备件仓储管理，物流配送服务，汽车备件信息技术服务为主营业务，辅以整车销售的集团控股公司。其实际管理和控股多家公司给全国各大主机厂提供专业的区域售后备件仓储与物流配送服务。公司为各汽车品牌提供专业的汽车售后备件保障服务，有着丰富的汽车备件仓储和物流管理经验。对全国的汽车市场具有较为扎实的汽车备件仓储及配送服务运作经验。其中所管理的中心库连续多年位居全国服务榜首。</p>
			<div style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png');background-position: center;background-size: cover;width: 100%;height: 220px"></div>
			<!-- <img class="img-responsive" src="/static/img/IMG_20161215_130908_2_HDR_meitu_2.png" width="100%" height="200" style="background-color: red" alt=""> -->
		</div>
		<div>
			<h2>经营理念</h2>
			<div><p>公司以“诚信、专业、服务、创新”为经营理念。倾力打造个性化服务品牌，为汽车厂家提供全方位、专业化的售后备件服务。</p></div>
			<?php foreach (['诚信', '专业', '服务', '创新'] as $key => $value) {;?>
			<div class="col-md-3 col-lg-3 xc-aboutxc-icon-box">
				<div class="xc-aboutxc-icon">
					<div><?php echo $value?></div>
				</div>
			</div>
			<?php };?>
		</div>
		<div>
			<h2>企业使命</h2>
			<p>用最短的备件供货周期，及时满足顾客需求（高供应率），最大化提升售后服务满意度和优化库存带来的低库存金额，以获得良好的营业收益。</p>
		</div>
		<div id="cooperator">
			<h2>服务品牌</h2>
				<?php foreach ($cooperator['item'] as $value) {	
					$href = 'javascript:void(0);';
					$target = '';
					if ($value['url']) {
						$target = '_blank';
						$href = $value['url'];
					}
					?>
					<div class="col-md-2 xc-firends-box">
						<img class="" alt="<?php echo $value['name'];?>" style="width: 100%; height: 100%" src="/static/img/<?php echo $value['img_path'];?>" data-holder-rendered="true">
						<a class="xc-pos-abs text-center xc-firends-text" href="<?php echo $href?>" target="<?php echo $target?>"><?php echo $value['name'];?></a>
					</div>
				<?php }?>
		</div>
	</div>
</div>

<?php require_once('public/footer.php') ?>
</body>
</html>