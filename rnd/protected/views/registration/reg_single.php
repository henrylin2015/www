<!--start subTitle row-->
<div class="row profile">
    <div class="col-md-12">
        <div  id="header_nav">
            <div class="tabbable-line tabbable-full-width">
                <div class="nav-title pull-left">
                    <h1 class="title">
                        <?php
                         if(!empty($model->drugname)){
                         	echo $model->drugname;
                         }else{
                         	echo "N/A";
                         }
                        ?>
                    </h1>
                </div>
                <ul class="nav nav-tabs" id="nav-tabs">
                    <li class="current">
                        <a href="#tab_overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#tab_same_company" data-toggle="tab">Same Company</a>
                    </li>
                    <li>
                        <a href="#tab_same_drug" data-toggle="tab">Same Drug</a>
                    </li>
                    <li>
                        <a href="#tab_same_target" data-toggle="tab">Same Target</a>
                    </li>
                    <li>
                        <a href="#tab_same_indication" data-toggle="tab">Same Indication</a>
                    </li>
                    <li>
                        <a href="#tab_atc_code" data-toggle="tab">ATC Code</a>
                    </li>
                    <li>
                        <a href="#tab_other_company" data-toggle="tab">Generics companies</a>
                    </li>
                </ul>
                <div class="tab-content not_bg no_padding"></div>
            </div>
        </div>
    </div>
</div>
<!--end subTitle row-->

<!--begin overview-->
<div class="section" id="tab_overview">
	<div class="row">
		<div class="col-md-6">
			<div class="portlet portlet-mrd-overview">
				<div class="portlet-body">
					<div class="scroller" style="height: 650px;" data-rail-visible="1" data-handle-color="#a1b2bd">
						<p></p>
						<div class="timeline">
							<!-- <div class="timeline-heading">
								Activity Timeline
							</div>
							<div class="timeline-panel">
								<div class="panel">
									<div class="timeline-date">13:12 am</div>
									<div class="panel-body">
										<b>Gerald Morris</b>
										<p>How are the wife and kids, Taylor?</p>
									</div>
								</div>
							</div> -->
							<?php
							 $y = "";
							 if(!empty($model['date_cdereceived'])){
							 	$y  = strtotime($model['date_cdereceived']);
							?>
							<div class="timeline-heading">
								<?php echo date("Y",$y);?>
							</div>
							<div class="timeline-panel">
								<div class="panel">
									<div class="timeline-date"><?php echo date("m-d",$y);?></div>
									<div class="panel-body">
										<b>CDE Received</b>
										<p>Your registration files have been received by CDE.</p>
									</div>
								</div>
							</div>
							<div class="timeline-panel">
								<div class="panel">
									<div class="timeline-date"><?php //echo date("m-d",$y);?></div>
									<div class="panel-body">
										<b>CDE Received</b>
										<p>Your registration files have been received by CDE.</p>
									</div>
								</div>
							</div>
							<?php
							 }
							?>
							<?php
							  $y2="";
							  if(!empty($model->date_appr_delivery)){
							  		$y2  = strtotime($model['date_appr_delivery']);
							?>
							<div class="timeline-heading">
								<?php echo date("Y",$y2);?>
							</div>
							<div class="timeline-panel">
								<div class="panel">
									<div class="timeline-date"><?php echo date("m-d",$y2);?></div>
									<div class="panel-body">
										<b>Date Approval Delivery</b>
										<p>Your approval documents of the registration has been mailed to you.</p>
									</div>
								</div>
							</div>
							<?php
							}
							?>
							
							<?php
							$y3 = "";
							if(!empty($model->date_fee_paid)){
								$y3  = strtotime($model['date_fee_paid']);
							?>
							<div class="timeline-heading">
								<?php echo date("Y",$y3);?>
							</div>
							<div class="timeline-panel">
								<div class="panel">
									<div class="timeline-date"><?php echo date("m-d",$y3);?></div>
									<div class="panel-body">
										<b>Date Fee Paid</b>
										<p>Your fees of registration have been paid.</p>
									</div>
								</div>
							</div>
							<?php
							}
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="portlet portlet-mrd-right-left">
						<div class="portlet-title">
							<div class="caption">
								<span class="capitalize"><?php echo Yii::t('registration','f_Drug_Information');?></span>
							</div>
						</div>
						<div class="portlet-body">
							<p class="title capitalize"><strong><?php echo Yii::t('registration','f_Drug_Information');?></strong></p>
							<p><?php echo Yii::t('registration','f_Drug_Name');?>:
								<?php
								if(!empty($model->drugname)){
									echo $model->drugname;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Dosage_form');?>:
								<?php
								if(!empty($model->doseform)){
									echo $model->doseform;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Developers');?>:
								<?php
								if(!empty($model->pharma_clean)){
									echo $model->pharma_clean;
								}else if(!empty($model->compname_reg)){
									echo $model->compname_reg;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Import/Domestic');?>:
								<?php
								$str="";
								if(!empty($model->num_accept)){
									$str = substr($model->num_accept,0,1);
								}
								if($str=="C"){
									echo "Domestic";
								}else if($str=="J"){
									echo "Import";
								}else{
									echo "未知";
								}
								?>
							</p>
							<p class="tile capitalize"><strong><?php echo Yii::t('registration','f_Registration_Category');?></strong></p>
							<p>
								<?php echo Yii::t('registration','f_Acceptance_Number');?>:
								<?php
								if(!empty($model->num_accept)){
									echo $model->num_accept;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Drug_Type');?>:
								<?php
								if(!empty($model->drugcat)){
									echo $model->drugcat;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Application_Type');?>:
								<?php
								if(!empty($model->appltype)){
									echo $model->appltype;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_Registration_Category');?>:
								<?php
								if(!empty($model->regclass)){
									echo $model->regclass;
								}
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','f_special_marks');?>:
								<?php
								if(!empty($model->is_special) && $model->is_special==1){
									echo "特殊审批";
								}else if(!empty($model->is_major) && $model->is_major==1){
									echo "重大专项";
								}else if(!empty($model->is_ctd) && $model->is_ctd==1){
									echo "CTD格式";
								}else{
									echo "N/A";
								}
								?> 
							</p>
							<p>
								<?php echo Yii::t('registration','f_Organization');?>:
								<?php
								$str="";
								if(!empty($model->num_accept)){
									$str = substr($model->num_accept,0,1);
								}
								if($str=="C"){
									echo "省局";
								}else if($str=="J"){
									echo "国家局";
								}else{
									echo "N/A";
								}
								?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet portlet-mrd-left">
								<div class="portlet-title">
									<div class="caption">
										<span class="capitalize"><?php echo Yii::t('registration','f_Drug_Review_Information');?></span>
									</div>
								</div>
								<div class="portlet-body">
									<p class="title capitalize"><strong><?php echo Yii::t('registration','f_Drug_Review_path');?></strong></p>
									<p>
										<?php echo Yii::t('registration','f_Review_Category');?>:
										<?php
										if(!empty($model->newaccepted_reviewcat)){
											echo $model->newaccepted_reviewcat;
										}
										?>
									</p>
									<p>
										<?php echo Yii::t('registration','f_review_method');?>:
										<?php
										if(!empty($model->review_method)){
											echo $model->review_method;
										}
										?>
									</p>
									<p>
										<?php echo Yii::t('registration','f_the_review_reporting_office');?>:
										<?php
										if(!empty($model->evaluate_department)){
											echo $model->evaluate_department;
										}
										?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="portlet portlet-mrd-left">
								<div class="portlet-title">
									<div class="caption">
										<span class="capitalize"><?php echo Yii::t('registration','f_Drug_Review_Timeline');?></span>
									</div>
								</div>
								<div class="portlet-body">
									<p class="title capitalize"><strong><?php echo Yii::t('registration','f_Drug_Timetable_of_Technical_Review');?></strong></p>
									<p>
										<?php echo Yii::t('registration','f_Reception_date');?>:
										<?php
										if(!empty($model->date_cdereceived)){
											echo $model->date_cdereceived;
										}
										?>
									</p>
									<p>
										<?php echo Yii::t('registration','f_Current_Status');?>:
										<?php
										if(!empty($model->date_appr_delivery)){
											echo "审评完成";
										}else if(!empty($model->status_new_overall)){
											echo $model->status_new_overall;
										}else{
											echo "N/A";
										}
										?>
									</p>
									<p>
										<?php echo Yii::t('registration','f_end_time');?>:
										<?php
										if(!empty($model->date_appr_delivery)){
											echo $model->date_appr_delivery;
										}
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="portlet portlet-mrd-left">
						<div class="portlet-title">
							<div class="caption">
								<span class="capitalize"><?php echo Yii::t('registration','h_Related_drug_application')?></span>
							</div>
						</div>
						<div class="portlet-body">
							<p class="title capitalize"><strong><?php echo Yii::t('registration','h_Main_application_number(API)')?></strong></p>
							<p>
								<?php echo Yii::t('registration','h_Application_number')?>:
								<?php
								if(!empty($model->num_accept)){
									echo $model->num_accept;
								}
								?>
							</p>
							<p class="title capitalize"><strong><?php echo Yii::t('registration','h_Deputy_application_number(different formulation)')?></strong></p>
							<p>
								<?php echo Yii::t('registration','h_Application_number')?>:
								<?php
									echo "??";
								?>
							</p>
							<p class="title capitalize"><strong><?php echo Yii::t('registration','h_Subsequent_application_number_supplemental_application_review_etc')?></strong></p>
							<p>
								<?php echo Yii::t('registration','h_Supplemental_application')?>:
								<?php
								echo "??";
								?>
							</p>
							<p>
								<?php echo Yii::t('registration','h_Review')?>:
								<?php
								echo "??";
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   overview-->

<!--begin same company-->
<div class="section" id="tab_same_company">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="font-blue-madison capitalize"><?php echo Yii::t('registration','h_Same_company_same_indication')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="same_company_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				                <label>
				                	<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				                <label>
				                	<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="same_company_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="same_company" cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   same company-->

<!--begin same drug-->
<div class="section" id="tab_same_drug">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('registration','h_Registration_of_the_same_drug_in_other_companies')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="same_drug_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				               <label>
				               		<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="same_drug_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="same_drug"  cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   same drug-->

<!--begin same target-->
<div class="section" id="tab_same_target">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('registration','h_Same_Target')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="same_target_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				               <label>
				               		<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="same_target_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="same_target"  cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   same target-->


<!--begin same indication-->
<div class="section" id="tab_same_indication">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('registration','h_Same_Indication')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="same_indication_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				               <label>
				               		<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="same_indication_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="same_indication"  cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   same indication-->

<!--begin ATC code-->
<div class="section" id="tab_atc_code">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('registration','h_Same_Indication')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="by_atc_code_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				               <label>
				               		<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="by_atc_code_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="by_atc_code"  cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   ATC code-->

<!--begin Generics by other companies-->
<div class="section" id="tab_other_company">
	<div class="row">
		<div class="col-md-12">
			<div class="portlet portlet-mrd-list">
				<div class="portlet-title">
					<div class="caption">
						<span class="capitalize"><?php echo Yii::t('registration','h_Generics_by_other_companies')?></span>
					</div>
					<div class="actions">
	                    <div class="btn-group">
	                        <a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
	                            Columns <i class="fa fa-angle-down"></i>
	                        </a>
	                        <div id="by_other_company_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
				               <label>
				               		<input type="checkbox" checked data-column="1"><?php echo Yii::t('registration','f_Drug_Name');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="2"><?php echo Yii::t('registration','f_Drug_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="3"><?php echo Yii::t('registration','f_Application_Type');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="4"><?php echo Yii::t('registration','f_Registration_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="5"><?php echo Yii::t('registration','f_Review_Category');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="6"><?php echo Yii::t('registration','f_special_marks');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="7"><?php echo Yii::t('registration','f_Review/Approval_Status');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="8"><?php echo Yii::t('registration','f_Acceptance_Number');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="9"><?php echo Yii::t('registration','f_Reception_date');?></label>
				               <label>
				               		<input type="checkbox" checked data-column="10"><?php echo Yii::t('registration','f_end_time');?></label>
	                        </div>
	                    </div>
	                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	                </div>
				</div>
				<div class="portlet-body">
					<div class="loading" id="by_other_company_loading" style="display: none;"></div>
					<div class="table-responsive">
						<table class="table table-mrd" id="by_other_company"  cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th><?php echo Yii::t('registration','f_Company_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Name');?></th>
				                    <th><?php echo Yii::t('registration','f_Drug_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Application_Type');?></th>
				                    <th><?php echo Yii::t('registration','f_Registration_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_Review_Category');?></th>
				                    <th><?php echo Yii::t('registration','f_special_marks');?></th>
				                    <th><?php echo Yii::t('registration','f_Review/Approval_Status');?></th>
				                    <th><?php echo Yii::t('registration','f_Acceptance_Number');?></th>
				                    <th><?php echo Yii::t('registration','f_Reception_date');?></th>
				                    <th><?php echo Yii::t('registration','f_end_time');?></th>
				                  </tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end   Generics by other companies-->

<!--begin script-->
<script>
	$(function() {
		var scUrl =<?php echo "'".$this->createUrl('registration/sameCompany',array("id"=>$_REQUEST['id']))."'";?>;
		var scDataCols = [
			{"data":"compname_reg"},
			{"data":"drugname"},
			{"data":"drugcat"},
			{"data":"appltype"},
			{"data":"regclass"},
			{"data":"newaccepted_reviewcat"},
			{"data":"mark"},
			{"data":"status_new_overall"},
			{"data":"num_accept1"},
			{"data":"date_cdereceived"},
			{"data":"date_appr_delivery"},
		];
		dataTableAjax(scUrl,"","#same_company",scDataCols,"300");
		var sdUrl =<?php echo "'".$this->createUrl('registration/sameDrug',array("id"=>$_REQUEST['id']))."'";?>;
		var stUrl =<?php echo "'".$this->createUrl('registration/sameTarget',array("id"=>$_REQUEST['id']))."'";?>;
		var siUrl =<?php echo "'".$this->createUrl('registration/sameIndication',array("id"=>$_REQUEST['id']))."'";?>;
		var acUrl =<?php echo "'".$this->createUrl('registration/AtcCode',array("id"=>$_REQUEST['id']))."'";?>;
		dataTableAjax(sdUrl,"","#same_drug",scDataCols,"300");
		dataTableAjax(stUrl,"","#same_target",scDataCols,"300");
		dataTableAjax(siUrl,"","#same_indication",scDataCols,"300");
		dataTableAjax(acUrl,"","#by_atc_code",scDataCols,"300");
	});
</script>
<!--end   script-->










