$(document).ready(function(){

    // begin add section ==========================================
    $("#call-modal-add-distribusi-kelas").click(function(){

        $('#frm-add-distribusi-kelas').trigger("reset");
        reset_color_form("frm-add-distribusi-kelas");
       if($('#slc_nama_siswa option').length < 2){
            $.ajax({          
                type:'GET',
                url:'./get_select_option_siswa_kelas',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data)
                {                        
                    if(data.list_siswa.length > 0 && data.list_kelas.length > 0){

                        var DatalistSiswaRaw,DatalistSiswaJson;                     
                        for (i = 0; i < data.list_siswa.length; i++){ 
                            DatalistSiswaRaw = JSON.stringify(data.list_siswa[i]);
                            DatalistSiswaJson = JSON.parse(DatalistSiswaRaw);
                            if(DatalistSiswaJson.t_distribusi_kelas == null || DatalistSiswaJson.t_distribusi_kelas.status == 'non_active'){
                                $('#slc_nama_siswa').append('<option value = "'+DatalistSiswaJson.id+'">'+DatalistSiswaJson.id+' - '+DatalistSiswaJson.nama+''+'</option>');                   
                            }
                        }

                        if($('#slc_kelas option').length < 2){
                            var DatalistKelasRaw,DatalistKelasJson;
                            for (i = 0; i < data.list_kelas.length; i++){ 
                                DatalistKelasRaw = JSON.stringify(data.list_kelas[i]);
                                DatalistKelasJson = JSON.parse(DatalistKelasRaw);
                            
                                $('#slc_kelas').append('<option value = "'+DatalistKelasJson.id+'" >'+DatalistKelasJson.kelas+''+DatalistKelasJson.ruang+'</option>');                   
                            }
                        }                    
                        
                        $('#modal-add-distribusi-kelas').modal('show');

                        if(($('#slc_nama_siswa option').length < 1)||($('#slc_kelas option').length < 1)){
                            $('#btn-submit-distribusi-kelas').prop('disabled', true);
                        }
                            else{
                            $('#btn-submit-distribusi-kelas').prop('disabled', false);
                        }
                    }
                    /*else{
                        alert("Data master & kelas kosong !!!");     
                    } */
                },
                error: function(data)
                {
                    alert(data.responseText);
                }
            
            });     
       }
       else{
            $('#modal-add-distribusi-kelas').modal('show');
         
            /*if(($('#slc_nama_siswa option').length < 1)||($('#slc_kelas option').length < 1)){
                $('#btn-submit-distribusi-kelas').prop('disabled', true);
            }
                else{
                $('#btn-submit-distribusi-kelas').prop('disabled', false);
            }*/
       }

       

    });
    
    /*$("#call-modal-add-distribusi-kelas").click(function(){
        // alert("tes");   
             
        $.ajax({          
             type:'GET',
             url:'./getall_distribusi_kelas2',
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
             success: function(data)
             {
                 console.log(data);
                      
               
             },
             error: function(data)
             {alert(data.responseText);}
         
         });  
 
     });*/

    $("#btn-submit-distribusi-kelas").click(function(){
        var select_valid   = Check_select_input("frm-add-distribusi-kelas");
        if(select_valid == true){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-distribusi-kelas').serialize(),
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
   
    $("#dt_distribusi_kelas").on("click", "#anchor_update", function(){
        
        var param = $(this).attr('value').split('|');

        if($('#slc_kelas_updt option').length < 1){
            $.ajax({          
                type:'GET',
                url:'./get_select_option_kelas_single',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data)
                {           
                           
                    if( data.list_kelas.length > 0){
                        var DatalistKelasRaw,DatalistKelasJson;
                        for (i = 0; i < data.list_kelas.length; i++){ 
                            DatalistKelasRaw = JSON.stringify(data.list_kelas[i]);
                            DatalistKelasJson = JSON.parse(DatalistKelasRaw);
                        
                            $('#slc_kelas_updt').append('<option value = "'+DatalistKelasJson.id+'" >'+DatalistKelasJson.kelas+''+DatalistKelasJson.ruang+'</option>');                   
                        }
                        $('#txt_id_updt').val(param[0]); 
                        $('#txt_id_siswa_updt').val(param[1]);  
                        $('#slc_kelas_updt').val(param[2]);                    
                        $('#txt_nama_updt').val(param[3]);  
                        $('#modal-update-distribusi-kelas').modal('show');
                    }else{
                        alert("Data master kelas kosong !!!");  
                    }             
                },
                error: function(data)
                {
                    alert(data.responseText);
                }
            
            });   
        }else{
            $('#modal-update-distribusi-kelas').modal('show');
        }

    });


    $("#btn-update-distribusi-kelas").click(function(){
        
        $.ajax({
            type:"POST",
            url:'./update',
            data:$('#frm-update-distribusi-kelas').serialize(),
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
    
    $("#dt_distribusi_kelas").on("click", "#anchor_delete", function(){
        
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
     
     var table = $("#dt_distribusi_kelas").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url:'./getall_distribusi_kelas',
            method: 'GET',
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [            
            { data: 'id_siswa' },
            { data: 'mstr_siswa.nama' },
            { data: 'mstr_kelas.kelas'},
            { data: 'mstr_kelas.ruang' },
            { data: 'created_at' },        
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null }, 
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {className: "dt-center", 
             targets:  [ 0,1,2,3,4,5,6,7 ]
            },
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
                                        '<a id="anchor_update" value='+full['id']+'|'+full['id_siswa']+'|'+full['id_kelas']+'|'+full.mstr_siswa['nama']+'>'+
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