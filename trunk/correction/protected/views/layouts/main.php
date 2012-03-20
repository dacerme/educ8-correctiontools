<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="Shortcut Icon" href="favicon.ico"> 
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ct/style.css" type="text/css" media="all" />
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-func.js" type="text/javascript"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<!-- Logo -->
		<h1 id="logo">Correction Tools<p>educ8</p></h1>
		<!-- End Logo -->
		
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			    <li><a href="#">Home</a></li>
			    <li><a href="#">About</a></li>
			    <li><a href="#">Services</a></li>
			    <li><a href="#">Contact</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
		
	</div>
</div>
<!-- End Header -->

<?php echo $content; ?>

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<p class="left">
			<a href="#">Home</a>
			<span>|</span>
			<a href="#">About</a>
			<span>|</span>
			<a href="#">Services</a>
			<span>|</span>
			<a href="#">Contact</a>
		</p>
		<p class="right">&copy; 2010 Company Name. 
			Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a></p>
	</div>
</div>
<!-- End Footer -->

</body>
</html>
