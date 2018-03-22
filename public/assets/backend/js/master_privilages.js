$(document).ready(function(){
  
    // begin add section ==========================================
    $("#call-modal-add").click(function(){
        $('#modal-add').modal('show');
    });

    $("#btn-submit-mstr-privilages").click(function(){
       
        $.ajax({
            type:"POST",
            url:'./create',
            data:$('#frm-add-mstr-privilages').serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            dataType: 'json',
            success: function(data){           
                if (data.code == "S"){
                    location.reload();
                }  

            },
            error: function(data){
                alert(data.responseText);
            }
        });
    });  
    // end add section ============================================


    // begin update section ==========================================
    $("#dt_master_privilages").on("click", "#anchor_update", function(){
        var param = $(this).attr('value').split('|');
        $('#txt_status_id_updt').val(param[0]);  
        $('#txt_name_updt').val(param[1]);
        $('#modal-update').modal('show');      
    });

    
    $("#btn-update-mstr-privilages").click(function(){
        
        $.ajax({
            type:"POST",
            url:'./update',
            data:$('#frm-update-mstr-privilages').serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            dataType: 'json',
            success: function(data){           
                if (data.code == "S"){
                    location.reload();
                }  
                else{
                    alert(data.message);                                   
                }

            },
            error: function(data){
                alert(data.responseText);
            }
        });
    });
    // end update section ============================================

    // begin delete section ==========================================
    $("#dt_master_privilages").on("click", "#anchor_delete", function(){
       
        $.ajax({
             type:"POST",
             url:'./delete',
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
             data:{id:$(this).attr('value')},
             // dataType: 'json',
             success: function(data){             
                 //alert(data.code+" "+data.message);
                 if (data.code == "S"){
                     location.reload();
                 }  
             },
             error: function(data){
                 alert(data.responseText);
             }
         });
     })
    // end delete section ============================================
    
    // begin datatable section ==========================================


    var table = $("#dt_master_privilages").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_mstr_privilages',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        
        columns: [              
          
            { data: 'id' },
            { data: 'name' },     
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {
                targets: [ 5 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets: 6,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+
                                    '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'|'+full['name']+'>'+
                                            '<i class="icon-docs"></i>Update</a>'+
                                    '</li>'+
                                    '<li>'+
                                        '<a id="anchor_delete" value='+full['id']+' >'+
                                            '<i class="icon-tag"></i>Delete</a>'+
                                    '</li>'+                                       
                                '</ul>'+
                            '</div>';
                    }

                    return data;
                }
            } ],
        order: [[ 1, 'asc' ]],
    }).draw();

    // dengan index
    // kekurangannya ketika di search nomer tidak balik
    /*var table = $("#dt_master_privilages").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_mstr_privilages',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        
        columns: [              
            { data: null },
            { data: 'id' },
            { data: 'name' },     
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ {
                searchable: false,
                orderable: false,
                targets: 0,
                data: null,
            },
            {
                searchable: false,
                orderable: false,
                targets: 7,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+
                                    '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'|'+full['name']+'>'+
                                            '<i class="icon-docs"></i>Update</a>'+
                                    '</li>'+
                                    '<li>'+
                                        '<a id="anchor_delete" value='+full['id']+' >'+
                                            '<i class="icon-tag"></i>Delete</a>'+
                                    '</li>'+                                       
                                '</ul>'+
                            '</div>';
                    }

                    return data;
                }
            } ],
        order: [[ 1, 'asc' ]],
        //fixedColumns: true
    
    });
    
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        
        } );
    } ).draw(); */
  
    // end datatable section ============================================
    
});
