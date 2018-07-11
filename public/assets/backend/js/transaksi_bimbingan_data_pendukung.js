$(document).ready(function(){
 // begin datatable section ==========================================
 /*$.ajax({
    type:"GET",
    url:'./get_all_siswa_with_bimbingan_history',
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },        
    success: function(data){           
        alert(JSON.stringify(data));
   
    },
    error: function(data){
      
    }
});*/


   var table = $("#dt_history_bimbingan").DataTable({
    processing: true,
    serverSide: true,
    deferRender: true,
    ajax: {
        url:'./get_all_siswa_with_bimbingan_history',
        method: 'GET',
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
    },
    columns: [        
        { data: 'id_siswa' },
        { data: 'nama' },
        { data: 'kelas' }, 
        { data: 'ruang' },
        { data: 'last_date'},
        { data: null}
    
    ],
    scrollCollapse: true, 
    columnDefs: [   {
            className: "dt-center", 
            targets:  [ 0,1,2,3,4,5 ]
        },
        {
            searchable: false,
            orderable: false,
            targets:5,
            data: null,
            render: function(data, type, full, meta){
                if(type === 'display'){
                    data = '<a href="../transaksi_bimbingan/get_detail_bimbingan_history/'+full['id_siswa']+'" target="_blank"> lihat </a>'                        
                }
                return data;
            }
        }, ],     
    order: [[ 0, 'asc' ]],
}).draw();
 // end datatable section ============================================
   
    $( "#dt_detail_history_bimbingan" ).after(function() {
        $(this).DataTable({
            scrollCollapse: true,
            order: [[ 0, 'desc' ]]
        });
    });

});
