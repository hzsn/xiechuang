<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php');?>
<?php require_once('public/header.php'); ?>
<body>
<!-- 图片轮播 -->
<div id="xc-big-carousel" class="carousel slide container" data-ride="carousel" data-pause="none">
    <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php
  	$len = count($carousel);
  	for($i = 0; $i < $len; $i++){
    	if($i == 0){
    		echo '<li data-target="#xc-big-carousel" data-slide-to="'.$i.'" class="active"></li>';
    	}else{
    		echo '<li data-target="#xc-big-carousel" data-slide-to="'.$i.'"></li>';
    	}
    }?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php for($i = 0; $i < $len; $i++){
    	$i == 0 ? $active = 'active' : $active = '';
    	$item_desc = $carousel[$i]['item_desc'];
    	$bgcss = $item_desc ? 'rgba(0,0,0, 0.1)' : 'rgba(0,0,0,0)';
    ?>
    <div class="item <?php echo $active;?>">
    	<div style="position: relative; width: 100%;height: 100%">
    		<div class="xc-img-box" style="background-image: url('<?php echo $carousel[$i]['img_path'];?>');"></div>	
    	</div>
      <div class="carousel-caption" style="background-color: <?php echo $bgcss;?>">
      	<h2><?php echo  $item_desc?></h2>
      </div>
    </div>
    <?php }?>
  </div>
</div>
<!-- 图片轮播 end-->
<!-- 侧边固定栏 -->
<div class="xc-slide-fixed">
	<img class ='xc-slide-img' src="/static/img/csh_weixin-2.jpg">
	<img class ='xc-slide-img' src="/static/img/csh_weixin-2.jpg">
	<!-- <div class="xc-slide-item">
		<img id="img-guanzhu" class="xc-slide-img-item" src="/static/img/slide-img-1.png">
		<img class ='xc-slide-img' src="/static/img/csh_weixin-2.jpg">
	</div>
	<div class="xc-slide-item xc-slide-item-last">
		<img id="img-app" class="xc-slide-img-item" src="/static/img/slide-img-app.png">
		<img class ='xc-slide-img' src="/static/img/csh_weixin-2.jpg">
	</div> -->
</div>
<!-- 侧边固定栏 end-->
<!-- body -->
<div class="xc-section container">
	<!-- <div class="xc-img-box" style="height: 100%; width: 100%; position: absolute;">
		<img src="/static/img/tmp/qiche1.jpg" >
	</div> -->
	<div class="row item animatedParent">
		<div class="col-lg-6 col-md-6 animated bounceInUp go">
			<h2 class="xc-title animated bounceInUp slow go"><a class="xc-icon-title" href="/"><?php echo $news['title'];?></a></h2>
			<div class="list-group" style="">
				<?php 
					foreach ($news['item'] as $value) {
				?>
					<a href="/article/<?php echo $value['id'];?>" class="list-group-item">
						<span><?php echo $value['title'];?></span>
						<span><?php echo explode(' ', $value['create_time'])[0];?></span>
					</a>
				<?php }?>
				
			</div>
		</div>
		<div class="col-lg-6 col-md-6 animated bounceInUp go">
			<h2 class="xc-title animated bounceInUp slow go"><a class="xc-icon-title" href="/"><?php echo $business['title']?></a></h2>
			<?php 
				$item = $business['content'];
				for($i = 0; $i < count($item); $i++){
					if ($i%2) {
						$style = "padding: 0px 0px 0px 5px;";
					}else{
						$style = "padding: 0px 5px 0px 0px;";
					}
			?>
			<div class="col-md-6" style="<?php echo $style;?>">
				<div class="text-center xc-rect-item" style="background-image: url(<?php echo $item[$i]['item_img'];?>);">
					<div class="xc-rect-item-title"><?php echo $item[$i]['item_title'] ?></div>
					<div class="xc-rect-item-desc"><?php echo $item[$i]['item_desc'] ?></div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<div class="xc-section container">
	<div class="row xc-img-box" style="background-image: url(<?php echo $brief['bg_img']?>);">
		<!-- <img src="/static/img/273544429841561048.jpg" > -->
		<div style="height: 100%; width: 60%;background-color: rgba(0,0,0,.7);" class="fl-r"></div>
	</div>
	<div class="row item animatedParent" >
		<div class="col-lg-6 col-md-6"></div>
		<div class="col-lg-6 col-md-6 animated bounceInUp go">
			<h2 class="xc-title animated bounceInUp slow go"><a class="xc-icon-title" href="/"><?php echo $brief['title'] ?></a></h2>
			<div class="" style="/*font-weight: bold;*/color: #fff"><?php echo $brief['brief_introduction'] ?></div>
		</div>
	</div>
</div>
<div class="xc-section container">
	<!-- <div class="xc-img-box" style="height: 100%; width: 100%; position: absolute;">
		<img src="/static/img/tmp/qiche1.jpg" >
	</div> -->
	<div class="row item animatedParent">
		<h2 class="xc-title animated bounceInUp slow go"><a class="xc-icon-title" href="/">企业文化</a></h2>
		<!-- <div class="fl-l">
			<img class="fl-l img-responsive animated fadeInLeft" src="/static/img/qiyejingshen-1.jpg" width="270">
			<img class="fl-l img-responsive animated fadeInLeft" src="/static/img/qiyeshiming-1.jpg" width="270">
			<img class="fl-l img-responsive animated fadeInLeft" src="/static/img/jingyinglinian-1.jpg" width="270">
		</div> -->
		<!-- <div class="text-center">
			<h3>人在一起叫聚会</h3>
			<h3>心在一起叫团队</h3>
		</div> -->
		<div class="col-md-4 col-lg-4 text-left">
			<img class="img-responsive animated fadeInLeft" src="/static/img/qiyejingshen-1.jpg" width="270">
		</div>
		<div class="col-md-4 col-lg-4 text-center">
			<img class="img-responsive animated fadeInLeft" src="/static/img/qiyeshiming-1.jpg" width="270" style="display: inline-block;">
		</div>
		<div class="col-md-4 col-lg-4 text-right">
			<img class="img-responsive animated fadeInLeft" src="/static/img/jingyinglinian-1.jpg" width="270" style="display: inline-block;">
		</div>
		<!-- <div class="animated bounceInUp go">
			
		</div> -->
	</div>
</div>
<div class="container animatedParent">
	<div class="">
		<h2 class="xc-title animated bounceInUp slow go">
		<a class="xc-icon-title" href="/">
		<?php echo $cooperator['title'];?>
		</a></h2>
		<div class="xc-margin">
			<ul class="xc-firends-box animated fadeInRight go">
				<?php foreach ($cooperator['item'] as $value) {	?>
				<li>
				<div><img class="img-rounded" alt="<?php echo $value['name'];?>" style="width: 200px; height: 120px" src="/static/img/<?php echo $value['img_path'];?>" data-holder-rendered="true"></div>
				<div class="xc-pos-abs text-center xc-firends-text" style="opacity: 0"><?php echo $value['name'];?></div>
				</li>
				<?php }?>
				
			</ul>
		</div>
	</div>
</div>

<!-- body end -->
<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<?php require_once('public/footer.php') ?>

<!-- <div id="xc-backtop" class="xc-backtop-box">
	<span class="glyphicon glyphicon-chevron-up"></span>
</div> -->
</body>
<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<script>
  $(function(){
  	_height = $(window).height();
  	// if (_height > 800) {
  	// 	_height = _height>650 ? 650:_height;
  	// 	$('.carousel').css({
	  // 		'height':_height+'px',
	  // 	});
	  // 	$('.carousel .item').css({
	  // 		'max-height':_height+'px',
	  // 	});
  	// }
  });

  

</script>
</html>

<!-- 
<div class="col-md-8">
                <div class="xc-news-i-box xc-news-large">
                	<div class="col-md-6 xc-news-i-img"  style="background-image: url('http://www.hdu.edu.cn/uploads/images/20160321/201603211104281000.jpg');">
                        <a class="xc-news-i-title text-right" href="/article/0">此........行......标............题........特.....别.....长.......</a>
                        <span class="xc-news-i-date" style="right: 0">2016-12-21</span>
                    </div>
                    <div class="col-md-6 xc-height100">
                        <div class="xc-news-i-content"></div>
                    </div>
                </div>
                <div class="xc-news-i-box xc-news-large">
                    <div class="col-md-6 xc-height100">
                        <div class="xc-news-i-content">
                        <p>kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf, ha.
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha</p>
                        </div>
                    </div>
                    <div class="col-md-6 xc-news-i-img" style="background-image: url('http://www.hdu.edu.cn/uploads/images/20160321/201603211104281000.jpg');">
                        <a class="xc-news-i-title text-text" href="/article/0">标题</a>
                        <span class="xc-news-i-date" style="left: 0">2016-12-21</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 xc-news-i-box" style="padding-left: 0px;">
                <div class="xc-news-i-img" style="background-image: url('http://www.hdu.edu.cn/uploads/images/20160321/201603211104281000.jpg');height: 157.5px;">
                        <a class="xc-news-i-title text-right" href="/article/0">标题</a>
                        <span class="xc-news-i-date" style="right: 0">2016-12-21</span>
                </div>
                <div class="xc-height100 xc-news-small">
                   <div class="xc-news-i-content">
                   	<p>kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf, ha.
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha
                        kasjd hfiu, a asj, fkja;ksjdfkja hs i dfhasl kdjf. ha</p>
                    </div>
                </div>
            </div>
        </div>
 -->