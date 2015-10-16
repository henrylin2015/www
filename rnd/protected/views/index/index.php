<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">My list</a>
		</li>
	</ul>
</div>
<h3></h3>

<?php
 if(Yii::app()->user->hasFlash("success")){
?>
<!--begin user login tip information-->
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success display-none" style="display: block;">
			<button class="close" data-dismiss="alert"></button>
			<?php echo Yii::app()->user->getFlash("success");?>
		</div>
	</div>
</div>
<!--end   user login tip information-->
<?php
 }
?>


<!--start row pharma-->
<div class="row">
	<?php
		if (!empty($myList['mrd_pharma'])) {
			foreach ($myList['mrd_pharma'] as $pharma) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list blue-madison">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myPharma/list",array("type"=>'myModule',"myId"=>$pharma->mylist_id));?>">
					<div class="number"><?php echo $pharma->name;?></div>
				</a>
			</div>
			<a class="more" href="<?php echo $this->createUrl("myPharma/list",array("type"=>'myModule',"myId"=>$pharma->mylist_id));?>">
				<?php echo count($countList[$pharma->mylist_id]);?> Companies <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
			}
		}
	?>
	<div class="col-md-2 col-sm-3 addList">
		<div class="dashboard-stat dashboard_list blue-madison">
			<a href="<?php echo $this->createUrl("pharma/index")?>" class="" title="Create new pharma">
				<i class="fa fa-plus-square"></i>
			</a>
		</div>
	</div>
</div>
<!--end row pharma-->

<h3></h3>
<!--start row product-->
<div class="row row_not_margin_right">
	<?php
		if (!empty($myList['mrd_drug'])) {
			foreach ($myList['mrd_drug'] as $drug) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list red-intense">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myDrug/list",array("type"=>'myModule',"myId"=>$drug->mylist_id));?>">
					<div class="number"><?php echo $drug->name;?></div>
				</a>
			</div>
			<a class="more" href="<?php echo $this->createUrl("myDrug/list",array("type"=>'myModule',"myId"=>$drug->mylist_id));?>">
				<?php echo count($countList[$drug->mylist_id]);?> Product <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
			}
		}
	?>
	<div class="col-md-2 col-sm-3 addList">
		<div class="dashboard-stat dashboard_list blue-madison">
			<a href="<?php echo $this->createUrl("drug/index")?>" class="" title="Create new drug">
				<i class="fa fa-plus-square"></i>
			</a>
		</div>
	</div>
</div>
<!--end row product-->

<h3></h3>
<!--start row Trials-->
<div class="row row_not_margin_right">
	<?php
		if (!empty($myList['mrd_trial'])) {
			foreach ($myList['mrd_trial'] as $trial) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list green-haze">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myTrials/list",array("type"=>'myModule',"myId"=>$trial->mylist_id));?>">
					<div class="number"><?php echo $trial->name;?></div>
				</a>
			</div>
			<a class="more" href="<?php echo $this->createUrl("myTrials/list",array("type"=>'myModule',"myId"=>$trial->mylist_id));?>">
				<?php echo count($countList[$trial->mylist_id]);?> Trails
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
			}
		}
	?>
	<div class="col-md-2 col-sm-3 addList">
		<div class="dashboard-stat dashboard_list blue-madison">
			<a href="<?php echo $this->createUrl('trials/index');?>" class="" title="Create new Trials">
				<i class="fa fa-plus-square"></i>
			</a>
		</div>
	</div>
</div>
<!--end row Trials-->

<h3></h3>
<!--start row Registrations-->
<div class="row row_not_margin_right">
	<?php
		if (!empty($myList['mrd_reg'])) {
			foreach ($myList['mrd_reg'] as $reg) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list purple-plum">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myRegistration/list",array("type"=>'myModule',"myId"=>$reg->mylist_id));?>">
					<div class="number"><?php echo $reg->name;?></div>
				</a>
			</div>
			<a class="more" href="<?php echo $this->createUrl("myRegistration/list",array("type"=>'myModule',"myId"=>$reg->mylist_id));?>">
				<?php echo count($countList[$reg->mylist_id]);?> Registration
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
			}
		}
	?>
	<div class="col-md-2 col-sm-3 addList">
		<div class="dashboard-stat dashboard_list blue-madison">
			<a href="<?php echo $this->createUrl('registration/index');?>" class="" title="Create new Registration">
				<i class="fa fa-plus-square"></i>
			</a>
		</div>
	</div>
</div>
<!--end row Registrations-->

<h3></h3>
<!--start row Clinical Sites-->
<div class="row row_not_margin_right">
	<?php
		if (!empty($myList['mrd_site'])) {
			foreach ($myList['mrd_site'] as $site) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list green-turquoise">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("mySite/list",array("type"=>'myModule',"myId"=>$site->mylist_id));?>">
					<div class="number"><?php echo $site->name;?></div>
			</a>
		</div>
		<a class="more" href="<?php echo $this->createUrl("mySite/list",array("type"=>'myModule',"myId"=>$site->mylist_id));?>">
			<?php echo count($countList[$site->mylist_id]);?> Site <i class="m-icon-swapright m-icon-white"></i>
		</a>
	</div>
</div>
<?php
		}
	}
?>
<div class="col-md-2 col-sm-3 addList">
	<div class="dashboard-stat dashboard_list blue-madison">
		<a href="<?php echo $this->createUrl('site/index');?>" class="" title="Create new Site">
			<i class="fa fa-plus-square"></i>
		</a>
	</div>
</div>
</div>
<!--end row Clinical Sites-->

<h3></h3>
<!--start row Investigators-->
<div class="row row_not_margin_right">

	<?php
		if (!empty($myList['mrd_doctor'])) {
			foreach ($myList['mrd_doctor'] as $doctor) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list blue-hoki">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myInvestigator/list",array("type"=>'myModule',"myId"=>$doctor->mylist_id));?>">
					<div class="number"><?php echo $doctor->name;?></div>
			</a>
		</div>
		<a class="more" href="<?php echo $this->createUrl("myInvestigator/list",array("type"=>'myModule',"myId"=>$doctor->mylist_id));?>">
			<?php echo count($countList[$doctor->mylist_id]);?> Investigator <i class="m-icon-swapright m-icon-white"></i>
		</a>
		</div>
	</div>
	<?php
			}
		}
	?>
<div class="col-md-2 col-sm-3 addList">
	<div class="dashboard-stat dashboard_list blue-madison">
		<a href="<?php echo $this->createUrl('investigator/index');?>" class="" title="Create new Investigator"> <i class="fa fa-plus-square"></i>
		</a>
	</div>
</div>
</div>
<!--end row Investigators-->

<h3></h3>
<!--start row Publications-->
<div class="row">
	<?php
		if (!empty($myList['mrd_pub'])) {
			foreach ($myList['mrd_pub'] as $pub) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list blue-steel">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myPublication/list",array("type"=>'myModule',"myId"=>$pub->mylist_id));?>">
					<div class="number"><?php echo $pub->name;?></div>
				</div>
			</a>
			<a class="more" href="<?php echo $this->createUrl("myPublication/list",array("type"=>'myModule',"myId"=>$pub->mylist_id));?>">
				<?php echo count($countList[$pub->mylist_id]);?> Publication <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
			}
		}
	?>
	<div class="col-md-2 col-sm-3 addList">
		<div class="dashboard-stat dashboard_list blue-madison">
			<a href="<?php echo $this->createUrl('publication/index');?>" class="" title="Create new Publication">
				<i class="fa fa-plus-square"></i>
			</a>
		</div>
	</div>
</div>
<!--end row Publications-->