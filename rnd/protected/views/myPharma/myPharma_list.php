<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("myPharma/index");?>">My Pharma</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#"><?php echo $titleName;?></a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	<span class="font_weight">Companies</span>
	<small>Drug development companies with operation in China</small>
</h3>
<!-- BEGIN PAGE CONTENT-->
<div class="bottom-margin"></div>
<!--start row-->
<div class="row">
	<form action="pharma/index" id="pharma_submit" class="form-horizontal form-row-seperated">
	<div class="search-mrd">
		<div class="col-md-11">
			<div class="input-group">
				<div class="input-cont">
					<input type="text" placeholder="Find companies..." name="search_pharma" class="form-control"></div>
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
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Company_Type'); ?>:</label>
						<div class="col-md-9">
							<input type="checkbox" class="make-switch" checked value="Domestic" name="companyType" data-on-text="<?php echo Yii::t('pharma', 'vl_CompanyType_Domestic'); ?>" data-off-text="<?php echo Yii::t('pharma', 'vl_CompanyType_International'); ?>">
							<input type="checkbox" class="make-switch" data-on-text="&nbsp;Enabled&nbsp;&nbsp;" data-off-text="&nbsp;Disabled&nbsp;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Market_Entry_Status'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="mes[]" value="With Marketed Product" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_MarketEntryStatus_With_Marketed_Product'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="mes[]" value="With product in market  registration" data-checkbox="icheckbox_square-grey">With product in market  registration</label>
									<label>
										<input type="checkbox" class="icheck" name="mes[]" value="With product in clinical studies" data-checkbox="icheckbox_square-grey">With product in clinical studies</label>
									<label>
										<input type="checkbox" class="icheck" name="mes[]" value="With IND on file" data-checkbox="icheckbox_square-grey">With IND on file</label>
								</div>
							</div>
						</div>
					</div>
				</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Capability'); ?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="R&D" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_R&D'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Manufacturing" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Manufacturing'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Distribution" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Distribution'); ?>	
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Pharmacy" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Pharmacy'); ?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Domestic_Company(RMB)'); ?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value=">10 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_>10_billion'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="1-10 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_1-10_billion'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="0.5-1 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_0.5-1_billion'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="0-0.5 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_0-0.5_billion'); ?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Listed_Domestic_Company'); ?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="NYSE" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_NYSE'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="NASDAQ" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_NASDAQ'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="SHE" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_SHE'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="SHA" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_SHA'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="HKG" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_HKG'); ?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="LSE AIM" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'h_LSE_AIM'); ?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Manufacturing_scope'); ?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Small Molecule" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Small_Molecule'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="TCM" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_TCM'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Biologics" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Biologics'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Diagnostics" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Diagnostics'); ?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Misc" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Misc.'); ?></label>
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
			<div class="portlet-title">
				<div class="caption font-purple-plum" style="width:70% !important;">
					<span class="caption-subject bold uppercase"><span class="number">0</span> studies found for:</span>
					<span class="caption-helper search_list"></span>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							Columns <i class="fa fa-angle-down"></i>
						</a>
						<div id="pharma_list_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label>
								<input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma','f_Company');?></label>
							<label>
								<input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma','f_Listing');?></label>
							<label>
								<input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma','f_Revenue');?></label>
							<label>
								<input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma','f_IND');?></label>
							<label>
								<input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma','f_Trials_ongoing');?></label>
							<label>
								<input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma','f_Phase_1');?></label>
							<label>
								<input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma','f_Phase_2');?></label>
							<label>
								<input type="checkbox" checked data-column="8"><?php echo Yii::t('pharma','f_Phase_3');?></label>
							<label>
								<input type="checkbox" checked data-column="9"><?php echo Yii::t('pharma','f_Preclinical');?></label>
						</div>
					</div>
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							<span class="hidden-480">Export</span> <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:;" class="pdf" onClick ="$('#sample_6_1').tableExport({type:'pdf',escape:'false'});">Export to PDF</a>
							</li>
							<li>
								<a href="javascript:;"  onClick ="$('#sample_6_1').tableExport({type:'excel',escape:'false'});">Export to Excel
								</a>
							</li>
						</ul>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="loading" id="pharma_list_loading" style="display: none;">
				</div>
				<div class="table-responsive">
					<table id="pharma_list" class="table table-mrd" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<!-- <input type="checkbox" class="group-checkable" data-set="#sample_6_1 .checkboxes"/> -->
								</th>
								<th><?php echo Yii::t('pharma','f_Company');?></th>
								<th><?php echo Yii::t('pharma','f_Listing');?></th>
								<th><?php echo Yii::t('pharma','f_Revenue');?></th>
								<th><?php echo Yii::t('pharma','f_IND');?></th>
								<th><?php echo Yii::t('pharma','f_Trials_ongoing');?></th>
								<th><?php echo Yii::t('pharma','f_Phase_1');?></th>
								<th><?php echo Yii::t('pharma','f_Phase_2');?></th>
								<th><?php echo Yii::t('pharma','f_Phase_3');?></th>
								<th><?php echo Yii::t('pharma','f_Preclinical');?></th>
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
				{ "data": "mrd_pharma_id","orderable":false},
				{ "data": "mrd_pharma_cn" },
				{ "data": "Listing" },
				{ "data": "Revenue" },
				{ "data": "count_IND" },
				{ "data": "count_Trials_ongoing" },
				{ "data": 'count_Phase1'},
				{ "data": 'count_Phase2'},
				{ "data": 'count_Phase3'},
				{ "data": "count_Preclinical"},
			];
			<?php
			if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
			?>
			var url=<?php echo "'".$this->createUrl('myPharma/AjaxList',array("type"=>'module'))."'";?>;
			<?php
			}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
			?>
			var url=<?php echo "'".$this->createUrl('myPharma/AjaxList',array('type'=>'myModule','myId'=>$_REQUEST['myId']))."'";?>;
			<?php
			}
			?>
			dataTableAjax(url,"","#pharma_list",dataCols,"");
			
	 		//pharma_index(url,"")
		    setInterval(function(){$(".number").text($("#pharma_list").DataTable().page.info().recordsTotal)},500);
		    //submit
		    $("#pharma_submit").submit(function(){
		        //console.log($(this).serialize());
		        var path_url="";
		        path_url = $(this).serialize();
		        //pharma_index(url,path_url);

		        var arr = $(this).serializeArray();
		        //console.log(arr);
		        var mes='',mc='',dc='',ldc='',mfc='';
		        for(var i=0;i < arr.length;i++){
		        	if("mes[]" == arr[i]['name']){
		        		mes +=arr[i]['value']+",";
		        	}
		        	if("mc[]" == arr[i]['name']){
		        		mc +=arr[i]['value']+",";
		        	}
		        	if("dc[]" == arr[i]['name']){
		        		dc +=arr[i]['value']+",";
		        	}
		        	if("ldc[]" ==arr[i]['name']){
		        		ldc +=arr[i]['value']+",";
		        	}
		        	if("mfc[]" ==arr[i]['name']){
		        		mfc +=arr[i]['value']+",";
		        	}
		        }
		        var str='';
		        if(mes !=""){
		        	mes = mes.substring(0,mes.length-1);
		        	str +=mes+"|";
		        }
		        if(mc !=""){
		        	str +=mc.substring(0,mc.length-1)+"|";
		        }
		        if(dc !=""){
		        	str +=dc.substring(0,dc.length-1)+"|";
		        }
		        if(ldc !=""){
		        	str +=ldc.substring(0,ldc.length-1)+"|";
		        }
		        if(mfc !=""){
		        	str +=mfc.substring(0,mfc.length-1)+"|";
		        }
		        $(".search_list").text("0");
		        console.log(str);
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    
		    //search list 
		    $(".search_list").text("non");

});
</script>
<!--script-->
