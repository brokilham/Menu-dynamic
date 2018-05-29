$(document).ready(function(){
    
    // begin filter data table ==========================================
    $("input[ name='optionsRencanaBimbingan']").change(function(){
        alert($(this).val());
        /*var table = $("#dt_transaksi_pengajuan_bimbingan").DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url:'./getall_transaksi_pengajuan_bimbingan',
                method: 'GET',
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
                            data = '<div class="btn-group">'+
                                        '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
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
        }).draw();*/
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
    });
    
    // end setujui pengajuan section ==========================================

     // begin datatable section ==========================================
       var table = $("#dt_transaksi_pengajuan_bimbingan").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./getall_transaksi_pengajuan_bimbingan',
            method: 'GET',
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
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
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
});