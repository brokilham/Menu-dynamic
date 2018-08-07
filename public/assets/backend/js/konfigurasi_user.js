$(document).ready(function(){
    // begin ubah password section ==========================================
        $("#dt_konfigurasi_user").on("click", "#anchor_ubah_password", function(){
            $('#txt_username').val("");  
            $('#txt_password').val("");
            var username = $(this).attr('value')
            $('#txt_username').val(username);  
            $('#modal-ubah-password').modal('show');
        });


        $("#btn-submit-ubah-password").click(function(){
           
            if( $('#txt_password').val() != ""){
                $.ajax({
                    type:"POST",
                    url:'./update_password',
                    data:$('#frm-ubah-password').serialize(),
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

            }else{
                alert("Inputan password tidak boleh kosong !!!")
            }
        });
    // end ubah password section ============================================

     // begin datatable section ==========================================
     var table = $("#dt_konfigurasi_user").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_list_user',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [     
          
            { data: 'name' },
            { data: 'email' },
            { data: 'login_as' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {className: "dt-center", 
             targets:  [ 0,1,2,3 ]
            },
            {
                searchable: false,
                orderable: false,
                targets: 3,
                data: null,
                render: function(data, type, full, meta){
                    if(type === 'display'){
                   
                        data = '<div class="btn-group">'+
                                '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" > Actions'+
                                    '<i class="fa fa-angle-down"></i>'+
                                '</button>'+
                                    '<ul class="dropdown-menu" role="menu">'+
                                        '<li>'+
                                            '<a id="anchor_ubah_password" value='+full['email']+'>'+
                                                '<i class="icon-docs"></i>Ubah Password</a>'+
                                        '</li>'+                                     
                                    '</ul>'+
                                '</div>';
                    }

                    return data;
                }
            } ],
        order: [[ 0, 'asc' ]],
    }).draw();
  
    // end datatable section ============================================
});