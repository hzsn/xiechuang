<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<div class="xc-ban-titile">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;">协创-新闻动态</h1>
</div>
<div class="container xc-margin">
	<?php for($i = 0; $i < 6; $i++){?>
	<div class="row xc-news-box">
	    <div class="col-md-5 xc-news-img" style="background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg);">
	      <a href="/article/1" class="xc-news-date">
	          	<div>2016-12-01</div>
	      </a>
	    </div>
	    <div class="col-md-7 xc-news-body">
	      <h2 class="xc-news-heading xc-text-wrap"><a href="/article/1">Oh yeah, it's that good.Oh yeah, it's that good.Oh yeah, it's that good.Oh yeah, it's that good.</a></h2>
	      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodoDonec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodoDonec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodoDonec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
	    </div>
	 </div>
     <?php if ($i < 5) {
     	echo "<hr>";
     }}?>
     <!-- 分页 -->
     <nav class="text-center xc-page-nav">
	  <ul class="pagination">
	    <li class="diabled"><a href="#">&laquo;</a></li>
	    <li class="active"><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li><a href="#">&raquo;</a></li>
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