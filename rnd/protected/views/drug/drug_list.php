<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("drug/index");?>">Drug <?php if(!empty($_REQUEST['target'])) { echo $_REQUEST['target'];}?></a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	<span class="font_weight">Drug <?php if(!empty($_REQUEST['target'])) { echo $_REQUEST['target'];}?></span>
	<small>Drug development Drug <?php if(!empty($_REQUEST['target'])) { echo $_REQUEST['target'];}?> with operation in China</small>
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
	<form action="<?php echo $this->createUrl('drug/index');?>" class="form-horizontal form-row-seperated" id="durg_submit">
		<div class="search-mrd">
			<div class="col-md-11">
				<div class="input-group">
					<div class="input-cont">
						<input type="text" placeholder="Find drug approved..." name="search_drug" class="form-control"></div>
					<span class="input-group-btn">
						<button type="submit" class="btn blue">
							Search &nbsp; <i class="m-icon-swapright m-icon-white"></i>
						</button>
					</span>
				</div>
			</div>
			<div class="col-md-1">
				<div class="actions">
					<div class="btn-group">
						<button type="button" data-toggle="collapse"  data-target="#dropdown" class="btn" aria-expanded="true">
							<span class="filter_font">Filters</span>
							&nbsp; <i class="fa fa-angle-down"></i>
						</button>
					</div>
				</div>
			 </div>
		</div>
	<div class="col-md-12">
		<div class="portlet search-filter-mrd collapse" id="dropdown">
			<div class="portlet-body form">
				<div class="form-body">
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('drug','f_Approval_status');?>:</label>
						<div class="col-md-9">
							<input type="checkbox" name="as[]" value="Approved" class="make-switch" data-on-text="<?php echo Yii::t('drug','vl_Approvalstatus_Approved');?>" data-off-text="Not">					
							<input type="checkbox" name="as[]" value="Investigational" class="make-switch" data-on-text="<?php echo Yii::t('drug','vl_Approvalstatus_Investigational');?>" data-off-text="Not">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"> <?php echo Yii::t('drug','h_Drug_origin');?>:</label>
						<div class="col-md-9">
							<input type="checkbox" name="do[]" value="Domestic" class="make-switch" data-on-text="<?php echo Yii::t('drug','vl_Drugorigin_Imported_drug');?>" data-off-text="Not">					
							<input type="checkbox" name="do[]" value="Imported" class="make-switch" data-on-text="<?php echo Yii::t('drug','vl_Drugorigin_Imported_drug');?>" data-off-text="Not">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('drug','h_Marketing_Status');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" name="ms[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Prescription"><?php echo Yii::t('drug','vl_MarketingStatus_Prescription');?></label>
									<label>
										<input type="checkbox" name="ms[]" class="icheck" data-checkbox="icheckbox_square-grey" value="OTC"><?php echo Yii::t('drug','vl_MarketingStatus_OTC');?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('drug','h_Drug_category');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" name="dc[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Small molecule"><?php echo Yii::t('drug','vl_Drugcategory_Small_molecule');?></label>
									<label>
										<input type="checkbox" name="dc[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Biologics"> <?php echo Yii::t('drug','vl_Drugcategory_Biologics');?></label>
									<label>
										<input type="checkbox" name="dc[]" class="icheck" data-checkbox="icheckbox_square-grey" value="TCM"><?php echo Yii::t('drug','vl_Drugcategory_TCM');?></label>
									<label>
										<input type="checkbox" name="dc[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Nutraceutical"><?php echo Yii::t('drug','vl_Drugcategory_Nutraceutical');?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('drug','h_Product_tag');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox"name="pt[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Patented drug"><?php echo Yii::t('drug','vl_Producttag_Patented_drug');?></label>
									<label>
										<input type="checkbox"name="pt[]" class="icheck" data-checkbox="icheckbox_square-grey" value="Generics"><?php echo Yii::t('drug','vl_Producttag_Generics');?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('drug','h_Category');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<?php if(!empty($category)){
										foreach ($category as $key => $value) {
									?>
									<label>
										<input type="checkbox"  class="icheck" name='drg_cat[]' value="<?php echo $value->id;?>" data-checkbox="icheckbox_square-grey">
										<?php
		                                if(Yii::app()->language=='us_en'){
		                                 echo $value->engName;
		                                }
		                                elseif(Yii::app()->language=='zh_cn')
		                                {
		                                    echo $value->cnName;
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
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
<!--end row-->

<!--start row-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title no_margin_buttom border_bottom_0">
				<div class="caption font-purple-plum">
					<span class="caption-subject bold uppercase"><span class="number">0</span> studies found for:</span>
					<span class="caption-helper search_list">non</span>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							Columns <i class="fa fa-angle-down"></i>
						</a>
						<div id="drug_table_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label>
								<input type="checkbox" checked data-column="1"><?php echo Yii::t('drug','f_Active_ingredients');?></label>
							<label>
								<input type="checkbox" checked data-column="2"><?php echo Yii::t('drug','f_Approval_status');?></label>
							<label>
								<input type="checkbox" checked data-column="3"><?php echo Yii::t('drug','f_Drug_type');?></label>
							<label>
								<input type="checkbox" checked data-column="4"><?php echo Yii::t('drug','h_Patented_drug?');?></label>
							<label>
								<input type="checkbox" checked data-column="5"><?php echo Yii::t('drug','f_Total_number(Drugs/Manuf)');?></label>
							<label>
								<input type="checkbox" checked data-column="6"><?php echo Yii::t('drug','f_Imported_number(Drugs/Manuf)');?></label>
							<label>
								<input type="checkbox" checked data-column="7"><?php echo Yii::t('drug','f_Domestic_number(Drugs/Manuf)');?></label>
							<label>
								<input type="checkbox" checked data-column="8"><?php echo Yii::t('drug','h_New_Trial');?></label>
							<label>
								<input type="checkbox" checked data-column="9"><?php echo Yii::t('drug','h_New_competitor');?></label>
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
				<div class="loading" id="drug_table_loading" style="display: none;">
					<!-- <span>loading...</span>	 -->
				</div>
				<div class="table-responsive">
					<table id="drug_table" class="table table-mrd" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<input type="checkbox" class="group-checkable" data-set="#drug_table .checkboxes"/>
								</th>
								<th><?php echo Yii::t('drug','f_Active_ingredients');?></th>
								<th><?php echo Yii::t('drug','f_Approval_status');?></th>
								<th><?php echo Yii::t('drug','f_Drug_type');?></th>
								<th><?php echo Yii::t('drug','h_Patented_drug?');?></th>
								<th><?php echo Yii::t('drug','f_Total_number(Drugs/Manuf)');?></th>
								<th><?php echo Yii::t('drug','f_Imported_number(Drugs/Manuf)');?></th>
								<th><?php echo Yii::t('drug','f_Domestic_number(Drugs/Manuf)');?></th>
								<th><?php echo Yii::t('drug','h_New_Trial');?></th>
								<th><?php echo Yii::t('drug','h_New_competitor');?></th>
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
						<input type="hidden" name="module_type" value="mrd_drug"/>
						<input type="hidden" name="controller" value="drug"/>
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
									if(!empty($mrd_drug)){
										foreach($mrd_drug as $v){
								?>
											<option value="<?php echo $v->mylist_id;?>"><?php echo $v->name;?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
						<input type="hidden" class="mrdMyListIds" name="mrd_listIds"/>
						<input type="hidden" name="module_type" value="mrd_drug"/>
						<input type="hidden" name="controller" value="drug"/>
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
           	var tableArr = dataTableCheck("#drug_table","input.checkboxes");
            if(tableArr && tableArr.length > 0){
            	$(".mrdMyListIds").val(tableArr);
            }else{
            	alert("不能为空，请先选择.....");
            	return false;
            }
          });
	});
</script>

<script>
	$(function(){
		var url=<?php echo "'".$this->createUrl('drug/jsondrug_index')."'";?>;
		var dataCol=[
			{ "data": "mrd_drug_id" }, 
            { "data": "api_cn" },
            { "data": "status" },
		    { "data": "drugcat" },
            { "data": "is_patented" },
            { "data": "count_drug" },
            { "data": "count_drug_idl"},
            { "data": "count_drug_lml"},
            { "data": "NewTrial" },
            { "data": "Competitor" },
					 ];
		dataTableAjax(url,"","#drug_table",dataCol,"");
		
		setInterval(function(){$(".number").text($("#drug_table").DataTable().page.info().recordsTotal)},500);
		    //submit
		    $("#durg_submit").submit(function(){
		         var path_url = $(this).serialize();
				 dataTableAjax(url,path_url,"#drug_table",dataCol);
		         var arr = $(this).serializeArray();
		        // //console.log(arr);
		        var do1='',ms='',dc='',pt='',drg_cat='';
		        for(var i=0;i < arr.length;i++){
		        	if("do[]" == arr[i]['name']){
		        		do1 +=arr[i]['value']+",";
		        	}
		        	if("ms[]" == arr[i]['name']){
		        		ms +=arr[i]['value']+",";
		        	}
		        	if("dc[]" == arr[i]['name']){
		        		dc +=arr[i]['value']+",";
		        	}
		        	if("pt[]" ==arr[i]['name']){
		        		pt +=arr[i]['value']+",";
		        	}
		        }
		        var str='';
		        if(do1 !=""){
		        	str +=do1.substring(0,do1.length-1)+"|";
		        }
		        if(ms !=""){
		        	str +=ms.substring(0,ms.length-1)+"|";
		        }
		        if(dc !=""){
		        	str +=dc.substring(0,dc.length-1)+"|";
		        }
		        if(pt !=""){
		        	str +=pt.substring(0,pt.length-1)+"|";
		        }
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    $(".search_list").text("non");
		});
</script>