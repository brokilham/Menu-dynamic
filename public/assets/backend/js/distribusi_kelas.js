$(document).ready(function(){

    // begin add section ==========================================
    $("#call-modal-add-distribusi-kelas").click(function(){
       // alert("tes");   
       $('#modal-add-distribusi-kelas').modal('show');
       /*
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
                
                    $('#slc_nama_guru').append('<option value = "'+DatalistguruJson.id+'">'+DatalistguruJson.nama+''+'</option>');                   
                }

                var DatalistJabatanRaw,DatalistJabatanJson;
                for (i = 0; i < data.list_jabatan.length; i++){ 
                    DatalistJabatanRaw = JSON.stringify(data.list_jabatan[i]);
                    DatalistJabatanJson = JSON.parse(DatalistJabatanRaw);
                
                    $('#slc_jabatan').append('<option value = "'+DatalistJabatanJson.id+'" >'+DatalistJabatanJson.nama+''+'</option>');                   
                }
                
                $('#modal-add-distribusi-jabatan').modal('show');
               }else{
                alert("Data master jabatan kosong !!!");     
               } 
            },
            error: function(data)
            {alert(data.responseText);}
        
        });  */

    });

    /*
    $("#btn-submit-distribusi-jabatan").click(function(){
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
    }); */
    // end add section ============================================

    // begin update section ==========================================
    /*
    $("#dt_distribusi_jabatan").on("click", "#anchor_update", function(){
        var param = $(this).attr('value').split('|');
        $('#txt_id_updt').val(param[0]);  
        $('#txt_nama_updt').val(param[1]);
        $('#txt_alamat_updt').val(param[2]);  
        $('#txt_no_telp_updt').val(param[3]);
        $('#txt_email_updt').val(param[4]);  
        $('#modal-update').modal('show');
    });*/


    /*$("#btn-update-mstr-guru").click(function(){
        
        $.ajax({
            type:"POST",
            url:'./update',
            data:$('#frm-update-mstr-guru').serialize(),
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
    });*/
    // end update section ============================================

    // begin delete section ==========================================
    /*
    $("#dt_distribusi_jabatan").on("click", "#anchor_delete", function(){
        
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
    })*/
    // end delete section ============================================

     // begin datatable section ==========================================
     /*
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
            { data: 'id_guru' },
            { data: 'id_jabatan' },
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
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
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+
                                    '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'|'+full['id_guru']+'|'+full['id_jabatan']+'>'+
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
    }).draw();*/
  
    // end datatable section ============================================
});