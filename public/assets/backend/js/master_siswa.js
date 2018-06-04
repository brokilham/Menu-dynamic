$(document).ready(function(){
  
    // begin add section ==========================================
   $("#call-modal-add-mstr-siswa").click(function(){
        $('#frm-add-mstr-siswa').trigger("reset");
        $('#modal-add-mstr-siswa').modal('show');
    });
 
    $("#btn-submit-mstr-siswa").click(function(){
     
        $.ajax({
            type:"POST",
            url:'./create',
            data: new FormData($("#frm-add-mstr-siswa")[0]), //$('#frm-add-mstr-siswa').serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            dataType: 'json',
            processData: false,
            contentType: false,
            async: true,
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
    // end add section ============================================
    /*
    $("#list_walimurid").change(function(){
        var Id_Walimurid = $(this).val();
        // alert(Id_Walimurid);
        $.ajax({
            type:"GET",
            url:'./get_detail_mstr_walimurid',
            data: {Id_Walimurid : $(this).val()},
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            success: function(data){    
                //console.log(data.code);       
                //alert(data.responseText);
            },
            error: function(data){
                alert(data.responseText);
            }
        });   
    });*/
    
    // begin update section ==========================================
    $("#dt_master_siswa").on("click", "#anchor_update", function(){

        $('#frm-update-mstr-siswa').trigger("reset");
        reset_color_form("frm-update-mstr-siswa");
        $.ajax({
            type:"GET",
            url:'./get_detail_mstr_siswa2',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },    
            data:{id:$(this).attr('value')},           
            success: function(data){           
               // alert(JSON.stringify(data));
               // 
               $("#txt_sis_updt_nis").val(data.mstr_siswa.id);
               $("#txt_sis_updt_nama").val(data.mstr_siswa.nama);
               $("#txt_sis_updt_jenis_kelamin").val(data.mstr_siswa.jenis_kelamin);
               $("#txt_sis_updt_foto").val("");
               $("#txt_sis_updt_alamat").val(data.mstr_siswa.alamat);
               $("#txt_sis_updt_no_telp").val(data.mstr_siswa.no_telp);
               $("#txt_sis_updt_email").val(data.mstr_siswa.email);
               $("#txt_sis_updt_hobi").val(data.mstr_siswa.hobi);

               $("#txt_walimurid_updt_id").val(data.mstr_siswa.mstr_walimurid[0].id);
               $("#txt_walimurid_updt_nama").val(data.mstr_siswa.mstr_walimurid[0].nama);      
               $("#txt_walimurid_updt_jenis_kelamin").val(data.mstr_siswa.mstr_walimurid[0].jenis_kelamin);
               $("#txt_walimurid_updt_hub_keluarga").val(data.mstr_siswa.mstr_walimurid[0].hub_keluarga);
               $("#txt_walimurid_updt_pekerjaan").val(data.mstr_siswa.mstr_walimurid[0].pekerjaan);
               $("#txt_walimurid_updt_alamat").val(data.mstr_siswa.mstr_walimurid[0].alamat);
               $("#txt_walimurid_updt_no_telp").val(data.mstr_siswa.mstr_walimurid[0].no_telp);
               $("#txt_walimurid_updt_email").val(data.mstr_siswa.mstr_walimurid[0].email);

               $('#modal-update-mstr-siswa').modal('show');

            },
            error: function(data){
              
            }
        });
                 
    });

    
    $("#btn-update-mstr-siswa").click(function(){
        var text_valid   = Check_text_input("frm-update-mstr-siswa");
        var number_valid = Check_number_input("frm-update-mstr-siswa");
        var email_valid = Check_email_input("frm-update-mstr-siswa");
        if((text_valid == true) && (email_valid == true) && (number_valid == true)) {
            $.ajax({
                type:"POST",
                url:'./update',
                data:$('#frm-update-mstr-siswa').serialize(),
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
        }
    });
    // end update section ============================================

    // begin delete section ==========================================
    $("#dt_master_siswa").on("click", "#anchor_delete", function(){
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
                else{
                    alert(data.message);                                   
                }
             },
             error: function(data){
                 alert(data.responseText);
             }
         });
     })
    // end delete section ============================================
    
    // begin datatable section ==========================================


     var table = $("#dt_master_siswa").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_mstr_siswa',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        
        columns: [              
          
            { data: 'id' },
            { data: 'nama' },   
            { data: 'jenis_kelamin' },     
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null },
            { data: null },
           
        ],
        scrollCollapse: true,      
         columnDefs: [ 
            {className: "dt-center", 
                targets:  [ 0,1,2,3,4,5,6]
            },
            {
                targets: [ 6 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets:7,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<a href="../master_siswa/get_detail_mstr_siswa/'+full['id']+'" target="_blank"> lihat </a>'                        
                    }
                    return data;
                }
            },
            {
                searchable: false,
                orderable: false,
                targets:8,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                '<ul class="dropdown-menu" role="menu">'+
                                    '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'>'+
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

  
    // end datatable section ============================================
    
});

