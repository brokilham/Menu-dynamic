$(document).ready(function(){

    // begin add section ==========================================
    $("#call-modal-add-guru").click(function(){

        $('#frm-add-mstr-guru').trigger("reset");
        reset_color_form("frm-add-mstr-guru");
        $('#modal-add-mstr-guru').modal('show');
    });

    $("#btn-submit-mstr-guru").click(function(){      
        
        /*var text_valid   = Check_text_input();
        var number_valid = Check_number_input();
        var email_valid = Check_email_input();*/

        var text_valid   = Check_text_input("frm-add-mstr-guru");
        var number_valid = Check_number_input("frm-add-mstr-guru");
        var email_valid = Check_email_input("frm-add-mstr-guru");

        if((text_valid == true) && (email_valid == true) && (number_valid == true)) {
            $.ajax({
                type:"POST",
                url:'./create',
                data:$('#frm-add-mstr-guru').serialize(),
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
    $("#dt_master_guru").on("click", "#anchor_update", function(){
        var param = $(this).attr('value').split('|');
        $('#txt_id_updt').val(param[0]);  
        $('#txt_nama_updt').val(param[1]);
        $('#txt_alamat_updt').val(param[2]);  
        $('#txt_no_telp_updt').val(param[3]);
        $('#txt_email_updt').val(param[4]);  
        $('#modal-update').modal('show');
    });


    $("#btn-update-mstr-guru").click(function(){
        
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
    });
    // end update section ============================================

    // begin delete section ==========================================
    $("#dt_master_guru").on("click", "#anchor_delete", function(){
        
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
     var table = $("#dt_master_guru").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_mstr_guru',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [              
          
            { data: 'id' },
            { data: 'nama' },
            { data: 'alamat' },
            { data: 'no_telp' },
            { data: 'email' },     
            { data: 'created_at' },
            { data: 'updated_at' },          
            { data: 'created_by' },
            { data: 'status' },
            { data: null }
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {className: "dt-center", 
             targets:  [ 0,1,2,3,4,5,6,7,8 ]
            },
            {
                targets: [ 8 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets: 9,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                        data = '<div class="btn-group">'+
                                    '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                                        '<i class="fa fa-angle-down"></i>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+
                                        '<li>'+
                                            '<a id="anchor_update" value='+full['id']+'|'+full['nama']+'|'+full['alamat']+'|'+full['no_telp']+'|'+full['email']+'>'+
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

/*function reset_color_form(){
    $('input[type="number"].required').css({
        background: "",
        border: "",
        color: "black"
    });

    $('input[type="email"].required').css({
        background: "",
        border: "",
        color: "black"
    });

    $('input[type="text"].required').css({
        background: "",
        border: "",
        color: "black"
    });
}

function Check_number_input(){
    var isValid = true;
    $('input[type="number"].required').each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    return isValid;      
}


function Check_email_input(){
    var isValid = true;
    $('input[type="email"].required').each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    return isValid;      
}

function Check_text_input(){
    var isValid = true;
    $('input[type="text"].required').each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    if (isValid == false) 
        e.preventDefault();
    else 
        alert('Thank you for submitting');
       
    return isValid;      
}*/