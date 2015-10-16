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
                    $_this = $(this).parent("tr").next();
                    var data = row.data();
                    //console.log(data);
                    subTable(data,$_this);
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
                data:{parent_id:d.parent_id},
                dataType: 'json',
                success:function(data){
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
                    table.html(tableBody);
                    //console.log(table);

                }
            });
        }


}

$(function(){
		    setInterval(function(){$(".number").text($("#sample_6_1").DataTable().page.info().recordsTotal)},500);
		    //submit
		    $("#pharma_submit").submit(function(){
		        //console.log($(this).serialize());
		        var path_url="";
		        path_url = $(this).serialize();
		        pharma_index("index.php?r=pharma/jsonpharma_index",path_url);

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

