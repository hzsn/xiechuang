<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>

<div class="xc-ban-titile">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;">协创-综合资讯</h1>
</div>
<div class="container">
	<div class="row">
		<h2 class="text-center">标题</h2>
		<div class="text-center">
			<span>时间：2016-12-02</span>
			<span>作者：admin</span>
			<span>浏览量：0</span>
		</div>
		<hr>
		<div class="xc-article-content-box">
			<div class="xc-article-content">
			<?php for($i = 0; $i < 10; $i++){?>
			<p>
				余从京域，言归东藩，背伊阙 ，越轘辕，经通谷，陵景山。日既西倾，车殆马烦。尔乃税驾乎蘅皋，秣驷乎芝田，容与乎阳林，流眄乎洛川。于是精移神骇，忽焉思散。俯则未察，仰以殊观。睹一丽人，于岩之畔。乃援御者而告之曰：“尔有觌于彼者乎？彼何人斯，若此之艳也！”御者对曰：“臣闻河洛之神，名曰宓妃。然则君王所见，无乃是乎？其状若何，臣愿闻之。”
			</p>
			<?php }?>
			</div>
			<hr>
			<div class="row">
				<div class="bdsharebuttonbox xc-share-box" data-tag="share_1">
					<div class="bdsharebuttonbox" data-tag="share_1">
						<a class="bds_mshare" data-cmd="mshare"></a>
						<a class="bds_qzone" data-cmd="qzone" href="#"></a>
						<a class="bds_tsina" data-cmd="tsina"></a>
						<a class="bds_baidu" data-cmd="baidu"></a>
						<a class="bds_renren" data-cmd="renren"></a>
						<a class="bds_tqq" data-cmd="tqq"></a>
						<a class="bds_more" data-cmd="more">更多</a>
						<a class="bds_count" data-cmd="count"></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-left xc-text-wrap">
					上一篇:<a href="/article/0">上一篇标题</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right xc-text-wrap">下一篇:<a href="article/2">上一篇标题</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once('public/footer.php') ?>
<script>
	console.log(window.location.href);
	window._bd_share_config = {
		common : {
			bdText : '文章标题-xiechuang',	
			bdDesc : '自定义分享摘要',	
			bdUrl : window.location.href, 	
			bdPic : '自定义分享图片'
		},
		share : [{
			"bdSize" : 16
		}],
		slide : [{
			bdImg : 0,
			bdPos : "right",
			bdTop : 300
		}]
	}

	//以下为js加载部分
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>