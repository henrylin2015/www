function trials_index(url1,url2){
	var base_url="";
	if(url1 !="" && url2 !=""){
		base_url = url1+"&"+url2;
	}else if(url1 !="" && url2 ==""){
		base_url = url1;
	}
	

	var grid = new Datatable();
        grid.init({
            src: $("#trails_tables"),
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
        var tableWrapper = $('#trails_tables'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#trails_tables_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#trails_tables').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#trails_tables_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#trails_tables_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#trails_tables_filter input[type=search]").attr("class","form-control input-circle");
        $("#trails_tables_filter input[type=search]").attr("placeholder","Search within found...");
}


$(function(){
		    setInterval(function(){$(".number").text($("#trails_tables").DataTable().page.info().recordsTotal)},500);
		    
		    //submit
		    $("#trials_submit").submit(function(){
		         var path_url = $(this).serialize();
		         trials_index("index.php?r=trials/jsontrials_index",path_url);
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
