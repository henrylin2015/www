<h1>
	Common test
</h1>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger display-none">
			<button class="close" data-dismiss="alert"></button>
			You have some form errors. Please check below.
		</div>
		<?php
			if(Yii::app()->user->hasFlash("success")){
		?>
		<div class="alert alert-success display-none" style="display: block;">
			<button class="close" data-dismiss="alert"></button>
			Your form validation is successful!
			<?php echo Yii::app()->user->getFlash("success");?>
		</div>
		<?php
			}
		?>
	</div>
</div>