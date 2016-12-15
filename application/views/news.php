<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png'); color: #fff">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;"><?php echo $news_title;?></h1>
</div>
<div class="container xc-margin">
	<?php
		// if ($code != '0') {
		// 	echo $message;
		// }else{
		foreach ($news as $key => $value) {
	?>
	<div class="row xc-news-box">
	    <div class="col-md-5 xc-news-img" style="background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg);">
	      <a href="/article/<?php echo $value['id'] ;?>" class="xc-news-date">
	          	<div><?php echo $value['create_time'] ;?></div>
	      </a>
	    </div>
	    <div class="col-md-7 xc-news-body">
	      <h2 class="xc-news-heading xc-text-wrap"><a href="/article/<?php echo $value['id'] ;?>">
	      	<?php echo $value['title'] ;?>
	      </a></h2>
	      <p class="lead"><?php echo $value['summary'] ;?></p>
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
<script type="text/javascript" src="//cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script type="text/javascript">
	
</script>
</html>