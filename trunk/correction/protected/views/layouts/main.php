<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="Shortcut Icon" href="favicon.ico"> 
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ct/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ct/custom-theme/jquery-ui-1.8.18.custom.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/basic.js" type="text/javascript"></script>
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
			    <li><a href="<?php echo Yii :: app ()-> homeUrl;?>">Home</a></li>
			    <li><a href="<?php echo Yii :: app ()-> createUrl('site/icorrection');?>">iCorrection</a></li>
			    <li><a href="#">Services</a></li>
			    <?
			    	if(Yii::app()->user->isGuest){
			    ?>
			    <li><b id="signin">Sign In</b><b> / </b><b id="register">Sign Up</b></li>
			    <?
					}else{
			    ?>
			    <li>Welcome,<?echo Yii::app()->user->name?><b id="signout"> / Sign Out</b></li>
			    <?
			    	}
			    ?>
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
			<a href="<?php echo Yii::app()->createUrl('site/contact')?>">Contact</a>
		</p>
		<p class="right"> Copyright &copy; 2012 educ8</p>
	</div>
</div>
<!-- End Footer -->

<div id="signwindow" title="Sign In" style="display:none;">
			<p>Username:</p><input type="text" id="username"  style="width:200px" placeholder="username or email..."/><br/>
			<p>Password:</p><input type="password" id="password" style="width:200px"/><br/>
			<input type="checkbox" id="rememberme" /><label for="rememberme">  Remember Me</label><br/>
			<span id="error" style="color:red"></span>
			<br/><br/>
			<input type="button" value="Sign In" id="signsubmit"/>
			<input type="button" value="Cancel" id="cancelsign" style="margin-left:45px;"/>
</div>


</body>
</html>
