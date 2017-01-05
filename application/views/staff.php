<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<link rel="stylesheet" type="text/css" href="/static/css/xc-galleryview.css">
<script type="text/javascript" src="/static/js/xc-galleryview.js"></script>
<?php require_once('public/header.php') ?>
<body>
	<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png'); color: #fff">
		<h1 class="text-center" style="margin: 0 auto; line-height: 250px;"><?php echo $this->config->item('staff_title');?></h1>
	</div>
	<div class="container xc-margin text-center">
		<?php
			if (!$staffgroups || $staffgroups['code']) {
				redirect('/404');
			} else if($staffgroups['type'] == 'groups') {
				$divs = [];
				$len = count($staffgroups['item']);
				foreach ($staffgroups['item'] as $key => $value) {
					array_push($divs, '<div class="col-md-4"> <div class="thumbnail">');
					array_push($divs, '<div class="s-icon">图集</div>');
					array_push($divs, '<a href="/news/staff/group_'.$value['id'].'"><img src="'.$value['cover_img_path'].'" style="height:180px;width:100%"></a>');
					array_push($divs, '<div class="caption"><div class="text-center xc-text-wrap">'.$value['name'].'</div></div>');
					array_push($divs, '</div></div>');
					if ($key%3 == 2 || $key == $len-1) {
						echo '<div class="row">'.join('',$divs).'</div>';
						$divs = [];
					}
				}
				echo('<nav class="text-center xc-page-nav"><ul class="pagination">'.$pagination.'</ul></nav>');
			}else{?>
				<h4 class="text-center"><?php echo $staffgroups['title'];?></h4>
				<div class="imgContainer">
					<!--大图-->
					<div class="detailImg" >
						<a id="detailImg-pre">&lt;</a>
						<div id="detailImg-box" class="box"></div>
						<a id="detailImg-next">&gt;</a> 
					</div>
					<!--小图-->
					<div class="smallImg"> 
						<a id="smallImg-pre"></a>
						<div id="smallImg-box" class="box">
							<ul id="smallImg-ul" class="imgUl"></ul>
						</div>
						<a id="smallImg-next"></a> 
					</div>
				</div>
			<?php echo('<script type="text/javascript">XCGV.init('.json_encode($staffgroups['item']).');</script>');}?>
	</div>
	<?php require_once('public/footer.php') ?>
	
	</body>
</html>