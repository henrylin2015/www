function site_index(url1,url2){
    var base_url="";
    if(url1 !="" && url2 !=""){
        base_url = url1+"&"+url2;
    }else if(url1 !="" && url2 ==""){
        base_url = url1;
    }
    

    var grid = new Datatable();
        grid.init({
            src: $("#site_tables"),
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
        var tableWrapper = $('#site_tables'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
        /* handle show/hide columns*/
         var tableColumnToggler = $('#site_tables_column_toggler');
         /* handle show/hide columns*/
         //var table = $('#datatable_ajax');
         var table = $('#site_tables').DataTable();
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
             var column = table.column( $(this).attr('data-column') );
            column.visible( ! column.visible() );
        });
        // handle group actionsubmit button click
        $("#site_tables_filter label").css({'font-size':"0px",'display':"flex",'position':"relative",});
        $("#site_tables_filter input[type=search]").before('<i class="icon-magnifier" style=" position: absolute;right: 8px;top: 11px;"></i>');
        $("#site_tables_filter input[type=search]").attr("class","form-control input-circle");
        $("#site_tables_filter input[type=search]").attr("placeholder","Search within found...");
}


$(function(){
            setInterval(function(){$(".number").text($("#site_tables").DataTable().page.info().recordsTotal)},500);
            
            //submit
            $("#site_submit").submit(function(){
                 var path_url = $(this).serialize();
                 site_index("index.php?r=site/jsonsite_index",path_url);
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
