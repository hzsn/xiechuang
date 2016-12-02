<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>杭州协创实业有限公司</title>
	<script type="text/javascript" src="/static/js/public.js" ></script>
</head>
<body>
<?php require_once('public/header.php') ?>
<!-- 图片轮播 -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-pause="none">
  <?php $szImg = array('1.png', '2.png', '3.png');
  		$szImgDesc = array('此处填高大上的文字1','此处填高大上的文字2', '此处填高大上的文字3');
  		$len = count($szImg);
  ?>
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php for($i = 0; $i < $len; $i++){
    	if($i == 0){
    		echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
    	}else{
    		echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
    	}
    }?>
  </ol>
  <div class="xc-progress-bar"><span></span></div>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php for($i = 0; $i < $len; $i++){
    	$i == 0 ? $active = 'active' : $active = '';
    ?>
    <div class="item <?php echo $active;?>">
      <a href="/"><img src="/static/img/<?php echo $szImg[$i];?>" alt="..." width="100%" height="100%"></a>
      <div class="carousel-caption">
      	<h2><?php echo $szImgDesc[$i] ?></h2>
      </div>
    </div>
    <?php }?>
  </div>
</div>
<!-- 图片轮播 end-->
<!-- body -->
<div class="xc-section">
	<div class="xc-img-box" style="height: 100%; width: 100%; position: absolute; background: #f5c6c6;">
		<!-- <img src="/static/img/tmp/qiche1.jpg" > -->
	</div>
	<div class="container">
		<div class="row item animatedParent">
			<div class="col-lg-6 col-md-6"></div>
			<div class="col-lg-6 col-md-6 animated bounceInUp go">
				<h1 class="xc-title animated growIn slow go"><a class="xc-icon-title" href="/">公司简介</a></h1>
				<div class="">
					<p>杭州协创实业有限公司是一家以汽车备件仓储管理，物流配送服务，汽车备件信息技术服务为主营业务，辅以整车销售的集团控股公司。</p><p>其实际管理和控股多家公司给全国各大主机厂提供专业的区域售后备件仓储与物流配送服务。</p><p>公司为各汽车品牌提供专业的汽车售后备件保障服务，有着丰富的汽车备件仓储和物流管理经验。</p><p>所辐射的省份已有17个，主要服务品牌包括一汽海马、奇瑞汽车、长安铃木、力帆汽车、天津一汽、福田、东风股份等。<br>对全国的汽车市场具有较为扎实的汽车备件仓储及配送服务运作经验。其中所管理的中心库连续多年位居全国服务榜首。<br>公司以“诚信、专业、服务、创新”为经营理念。倾力打造个性化服务品牌，为汽车厂家提供全方位、专业化的售后备件服务。</p><p>我们的使命，用最短的备件供货周期，及时满足顾客需求（高供应率），最大化提升售后服务满意度和优化库存带来的低库存金额，以获得良好的营业收益。<br>杭州协创为您提供：<br>舒适的工作环境：让您在舒适的工作环境中与充满理想的同仁共事，开拓广泛的视野。<br>专业的增值培训：为您提供专业知识培训、拓展培训，职位资格培训<br></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="xc-section">
	<div class="xc-img-box" style="height: 100%; width: 100%; position: absolute;">
		<!-- <img src="/static/img/tmp/qiche1.jpg" > -->
	</div>
	<div class="container">
		<div class="row item animatedParent">
			<div class="col-lg-6 col-md-6 animated bounceInUp go">
				<h1 class="xc-title animated growIn slow go"><a class="xc-icon-title" href="/">综合资讯</a></h1>
				<div class="list-group" style="margin-top: 35px;">
				  <a href="#" class="list-group-item"><span>新闻标题1</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题1</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题2</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题3</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题4</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题2</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题3</span><span>2016-11-29</span></a>
				  <a href="#" class="list-group-item"><span>新闻标题4</span><span>2016-11-29</span></a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 animated bounceInUp go">
				<h1 class="xc-title animated growIn slow go"><a class="xc-icon-title" href="/">经营业务</a></h1>
				<div class="col-md-6">
					<div style="margin-top:25px;height: 150px;background-color: #ea4b13; line-height: 150px;/*background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg)*/; cursor: pointer;" class="text-center">
						<div style="color: #fff; font-size: 24px">配件仓储与配送</div>
					</div>
				</div>
				<div class="col-md-6">
					<div style="margin-top:25px;height: 150px;background-color: #bbbbbb; line-height: 150px;/*background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg)*/;cursor: pointer;" class="text-center">
						<div style="color: #fff; font-size: 24px">4S店</div>
					</div>
				</div>
				<div class="col-md-6">
					<div style="margin-top:25px;height: 150px;background-color: #bbbbbb; line-height: 150px;/*background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg)*/;cursor: pointer;" class="text-center">
						<div style="color: #fff; font-size: 24px">修理厂</div>
					</div>
				</div>
				<div class="col-md-6">
					<div style="margin-top:25px;height: 150px;background-color: #ea4b13; line-height: 150px;/*background-image: url(http://10447105.s61i.faiusr.com/2/AD0IgdL9BBACGAAg_aOfvgUoz5PwjQQw7wI46gE.jpg)*/;cursor: pointer;" class="text-center">
						<div style="color: #fff; font-size: 24px">网络销售平台</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="xc-section">
	<div class="xc-img-box" style="height: 100%; width: 100%; position: absolute; background: #f4f4f4;">
		<!-- <img src="/static/img/tmp/qiche1.jpg" > -->
	</div>
	<div class="container">
		<div class="row item animatedParent">
			<h1 class="xc-title animated growIn slow go"><a class="xc-icon-title" href="/">企业文化</a></h1>
			<div class="animated bounceInUp go">
				<p>企业文化</p>
			</div>
		</div>
	</div>
</div>
<div class="container animatedParent">
	<div class="animated bounceInUp go">
		<h1 class="xc-title animated growIn slow go"><a class="xc-icon-title" href="/">合作伙伴</a></h1>
		<div class="xc-margin">
			<ul class="xc-firends-box">
				<li>
				<img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true">
				</li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
				<li><img data-src="holder.js/140x140" class="img-rounded" alt="140x140" style="width: 200px; height: 60px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjQ3NjU2MjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"></li>
			</ul>
		</div>
	</div>
</div>

<!-- body end -->

<?php require_once('public/footer.php') ?>
<!-- <div id="xc-backtop" class="xc-backtop-box">
	<span class="glyphicon glyphicon-chevron-up"></span>
</div> -->
</body>
<script type="text/javascript" src="/static/css3animate/js/css3-animate-it.js" ></script>
<script>
  $(function(){
  	_height = $(window).height();
  	if (_height > 600) {
  		_height = _height>650 ? 650:_height;
  		$('.carousel').css({
	  		'height':_height+'px',
	  	});
	  	$('.carousel .item').css({
	  		'max-height':_height+'px',
	  	});
  	}
  });

  

</script>
</html>