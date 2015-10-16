<div class="page-bar">
	<ul class="page-breadcrumb">
		<li> <i class="fa fa-home"></i>
			<a href="<?php echo Yii::app()->homeUrl;?>">Dashboard</a> <i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo $this->createUrl("pharma/index");?>">Companies</a>
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

<!--begin user login tip information-->
<div class="row">
	<div class="col-md-12">
<?php
if (Yii::app()->user->hasFlash("error")) {
	?>
	<div class="alert alert-danger display-none" style="display: block;">
																																																																								<button class="close" data-dismiss="alert"></button>
	<?php echo Yii::app()->user->getFlash("error");?>
	</div>
	<?php
} else if (Yii::app()->user->hasFlash("success")) {
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
	<form action="<?php echo $this->createUrl("pharma/index");?>" id="pharma_submit" class="form-horizontal form-row-seperated">
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
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Company_Type');?>:</label>
						<div class="col-md-9">
							<input type="checkbox" class="make-switch" checked value="Domestic" name="companyType" data-on-text="<?php echo Yii::t('pharma', 'vl_CompanyType_Domestic');?>" data-off-text="<?php echo Yii::t('pharma', 'vl_CompanyType_International');?>">
							<input type="checkbox" class="make-switch" data-on-text="&nbsp;Enabled&nbsp;&nbsp;" data-off-text="&nbsp;Disabled&nbsp;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Market_Entry_Status');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="mes[]" value="With Marketed Product" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_MarketEntryStatus_With_Marketed_Product');?></label>
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
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Capability');?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="R&D" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_R&D');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Manufacturing" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Manufacturing');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Distribution" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Distribution');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="mc[]" value="Pharmacy" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Capability_Pharmacy');?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Domestic_Company(RMB)');?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value=">10 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_>10_billion');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="1-10 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_1-10_billion');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="0.5-1 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_0.5-1_billion');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="dc[]" value="0-0.5 billion" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_DomesticCompany(RMB)_0-0.5_billion');?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Listed_Domestic_Company');?>:</label>
						<div class="col-md-9">
							<div class="icheck-inline">
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="NYSE" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_NYSE');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="NASDAQ" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_NASDAQ');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="SHE" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_SHE');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="SHA" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_SHA');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="HKG" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_ListedDomesticCompany_HKG');?>
								</label>
								<label>
								 	<input type="checkbox" class="icheck" name="ldc[]" value="LSE AIM" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'h_LSE_AIM');?>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo Yii::t('pharma', 'h_Manufacturing_scope');?>:</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="icheck-inline">
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Small Molecule" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Small_Molecule');?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="TCM" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_TCM');?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Biologics" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Biologics');?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Diagnostics" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Diagnostics');?></label>
									<label>
										<input type="checkbox" class="icheck" name="mfc[]" value="Misc" data-checkbox="icheckbox_square-grey"><?php echo Yii::t('pharma', 'vl_Manufacturingscope_Misc.');?></label>
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
						<div id="sample_6_1_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
							<label>
								<input type="checkbox" checked data-column="1"><?php echo Yii::t('pharma', 'f_Company');?></label>
							<label>
								<input type="checkbox" checked data-column="2"><?php echo Yii::t('pharma', 'f_Listing');?></label>
							<label>
								<input type="checkbox" checked data-column="3"><?php echo Yii::t('pharma', 'f_Revenue');?></label>
							<label>
								<input type="checkbox" checked data-column="4"><?php echo Yii::t('pharma', 'f_IND');?></label>
							<label>
								<input type="checkbox" checked data-column="5"><?php echo Yii::t('pharma', 'f_Trials_ongoing');?></label>
							<label>
								<input type="checkbox" checked data-column="6"><?php echo Yii::t('pharma', 'f_Phase_1');?></label>
							<label>
								<input type="checkbox" checked data-column="7"><?php echo Yii::t('pharma', 'f_Phase_2');?></label>
							<label>
								<input type="checkbox" checked data-column="8"><?php echo Yii::t('pharma', 'f_Phase_3');?></label>
							<label>
								<input type="checkbox" checked data-column="9"><?php echo Yii::t('pharma', 'f_Preclinical');?></label>
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
							<li>
								<a class="" id="addToList" data-toggle="modal" href="#static">
									Add List </a>
							</li>
						</ul>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="loading" style="display: none;">
				</div>
				<div class="table-responsive">
					<table id="sample_6_1" class="table table-mrd" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th width="25px">
									<!-- <input type="checkbox" class="group-checkable" data-set="#sample_6_1 .checkboxes"/> -->
								</th>
								<th><?php echo Yii::t('pharma', 'f_Company');?></th>
								<th><?php echo Yii::t('pharma', 'f_Listing');?></th>
								<th><?php echo Yii::t('pharma', 'f_Revenue');?></th>
								<!-- <th>National insurance</th> -->
								<th><?php echo Yii::t('pharma', 'f_IND');?></th>
								<th><?php echo Yii::t('pharma', 'f_Trials_ongoing');?></th>
								<th><?php echo Yii::t('pharma', 'f_Phase_1');?></th>
								<th><?php echo Yii::t('pharma', 'f_Phase_2');?></th>
								<th><?php echo Yii::t('pharma', 'f_Phase_3');?></th>
								<th><?php echo Yii::t('pharma', 'f_Preclinical');?></th>
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
						<input type="hidden" name="module_type" value="mrd_pharma"/>
						<input type="hidden" name="controller" value="pharma"/>
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
if (!empty($mrd_pharma)) {
	foreach ($mrd_pharma as $v) {
		?>
																																																																																																																																																					<option value="<?php echo $v->mylist_id;?>"><?php echo $v->name;
		?></option>
		<?php
	}
}
?>
							</select>
						</div>
						<input type="hidden" class="mrdMyListIds" name="mrd_listIds"/>
						<input type="hidden" name="module_type" value="mrd_pharma"/>
						<input type="hidden" name="controller" value="pharma"/>
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
           	var tableArr = dataTableCheck("#sample_6_1","input.checkboxes");
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
	function pharma_index(url1,url2){
	var base_url="";
	if(url1 !="" && url2 !=""){
		base_url = url1+"&"+url2;
	}else if(url1 !="" && url2 ==""){
		base_url = url1;
	}


	var grid = new Datatable();
        grid.init({
            src: $("#sample_6_1"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
                //$(".loading").show();
                $(".loading").hide();
            },
            onError: function (grid) {
                // execute some code on network or other general error
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
                 $(".loading").hide();
            },
            processing: true,
            serverSide: true,
            loadingMessage: 'Loading...----',
            dataTable: {
                //"dom": "<'row'<'col-md-6 col-sm-12'Rpli>r><'table-scrollable't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                //"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                // "lengthMenu": [
                //     [10, 20, 50, 100, 150, -1],
                //     [10, 20, 50, 100, 150, "All"] // change per page values here
                // ],
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": base_url, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $(".loading").show();
                    },
                },
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           'parent_html'
                    },
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
                ],
                "scrollY": "600px",
                "scrollX": true,
                // "order": [
                //     [1, "asc"]
                // ],// set first column as a default sort by asc,
                "destroy": true,
	            "order": [
	                [4, 'desc']
	            ],

            }
        });

        var tableWrapper = $('#sample_6_1'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#sample_6_1_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#sample_6_1').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#sample_6_1_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#sample_6_1_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#sample_6_1_filter input[type=search]").attr("class","form-control input-circle");
        $("#sample_6_1_filter input[type=search]").attr("placeholder","Search within found...");

        $('#sample_6_1 tbody').on('click', 'td.details-control', function () {
                var $_this = $(this);
                var iName = $_this.find('i');
                if(iName.attr('class')=="fa fa-arrow-circle-down"){
                    iName.attr('class','fa fa-arrow-circle-up');
                }else{
                  iName.attr('class','fa fa-arrow-circle-down');
                }
                if(iName.attr('class')=="fa fa-arrow-circle-up"){
                	$_id = iName.attr("data-target");
                	$("tr.h_"+$_id).hide();
                }
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                    //tr.removeClass('shown');
                    //$(this).parent("tr").attr("class",'shown');
                    $_this = $(this).parent("tr").next().eq(0);
                    $_id = iName.attr("data-target");
                    subTable($_id,$_this);
                     iName.attr('class','fa fa-arrow-circle-up');
                }
        });
        function format ( d ) {
            return "";
        }
        function subTable(d,$_this){
            var tableHead='<td colspan="11" class="mydataTable"><table class="table table-striped table-hover dataTable no-footer">';
            var tableFooter='</table></td>';
            var html="";
            $.ajax({
                type: 'get',
                url: 'index.php?r=pharma/jsonsubcompany',
                data:{parent_id:d},
                'beforeSend':function(){
                        $(".loading").show();
                 },
                dataType: 'json',
                success:function(data){
                     $(".loading").hide();
                    $.each(data,function(index,pharma){
                       html +='<tr><td width="30px"></td><td  width="30px"></td>'+
                         '<td>'+pharma.mrd_pharma_cn+'</td>'+
                         '<td>'+pharma.Listing+'</td>'+
                         '<td>'+pharma.Revenue+'</td>'+
                         '<td>'+pharma.count_IND+'</td>'+
                         '<td>'+pharma.count_Trials_ongoing+'</td>'+
                         '<td>'+pharma.count_Phase1+'</td>'+
                         '<td>'+pharma.count_Phase2+'</td>'+
                         '<td>'+pharma.count_Phase3+'</td>'+
                         '<td>'+pharma.count_Preclinical+'</td>'+
                         '</tr>';
                         //table();
                    });
                    var tableBody=tableHead+html+tableFooter;
                    var table = $_this;
                    table.attr("class","h_"+d);
                    table.html(tableBody);
                    //console.log(table);

                }
            });
        }


}
$(function(){
			var url=<?php echo "'".$this->createUrl('pharma/jsonpharma_index')."'";
?>;
	 		pharma_index(url,"")
		    setInterval(function(){$(".number").text($("#sample_6_1").DataTable().page.info().recordsTotal)},500);
		    //submit
		    $("#pharma_submit").submit(function(){
		        //console.log($(this).serialize());
		        var path_url="";
		        path_url = $(this).serialize();
		        pharma_index(url,path_url);

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
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });

		    //search list
		    $(".search_list").text("non");

});
</script>
<!--script-->
