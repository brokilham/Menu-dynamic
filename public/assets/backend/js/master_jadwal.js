
$(document).ready(function(){

    // begin add section ==========================================

    $("#call-modal-add-mstr-jadwal").click(function(){
        $('#frm-add-mstr-jadwal').trigger("reset");
        reset_color_form("frm-add-mstr-jadwal");
        if($('#slc_jam option').length < 2){
            $.ajax({
                type:"GET",
                url:'./get_all_mstr_jam',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data){      
                   
                    var DatalistjamRaw,DatalistjamJson;
                    for (i = 0; i < data.list_jam.length; i++){ 
                        DatalistjamRaw = JSON.stringify(data.list_jam[i]);
                        DatalistjamJson = JSON.parse(DatalistjamRaw);
                        $('#slc_jam').append('<option value = "'+DatalistjamJson.id+'">'+DatalistjamJson.jam_mulai+'-'+DatalistjamJson.jam_selesai+''+'</option>');                   
                        
                    }

                    $('#modal-add-mstr-jadwal').modal('show');
                },
                error: function(data){
                    alert(data.responseText);
                }
            });
        }
        else{
            $('#modal-add-mstr-jadwal').modal('show');
        }
       
    });

      
    $("#btn-submit-mstr-jadwal").click(function(){

        var select_valid   =  Check_select_input("frm-add-mstr-jadwal");
        if(select_valid == true){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-mstr-jadwal').serialize(),
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
          
        /*if($('#slc_hari').val() != '' || $('#slc_jam').val() != '' ){
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-mstr-jadwal').serialize(),
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
        else
        {
           alert("pastikan hari dan jam telah anda pilih !!!"); 
        }*/
    }); 
    
    // end add section ==========================================


    // begin delete section ==========================================
    $("#dt_master_jadwal").on("click", "#anchor_delete", function(){
            
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
      var table = $("#dt_master_jadwal").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./get_all_mstr_jadwal',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [     
          
            { data: 'id' },
            { data: 'hari' },
            { data: 'mstr_jam.jam_mulai' },
            { data: 'mstr_jam.jam_selesai' },
            { data: 'created_by' },
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {
                className: "dt-center", 
                targets:  [ 0,1,2,3,4,5,6,7]
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