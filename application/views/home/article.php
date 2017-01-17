<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php'); ?>
<?php require_once('public/header.php'); ?>
<body>
<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png'); color: #fff">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;"><?php echo $article_title;?></h1>
</div>
<div class="container">
	<div class="row">
		<h2 class="text-center" id="article-title"><?php echo $article['title'];?></h2>
		<div class="text-center">
			<input id="article_id" type="hidden" value="<?php echo $article['id'];?>">
			<span>时间：<?php echo $article['create_time'];?></span>
			<span>作者：<?php echo $article['create_user'];?></span>
			<span>浏览量：<span id="pv" data-pv="<?php echo $article['pv'] ;?>"><?php echo $article['pv'];?></span></span>
		</div>
		<hr>
		<div class="xc-article-content-box">
			<div class="xc-article-content"><?php echo $article['contant'];?></div>
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
				<?php echo $article['other'];?>
			</div>
		</div>
	</div>
</div>
<?php require_once('public/footer.php') ?>
<div id="pv-box"></div>
<script type="text/javascript">
/**
 * 更新浏览量函数
 */
	function add_pv() {
		$.ajax({
			url:'<?php echo site_url("/home/news/add_pv")?>',
			type:"POST",
			data:{
				'article_id':$('#article_id').val()
			},
			success:function(rep,status,xhr){
				try{
					var jobj =JSON.parse(rep);
					if (jobj && jobj.code == '0') {
							var pv = $('#pv').data('pv') + jobj.pv;
							$('#pv').text(pv);
							$('#pv').data('pv',pv);
					}
				}catch(e){
					console.log(e.message, e.name, e.lineNumber);
					console.log('JSON字符串解析错误');
				}
			},
			timeout:3000,
			error:function(xhr,status,error){
				console.log(xhr,status,error);
			},
		});
	}
	$(function () {
		
		add_pv();
	});
</script>
<script>
	window._bd_share_config = {
		common : {
			bdText : $('#article-title').text(),
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