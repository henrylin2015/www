<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("mySite/index");?>">My Site</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#"><?php echo $titleName;?></a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->
<h3 class="page-title">
	Site Page
	<small>sidebar page</small>
</h3>
<!-- BEGIN PAGE CONTENT-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<form action="<?php echo  $this->createUrl('site/index');?>" id="site_submit" class="form-horizontal form-row-seperated">
	<div class="col-md-12">
		<div class="portlet box">
			<div class="portlet-body bg_ddd">
				<div class="row">
					<div class="col-md-7">
						<div id="map" style="height: 500px;width:100%;"></div>
					</div>
					<div class="col-md-5">
						<!--start row-->
						<div class="row">
							<div class="col-md-12">
								<form action="#">
									<div class="input-group">
										<div class="input-cont">
											<input type="text" placeholder="Find site..." class="form-control" name="search_site"></div>
										<span class="input-group-btn">
											<button type="submit" class="btn blue">
												Search &nbsp; <i class="m-icon-swapright m-icon-white"></i>
											</button>
										</span>
									</div>
								</form>
							</div>
						</div>

						<p></p>
						<!--end row-->
						<!--start row-->
						<div class="tiles">
							<div class="row">
								<div class="col-md-4">
									<div class="tile  double bg-blue-hoki">
										<div class="tile-body">
											<h4><?php echo Yii::t('site', 'f_Therapeutic_area'); ?></h4>
											<div class="input-group">
												<div class="icheck-list">
													<?php
														if(!empty($deptments)){
															foreach ($deptments as  $v) {
													?>
													<label>
														<input type="checkbox" name="ta[]" value="<?php
		                                                     if (!empty(Yii::app()->language) && Yii::app()->language == "zh_cn") {
		                                                         echo $v['dept_cn'];
		                                                     } else {
		                                                         echo $v['dept_en'];
		                                                     }
		                                                     ?>" class="icheck" data-checkbox="icheckbox_square-grey">
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
								</div>
								<div class="col-md-4">
									<div class="tile  double bg-blue-hoki">
										<div class="tile-body">
											<h4><?php echo Yii::t('site', 'f_Region'); ?></h4>
											<div class="input-group">
												<div class="icheck-list">
													<label>
														<input type="checkbox" name="reg[]"  value="华北" class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-hb'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="东北"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-db'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="华东"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-hd'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="华中"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-hz'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="华南"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-hn'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="西南"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-xn'); ?></label>
													<label>
														<input type="checkbox" name="reg[]" value="西北"  class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('comm', 'vl-xb'); ?></label>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="tile  double bg-blue-hoki">
										<div class="tile-body">
											<h4><?php echo Yii::t('site', 'f_City_level'); ?></h4>
											<div class="input-group">
												<div class="icheck-list">
													<label>
														<input type="checkbox" name="cl[]" value="1线" class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_First-tier_city'); ?></label>
													<label>
														<input type="checkbox" name="cl[]" value="2线" class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_Second-tier_city'); ?></label>
													<label>
														<input type="checkbox" name="cl[]" value="3线及以下" class="icheck" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('site', 'vl_Citylevel_Third-tier_city'); ?></label>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="tile  double bg-blue-hoki">
										<div class="tile-body">
											<!-- <h4>Checkbox 2</h4>
										-->
										<div class="input-group">
											<div class="icheck-list">
												<label>
													<input type="checkbox" class="icheck" data-checkbox="icheckbox_square-grey">With GMCT experiences</label>
												<label>
													<input type="checkbox" class="icheck" data-checkbox="icheckbox_square-grey">Phase I facility</label>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end -->
				</div>
			</div>
		</div>
	</div>
  </div>
</form>
</div>
<!-- END PAGE CONTENT-->
<!--start row-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption font-purple-plum">
					<span class="caption-subject bold uppercase"><span class="number">0</span> studies found for:</span>
					<span class="caption-helper search_list"></span>
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn btn-circle btn-default" href="javascript:;" data-toggle="dropdown">
							Columns <i class="fa fa-angle-down"></i>
						</a>
						<div id="site_tables_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
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
				<div class="loading" style="display: none;" id="site_tables_loading">
				</div>
				<div class="table-responsive">
					<table id="site_tables" class="table table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="25px">
									<input type="checkbox" class="group-checkable" data-set="#site_tables_1 .checkboxes"/>
								</th>
								<th><?php echo Yii::t('site','h_Therapeutic_Areas');?></th>
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
<!--end row-->

<!--script--> 
<?php
$sss="{latLng:[28.013247,120.665273],name:'1st affiliated hospital of wenzhou medical university'},{latLng:[45.693538,126.64475],name:'the second affiliated hospital of Harbin Medical University'},";

?>
<script>
		$(function () {
		var dataCols = [
			{ "data": "siteclin_id" },
			{ "data": "TA_cert" },
			{ "data": "hospname_cn"},
			{ "data": "province"},
			{ "data": "city"},
			{ "data": "issuedate_sitecert"},
			{ "data": "expirdate_sitecert"},
			{ "data": "count_trl_5completed"},
			{ "data": "count_trl_ongoing"},
			{ "data": "count_trl_drug"},
			{ "data": "count_trl_china"},
			{ "data": "NewActivity"},
		];
		
		<?php
			if(!empty($_REQUEST['type']) && $_REQUEST['type']=="module"){
		?>
			var url=<?php echo "'".$this->createUrl('mySite/AjaxList',array("type"=>'module'))."'";?>;
		<?php
			}else if(!empty($_REQUEST['type']) && $_REQUEST['type']=="myModule" && !empty($_REQUEST['myId'])){
		?>
			var url=<?php echo "'".$this->createUrl('mySite/AjaxList',array('type'=>'myModule','myId'=>$_REQUEST['myId']))."'";?>;
		<?php
			}
		?>
		
		dataTableAjaxSite(url,"","#site_tables",dataCols,"");
		
		setInterval(function(){$(".number").text($("#site_tables").DataTable().page.info().recordsTotal)},500);
        
        function reloadMap(){
			$("#site_tables").DataTable().on('xhr',function () { 
				json = $("#site_tables").DataTable().ajax.json();
				vectorMap(json.jData);
			});
		}
		
		setInterval(reloadMap(),500);
            //submit
            $("#site_submit").submit(function(){
                 var path_url = $(this).serialize();
                 dataTableAjax(url,path_url,"#site_tables",dataCols,"");
                 var arr = $(this).serializeArray();
                // //console.log(arr);
                 var ta='',re='',sr='',st='',ph='',con='';
                for(var i=0;i < arr.length;i++){
                    if("ta[]" == arr[i]['name']){
                        ta +=arr[i]['value']+",";
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
                if(ta !=""){
                    str +=ta.substring(0,ta.length-1)+"|";
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
	function vectorMap(data){
		$("#map").html("");
		  	$('#map').vectorMap({
                map: 'cn_mill_en',
                scaleColors: ['#C8EEFF', '#0071A4'],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.7,
                hoverColor: false,
                zoomOnScroll: false,
                regionStyle: {
                    initial: {
                        fill: '#9f9f9f',
                        "fill-opacity": 0.9,
                        stroke: '#fff',
                    },
                    hover: {
                        "fill-opacity": 0.7
                    },
                    selected: {
                        fill: '#1A94E0'
                    }
                },
                markerStyle: {
                    initial: {
                        fill: '#e04a1a',
                        stroke: '#FF604F',
                        "fill-opacity": 0.5,
                        "stroke-width": 1,
                        "stroke-opacity": 0.4,
                    },
                    hover: {
                        stroke: '#C54638',
                        "stroke-width": 2
                    },
                    selected: {
                        fill: '#C54638'
                    },
                },
                onRegionOver: function (event, code) {
                },
                onRegionClick: function (element, code, region) {
                },
                backgroundColor: '#f1f4f9',
                
                markers: data.map(function(h){ return {name: h.name, latLng: h.latLng} }),
            });
}
</script>

<!--script-->