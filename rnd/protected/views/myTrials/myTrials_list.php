<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("myTrials/index");?>">My Trials</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#"><?php echo $titleName;?></a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	<span class="font_weight">Trials</span>
	<small>Trials development companies with operation in China</small>
</h3>
<!-- BEGIN PAGE CONTENT-->
<div class="bottom-margin"></div>

<!--start row-->
<div class="row">
	<form action="<?php echo  $this->createUrl('trilas/index');?>" id="trials_submit" class="form-horizontal form-row-seperated">
	<div class="col-md-11">
		<!-- <form action="#"> -->
			<div class="input-group">
				<div class="input-cont">
					<input type="text" placeholder="Find trials..." name="search_trials" class="form-control"></div>
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
						<label class="control-label col-md-3"><?php echo Yii::t('trials', 'h_Trial_region'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="tr[]" value="China Only" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Filterby_China_only'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="tr[]" value="Non-China Only" data-checkbox="icheckbox_square-grey"> <?php echo Yii::t('trials', 'vl_Filterby_non_china_only'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="tr[]" value="Both China and Non-China" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Filterby_Both_china_and_non_china'); ?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('trials', 'f_Recruiting'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="re[]" value="Recruiting" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Recruiting'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="re[]" value="Not yet recruiting" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Not_yet_recruiting'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="re[]" value="Active, not recruiting" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Active,_not_recruiting'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="re[]" value="Completed" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Completed'); ?></label>
										<label>
										<input type="checkbox" class="icheck" name="re[]" value="Other" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Other'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">
						<?php echo Yii::t('trials', 'h_Study_results'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="sr[]" value="Study with results" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Studyresults_Study_with_results'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="sr[]" value="study without results" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Studyresults_study_without_results'); ?></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('trials', 'f_Study_Type'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="st[]" value="Interventional" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Studytype_Interventional'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="st[]" value="Observational" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Studytype_Observational'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="st[]" value="Expanded access" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Studytype_Expanded_access'); ?></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('trials', 'vl_Sortby_phase'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="ph[]" value="PhaseI" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Phase_Phase_I'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="ph[]" value="PhaseII" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Phase_Phase_II'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="ph[]" value="PhaseIII" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Phase_Phase_III'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="ph[]" value="PhaseIV" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Phase_Phase_IV'); ?></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('trials', 'h_Conditions'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
						<?php 
 							if(!empty($DiseaseInfo)){
 								foreach ($DiseaseInfo as $v){
						?>
							<label>
								<input type="checkbox" class="icheck" name="con[]" value="<?php echo $v->disease_id; ?>" data-checkbox="icheckbox_square-grey">
									<?php
                                        if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
                                            echo $v->condition_cn;
                                        } else {
                                            echo $v->condition_en;
                                        }
                                     ?>
							</label>
						<?php
							}
						}
						?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('trials', 'h_Trial_site'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="mc[]" value="R&D" data-checkbox="icheckbox_square-grey">R&D</label>
							<label>
								<input type="checkbox" class="icheck" name="mc[]" value="Manufacturing" data-checkbox="icheckbox_square-grey">Manufacturing</label>
							<label>
								<input type="checkbox" class="icheck" name="mc[]" value="Distribution" data-checkbox="icheckbox_square-grey">Distribution</label>
							<label>
								<input type="checkbox" class="icheck" name="mc[]" value="Pharmacy" data-checkbox="icheckbox_square-grey">Pharmacy</label>
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
						<div id="trails_tables_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label>
								<input type="checkbox" checked data-column="0">id</label>
							<label>
								<input type="checkbox" checked data-column="1">name</label>
							<label>
								<input type="checkbox" checked data-column="2">position</label>
							<label>
								<input type="checkbox" checked data-column="3">office</label>
							<label>
								<input type="checkbox" checked data-column="4">Extn.</label>
							<label>
								<input type="checkbox" checked data-column="5">Start date</label>
							<label>
								<input type="checkbox" checked data-column="6">Salary</label>
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
				<div class="loading" id="trails_tables_loading" style="display: none;">
				</div>
				<div class="table-responsive">
					<table id="trails_tables" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<input type="checkbox" class="group-checkable" data-set="#trails_tables_1 .checkboxes"/>
								</th>
								<th><?php echo Yii::t('trials','f_Official_Title');?></th>
								<th><?php echo Yii::t('trials','f_Phase');?></th>
								<th><?php echo Yii::t('trials', 'h_Conditions'); ?></th>
								<th><?php echo Yii::t('trials','h_Interventions');?></th>
								<th><?php echo Yii::t('trials','h_Status');?></th>
								<th><?php echo Yii::t('trials','f_Sponsor');?></th>
								<th><?php echo Yii::t('trials','h_Number_of_sites_in_China');?></th>
								<th><?php echo Yii::t('trials','h_New_site');?></th>
								<th><?php echo Yii::t('trials','h_New_status');?></th>
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
			{ "data": "mrd_trial_id" }, 
	        { "data": "title_brief_cn" },
	       	{ "data": "phase_cn" },
	        { "data": "condition_cn" },
	        { "data": "intervention_name_cn" },
	        { "data": "Recruiting_cn" },
	        { "data": "sponsor_cn" },
	        { "data": "number" },
	        { "data": "new_trials" },
	        { "data": "new_trials_1" },
		];
		<?php
			if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
		?>
			var url=<?php echo "'".$this->createUrl('myTrials/AjaxList',array("type"=>'module'))."'";?>;
		<?php
			}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
		?>
			var url=<?php echo "'".$this->createUrl('myTrials/AjaxList',array('type'=>'myModule','myId'=>$_REQUEST['myId']))."'";?>;
		<?php
			}
		?>
		
		dataTableAjax(url,"","#trails_tables",dataCols,"");
		setInterval(function(){$(".number").text($("#trails_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#trials_submit").submit(function(){
		         var path_url = $(this).serialize();
		         dataTableAjax(url,path_url,"#trails_tables",dataCols,"");
		         var arr = $(this).serializeArray();
		        // //console.log(arr);
		         var tr='',re='',sr='',st='',ph='',con='';
		        for(var i=0;i < arr.length;i++){
		        	if("tr[]" == arr[i]['name']){
		        		tr +=arr[i]['value']+",";
		        	}
		        	if("re[]" == arr[i]['name']){
		        		re +=arr[i]['value']+",";
		        	}
		        	if("sr[]" == arr[i]['name']){
		        		sr +=arr[i]['value']+",";
		        	}
		        	if("st[]" ==arr[i]['name']){
		        		st +=arr[i]['value']+",";
		        	}
		        	if("ph[]" ==arr[i]['name']){
		        		ph +=arr[i]['value']+",";
		        	}
		        	if("con[]" ==arr[i]['name']){
		        		con +=arr[i]['value']+",";
		        	}
		        }
		        var str='';
		        if(tr !=""){
		        	str +=tr.substring(0,tr.length-1)+"|";
		        }
		        if(re !=""){
		        	str +=re.substring(0,re.length-1)+"|";
		        }
		        if(sr !=""){
		        	str +=sr.substring(0,sr.length-1)+"|";
		        }
		        if(st !=""){
		        	str +=st.substring(0,st.length-1)+"|";
		        }
		        if(ph !=""){
		        	str +=ph.substring(0,ph.length-1)+"|";
		        }
		        if(con !=""){
		        	str +=con.substring(0,con.length-1)+"|";
		        }
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    
		    //search list 
		    $(".search_list").text("non");
	});
</script>
<!--script-->



