$(document).ready(function(){

    // begin add section ==========================================
    $("#call-modal-add-distribusi-jabatan").click(function(){
        
        $('#frm-add-distribusi-jabatan').trigger("reset");
        reset_color_form("frm-add-distribusi-jabatan");
      
        if($('#slc_nama_guru option').length < 2){
            $.ajax({          
                type:'GET',
                url:'./get_select_option_guru_jabatan',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data)
                {
                         
                   if(data.list_guru.length > 0 && data.list_jabatan.length > 0){
    
                    var DatalistguruRaw,DatalistguruJson;
                    
                    for (i = 0; i < data.list_guru.length; i++){ 
                        DatalistguruRaw = JSON.stringify(data.list_guru[i]);
                        DatalistguruJson = JSON.parse(DatalistguruRaw);
                        if(DatalistguruJson.t_distribusi_jabatan == null || DatalistguruJson.t_distribusi_jabatan.status == 'non_active'){
                            $('#slc_nama_guru').append('<option value = "'+DatalistguruJson.id+'">'+DatalistguruJson.nama+''+'</option>');                   
                        }

                      }
                    if($('#slc_jabatan option').length < 2){
                        var DatalistJabatanRaw,DatalistJabatanJson;
                        
                        for (i = 0; i < data.list_jabatan.length; i++){ 
                            DatalistJabatanRaw = JSON.stringify(data.list_jabatan[i]);
                            DatalistJabatanJson = JSON.parse(DatalistJabatanRaw);
                        
                            $('#slc_jabatan').append('<option value = "'+DatalistJabatanJson.id+'" >'+DatalistJabatanJson.nama+''+'</option>');                   
                        }
                    }
                                   
                    $('#modal-add-distribusi-jabatan').modal('show');

                    if(($('#slc_nama_guru option').length < 1)||($('#slc_jabatan option').length < 1)){
                        $('#btn-submit-distribusi-jabatan').prop('disabled', true);
                    }
                        else{
                        $('#btn-submit-distribusi-jabatan').prop('disabled', false);
                    }
                   }else{
                    alert("Data master jabatan kosong !!!");     
                   } 
                },
                error: function(data)
                {alert(data.responseText);}
            
            }); 
        }else{
            $('#modal-add-distribusi-jabatan').modal('show');
         
            if(($('#slc_nama_guru option').length < 1)||($('#slc_jabatan option').length < 1)){
                $('#btn-submit-distribusi-jabatan').prop('disabled', true);
            }
                else{
                $('#btn-submit-distribusi-jabatan').prop('disabled', false);
            }
        }
    });

    
    $("#btn-submit-distribusi-jabatan").click(function(){
       
        var select_valid   = Check_select_input("frm-add-distribusi-jabatan");
        if(select_valid == true){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-distribusi-jabatan').serialize(),
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
       
        
    }); 
    // end add section ============================================

    // begin update section ==========================================
    $("#dt_distribusi_jabatan").on("click", "#anchor_update", function(){
        var param = $(this).attr('value').split('|');
        if($('#slc_jabatan_updt option').length < 1){
            $.ajax({          
                type:'GET',
                url:'./get_select_option_jabatan_single',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data)
                {           
                           
                    if( data.list_jabatan.length > 0){
                       var DatalistJabatanRaw,DatalistJabatanJson;
                        for (i = 0; i < data.list_jabatan.length; i++){ 
                            DatalistJabatanRaw = JSON.stringify(data.list_jabatan[i]);
                            DatalistJabatanJson = JSON.parse(DatalistJabatanRaw);
                        
                            $('#slc_jabatan_updt').append('<option value = "'+DatalistJabatanJson.id+'" >'+DatalistJabatanJson.nama+'</option>');                   
                        }
                    
                        $('#txt_id_updt').val(param[0]);  
                        $('#txt_id_guru_updt').val(param[1]);
                        $('#slc_jabatan_updt').val(param[2]);    
                        $('#txt_nama_updt').val(param[3]);                   
                        
                        $('#modal-update-distribusi-jabatan').modal('show');
                    }else{
                        alert("Data master jabatan kosong !!!");  
                    }             
                },
                error: function(data)
                {
                    alert(data.responseText);
                }
            
            });   
        }
        else{
            $('#modal-update-distribusi-jabatan').modal('show'); 
        }
    });


    $("#btn-update-distribusi-jabatan").click(function(){
        
        $.ajax({
            type:"POST",
            url:'./update',
            data:$('#frm-update-distribusi-jabatan').serialize(),
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
    $("#dt_distribusi_jabatan").on("click", "#anchor_delete", function(){
        var param = $(this).attr('value').split('|');
        $.ajax({
            type:"POST",
            url:'./delete',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            data:{id:param[0],id_guru:param[1]},
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
     var table = $("#dt_distribusi_jabatan").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_distribusi_jabatan',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [     
          
            { data: 'id' },
            { data: 'mstr_guru.nama' },
            { data: 'mstr_jabatan.nama' },
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {className: "dt-center", 
             targets:  [ 0,1,2,3,4,5 ]
            },
            {
                targets: [ 6 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets: 7,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        var AccesButton = "";
                        if(full['login_as'] != "administrator"){
                            AccesButton = "disabled";
                        }
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" '+ AccesButton+'> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+
                                    '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'|'+full['id_guru']+'|'+full['id_jabatan']+'|'+full.mstr_guru['nama']+'>'+
                                            '<i class="icon-docs"></i>Update</a>'+
                                    '</li>'+
                                    '<li>'+
                                        '<a id="anchor_delete" value='+full['id']+'|'+full['id_guru']+' >'+
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