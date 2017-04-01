<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php');?>
<?php require_once('public/header.php'); ?>
<body>
<!-- 图片轮播 -->
<div id="xc-big-carousel" class="carousel slide" data-ride="carousel" data-pause="none">
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
    		<div class="xc-img-box" style="background-image: url(<?php echo base_url($this->config->item('carousel').$carousel[$i]['img_path']) ?>);"></div>	
    	</div>
      <div class="carousel-caption" style="background-color: <?php echo $bgcss;?>">
      	<h2><?php echo  $item_desc?></h2>
      </div>
    </div>
    <?php }?>
  </div>
</div>
<!-- 图片轮播 end-->

<!-- body -->
<div class="xc-section container">
	<div class="row animatedParent" style="height: 400px">
		<h2 class="xc-title text-center"><?php echo $brief['title'] ?></h2>
			
		<div class="col-lg-6 col-md-6 animated fadeInUpShort go">
			<div class="xc-img-box" style="background-image: url(<?php echo $brief['bg_img']?>); height: 275px"></div>
		</div>
		<div class="col-lg-6 col-md-6 animated fadeInUpShort go">
			<div class="xc-panel-box" style="margin: 10px 0 0 35px;">
				<div style="height: 12.6em;overflow: hidden;"><?php echo $brief['brief_summary'] ?></div>
				<div class="text-center" style="margin-top: 15px;"><a class="xc-button xc-button-red" href="/aboutxc">查看更多</a></div>
			</div>
		</div>
	</div>
</div>
<div class="xc-section">
	<div class="xc-img-box" style="background-color: #f5f5f5;z-index: -1;">
	</div>
	<div class="container">
		<div class="row animatedParent animateOnce">
			<h2 class="xc-title text-center" style="color: rgb(247,9,9);"><?php echo $business['title']?></h2>	
			<?php 
				$item = $business['content'];
				for($i = 0; $i < count($item); $i++){
			?>
			<div class="col-md-3 xc-buss-box">
				<div class="xc-buss-wapper animated fadeInUpShort">
					<div class="xc-buss-bg" style="background-image: url(<?php echo $item[$i]['item_img'];?>);"></div>
					<div class="xc-buss-content-box">
							<div class="xc-buss-content-title"><?php echo $item[$i]['item_title'];?></div>
							<div class="xc-buss-content"><?php echo $item[$i]['item_desc'];?></div>
					</div>
					<div class="xc-buss-title"><?php echo $item[$i]['item_title'];?></div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<div class="xc-section" style="background-color: #fdfdfd">
    <div class="container">
        <div class="row animatedParent animateOnce">
        	<h2 class="xc-title text-center"><?php echo $this->config->item('news_title'); ?></h2>	
        	<?php 
        		if (!$news) {
        			echo '没有数据';
        		}else if ($news['code']) {
        			echo $news['msg'];
        		}else{
        			echo $news['item'];
        		}
        	;?>
        </div>
    </div>    
</div>
<!-- body end -->
<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<?php require_once('public/footer.php') ?>
</body>
</html>