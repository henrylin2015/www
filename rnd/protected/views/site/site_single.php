<!--subTitle row start-->
<div class="row profile">
	<div class="col-md-12">
		<div id="header_nav">
			<div class="tabbable-line tabbable-full-width">
				<div class="nav-title pull-left">
					<h1 class="title">
						<?php
                        if(!empty($model->hospname_cn)){
                        	echo $model->hospname_cn;
                        }
                        ?>
					</h1>
				</div>
				<ul class="nav nav-tabs" id="nav-tabs">
                    <li class="current">
                        <a href="#tab_overview" data-toggle="tab" class="capitalize">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_investigator" data-toggle="tab" class="capitalize">Investigator</a>
                    </li>
                    <li>
                        <a href="#tab_conducted" data-toggle="tab" class="capitalize">conducted</a>
                    </li>
                    <li>
                        <a href="#tab_same_area" data-toggle="tab" class="capitalize">Sites in the same therapeutic area</a>
                    </li>
                </ul>
                <div class="tab-content not_bg no_padding"></div>
			</div>
		</div>
	</div>
</div>
<!--subTitle row end-->

<!--begin overview-->
<div class="section" id="tab_overview">
	<div class="row">
		<div class="col-md-8">
			<div class="portlet portlet-mrd-overview">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('site','	');?></span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 400px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="portlet portlet-mrd-left">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('site','vl_zyxx');?></span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 400px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   overview-->


<!--begin investigator-->
<div class="section" id="tab_investigator">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('site','h_Investigator');?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="site_investigator_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                            <label>
	                            	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="site_investigator_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="site_investigator" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
			                        <th><?php echo Yii::t('site','f_Doctor_name');?></th>
			                        <th><?php echo Yii::t('site','f_Clincal_title');?></th>
			                        <th><?php echo Yii::t('site','Five-year_trials_(participating/leading)');?></th>
			                        <th><?php echo Yii::t('site','Fiver-year_GMCT_(participating/leading)');?></th>
			                        <th><?php echo Yii::t('site','f_Total_publication');?></th>
			                     </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   investigator-->

<!--begin trials on this site-->
<div class="section" id="tab_conducted">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('site','h_Trials_in_this_site');?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="site_on_trials_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                            <label>
	                            	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="site_on_trials_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="site_on_trials" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
			                        <th><?php echo Yii::t('site','f_Trial_title');?></th>
			                        <th><?php echo Yii::t('site','f_Condition');?></th>
			                        <th><?php echo Yii::t('site','f_Drug_name');?></th>
			                        <th><?php echo Yii::t('site','f_Phase');?></th>
			                        <th><?php echo Yii::t('site','f_Trial_type');?></th>
			                        <th><?php echo Yii::t('site','f_Total_sites');?></th>
			                        <th><?php echo Yii::t('site','f_Trial_start');?> </th>
			                        <th><?php echo Yii::t('site','f_Trial_completion');?></th>
			                        <th><?php echo Yii::t('site','f_Target_recruitment');?></th>
			                        <th><?php echo Yii::t('site','f_Current_recruitment');?></th>
		                      </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   trials on this site-->



<!--begin site same area-->
<div class="section" id="tab_same_area">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('site','h_Sites_in_the_same_therapeutic_area');?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="site_same_area_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                            <label>
	                            	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="site_same_area_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="site_same_area" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								<tr>
		                            <th><?php echo Yii::t('site','f_Department');?></th>
		                            <th><?php echo Yii::t('site','f_Hospital_name');?></th>
		                            <th><?php echo Yii::t('site', 'f_Province'); ?></th>
		                            <th><?php echo Yii::t('site','f_City');?></th>
		                            <th><?php echo Yii::t('site','f_Certification_date');?></th>
		                            <th><?php echo Yii::t("site", "f_Expiration_date");?></th>
		                            <th><?php echo Yii::t('site','f_Trials_completed');?></th>
		                            <th><?php echo Yii::t('site','f_Number_Of_Trials_Ongoing_/_Trials_ID');?></th>
		                            <th><?php echo Yii::t('site','f_Drugs_tested_in_The_Site');?></th>
		                            <th><?php echo Yii::t('site','vl_Trial_type');?></th>
		                            <th><?php echo Yii::t('comm','f_New_Activity');?></th>
		                         </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   site same area-->

<!--begin script-->
<script>
	$(function (){
		var iUrl = <?php echo "'".$this->createUrl("site/investigator",array("id"=>$_REQUEST['id']))."'";?>;
		var iDataCols = [
			{"data":"name"},
			{"data":"title_clinician"},
			{"data":"count_PItrials"},
			{"data":"count_PItrials_global"},
			{"data":"count_publication"},
		];
		dataTableAjax(iUrl,"","#site_investigator",iDataCols,"300");
		var tUrl = <?php echo "'".$this->createUrl("site/trialsOnThisSite",array("id"=>$_REQUEST["id"]))."'"?>;
		var tDataCols = [
			{"data":"title_official_en"},
			{"data":"condition_en"},
			{"data":"intervention_name_cn"},
			{"data":"phase_en"},
			{"data":"COUNTRY"},
			{"data":"count_site"},
			{"data":"date_first_enrolled"},
			{"data":"date_complete"},
			{"data":"enrollment_anticipated"},
			{"data":"enrollment_actual"},
		];
		dataTableAjax(tUrl,"","#site_on_trials",tDataCols,"300");
		//site_same_area
		var sameUrl = <?php echo "'".$this->createUrl("site/sameSiteArea",array("id"=>$_REQUEST["id"]))."'"?>;
		var sameDataCols = [
			{"data":"TA_cert"},
			{"data":"hospname_cn"},
			{"data":"province"},
			{"data":"city"},
			{"data":"issuedate_sitecert"},
			{"data":"expirdate_sitecert"},
			{"data":"count_trl_5completed"},
			{"data":"count_trl_ongoing"},
			{"data":"count_trl_drug"},
			{"data":"count_trl_global"},
			{"data":"NewActivity"},
		];
		dataTableAjax(sameUrl,"","#site_same_area",sameDataCols,"300");
	});
</script>
<!--end   script-->




