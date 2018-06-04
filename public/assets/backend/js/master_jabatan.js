$(document).ready(function(){

// begin add section ==========================================
    $("#call-modal-add-mstr-jabatan").click(function(){
        $('#frm-add-mstr-jabatan').trigger("reset");
        reset_color_form("frm-add-mstr-jabatan");
        $('#modal-add-mstr-jabatan').modal('show');
    });
    
    $("#txt_name").keyup(function(){
        var value =  $(this).val();
       $("#txt_login_as").val(value.replace(" ", "_").toLowerCase());
    });

    $("#btn-submit-mstr-jabatan").click(function(){
        var text_valid   =  Check_text_input("frm-add-mstr-jabatan");
        if(text_valid == true){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-mstr-jabatan').serialize(),
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
    // end add section ============================================

    // begin update section ==========================================
    $("#dt_master_jabatan").on("click", "#anchor_update", function(){
        $('#frm-update-mstr-jabatan').trigger("reset");
        reset_color_form("frm-update-mstr-jabatan");
        var param = $(this).attr('value').split('|');
        $('#txt_id_updt').val(param[0]);  
        $('#txt_nama_updt').val(param[1]);
        $('#modal-update-mstr-jabatan').modal('show');
    });


    $("#btn-update-mstr-jabatan").click(function(){
        var text_valid   =  Check_text_input("frm-update-mstr-jabatan");
        if(text_valid == true){
            $.ajax({
                type:"POST",
                url:'./update',
                data:$('#frm-update-mstr-jabatan').serialize(),
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
    $("#dt_master_jabatan").on("click", "#anchor_delete", function(){
        
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
        var table = $("#dt_master_jabatan").DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url:'./getall_mstr_jabatan',
                method: 'GET',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                
            }, 
            columns: [              
            
                { data: 'id' },
                { data: 'nama' },
                { data: 'login_as' },
                { data: 'created_at' },
                { data: 'updated_at' },          
                { data: 'created_by' },
                { data: 'status' },
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
                    targets: 7,
                    data: null,
                    render: function(data, type, full, meta){
                        /* button action sengaja di disabled karena sekarang masih di statis kan */
                        if(type === 'display'){
                            data = '<div class="btn-group" >'+
                                        '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" disabled> Actions'+
                                        '<i class="fa fa-angle-down"></i>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+
                                        '<li>'+
                                        '<a id="anchor_update" value='+full['id']+'|'+full['nama']+'>'+
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


