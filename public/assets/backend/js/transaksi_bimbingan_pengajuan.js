$(document).ready(function(){

    // begin tools button section ============================================
    $("#btn_pengajuan_excel").click(function(){
        $.ajax({
            type:"GET",
            url:'./export_data_bimbingan',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            success: function(data){             
                window.location = page;// you can use window.open also
            },
            error: function(data){
                alert(data.responseText);
            }
        });
    });
    
    // end tools button section ============================================
    
    // begin datatable section ==========================================
    var table = $("#dt_transaksi_pengajuan_bimbingan").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./getall_transaksi_pengajuan_bimbingan',
            method: 'GET',
            data: {param_status_approval:""},
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [        
            { data: 'id' },
            { data: 'id_siswa' },
            { data: 'id_jadwal' },
            { data: 'topik_bimbingan' },
            { data: null }
        
        ],
        scrollCollapse: true,      
        columnDefs: [            
            {
                searchable: false,
                orderable: false,
                targets: 4,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                      
                       var disabled_status = "";
                       var color = "green" ;
                        if(full['status_approval']!="") {
                            color = "gray" ;
                            disabled_status = "disabled";
                        }
                          

                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs '+color+' dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" '+disabled_status+'> Actions'+
                                        '<i class="fa fa-angle-down"></i>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+                                
                                        '<li>'+
                                            '<a id="anchor_setujui" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Setujui</a>'+
                                        '</li>'+ 
                                        '<li>'+
                                            '<a id="anchor_tolak" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Tolak</a>'+
                                        '</li>'+                                       
                                    '</ul>'+
                            '</div>';
                    }

                    return data;
                }
            } ],
        order: [[ 1, 'asc' ]],
    }).draw();
     // end datatable section ============================================

    // begin filter data table ==========================================
    $("input[ name='optionsRencanaBimbingan']").change(function(){
        //alert($(this).val());
        table.destroy();
       // $('#dt_transaksi_pengajuan_bimbingan').empty(); // empty in case the columns change
        table = $("#dt_transaksi_pengajuan_bimbingan").DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url:'./getall_transaksi_pengajuan_bimbingan',
                method: 'GET',
                data: {param_status_approval:$(this).val()},
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            },
            columns: [        
                { data: 'id' },
                { data: 'id_siswa' },
                { data: 'id_jadwal' },
                { data: 'topik_bimbingan' },
                { data: null }
            
            ],
            scrollCollapse: true,      
            columnDefs: [ 
               
                {
                    searchable: false,
                    orderable: false,
                    targets: 4,
                    data: null,
                    render: function(data, type, full, meta){
                        if(type === 'display'){

                            var disabled_status = "";
                            var color = "green" ;
                             if(full['status_approval']!="") {
                                 color = "gray" ;
                                 disabled_status = "disabled";
                             }
                            data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs '+color+' dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" '+disabled_status+'> Actions'+
                                         '<i class="fa fa-angle-down"></i>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+                                
                                        '<li>'+
                                            '<a id="anchor_setujui" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Setujui</a>'+
                                        '</li>'+ 
                                        '<li>'+
                                            '<a id="anchor_tolak" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Tolak</a>'+
                                        '</li>'+                                       
                                    '</ul>'+
                                '</div>';
                        }
    
                        return data;
                    }
                } ],
            order: [[ 1, 'asc' ]],
        }).draw();
    });

    // end filter data table ============================================

    // begin tolak pengajuan section ==========================================
    $("#dt_transaksi_pengajuan_bimbingan").on("click", "#anchor_tolak", function(){         
        $("#txt_id_pengajuan").val($(this).attr('value')); 
        $('#modal-tolak-pengajuan').modal('show');
    });


    $("#btn-submit-tolak-pengajuan").click(function(){
        $.ajax({
            type:"post",
            url:'./set_respon_pengajuan',
            data:$('#frm-tolak-pengajuan-bimbingan').serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }, 
            dataType: 'json',              
            success: function(data){           
               //alert(JSON.stringify(data));
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
    // end tolak pengajuan section

    // begin setujui pengajuan section ==========================================
    
    $("#dt_transaksi_pengajuan_bimbingan").on("click", "#anchor_setujui", function(){         
        $("#txt_id_pengajuan").val($(this).attr('value')); 
        $('#modal-setujui-pengajuan').modal('show');
    });

    
    $("#btn-submit-setujui-pengajuan").click(function(){
        $.ajax({
            type:"post",
            url:'./set_respon_pengajuan',
            data:$('#frm-setujui-pengajuan-bimbingan').serialize(),
            //data:{txt_id_pengajuan : $(this).attr('value') ,txt_status_approval : "1",txt_tolak_pengajuan : "-"},
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }, 
            dataType: 'json',              
            success: function(data){           
               //alert(JSON.stringify(data));
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

    /*$("#dt_transaksi_pengajuan_bimbingan").on("click", "#anchor_setujui", function(){        
        $.ajax({
            type:"post",
            url:'./set_respon_pengajuan',
            //data:$('#frm-tolak-pengajuan-bimbingan').serialize(),
            data:{txt_id_pengajuan : $(this).attr('value') ,txt_status_approval : "1",txt_tolak_pengajuan : "-"},
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }, 
            dataType: 'json',              
            success: function(data){           
               //alert(JSON.stringify(data));
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
    });*/
    
    // end setujui pengajuan section ==========================================

     
});