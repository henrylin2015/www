<!DOCTYPE html>
<html lang="en">
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
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<!-- BEGIN THEME STYLES -->
		
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!--  <link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/> -->
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
		<link id="style_color" href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/themes/grey.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/timeline.css" rel="stylesheet" type="text/css"/>
		<!--my css-->
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/css/layout.css" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="favicon.ico"/>



		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-migrate.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.blockui.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jquery.cokie.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/uniform/jquery.uniform.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/select2/select2.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public//global/plugins/icheck/icheck.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.stack.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/flot/jquery.flot.categories.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/icheck/icheck.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/scripts/metronic.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/layout.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/quick-sidebar.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/scripts/demo.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/scripts/datatable.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/chart/Chart.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/global/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/maps-vector.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/maps-vector-china.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/pages/scripts/dataTablesAjax.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/js/mrd_common.js"></script>	
		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/myplugins/pages/jquery.nav.js"></script>
		<!--page one-->

		<script src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/charts/esl.js"></script>
	</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-container-bg-solid page-sidebar-reversed page-sidebar-closed" style="overflow-x: hidden;">
<div class="page-header navbar navbar-fixed-top topbar-menu">
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo Yii::app()->homeUrl;?>">
                <img src="<?php echo Yii::app()->request->baseUrl;?>/public/admin/layout/img/logo-icon-white.png" alt="logo" class="logo-default"/>       
            </a>
        </div>
		<!-- START HORIZANTAL MENU -->
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
            <ul class="nav navbar-nav center-menu">
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="pharma") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createUrl('pharma/index');?>" class="uppercase">
                                Company
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="drug") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createUrl("drug/index");?>"  class="uppercase">Product
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="trials") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createUrl("trials/index");?>"  class="uppercase">
                                Trial
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="registration") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createUrl('registration/index');?>"  class="uppercase">
                                Registration
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createURl("site/index")?>" class="uppercase">
                        Site
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="investigator") { echo 'class="current"';}?>>
                    <a href="<?php echo $this->createUrl("investigator/index");?>"  class="uppercase">
                        Investigator
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="cro") { echo 'class="current"';}?>>
                    <a href="#" class="uppercase">
                        CRO
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="publications") { echo 'class="current"';}?>>
                    <a href="javascript:;" class="uppercase">Publication</a>
                </li>
                <li <?php if(Yii::app()->controller->id=="patent") { echo 'class="current"';}?>>
                    <a href="javascript:;"  class="uppercase">
                        Patent
                    </a>
                </li>
                <li <?php if(Yii::app()->controller->id=="patent") { echo 'class="current"';}?>>
                    <a href="javascript:;"  class="uppercase">
                        Policies
                    </a>
                </li>
            </ul>
        </div>
		<!-- END HORIZANTAL MENU -->
		<a href="javascript:;" class="menu-toggler tools-menu responsive-toggler" data-toggle="collapse" data-target="#mynavbar-collapse">
		</a>
        <div class="top-menu" >
            <ul class="nav navbar-nav pull-right" >
                <li class="dropdown dropdown-user sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#navbar-collapse" data-close-others="true">
                        <span class="username username-hide-on-mobile class="uppercase""><?php echo Yii::app()->user->id;?>'s R&D Center</span> <i class="fa fa-angle-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
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
                <li>
                    <a href="<?php echo $this->createUrl("login/logout");?>"> <i class="icon-key"></i>
                        <span class="title">Logout</span>

                    </a>
                </li>
                <li class="heading">
                    <h3>My Development Center</h3>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myPharma") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("MyPharma/index")?>">
                        <?php
                            if(!empty(Yii::app()->request->cookies['mrd_pharma']->value)){
                        ?>
                        <span class="badge badge-my badge-default"><?php echo Yii::app()->request->cookies['mrd_pharma']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-settings"></i>
                        <span class="title">Company</span>
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myDrug") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("MyDrug/index")?>">
                        <?php
                            if(!empty(Yii::app()->request->cookies['mrd_drug']->value)){
                        ?>
                        <span class="badge badge-my badge-default"><?php echo Yii::app()->request->cookies['mrd_drug']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-wallet"></i>
                        <span class="title">Product</span>
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myTrials") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("MyTrials/index")?>">
                        <?php
                            if(!empty(Yii::app()->request->cookies['mrd_trial']->value)){
                        ?>
                        <span class="badge badge-my badge-default"><?php echo Yii::app()->request->cookies['mrd_trial']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-bar-chart"></i>
                        <span class="title">Trial</span>
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myRegistration") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("myRegistration/index")?>">
                        <?php
                            if(!empty(Yii::app()->request->cookies['mrd_reg']->value)){
                        ?>
                        <span class="badge badge-my badge-default"><?php echo Yii::app()->request->cookies['mrd_reg']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-docs"></i>
                        <span class="title">Registration</span>
                    </a>
                </li>
                <li class="heading">
                    <h3>My Resources Center</h3>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="mySite") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("mySite/index")?>">
                        <?php if(!empty(Yii::app()->request->cookies['mrd_site']->value)){
                                ?>
                        <span class="badge badge-my badge-default" style="background-color: #F3565D;width: 20px;">
                            <?php echo Yii::app()->request->cookies['mrd_site']->value;?></span>
                        <?php
                                    }
                                ?>
                        <i class="icon-docs"></i>           
                        <span class="title">Site</span>
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myInvestigator") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("myInvestigator/index")?>">
                        <?php if(!empty(Yii::app()->request->cookies['mrd_doctor']->value)){
                                ?>
                        <span class="badge badge-my badge-default" style="background-color: #F3565D;width: 20px;">
                            <?php echo Yii::app()->request->cookies['mrd_doctor']->value;?></span>
                        <?php
                                    }
                                ?>
                        <i class="icon-docs"></i>              
                        <span class="title">Investigator</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <?php if(!empty(Yii::app()->request->cookies['mrd_cro']->value)){?>
                        <span class="badge badge-my badge-default" style="background-color: #F3565D;width: 20px;">
                            <?php echo Yii::app()->request->cookies['mrd_cro']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-docs"></i>        
                        <span class="title">CRO</span>
                    </a>
                </li>
                <li class="heading">
                    <h3>My Knowledge Base</h3>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="myPublication") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("myPublication/index")?>">
                        <?php
                            if(!empty(Yii::app()->request->cookies['mrd_pub']->value)){
                        ?>
                        <span class="badge badge-my badge-default"><?php echo Yii::app()->request->cookies['mrd_pub']->value;?></span>
                        <?php
                            }
                        ?>
                        <i class="icon-wallet"></i>
                        <span class="title">Publications</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-briefcase"></i>
                        <span class="title">Patent</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-briefcase"></i>
                        <span class="title">Policie</span>
                    </a>
                </li>
                <hr>                
                <li>
                    <a href="#" style="border-top:0;"> <i class="icon-wallet"></i>
                        <span class="title">settings</span>
                    </a>
                </li>
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- START HORIZONTAL RESPONSIVE MENU -->
		<div class="page-sidebar navbar-collapse collapse" aria-expanded="false" style="height: 0 !important;" id="mynavbar-collapse">
			<ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true">
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="pharma") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl('pharma/index');?>" class="uppercase">
                                Company
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="drug") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("drug/index");?>"  class="uppercase">Product
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="trials") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("trials/index");?>"  class="uppercase">
                                Trial
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="registration") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl('registration/index');?>"  class="uppercase">
                                Registration
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="site") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createURl("site/index")?>" class="uppercase">
                        Site
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="investigator") { echo 'class="active"';}?>>
                    <a href="<?php echo $this->createUrl("investigator/index");?>"  class="uppercase">
                        Investigator
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="cro") { echo 'class="active"';}?>>
                    <a href="#" class="uppercase">
                        CRO
                    </a>
                </li>
                <li <?php if(!empty(Yii::app()->controller->id) && Yii::app()->controller->id=="publications") { echo 'class="active"';}?>>
                    <a href="javascript:;" class="uppercase">Publication</a>
                </li>
                <li <?php if(Yii::app()->controller->id=="patent") { echo 'class="active"';}?>>
                    <a href="javascript:;"  class="uppercase">
                        Patent
                    </a>
                </li>
                <li <?php if(Yii::app()->controller->id=="patent") { echo 'class="active"';}?>>
                    <a href="javascript:;"  class="uppercase">
                        Policies
                    </a>
                </li>
            </ul>
		</div>
		<!-- END HORIZONTAL RESPONSIVE MENU -->
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content wrapper">
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
<script>
    $(document).ready(function() {
        $('#nav-tabs').onePageNav();
        //$("ul.nav-tabs li a ").click(function() {
        //    var _id = $(this).attr("href");
        //    $(_id).attr("style","padding-top:100px;");
        //});
        $(document).scroll(function(){
            var h = $(document).scrollTop();
            if(h >=53){
                $("#header_nav").addClass("header_nav");
            }else{
                $("#header_nav").removeClass("header_nav");
            }
        });  
        setInterval(function(){$(".alert").hide();},10000);    
     });
</script>
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
</script>
</body>
<!-- END BODY -->
</html>