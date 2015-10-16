<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>China R&D Center</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/font.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/css/login2.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#">
	<!-- <img src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/img/logo-big-white.png" style="height: 17px;" alt=""/> -->
		R&D Center
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php echo $this->createUrl("login/login");?>" method="post">
		<div class="form-title">
			<span class="form-title">Welcome to</span>
			<span class="form-subtitle">China R&D Center</span>
		</div>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>Enter any Email or  Email error,Please confire. </span>
		</div>
		<?php
		if(!empty($_REQUEST['error'])){
		?>
		<div class="alert alert-danger display-hide" style="display:block;">
			<button class="close" data-close="alert"></button>
			<span><?php echo $_REQUEST['error'];?> </span>
		</div>
		<?php
			}
		?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">user email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="User email" name="UserEmail"/>
		</div>
		<!-- <div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div> -->
		<div class="form-actions">
			<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;">Already have a session password</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
</div>
<div class="copyright hide">
	 2014 © Metronic. Admin Dashboard Template.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>