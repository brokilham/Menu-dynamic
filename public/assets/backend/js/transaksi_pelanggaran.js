$(document).ready(function(){
    // begin add section ==========================================
    $("#call-modal-add-transaksi-pelanggaran").click(function(){
        if($('#slc2_siswa option').length <=1){
            $.ajax({          
                type:'GET',
                url:'./get_select_option_siswa',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(data)
                {                                   
                    //alert(JSON.stringify(data));
                    var DatalistSiswaRaw,DatalistSiswaJson;                     
                    for (i = 0; i < data.list_siswa.length; i++){ 
                        DatalistSiswaRaw = JSON.stringify(data.list_siswa[i]);
                        DatalistSiswaJson = JSON.parse(DatalistSiswaRaw);
                        if(DatalistSiswaJson.t_distribusi_kelas == null || DatalistSiswaJson.t_distribusi_kelas.status == 'non_active'){
                            $('#slc2_siswa').append('<option value = "'+DatalistSiswaJson.id+'">'+DatalistSiswaJson.nama+' ('+DatalistSiswaJson.id+')'+'</option>');                   
                        }
                    }      
                    
                    $('#modal-add-transaksi-pelanggaran').modal('show');
                 
                },
                error: function(data)
                {
                    alert(data.responseText);
                }          
            });

        }else{
            $('#modal-add-transaksi-pelanggaran').modal('show');
        }
    
    });
    
    $("#btn-submit-transaksi-pelanggaran").click(function(){
        $.ajax({
            type:"POST",
            url:'./create',
            data:$('#frm-add-transaksi-pelanggaran').serialize(),
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
    });

    // end add section ============================================

    // begin datatable section ==========================================
    var table = $("#dt_transaksi_pelanggaran").DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
        url:'./getall_transaksi_pelanggaran',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        },
        columns: [     
          
            /*{ data: 'id' },
            { data: 'id_siswa' },
            { data: null },
            { data: 'jenis_pelanggaran' },
            { data: 'keterangan_pelanggaran' },          
            { data: 'jenis_pendisiplinan' },
            { data: 'keterangan_pendisiplinan' }, 
            { data: 'tanggal_kejadian' },
            { data: 'lokasi_kejadian' },
            { data: 'created_by' },
            { data: 'created_at' },
            { data: 'updated_at' },
            { data: 'status' },
            { data: null },*/

            { data: 'id' },
            { data: 'id_siswa' },        
            { data: 'jenis_pelanggaran' },
            { data: 'keterangan_pelanggaran' },          
            { data: 'jenis_pendisiplinan' },
            { data: 'keterangan_pendisiplinan' }, 
            { data: 'tanggal_kejadian' },
            { data: 'lokasi_kejadian' },
            { data: 'created_by' },
            { data: 'created_at' },
            { data: 'updated_at' },
            { data: 'status' },
            { data: null },
           
        ],
        scrollCollapse: true,      
        columnDefs: [ 
            {
                targets: [ 11 ],
                visible: false
            },
            {
                searchable: false,
                orderable: false,
                targets: 12,
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