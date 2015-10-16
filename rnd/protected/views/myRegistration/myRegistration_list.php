<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("myRegistration/index");?>">My Registration</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#"><?php echo $titleName;?></a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	<span class="font_weight">Registration</span>
	<small>Registration development companies with operation in China</small>
</h3>
<!-- BEGIN PAGE CONTENT-->
<div class="bottom-margin"></div>

<!--start row-->
<div class="row">
	<form action="<?php echo  $this->createUrl('registration/index');?>" id="reg_submit" class="form-horizontal form-row-seperated">
	<div class="col-md-11">
		<!-- <form action="#"> -->
			<div class="input-group">
				<div class="input-cont">
					<input type="text" placeholder="Find trials..." name="search_reg" class="form-control"></div>
				<span class="input-group-btn">
					<button type="submit" class="btn blue">
						Search &nbsp; <i class="m-icon-swapright m-icon-white"></i>
					</button>
				</span>
			</div>
		<!-- </form> -->
	</div>
	<div class="col-md-1">
		<div class="actions">
			<div class="btn-group">
				<button type="button" data-toggle="collapse"  data-target="#dropdown" class="btn color_bg_white" aria-expanded="true">
					<span class="filter_font">Filters</span>
					&nbsp; <i class="fa fa-angle-down"></i>
				</button>
			</div>
	</div>
</div>
<div class="col-md-12 padding_top_8">
	<div class="portlet box border_top collapse margin_bottom_8" id="dropdown">
		<div class="portlet-body form">
				<div class="form-body">
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('registration', 'f_Drug_Type'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="dt[]" value="化药" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_drugcat_Chemical_Drugs'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="dt[]" value="生物制品" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_drugcat_Biological_Products'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="dt[]" value="中药" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_drugcat_TCM'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="dt[]" value="体外诊断试剂" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_drugcat_In-vitro Diagnostic Reagents'); ?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('registration', 'f_Application_Type'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="at[]" value="新药" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_appltype_New_Drug'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="at[]" value="进口" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_appltype_Imported_Drug'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="at[]" value="再注册" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_appltype_Re-registration_for_import'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="at[]" value="仿制&已有国家标准" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_appltype_Generics'); ?></label>
										<label>
										<input type="checkbox" class="icheck" name="at[]" value="补充申请" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('registration', 'vl_appltype_Supplementary_Application'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">
						<?php echo Yii::t('registration', 'f_review_category'); ?>:</label>
					<div class="col-md-9">
						<div class="form-group" style="margin-bottom:0;">
							<label class="control-label col-md-2">
							<?php echo Yii::t('registration', 'h_Clinical_study_application'); ?>:</label>
							<div class="col-md-10">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="IND" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_newaccepted_reviewcat_new_IND'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="验证性临床" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_newaccepted_reviewcat_new_Bridging_clinical_trial_application'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"></label>
					<div class="col-md-9">
						<div class="form-group" style="margin-bottom:0;">
							<label class="control-label col-md-2">
							<?php echo Yii::t('registration', 'h_Drug_production_application'); ?>:</label>
							<div class="col-md-10">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="NDA" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_newaccepted_reviewcat_new_NDA'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="ANDA" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_newaccepted_reviewcat_new_ANDA'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"></label>
					<div class="col-md-9">
						<div class="form-group">
							<label class="control-label col-md-2">
							<?php echo Yii::t('registration', 'h_Others'); ?>:</label>
							<div class="col-md-10">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="补充申请" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_appltype_Supplementary_Application'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="rc[]" value="进口再注册" data-checkbox="icheckbox_square-grey">							
										<?php echo Yii::t('registration', 'vl_appltype_Re-registration_for_import'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</form>
<!--end row-->
<!--start row-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title no_margin_buttom border_bottom_0">
				<div class="caption font-purple-plum" style="width:70% !important;">
					<span class="caption-subject bold uppercase"><span class="number">0</span> studies found for:</span>
					<span class="caption-helper search_list"></span>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							Columns <i class="fa fa-angle-down"></i>
						</a>
						<div id="reg_tables_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<!-- <label>
								<input type="checkbox" checked data-column="0">id</label> -->
							<label>
								<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
							<label>
								<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Company_Name');?></label>
							<label>
								<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Drug_Type');?></label>
							<label>
								<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Application_Type');?></label>
							<label>
								<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Registration_Category');?></label>
							<label>
								<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_Review_Category');?></label>
							<label>
								<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
							<label>
								<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Reception_date');?></label>
							<label>
								<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_end_time');?></label>
							<label>
								<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
							<label>
								<input type="checkbox" checked data-column="11"><?php echo Yii::t('comm','f_New_Activity');?></label>
						</div>
					</div>
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							<span class="hidden-480">Export</span> <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:;" class="pdf">Export to PDF</a>
							</li>
							<li>
								<a href="javascript:;" id="ToolTables_sample_6_1_2">Export to Excel</a>
							</li>
						</ul>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
				</div>
			</div>
			<div class="portlet-body no_padding_top">
				<div class="loading" id="reg_tables_loading" style="display: none;">
				</div>
				<div class="table-responsive">
					<table id="reg_tables" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<input type="checkbox" class="group-checkable" data-set="#reg_tables_1 .checkboxes"/>
								</th>
								<th><?php echo Yii::t('registration','f_Drug_Name');?></th>
								<th><?php echo Yii::t('registration','f_Company_Name');?></th>
								<th><?php echo Yii::t('registration','f_Drug_Type');?></th>
								<th><?php echo Yii::t('registration','f_Application_Type');?></th>
								<th><?php echo Yii::t('registration','f_Registration_Category');?></th>
								<th><?php echo Yii::t('registration','f_Review_Category');?></th>
								<th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
								<th><?php echo Yii::t('registration','f_Reception_date');?></th>
								<th><?php echo Yii::t('registration','f_end_time');?></th>
								<th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
								<th><?php echo Yii::t('comm','f_New_Activity');?></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row-->

<!--script-->
<script>
	$(function(){
		var dataCols = [
			{ "data": "num_accept_id" },
			{ "data": "drugname" },
			{ "data": "compname_reg" },
			{ "data": "drugcat" },
			{ "data": "appltype" },
			{ "data": "regclass"},
			{ "data": "newaccepted_reviewcat" },
			{ "data": "num_accept" },
			{ "data": "date_cdereceived" },
			{ "data": "date_appr_delivery" },
			{ "data": "status_new_overall"},
			{ "data": "new_activity" },
		];
		<?php
			if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
		?>
			var url=<?php echo "'".$this->createUrl('myRegistration/AjaxList',array("type"=>'module'))."'";?>;
		<?php
			}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
		?>
			var url=<?php echo "'".$this->createUrl('myRegistration/AjaxList',array('type'=>'myModule','myId'=>$_REQUEST['myId']))."'";?>;
		<?php
			}
		?>
		dataTableAjax(url,"","#reg_tables",dataCols,"");
		
		setInterval(function(){$(".number").text($("#reg_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#reg_submit").submit(function(){
		         var path_url = $(this).serialize();
		         dataTableAjax(url,path_url,"#reg_tables",dataCols,"");
		         var arr = $(this).serializeArray();
		        // //console.log(arr);
		         var dt='',at='',rc='';
		        for(var i=0;i < arr.length;i++){
		        	if("dt[]" == arr[i]['name']){
		        		dt +=arr[i]['value']+",";
		        	}
		        	if("at[]" == arr[i]['name']){
		        		at +=arr[i]['value']+",";
		        	}
		        	if("rc[]" == arr[i]['name']){
		        		rc +=arr[i]['value']+",";
		        	}
		        }
		        var str='';
		        if(dt !=""){
		        	str +=dt.substring(0,dt.length-1)+"|";
		        }
		        if(at !=""){
		        	str +=at.substring(0,at.length-1)+"|";
		        }
		        if(rc !=""){
		        	str +=rc.substring(0,rc.length-1)+"|";
		        }
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    
		    //search list 
		    $(".search_list").text("non");
	});
</script>
<!--script-->

