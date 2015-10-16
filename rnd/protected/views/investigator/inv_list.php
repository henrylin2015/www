<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("investigator/index");?>">Investigator</a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	<span class="font_weight">Investigator</span>
	<small>Investigator development companies with operation in China</small>
</h3>
<!-- BEGIN PAGE CONTENT-->
<div class="bottom-margin"></div>

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

<!--start row-->
<div class="row">
	<form action="<?php echo  $this->createUrl('investigator/index');?>" id="inv_submit" class="form-horizontal form-row-seperated">
	<div class="col-md-11">
		<!-- <form action="#"> -->
			<div class="input-group">
				<div class="input-cont">
					<input type="text" placeholder="Find trials..." name="search_investigator" class="form-control"></div>
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
						<label class="control-label col-md-3"><?php echo Yii::t('investigator', 'f_Department'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<?php
										if(!empty($deptments)){
											foreach ($deptments as $v) {
									?>
									<label>
										<input type="checkbox" class="icheck" name="de[]" value="<?php echo $v['dept_cn']; ?>" data-checkbox="icheckbox_square-grey">

										<?php
                                        if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
                                            echo $v['dept_cn'];
                                        } else {
                                            echo $v['dept_en'];
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
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('investigator','h_Region');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="re[]" value="Recruiting" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('trials', 'vl_Recruitment_Recruiting'); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">
						<?php echo Yii::t('site', 'f_City_level'); ?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="level[]" value="1线" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_First-tier_city'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="level[]" value="2线" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_Second-tier_city'); ?></label>
							<label>
								<input type="checkbox" class="icheck" name="level[]" value="3线及以下" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_Third-tier_city'); ?></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('investigator','h_Is_KOL')?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="is_kol[]" value="YES" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_YES');?></label>
							<label>
								<input type="checkbox" class="icheck" name="is_kol[]" value="NO" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_NO');?></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><?php echo Yii::t('investigator','h_KOL_Tag');?>:</label>
					<div class="col-md-9">
						<div class="icheck-inline">
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="院士" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_Academician');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="学会" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_Association_post');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="科室主任" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_Agency_director');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="教授" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_Professor');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="GMCT" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_GMCT');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="trial experience" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_Trial_Experience');?></label>
							<label>
								<input type="checkbox" class="icheck" name="kol_tag[]" value="PI" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('investigator','h_PI');?></label>
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
						<div id="inv_tables_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
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
							<li>
								<a class="" id="addToList" data-toggle="modal" href="#static">
									Add List </a>
							</li>
						</ul>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
				</div>
			</div>
			<div class="portlet-body no_padding_top">
				<div class="loading" style="display: none;" id="inv_tables_loading">
				</div>
				<div class="table-responsive">
					<table id="inv_tables" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<input type="checkbox" class="group-checkable" data-set="#inv_tables_1 .checkboxes"/>
								</th>
								<th><?php echo Yii::t('site','h_Therapeutic_Areas');?></th>
								<th><?php echo Yii::t('investigator','vl_Clinictitle_Chief_Physician');?></th>
								<th><?php echo Yii::t('investigator','f_Hospital');?></th>
								<th><?php echo Yii::t('investigator','h_Department');?></th>
								<th><?php echo Yii::t('investigator','h_KOL_Tag');?></th>
								<th><?php echo Yii::t('investigator','f_Clinic_title');?></th>
								<th><?php echo Yii::t('investigator','f_Experienced_Trials');?></th>
								<th><?php echo Yii::t('investigator','f_Specialized_disease');?></th>
								<th><?php echo Yii::t('investigator','Five-year_trials_(participating/leading)');?></th>
								<th><?php echo Yii::t('investigator','h_Publications');?></th>
								<th><?php echo Yii::t('investigator','f_Professional_association');?></th>
								<th><?php echo Yii::t('investigator','h_New_Trials');?></th>
								<th><?php echo Yii::t('investigator','h_New_Publications');?></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row-->


<!--begin add to list-->
<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" style="top: 20%;" data-keyboard="false">
	<div class="mrd-modal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Save to your list</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo $this->createUrl("common/saveUserMylist");?>" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="control-label col-md-2">Name:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="mrd_name"/>
						</div>
						<input type="hidden" class="mrdMyListIds" name="mrd_listIds"/>
						<input type="hidden" name="module_type" value="mrd_doctor"/>
						<input type="hidden" name="controller" value="investigator"/>
						<input type="hidden" name="action" value="index"/>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button class="btn default" type="submit" style="width: 100%;">Create a new list</button>
						</div>
					</div>
				</form>
				<br>
				<form action="<?php echo $this->createUrl("common/updateUserMylist");?>" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-2">Name:</label>
						<div class="col-md-10">
							<select class="form-control" name="mrd_addIds">
								<option value="0">Please select	</option>
								<?php
									if(!empty($mrd_doctor)){
										foreach($mrd_doctor as $v){
								?>
											<option value="<?php echo $v->mylist_id;?>"><?php echo $v->name;?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
						<input type="hidden" class="mrdMyListIds" name="mrd_listIds"/>
						<input type="hidden" name="module_type" value="mrd_doctor"/>
						<input type="hidden" name="controller" value="investigator"/>
						<input type="hidden" name="action" value="index"/>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button class="btn default" type="submit" style="width: 100%;">Update your list</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">
					Close
				</button>
				<!-- <button type="button" data-dismiss="modal" class="btn green">
					Continue Task
				</button> -->
			</div>
		</div>
	</div>
</div>
<!--end   add to list-->

<script>
	$(function (){
		setInterval(function(){$(".alert").hide();},10000);
		//dataTable checked
         $("#addToList").click(function() {
           	var tableArr = dataTableCheck("#inv_tables","input.checkboxes");
            if(tableArr && tableArr.length > 0){
            	$(".mrdMyListIds").val(tableArr);
            }else{
            	alert("不能为空，请先选择.....");
            	return false;
            }
          });
	});
</script>


<!--script-->
<script>
	$(function(){
		var dataCols=[
			{ "data": "doctor_id" },
			{ "data": "hospital_id" },
			{ "data": "name" },
			{ "data": "hospital" },
			{ "data": "department" },
			{ "data": "kol_tag" },
			{ "data": "title_clinician" },
			{ "data": "Trial_disease"},
			{ "data": "specialized_indication" },
			{ "data": "count_5leadPItrials" },
			{ "data": "count_publication" },
			{ "data": "awards" },
			{ "data": "profess_involve" },
			{ "data": "trial_exp" },
		];
		var url = <?php echo "'".$this->createUrl('investigator/jsoninvestigator_index')."'";?>;
		dataTableAjax(url,"","#inv_tables",dataCols,"");
		
		setInterval(function(){$(".number").text($("#inv_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#inv_submit").submit(function(){
		         var path_url = $(this).serialize();
		         dataTableAjax(url,path_url,"#inv_tables",dataCols,"");
		         var arr = $(this).serializeArray();
		        // //console.log(arr);
		         var de='',level='',is_kol='',kol_tag='';
		        for(var i=0;i < arr.length;i++){
		        	if("de[]" == arr[i]['name']){
		        		de +=arr[i]['value']+",";
		        	}
		        	if("level[]" == arr[i]['name']){
		        		level +=arr[i]['value']+",";
		        	}
		        	if("is_kol[]" == arr[i]['name']){
		        		is_kol +=arr[i]['value']+",";
		        	}
                    if("kol_tag[]" == arr[i]['name']){
                        kol_tag +=arr[i]['value']+",";
                    }
		        }
		        var str='';
		        if(de !=""){
		        	str +=de.substring(0,de.length-1)+"|";
		        }
		        if(level !=""){
		        	str +=level.substring(0,level.length-1)+"|";
		        }
		        if(is_kol !=""){
		        	str +=is_kol.substring(0,is_kol.length-1)+"|";
		        }
                if(kol_tag !=""){
                    str +=kol_tag.substring(0,kol_tag.length-1)+"|";
                }
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    
		    //search list 
		    $(".search_list").text("non");
	});
</script>
<!--script-->


