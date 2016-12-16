<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<?php require_once('public/head.php') ?>
<?php require_once('public/header.php') ?>
<body>
<div class="xc-ban-titile" style="background-image: url('http://9429871.s21i-9.faiusr.com/4/ABUIABAEGAAg8cK7uQUoycz80wMwgA84rAI.png'); color: #fff">
	<h1 class="text-center" style="margin: 0 auto; line-height: 250px;"><?php echo $aboutxc_title;?></h1>
</div>
<div class="container">
	<div class="row xc-article-content-box">
		<?php echo $brief['brief_introduction'] ?>
	</div>
</div>

<?php require_once('public/footer.php') ?>
</body>
</html>