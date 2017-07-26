<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile hidden-xs" style="background-image: url('<?php echo base_url($this->config->item('banner')['new']) ;?>');">
	<h1 class="text-center"><span><?php echo $news_title;?></span></h1>
</div>
<div class="container xc-margin">
	<?php
		foreach ($news as $key => $value) {
	?>
	<div class="row xc-news-box">
	    <div class="col-md-5 xc-news-img" style="background-image: url(<?php echo base_url($this->config->item('new').$value['item_img'])?>);">
	      <a href="<?php echo site_url('article/'.$value['id']) ;?>" class="xc-news-date">
	          	<div><?php echo $value['create_time'] ;?></div>
	      </a>
	    </div>
	    <div class="col-md-7 xc-news-body">
	      <h2 class="xc-news-heading xc-text-wrap"><a href="<?php echo site_url('article/'.$value['id']) ;?>">
	      	<?php echo $value['title'] ;?>
	      </a></h2>
	      <p class="lead text-indent-2em"><?php echo $value['summary'] ;?></p>
	    </div>
	 </div>
     <?php
     	echo "<hr>";
     }?>
     <!-- 分页 -->
	<nav class="text-center xc-page-nav">
	 	<ul class="pagination">
			<?php echo $pagination; ;?>
		</ul>
	</nav>
	<!-- 分页 end -->
	
</div>

<?php require_once('public/footer.php') ?>
</body>
<script type="text/javascript" src="http://cdn.staticfile.org/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script type="text/javascript">
	
</script>
</html>