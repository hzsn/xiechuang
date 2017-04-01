<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('<?php echo base_url($this->config->item('banner')['contact']); ?>');">
	<h1 class="text-center"><span><?php echo $joinus_title;?></span></h1>
</div>
<div class="container">
	<div class="row text-center">
		<h3>虚位以待</h3>
		<div>
			<p class="text-left">人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）人才是公司的宝贵资源（此处更换）</p>
		</div>
	</div>
	<!-- table -->
	<?php
		$job_attrs = array(
			'thead' => ['name', 'address', 'recruit_count', 'create_time'],
			'h_desc'=>['ability', 'requirement'],
			);
		if (isset($jobStock)) {
	?>
	<table id="joinus-box" class="row table table-bordered text-center xc-table">
	  <thead>
	  	<tr>
	  		<?php 
		  		$job_attr = $jobStock['attr'];
				foreach ($job_attr as $key => $value) {
					if(in_array($key, $job_attrs['thead'])){
						echo '<th>'.$value.'</th>';
					}
				}
			?>
	  	</tr>
	  </thead>
	  <tbody>
	  	<?php 
	  		$jobs = $jobStock['jobs'];
		  	$collen = count($job_attrs['thead']);
		  	foreach ($jobs as $key => $value) {
		  		$tr_head = '<tr class="joinus-info" data-joinus-desc="joinus-desc-'.$key.'">';
				$tr_desc = '<tr><td class="joinus-item-box" colspan="'.$collen.'">';
				$tr_desc .= '<div id="joinus-desc-'.$key.'" class="text-left joinus-item">';
				foreach ($value as $subkey => $subvalue) {
		  			if(in_array($subkey, $job_attrs['thead'])){
						$tr_head .= '<td class="'.$subkey.'">'.$subvalue.'</td>';
					}elseif (in_array($subkey, $job_attrs['h_desc'])) {
						$tr_desc .= '<div class="col-md-6 joinus-item-inner">';
				  		$tr_desc .= '<h4>'.$job_attr[$subkey].'</h4>';
				  		$tr_desc .= '<div>'.$subvalue.'</div>';
				  		$tr_desc .='</div>';
					}
				}
				$tr_head .= '</tr>';
				$tr_desc .= '</div></td></tr>';
				
		  		echo $tr_head.$tr_desc;

		  	}
		  	;?>
	  </tbody>
	</table>
	<?php } ;?>
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