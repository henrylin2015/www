<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">My Pharma</a>
		</li>
	</ul>
</div>
<h3></h3>

<!--begin user login tip information-->
<div class="row">
	<div class="col-md-12">
		<?php
		if(Yii::app()->user->hasFlash("error")){
		?>
		<div class="alert alert-danger display-none" style="display: block;">
			<button class="close" data-dismiss="alert"></button>
			<?php echo Yii::app()->user->getFlash("error");?>
		</div>
		<?php
		}else if(Yii::app()->user->hasFlash("success")){
		?>
		<div class="alert alert-success display-none" style="display: block;">
			<button class="close" data-dismiss="alert"></button>
			<?php echo Yii::app()->user->getFlash("success");?>
		</div>
		<?php
		}
		?>
	</div>
</div>
<!--end   user login tip information-->

<div class="row">
	<?php
	 if(!empty($total)){
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list blue-madison">
			<div class="details details_position">
				<a href="<?php echo $this->createUrl("myPharma/list",array("type"=>'module'));?>">
					<div class="number">HMPL  Pharma</div>
				</a>
			</div>
			<a class="more" href="<?php echo $this->createUrl("myPharma/list",array("type"=>'module'));?>">
				<?php echo $total;?> Companies <i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<?php
	 }
	?>
	<?php
		if (!empty($myList['mrd_pharma'])) {
			foreach ($myList['mrd_pharma'] as $pharma) {
	?>
	<div class="col-md-2 col-sm-3">
		<div class="dashboard-stat dashboard_list blue-madison">
			<div class="details details_position">
				<form action="<?php echo $this->createUrl("common/updataByIdUserList");?>" method="post" class="form-horizontal" role="form">
					<div class="number" style="padding-top:0;position: relative;">
						<div class="form-body">
							<div class="form-group form-md-line-input">
								<div class="col-md-12">
									<input type="text" class="form-control" name="mrd_name"  placeholder="<?php echo $pharma->name;?>">
									<input type="hidden" name="mrd_listId" value="<?php echo $pharma->mylist_id;?>" />
									<input type="hidden" name="controller" value="myPharma"/>
									<input type="hidden" name="action" value="index"/>
									<div class="form-control-focus"></div>
								</div>
							</div>
						</div>
						<div class="" style="position: absolute;right: 5px;bottom: 10px;">
							<a onclick="return confirm('Are you sure?');" href="<?php echo $this->createUrl("common/deleteByIdUserList",array("mrd_id"=>$pharma->mylist_id,"controller"=>'myPharma',"action"=>"index","module_type"=>'mrd_pharma'));?>" title="Delete" alt="Delete" ><i class="fa fa-trash-o"></i></a>
						</div>
					</div>
				</form>
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

