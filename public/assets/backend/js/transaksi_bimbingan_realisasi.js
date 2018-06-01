$(document).ready(function(){
    
      // begin datatable section ==========================================
      var table = $("#dt_transaksi_realisasi_bimbingan").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./getall_transaksi_realisasi_bimbingan',
            method: 'GET',
            data:{param_status_realisasi:"all"},
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
                        if((full['status_realisasi']!="")||(full['status_kadaluarsa']!="")) {
                            color = "gray" ;
                            disabled_status = "disabled";
                        }
                          
                         
                        data = '<div class="btn-group">'+
                                '<button class="btn btn-xs '+color+' dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" '+disabled_status+'> Actions'+
                                '   <i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+                                
                                    '<li>'+
                                        '<a id="anchor_terjadi" value='+full['id']+' >'+
                                            '<i class="icon-tag"></i>Terjadi</a>'+
                                    '</li>'+ 
                                    '<li>'+
                                        '<a id="anchor_tak_terjadi" value='+full['id']+' >'+
                                            '<i class="icon-tag"></i>Tidak Terjadi</a>'+
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
    $("input[ name='optionsRelcanaBimbingan']").change(function(){
        //alert($(this).val());
        table.destroy();
        table = $("#dt_transaksi_realisasi_bimbingan").DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url:'./getall_transaksi_realisasi_bimbingan',
                method: 'GET',
                data:{param_status_realisasi:$(this).val()},
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
                            if((full['status_realisasi']!="")||(full['status_kadaluarsa']!="")) {
                                color = "gray" ;
                                disabled_status = "disabled";
                            }

                            data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs '+color+' dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" '+disabled_status+'> Actions'+
                                        '<i class="fa fa-angle-down"></i>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+                                
                                        '<li>'+
                                            '<a id="anchor_terjadi" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Terjadi</a>'+
                                        '</li>'+ 
                                        '<li>'+
                                            '<a id="anchor_tak_terjadi" value='+full['id']+' >'+
                                                '<i class="icon-tag"></i>Tidak Terjadi</a>'+
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

    // begin tak terjadi realisasi section ==========================================
    $("#dt_transaksi_realisasi_bimbingan").on("click", "#anchor_tak_terjadi", function(){         
        $("#txt_id_pengajuan").val($(this).attr('value')); 
        
        if($('#txt_status_realisasi option').length <2){
            
               $.ajax({
                type:"GET",
                url:'./getall_transaksi_realisasi_keterangan',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data){      
                   
                    //alert(JSON.stringify(data));
                    var DataliststatusRealisasiRaw,DataliststatusRealisasiJson;
                    for (i = 0; i < data.list_ket_realisasi.length; i++){ 
                        DataliststatusRealisasiRaw = JSON.stringify(data.list_ket_realisasi[i]);
                        DataliststatusRealisasiJson = JSON.parse(DataliststatusRealisasiRaw);
                        $('#txt_status_realisasi').append('<option value = "'+DataliststatusRealisasiJson.id_realisasi+'">'+DataliststatusRealisasiJson.keterangan+'</option>');                   
                        
                    }

                    $('#modal-tak-terjadi-realisasi').modal('show');
                    
                },
                error: function(data){
                    alert(data.responseText);
                }
            });
            
            
        }else{
            $('#modal-tak-terjadi-realisasi').modal('show');
        }
      
       
    });


    $("#btn-submit-tak-terjadi").click(function(){
        $.ajax({
            type:"post",
            url:'./set_respon_realisasi',
            data:$('#frm-tak-terjadi-bimbingan').serialize(),
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
    // end tak terjadi realisasi section

    // begin  terjadi realisasi section  ==========================================
        
    $("#dt_transaksi_realisasi_bimbingan").on("click", "#anchor_terjadi", function(){        
  
        $.ajax({
            type:"post",
            url:'./set_respon_realisasi',
            data:{txt_id_pengajuan : $(this).attr('value') ,txt_status_realisasi : "1",txt_tak_terjadi_realisasi : "-"},
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
    
    // end  terjadi realisasi section ==========================================

   
});