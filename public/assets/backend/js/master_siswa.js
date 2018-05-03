$(document).ready(function(){
  
    // begin add section ==========================================
   $("#call-modal-add").click(function(){
        $('#modal-add').modal('show');
    });
 
    $("#btn-submit-mstr-siswa").click(function(){
       //alert("tes");
        $.ajax({
            type:"POST",
            url:'./create',
            data:$('#frm-add-mstr-siswa').serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },               
            dataType: 'json',
            success: function(data){           
                if (data.code == "S"){
                    location.reload();
                }  
                else{
                    console.log(data.responseText);
                }

            },
            error: function(data){
                alert(data.responseText);
            }
        });
    }); 
    // end add section ============================================
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
    });
    
    // begin update section ==========================================
    /*$("#dt_master_siswa").on("click", "#anchor_update", function(){
        var param = $(this).attr('value').split('|');
        $('#txt_status_id_updt').val(param[0]);  
        $('#txt_name_updt').val(param[1]);
        $('#modal-update').modal('show');      
    });*/

    
    /*$("#btn-update-mstr-siswa").click(function(){
        
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
    });*/
    // end update section ============================================

    // begin delete section ==========================================
   /* $("#dt_master_siswa").on("click", "#anchor_delete", function(){
       
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
                       // <a href="{{ url('/Dashboard') }}" >
                       // <a href="?mm=service_level2&det_lembar_terkirim=&jenis_lembar=terkirim&depo=<?php echo $_GET['depo']; ?>&entity=		<?php echo str_replace("'","",$_GET['entity']); ?>&jenis_lap=<?php echo $_GET['jenis_lap']; ?>&month=<?php echo $x_value; ?>&nm_bulan=<?php echo $x; ?>&tahun=<?php echo $_GET['tahun']; ?>&principal=<?php echo $row_co['szcategory_1']; ?>&opt_b=<?php echo $_GET['opt_b']; ?>&bvoid=<?php echo $_GET['bvoid']?>&file=all" target='_blank'>
	
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
                                        '<a id="anchor_update" value='+full['id']+'|'+full['name']+'>'+
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

