<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo CHtml::encode($this->pageTitle);?></title>
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
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/icheck/skins/all.css" rel="stylesheet"/>
<!-- END PAGE LEVEL SCRIPTS -->
<?php
 if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site"){
?>
<!-- page level plugin styles -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<?php
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<!-- BEGIN THEME STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public//global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/themes/grey.css" rel="stylesheet" type="text/css">
<!-- <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/> -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!--my css-->
<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/css/layout.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!--start js-->
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip 
-->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/icheck/icheck.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<?php
 if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site"){
?>
<!--load script-->
<!-- page level scripts -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<!-- /page level scripts -->
<?php
}
?>

<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/demo.js" type="text/javascript"></script>
<?php
 if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site"){
?>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/maps-vector.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/maps-vector-china.js"></script>
<?php
}
?>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/scripts/datatable.js"></script>
<?php
 if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site"){
?>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/js/site_map.js"></script>
<?php
    }
?>
<!--pharma-->
<?php
 if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="pharma"){
?>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/charts/esl.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<?php
}
?>
<script>
jQuery(document).ready(function() {    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
});
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {   
        //Hide the overview when click
        $('#someid').on('click', function () {
            $('#OverviewcollapseButton').removeClass("collapse").addClass("expand"); 
            $('#PaymentOverview').hide();
        });
        //table
        //tableInit();
        filter();
    });
    var filter = function(){
        $("button[data-target='#dropdown']").click(function(){
            var i = $(this).find("i");
            if(i.attr("class")=="fa fa-angle-down"){
                i.attr('class','fa fa-angle-up');
            }else{
                i.attr('class','fa fa-angle-down');
            }
            //console.log(i);
        });
    }
    // $(".group-checkable").click(function(){
    //     alert("111");
    //   });
</script>
<!-- auto load scritp fild -->
<?php
  $con_act_path = Yii::app()->controller->id."_".$this->getAction()->getId();
  $path = Yii::app()->request->baseUrl."/public/admin/js/".$con_act_path.".js";
  $file_path = "/public/admin/js/".$con_act_path.".js";
  $url = '"'.$this->createUrl(Yii::app()->controller->id."/json".$con_act_path).'"'; 
  $dir = dirname(Yii::app()->BasePath);
  if(is_file($dir.$file_path)){
    echo "<script src='".$path."'></script>";
    echo '<script> $(function(){ '.$con_act_path.'('.$url.')}); </script>';
  }
?>

<!-- END JAVASCRIPTS -->
<!--end js-->

</head>
<!-- END HEAD -->
<!-- <body class="page-header-fixed page-quick-sidebar-over-content page-container-bg-solid page-sidebar-reversed" style="overflow-x: hidden;"> -->
<body class="page-header-fixed page-quick-sidebar-over-content page-container-bg-solid page-sidebar-reversed page-sidebar-closed" style="overflow-x: hidden;">
<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo Yii::app()->homeUrl;?>">
                <img src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/img/logo.png" alt="logo" class="logo-default"/>       
            </a>
        </div>
		<!-- START HORIZANTAL MENU -->
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
                <li class="classic-menu-dropdown">
                    <a data-toggle="dropdown" href="javascript:;">
                        Development Center <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <a href="<?php echo $this->createUrl('pharma/index');?>">
                                Pharma companies
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">Other sponsors</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:;">
                                        Device maker</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        University/Research institutes</a>
                                </li>
                                 <li>
                                     <a href="#">
                                     Hospitals/Doctors</a>
                                 </li>
                                <li>
                                    <a href="#">
                                        Org/Gov</a>
                                </li>
                                <li>
                                    <a href="index.html">
                                        Others</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">Products</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->createUrl("drug/index",array("target"=>'approved'));?>">
                                        Approved products</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl("drug/index",array("target"=>'investigational'));?>">
                                        Investigational products</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl("trials/index");?>">
                                Clinical trials
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl('registration/index');?>">
                                Registration
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="classic-menu-dropdown">
                    <a data-toggle="dropdown" href="javascript:;">
                        Resource Center<i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <a href="#">
                                Preclinical GCP labs
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->createURl("site/index")?>">
                                Clinical sites
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl("investigator/index");?>">
                                Investigators
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                CROs
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="classic-menu-dropdown">
                    <a data-toggle="dropdown" href="javascript:;">
                        Knowledge Base<i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <a href="javascript:;">
                                Patents </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Publications </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Regulations </a>
                        </li>
                    </ul>
                </li>
            </ul>
		</div>
		<!-- END HORIZANTAL MENU -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target="#navbar-collapse">
		</a>
		<a href="javascript:;" class="menu-toggler tools-menu responsive-toggler" data-toggle="collapse" data-target="#mynavbar-collapse">
		</a>
		<div class="menu-toggler tools-toggler sidebar-toggler">
		</div>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-language">
                    <?php
                        if(!empty(Yii::app()->request->cookies['lang']->value) && Yii::app()->request->cookies['lang']->value=="zh_cn"){
                    ?>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                        <img src="<?php echo Yii::app()->request->baseUrl;?>/public/global/img/flags/cn.png">
                        <i  class="fa fa-angle-down"></i>
                    </a>
                    <?php
                    }else{
                    ?>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                        <img src="<?php echo Yii::app()->request->baseUrl;?>/public/global/img/flags/us.png">
                        <i  class="fa fa-angle-down"></i>
                    </a>
                    <?php
                    }
                    ?>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li <?php
                        if(!empty(Yii::app()->request->cookies['lang']->value) && Yii::app()->request->cookies['lang']->value=="zh_cn"){
                            echo 'class="active"';}?> >
                            <a href="<?php echo $this->createUrl(substr(Yii::app()->getRequest()->queryString,2) ,array("lang"=>'zh_cn'));?>">
                                <img src="<?php echo Yii::app()->request->baseUrl;?>/public/global/img/flags/cn.png">
                                Chinese
                            </a>
                        </li>
                        <li <?php
                        if(!empty(Yii::app()->request->cookies['lang']->value) && Yii::app()->request->cookies['lang']->value=="us_en"){
                            echo 'class="active"';}?>>
                            <a href="<?php echo $this->createUrl(substr(Yii::app()->getRequest()->queryString,2),array("lang"=>'us_en'));?>">
                                <img src="<?php echo Yii::app()->request->baseUrl;?>/public/global/img/flags/us.png">
                                English
                            </a>
                        </li>
                    </ul>
                </li>
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile"><?php echo Yii::app()->user->id;?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
                        <?php
                        if(empty(Yii::app()->user->id)){
                        ?>
						<li>
							<a href="<?php echo $this->createUrl("login/index");?>">
							<i class="fa fa-sign-in"></i>Sign in</a>
						</li>
                        <?php
                            }
                        ?>
						<li>
							<a href="<?php echo $this->createUrl("login/logout");?>">
							<i class="fa fa-sign-out"></i>Sign out</a>
						</li>
					</ul>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse" id="navbar-collapse">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="active open">
                    <a href="javascript:;">
                        <i class="icon-rocket"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Development Center</h3>
                </li>
                <li>
                    <a href="#">
                        <span class="badge badge-my badge-default">7 </span>
                        <i class="icon-settings"></i>
                        <span class="title">Pharma companies</span>
                        
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="badge badge-my badge-default">5</span>
                        <i class="icon-briefcase"></i>
                        <span class="title">Other sponsors</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                Device maker</a>
                        </li>
                        <li>
                            <a href="#">
                                University/Research institutes</a>
                        </li>
                        <li>
                            <a href="#">
                                Hospitals/Doctors</a>
                        </li>
                        <li>
                            <a href="#">
                                Org/Gov</a>
                        </li>
                        <li>
                            <a href="#">
                                Others</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="badge badge-my badge-default">10</span>
                        <i class="icon-wallet"></i>
                        <span class="title">Products</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                Approved products</a>
                        </li>
                        <li>
                            <a href="#">
                                Investigational products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="badge badge-my badge-default">15</span>
                        <i class="icon-bar-chart"></i>
                        <span class="title">Clinical trials </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="badge badge-my badge-default">12</span>
                        <i class="icon-docs"></i>
                        <span class="title">Registration</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Resource Center</h3>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="badge badge-my badge-default">15</span>
                        <i class="icon-logout"></i>
                        <span class="title">Preclinical GCP labs</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-envelope-open"></i>
                        <span class="title">Clinical sites</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-envelope-open"></i>
                        <span class="title">Investigators</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-envelope-open"></i>
                        <span class="title">CROs</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Knowledge Base</h3>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-wallet"></i>
                        <span class="title">Patents</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-wallet"></i>
                        <span class="title">Publications</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-wallet"></i>
                        <span class="title">Regulations</span>
                    </a>
                </li>
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>




		<!-- START HORIZONTAL RESPONSIVE MENU -->
		<div class="page-sidebar navbar-collapse collapse" aria-expanded="false" style="height: 0 !important;" id="mynavbar-collapse">
			<ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true">
                <li>
                    <a href="javascript:;">
                        Development Center <span class="arrow">
					</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                Pharma companies
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Other sponsors<span class="arrow">
							</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        Device maker</a>
                                </li>
                                <li>
                                    <a href="#">
                                        University/Research institutes</a>
                                </li>
                                <li>
                                    <a href="#">
                                        Hospitals/Doctors</a>
                                </li>
                                <li>
                                    <a href="#">
                                        Org/Gov</a>
                                </li>
                                <li>
                                    <a href="#">
                                        Others</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Products <span class="arrow">
							</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        Approved products</a>
                                </li>
                                <li>
                                    <a href="#">
                                        Investigational products</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Clinical trials</a>
                        </li>
                        <li>
                            <a href="#">
                                Registration</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        Resource Center<span class="arrow">
					</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                Preclinical GCP labs
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Clinical sites
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Investigators
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                CROs
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a>
                        Knowledge Base <span class="arrow">
					</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                Patents</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Publications</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Regulations</a>
                        </li>
                    </ul>
                </li>
            </ul>
		</div>
		<!-- END HORIZONTAL RESPONSIVE MENU -->
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">

            <?php
                echo $content;
            ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; China R&D Center
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
</body>
<!-- END BODY -->
</html>