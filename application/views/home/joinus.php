<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png');">
	<h1 class="text-center"><span><?php echo $joinus_title;?></span></h1>
</div>
<div class="container">
	<div class="row text-center">
		<h3>虚位以待</h3>
		<div>
			<p class="text-left">人才是公司的宝贵资源（此处更换）</p>
		</div>
	</div>
	<!-- table -->
	<table id="joinus-box" class="row table table-bordered text-center xc-table">
	<?php
		$jobs = array(
			'thead'=>['h_name' => '职位名称', 'h_addr' => '工作地点', 'h_count' => '招聘人数', 'h_time' => '发布时间'],
			'tbody'=>[
				['d_name' => '职位名称 1', 'd_addr' => '杭州', 'd_count' => '2', 'd_time' => '2016-12-17',
				'd_desc'=>[
					'岗位职责' => '负责完成领导交办的其他事项',
					'职位要求' => '两年以上工作经验<br>工作认真'
					]
				],
				['d_name' => '职位名称 2', 'd_addr' => '杭州,天津', 'd_count' => '4', 'd_time' => '2016-12-17',
				'd_desc'=>[
					'岗位职责' => '负责完成领导交办的其他事项',
					'职位要求' => '两年以上工作经验'
					]
				],
				['d_name' => '职位名称 3', 'd_addr' => '天津', 'd_count' => '1', 'd_time' => '2016-12-17',
				'd_desc'=>[
					'岗位职责' => '负责完成领导交办的其他事项',
					'职位要求' => '两年以上工作经验'
					]],
				['d_name' => '职位名称 4', 'd_addr' => '芜湖，天津', 'd_count' => '1', 'd_time' => '2016-12-17',
				'd_desc'=>[
					'岗位职责' => '负责完成领导交办的其他事项',
					'职位要求' => '两年以上工作经验'
					]],
				['d_name' => '职位名称 5', 'd_addr' => '全国', 'd_count' => '3', 'd_time' => '2016-12-17',
				'd_desc'=>[
					'岗位职责' => '负责完成领导交办的其他事项',
					'职位要求' => '两年以上工作经验'
					]],
			]
			); 
	?>
	  <thead>
	  	<tr>
	  		<?php foreach ($jobs['thead'] as $key => $value) {
	  			echo '<th>'.$value.'</th>';
	  		} ?>
	  	</tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	$collen = count($jobs['thead']);
	  	foreach ($jobs['tbody'] as $key => $value) {
	  		$tr = '<tr class="joinus-info" data-joinus-desc="joinus-desc-'.$key.'">';
	  		foreach ($value as $subkey => $subvalue) {
	  			if($subkey == 'd_desc') continue;
	  			$tr .= '<td class="'.$subkey.'">'.$subvalue.'</td>';	
	  		}
	  		$tr .= '</tr>';
	  		$tr .= '<tr><td class="joinus-item-box" colspan="'.$collen.'">';
	  		$tr .= '<div id="joinus-desc-'.$key.'" class="text-left joinus-item">';
	  		foreach ($value['d_desc'] as $desc_key => $desc_value) {
	  			$tr .= '<div class="col-md-6 joinus-item-inner">';
		  		$tr .= '<h4>'.$desc_key.'</h4>';
		  		$tr .= '<div>'.$desc_value.'</div>';
		  		$tr .='</div>';
	  		}
	  		$tr .= '</div></td></tr>';
	  		echo $tr;
	  	} ;?>
	  </tbody>
	</table>
	<!-- table end-->
	
</div>

<?php require_once('public/footer.php') ?>
</body>
<script type="text/javascript">
	$(function () {
		$('#joinus-desc-0').show();
		$('#joinus-box').on('click', '.joinus-info', function(){
			$('#'+$(this).data('joinusDesc')).toggle('normal');
			
		});
	});
</script>
</html>