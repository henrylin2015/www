function investigator_index(url1,url2){
	var base_url="";
	if(url1 !="" && url2 !=""){
		base_url = url1+"&"+url2;
	}else if(url1 !="" && url2 ==""){
		base_url = url1;
	}
	

	var grid = new Datatable();
        grid.init({
            src: $("#inv_tables"),
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
                    { "data": "doctor_id" }, 
                    { "data": "hospital_id" },
                    { "data": "name" },
                    { "data": "hospital" },
                    { "data": "department" },
                    { "data": "kol_tag" },
                    { "data": "title_clinician" },
                    { "data": "Trial_disease"},
                    { "data": "specialized_indication" },
                    { "data": "num_leadPItrials" },
                    { "data": "num_publication" },
                    { "data": "awards_doctor" },
                    { "data": "profess_involve" },
                    { "data": "trial_exp" },
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
        var tableWrapper = $('#inv_tables'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#inv_tables_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#inv_tables').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#inv_tables_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#inv_tables_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#inv_tables_filter input[type=search]").attr("class","form-control input-circle");
        $("#inv_tables_filter input[type=search]").attr("placeholder","Search within found...");
}


$(function(){
		    setInterval(function(){$(".number").text($("#inv_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#inv_submit").submit(function(){
		         var path_url = $(this).serialize();
		         investigator_index("index.php?r=investigator/jsoninvestigator_index",path_url);
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
