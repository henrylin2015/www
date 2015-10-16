function dataTableAjax(url1,url2,id,dataCols,scrollY){
	var base_url="";
	if(url1 !="" && url2 !=""){
		base_url = url1+"&"+url2;
	}else if(url1 !="" && url2 ==""){
		base_url = url1;
	}
// 	
	var y ="";
	if(scrollY !=""){
		y = scrollY;
	}else{
		y ="600px";
	}

	var grid = new Datatable();
        grid.init({
            src: $(id),
            onSuccess: function (grid) {
            	$(id+"_loading").hide();
            },
            onError: function (grid) { 
            },
            onDataLoad: function(grid) {
            	$(id+"_loading").hide();
            },
            loadingMessage: 'Loading...',
            dataTable: { 
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": base_url, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $(id+"_loading").show();
                    },
                },
                "columns": dataCols,
                "processing": true,
        		"serverSide": true,
                "scrollY": y,
                "scrollX": true,
                "destroy": true,
	            "order": [
	                [1, 'asc']
	            ],
            }
        });
        var tableWrapper = $(id); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $(id+'_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $(id).DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $(id+"_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $(id+"_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $(id+"_filter input[type=search]").attr("class","form-control input-circle");
        $(id+"_filter input[type=search]").attr("placeholder","Search within found...");

}


function dataTableAjaxSite(url1,url2,id,dataCols,scrollY){
    var base_url="";
    if(url1 !="" && url2 !=""){
        base_url = url1+"&"+url2;
    }else if(url1 !="" && url2 ==""){
        base_url = url1;
    }
    
    var y ="";
    if(scrollY !=""){
        y = scrollY;
    }else{
        y ="600px";
    }

    var grid = new Datatable();
        grid.init({
            src: $(id),
            onSuccess: function (grid) {
                $(id+"_loading").hide();
            },
            onError: function (grid) { 
            },
            onDataLoad: function(grid) {
                $(id+"_loading").hide();
            },
            loadingMessage: 'Loading...',
            dataTable: { 
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": base_url, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $(id+"_loading").show();
                    },
                },
                "columns": dataCols,
                "processing": true,
                "serverSide": true,
                "scrollY": y,
                "scrollX": true,
                "destroy": true,
                "order": [
                    [1, 'asc']
                ],
            }
        });
        var tableWrapper = $(id); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $(id+'_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $(id).DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $(id+"_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $(id+"_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $(id+"_filter input[type=search]").attr("class","form-control input-circle");
        $(id+"_filter input[type=search]").attr("placeholder","Search within found...");
}

/**
 * get province data
 */
function getSiteProvinceData(url,code){
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
       var province;
       if(code=="CN-51"){
          province = "四川";
       }else if(code=="CN-11"){
          province = "北京";
       }else if(code=="CN-32"){
          province = "江苏";
       }else if(code=="CN-52"){
          province = "贵州";
       }else if(code=="CN-35"){
          province = "福建";
       }else if(code=="CN-50"){
          province = "重庆";
       }else if(code=="CN-31"){
          province = "上海";
       }else if(code=="CN-54"){
          province = "西藏";
       }else if(code=="CN-33"){
          province = "浙江";
       }else if(code=="CN-14"){
          province = "陕西";
       }else if(code=="CN-15"){
          province = "内蒙古";
       }else if(code=="CN-12"){
          province = "天津";
       }else if(code=="CN-13"){
          province = "河北";
       }else if(code=="CN-34"){
          province = "安徽";
       }else if(code=="CN-53"){
          province = "云南";
       }else if(code=="CN-36"){
          province = "江西";
       }else if(code=="CN-37"){
          province = "山东";
       }else if(code=="CN-41"){
          province = "河南";
       }else if(code=="CN-43"){
          province = "湖南";
       }else if(code=="CN-42"){
          province = "湖北";
       }else if(code=="CN-45"){
          province = "广西";
       }else if(code=="CN-44"){
          province = "广东";
       }else if(code=="CN-46"){
          province = "海南";
       }else if(code=="CN-65"){
          province = "新疆";
       }else if(code=="CN-64"){
          province = "宁夏";
       }else if(code=="CN-63"){
          province = "青海";
       }else if(code=="CN-62"){
          province = "甘肃";
       }else if(code=="CN-61"){
          province = "山西";
       }else if(code=="CN-23"){
          province = "黑龙江";
       }else if(code=="CN-22"){
          province = "吉林";
       }else if(code=="CN-21"){
          province = "辽宁";
       }
       
       
       if(typeof(province) !="undefined"){
         var urlData= url + "&province="+province;
         dataTableAjaxSite(urlData,"","#site_tables",dataCols,"");
       }
                
}










