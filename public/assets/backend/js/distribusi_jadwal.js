$(document).ready(function(){

     // begin add section ==========================================

     //memunculkan jam  yanghanya di set oleh admin
     $("#call-modal-add-distribusi-jadwal").click(function(){
        if($('#slc_hari option').length < 2){
            $.ajax({
                type:"GET",
                url:'./get_all_mstr_hari',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data){      
                   
                    var DatalisthariRaw,DatalishariJson;
                    for (i = 0; i < data.list_hari.length; i++){ 
                        DatalisthariRaw = JSON.stringify(data.list_hari[i]);
                        DatalisthariJson = JSON.parse(DatalisthariRaw);
                        $('#slc_hari').append('<option value = "'+DatalisthariJson.hari+'">'+DatalisthariJson.hari+'</option>');                   
                        
                    }

                    $('#modal-add-distribusi-jadwal').modal('show');
                },
                error: function(data){
                    alert(data.responseText);
                }
            });
        }
        else{
            $('#modal-add-distribusi-jadwal').modal('show');
        } 

        // hanya untuk mengetes view datatable pada page ini
        /*$.ajax({
            type:"GET",
            url:'./get_all_distribusi_jadwal',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            success: function(data){      
               
                alert(JSON.stringify(data));
            },
            error: function(data){
                alert(data.responseText);
            }
        });*/
    });


    $("#frm-add-distribusi-jadwal  #slc_hari").change(function() {
        var text_selected_hari = $(this).val();
        $('#slc_jam').empty();
        if(text_selected_hari != ""){
            $.ajax({
                type:"POST",
                url:'./get_all_mstr_jam',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                data:{selected_hari:$(this).val()},
                success: function(data){      
                   //alert(JSON.stringify(data));
                   var DatalistjamRaw,DatalistjamJson;
                   for (i = 0; i < data.list_jam.length; i++){ 
                       DatalistjamRaw = JSON.stringify(data.list_jam[i]);
                       DatalistjamJson = JSON.parse(DatalistjamRaw);
                       $('#slc_jam').append('<option value = "'+DatalistjamJson.id+'">'+DatalistjamJson.mstr_jam.jam_mulai+'-'+DatalistjamJson.mstr_jam.jam_selesai+'</option>');   
                       //$('#slc_jam').append('<option value = "'+DatalistjamJson.id+'">'+DatalistjamJson.jam_mulai+'-'+DatalistjamJson.jam_selesai+''+'</option>');                                   
                   }
    
                   
                },
                error: function(data){
                    alert(data.responseText);
                }
            });
        }
        else{
            $('#slc_jam').append('<option value="">Pilih jam</option>'); 
        }
       
        
    });

    $("#btn-submit-distribusi-jadwal").click(function(){      
        if($('#slc_hari').val() != '' || $('#slc_jam').val() != '' ){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-distribusi-jadwal').serialize(),
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
                dataType: 'json',
                success: function(data){      
                    //console.log(data);     
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
        }
        else{
           alert("pastikan hari dan jam telah anda pilih !!!"); 
        }
    });

  
    // end add section ==========================================

     // begin delete section ==========================================
     $("#dt_distribusi_jadwal").on("click", "#anchor_delete", function(){         
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
    /*
    // jika  menggunakna jqueey data table ini masih error kemungkinan karena joinny
    var table = $("#dt_distribusi_jadwal").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./get_all_distribusi_jadwal',
            method: 'GET',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [        
            { data: 'id' },
            { data: 'mstr_jadwal.hari' },
            { data: 'mstr_jadwal.mstr_jam.jam_mulai' },
            { data: 'mstr_jadwal.mstr_jam.jam_selesai' },
            { data: 'created_at' },
            { data: 'updated_at' },
            { data: 'created_by' },          
            { data: 'status' },
            { data: null },
        
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {
                targets: [ 7 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets: 8,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+                                
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
    }).draw();*/
    var table = $("#dt_distribusi_jadwal").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./get_all_distribusi_jadwal',
            method: 'GET',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [        
            { data: 'id' },
            { data: 'id_jadwal' },
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

    // end datatable section ============================================

});