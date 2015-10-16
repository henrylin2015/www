function registration_index(url1,url2){
	var base_url="";
	if(url1 !="" && url2 !=""){
		base_url = url1+"&"+url2;
	}else if(url1 !="" && url2 ==""){
		base_url = url1;
	}
	

	var grid = new Datatable();
        grid.init({
            src: $("#reg_tables"),
            onSuccess: function (grid) {
                $(".loading").hide();
            },
            onError: function (grid) { 
            },
            onDataLoad: function(grid) {
                $(".loading").hide();
            },
            loadingMessage: 'Loading...',
            dataTable: { 
                "dom":"<'row'<'col-md-12' Rf>><'dataTables_scroll't><'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": base_url, // ajax source
                    'type':'get',
                    'beforeSend':function(){
                        $(".loading").show();
                    },
                },
                "columns": [
                    { "data": "num_accept_id" }, 
                    { "data": "drugname" },
                    { "data": "compname_reg" },
                    { "data": "drugcat" },
                    { "data": "appltype" },
                    { "data": "regclass"},
                    { "data": "newaccepted_reviewcat" },
                    { "data": "num_accept" },
                    { "data": "date_cdereceived" },
                    { "data": "date_appr_delivery" },
                    { "data": "status_new_overall"},
                    { "data": "new_activity" },
                ],
                "processing": true,
        		"serverSide": true,
                "scrollY": "600px",
                "scrollX": true,
                "destroy": true,
	            "order": [
	                [1, 'asc']
	            ],
            }
        });
        var tableWrapper = $('#reg_tables'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#reg_tables_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#reg_tables').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#reg_tables_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#reg_tables_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#reg_tables_filter input[type=search]").attr("class","form-control input-circle");
        $("#reg_tables_filter input[type=search]").attr("placeholder","Search within found...");
}


$(function(){
		    setInterval(function(){$(".number").text($("#reg_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#reg_submit").submit(function(){
		         var path_url = $(this).serialize();
		         registration_index("index.php?r=registration/jsonregistration_index",path_url);
		         var arr = $(this).serializeArray();
		        // //console.log(arr);
		         var dt='',at='',rc='';
		        for(var i=0;i < arr.length;i++){
		        	if("dt[]" == arr[i]['name']){
		        		dt +=arr[i]['value']+",";
		        	}
		        	if("at[]" == arr[i]['name']){
		        		at +=arr[i]['value']+",";
		        	}
		        	if("rc[]" == arr[i]['name']){
		        		rc +=arr[i]['value']+",";
		        	}
		        }
		        var str='';
		        if(dt !=""){
		        	str +=dt.substring(0,dt.length-1)+"|";
		        }
		        if(at !=""){
		        	str +=at.substring(0,at.length-1)+"|";
		        }
		        if(rc !=""){
		        	str +=rc.substring(0,rc.length-1)+"|";
		        }
		        $(".search_list").text(str.substring(0,str.length-1));
		        return false;
		    });
		    
		    //search list 
		    $(".search_list").text("non");
		});
