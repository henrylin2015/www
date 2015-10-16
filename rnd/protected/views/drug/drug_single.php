<!--subTitle row start-->
<div class="row profile">
	<div class="col-md-12">
		<div id="header_nav">
			<div class="tabbable-line tabbable-full-width">
				<div class="nav-title pull-left">
					<h1 class="title">
						<?php
                        if(!empty(Yii::app()->language) && Yii::app()->language == "zh_cn"){
                            if(!empty($model->api_cn)){
                                echo $model->api_cn;   
                            }else{
                                echo $model->api_en;
                            }
                        }else{
                           if(!empty($model->api_en)){
                                echo $model->api_en;   
                            }else{
                                echo $model->api_cn;
                            }
                        }
                        ?>
					</h1>
				</div>
				<ul class="nav nav-tabs" id="nav-tabs">
                    <li class="current">
                        <a href="#tab_overview" data-toggle="tab" class="capitalize">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_marketed" data-toggle="tab" class="capitalize">marketed</a>
                    </li>
                    <li>
                        <a href="#tab_investigational" data-toggle="tab" class="capitalize">Investigational</a>
                    </li>
                    <li>
                        <a href="#tab_trials" data-toggle="tab" class="capitalize">trials</a>
                    </li>
                    <li>
                        <a href="#tab_publications" data-toggle="tab" class="capitalize">publications</a>
                    </li>
                    <li>
                        <a href="#tab_comparable" data-toggle="tab" class="capitalize">Comparable companies</a>
                    </li>
                </ul>
                <div class="tab-content not_bg no_padding"></div>
			</div>
		</div>
	</div>
</div>
<!--subTitle row end-->

<div class="wrapper_content"></div>

<!--start overview-->
<div class="section" id="tab_overview">
	<div class="row">
		<div class="col-md-8">
			<div class="portlet portlet-mrd-overview">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('drug','f_Description');?></span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 400px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						<p>
							<?php
							if(!empty($model->description)){
								echo substr($model->description,0,820)."...";
							}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="portlet portlet-mrd-left">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t("drug","h_Target");?></span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 372px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						
					</div>
					<div class="scroller-footer">
						<div class="btn-arrow-link pull-right">
							<a href="javascript:;">See All Records</a><i class="icon-arrow-right"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end overview-->

<!--start marketed product in china-->
<div class="section" id="tab_marketed">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="font-blue-madison capitalize"><?php echo Yii::t("drug", 'f_Total_marketed_products');?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="drug_marketed_china_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                            <label>
	                            	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", 'f_Products_name');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="2"><?php echo Yii::t("drug", 'f_Manufacturer');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="3"><?php echo Yii::t("drug", 'f_Approval_date');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="4"><?php echo Yii::t("drug", 'f_Product_type');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="5"><?php echo Yii::t("drug", 'f_Product_origin');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="6"><?php echo Yii::t("drug", 'f_Trade_name');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="7"><?php echo Yii::t("drug", 'f_Formulation');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="8"><?php echo Yii::t("drug", 'f_Strength');?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="9"><?php echo Yii::t("drug", 'f_Approval_number');?></th>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="drug_marketed_china_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table id="drug_marketed_china" class="table table-mrd" cellspacing="0" width="100%">
							<thead>
								 <tr>
	                                <th><?php echo Yii::t("drug", 'f_Products_name');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Manufacturer');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Approval_date');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Product_type');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Product_origin');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Trade_name');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Formulation');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Strength');?></th>
	                                <th><?php echo Yii::t("drug", 'f_Approval_number');?></th>
                                </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   marketed product in china-->

<!--begin investigational product in china-->
<div class="section" id="tab_investigational">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="font-blue-madison capitalize"><?php echo Yii::t('drug','h_Investigational_Products_In_China');?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="drug_investigation_china_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                           <label>
	                           		<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", "f_Sponsor");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="2"><?php echo Yii::t("drug", "f_Drug_type");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="3"><?php echo Yii::t("drug", "f_Registration_class");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="4"><?php echo Yii::t("drug", "f_Development_status");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="5"><?php echo Yii::t("drug", "f_Application_type");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="6"><?php echo Yii::t("drug", "f_Submission_date");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="7"><?php echo Yii::t("drug", "f_Registration_status");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="8"><?php echo Yii::t("drug", "f_Approval_date");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="9"><?php echo Yii::t("drug", "f_Acceptance_number");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="10"><?php echo Yii::t("drug", "f_Total_trials");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="11"><?php echo Yii::t("drug", "f_Trial_ongoing");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="12"><?php echo Yii::t("drug", "f_Phase_1");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="13"><?php echo Yii::t("drug", "f_Phase_2");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="14"><?php echo Yii::t("drug", "f_Phase_3");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="15"><?php echo Yii::t("drug", "f_Indications");?></label>                                    
	                           <label>
	                           		<input type="checkbox" checked data-column="16"><?php echo Yii::t("drug", "f_Application_type");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="17"><?php echo Yii::t("drug", "f_Submission_date");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="18"><?php echo Yii::t("drug", "f_Registration_status");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column="19"><?php echo Yii::t("drug", "f_Estimated_approval_date");?></label>
	                           <label>
	                           		<input type="checkbox" checked data-column=20"><?php echo Yii::t("drug", "f_Acceptance_number");?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="drug_investigation_china_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="drug_investigation_china" cellspacing="0" width="100%">
							<thead>
								<tr>
	                                <th><?php echo Yii::t("drug", "f_Sponsor");?></th>
	                                <th><?php echo Yii::t("drug", "f_Drug_type");?></th>
	                                <th><?php echo Yii::t("drug", "f_Registration_class");?></th>
	                                <th><?php echo Yii::t("drug", "f_Development_status");?></th>
	                                <th><?php echo Yii::t("drug", "f_Application_type");?></th>
	                                <th><?php echo Yii::t("drug", "f_Submission_date");?></th>
	                                <th><?php echo Yii::t("drug", "f_Registration_status");?></th>
	                                <th><?php echo Yii::t("drug", "f_Approval_date");?></th>
	                                <th><?php echo Yii::t("drug", "f_Acceptance_number");?></th>
	                                <th><?php echo Yii::t("drug", "f_Total_trials");?></th>
	                                <th><?php echo Yii::t("drug", "f_Trial_ongoing");?></th>
	                                <th><?php echo Yii::t("drug", "f_Phase_1");?></th>
	                                <th><?php echo Yii::t("drug", "f_Phase_2");?></th>
	                                <th><?php echo Yii::t("drug", "f_Phase_3");?></th>
	                                <th><?php echo Yii::t("drug", "f_Indications");?></th>                                    
	                                <th><?php echo Yii::t("drug", "f_Application_type");?></th>
	                                <th><?php echo Yii::t("drug", "f_Submission_date");?></th>
	                                <th><?php echo Yii::t("drug", "f_Registration_status");?></th>
	                                <th><?php echo Yii::t("drug", "f_Estimated_approval_date");?></th>
	                                <th><?php echo Yii::t("drug", "f_Acceptance_number");?></th>
	                            </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end investigational product in china  -->

<!--begin trials on this drug-->
<div class="section" id="tab_trials">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t("drug", "h_Trials_On_This_Drug");?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="drug_trials_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
	                            <label>
	                            	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", "f_Sponsor");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="2"><?php echo Yii::t("drug", "f_Phase");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="3"><?php echo Yii::t("drug", "f_Recruitment_status");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="4"><?php echo Yii::t("drug", "f_Title");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="5"><?php echo Yii::t("drug", "f_Condition");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="6"><?php echo Yii::t("drug", "f_Target_recruitment");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="7"><?php echo Yii::t("drug", "f_Trial_start");?></label>
	                            <label>
	                            	<input type="checkbox" checked data-column="8"><?php echo Yii::t("drug", "f_Trial_completion");?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="drug_trials_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="drug_trials" cellspacing="0" width="100%">
							<thead>
								<tr>
                                	<th><?php echo Yii::t("drug", "f_Sponsor");?></th>
	                                <th><?php echo Yii::t("drug", "f_Phase");?></th>
	                                <th><?php echo Yii::t("drug", "f_Recruitment_status");?></th>
	                                <th><?php echo Yii::t("drug", "f_Title");?></th>
	                                <th><?php echo Yii::t("drug", "f_Condition");?></th>
	                                <th><?php echo Yii::t("drug", "f_Target_recruitment");?></th>
	                                <th><?php echo Yii::t("drug", "f_Trial_start");?></th>
	                                <th><?php echo Yii::t("drug", "f_Trial_completion");?></th>
	                            </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   trials on this drug-->

<!--begin publications on this drug-->
<div class="section" id="tab_publications">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t("drug", "h_Publications_On_This_Drug");?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="publication_drug_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                <label>
                                	<input type="checkbox" checked data-column="1"><?php echo Yii::t("drug", "f_Authors");?></label>
                                <label>
                                	<input type="checkbox" checked data-column="2"><?php echo Yii::t("drug", "f_Affiliations");?></label>
                                <label>
                                	<input type="checkbox" checked data-column="3"><?php echo Yii::t("drug", "f_Publication_Date");?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                	</div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="publication_drug_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="publication_drug" cellspacing="0" width="100%">
							<thead>
								<tr>
                                    <th><?php echo Yii::t("drug", "f_Article_name");?></th>
                                    <th><?php echo Yii::t("drug", "f_Authors");?></th>
                                    <th><?php echo Yii::t("drug", "f_Affiliations");?></th>
                                    <th><?php echo Yii::t("drug", "f_Publication_Date");?></th>
                                </tr> 
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end  publications on this drug-->

<!--begin script-->
<script>
	$(function(){
		var url=<?php echo "'".$this->createUrl("drug/marketedProductChina",array('id'=>$_REQUEST['id']))."'";?>;
		var dataCol=[
			{"data":"drugname_cn"},
			{"data":"compname_cn"},
			{"data":"issuedate"},
			{"data":"drugcat"},
			{"data":"drug_origin"},
			{"data":"drugname_trade_cn"},
			{"data":"doseform"},
			{"data":"strength"},
			{"data":"num_appr"},
		];
		dataTableAjax(url,"","#drug_marketed_china",dataCol,"300");
		
		//investigational
		var uriInv=<?php echo "'".$this->createUrl("drug/investigationalProductChina",array("id"=>$_REQUEST['id']))."'";?>;
		var dataCols=[
			{ "data": "drugname" }, 
            { "data": "drugcat" },
            { "data": "regclass" },
            { "data": "status" },
            { "data": "IND_appltype" },
            { "data": 'IND_date_cdereceived'},
            { "data": 'IND_status_new_overall'},
            { "data": 'IND_date_appr_delivery'},
            { "data": 'IND_num_accept'},
            { "data": 'count_Trials'},
            { "data": 'count_Trials_ongoing'},
            { "data": "count_Phase1" },
            { "data": "count_Phase2" },
            { "data": "count_Phase3" },
            { "data": 'indication'},
            { "data": 'NDA_appltype'},
            { "data": 'NDA_date_cdereceived'},
            { "data": 'NDA_status_new_overall'},
            { "data": 'NDA_date_appr_delivery'},
            { "data": 'NDA_num_accept'},
		];
		dataTableAjax(uriInv,'','#drug_investigation_china',dataCols,'300');
		
		var trialsUrl = <?php echo "'".$this->createUrl('drug/trialsOnDrug',array('id'=>$_REQUEST['id']))."'";?>;
		var dataTrailsDrugCols = [
			{"data":"sponsor_en"},
			{"data":"phase_en"},
			{"data":"Recruiting_en"},
			{"data":"title_brief_en"},
			{"data":"condition_en"},
			{"data":"enrollment_anticipated"},
			{"data":"date_first_enrolled"},
			{"data":"date_complete"},
		];
		dataTableAjax(trialsUrl,"","#drug_trials",dataTrailsDrugCols,"300");
		//publications on this drug
		var pubUrl = <?php echo "'".$this->createUrl('drug/publicationsOnDrug',array('id'=>$_REQUEST['id']))."'";?>;
		var pubCols = [
			{"data":"ArticleTitle"},
			{"data":"Authors"},
			{"data":"Affiliations"},
			{"data":"ArticleDate"},
		];
		dataTableAjax(pubUrl,"","#publication_drug",pubCols,"300");
	});
</script>
<!--end   script-->




