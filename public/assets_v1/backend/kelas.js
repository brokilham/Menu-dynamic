$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


        $(document).on('click', '#SubmitPageAddKelas', function() { // menampilkan form modal halaman tambah kelas
                  
             $('#Kelas-ModalAddDataKelas').modal('show');        
        });


       $(document).on('click', '#btnSubmitAddKelas', function() { // proses menyimpan data baru kelas ke db
      
             
             var TingkatKelas = document.getElementById('Add-TingkatKls').value;
             var RuangKelas   = document.getElementById('Add-RuangKls').value;



         
            if(!/[^a-zA-Z]/.test(RuangKelas))
            {
                  RuangKelas = RuangKelas.toUpperCase();     
                     
              $.ajax({
                  //headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  type:'POST',
                  url:'./kelasAddData',
                  data: {TingkatKelas : TingkatKelas, RuangKelas : RuangKelas},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#Kelas-ModalAddDataKelas').modal('hide'); 
                   
                    if (data.status == 'S')
                    {     
                      
                      var TdId = "TdId";
                      var Tdkls = "Tdkls";
                      var TdRng = "TdRng"; // table row

                      var kodeItemdId = TdId.concat(data.IdKelas);
                      var kodeItemKls = Tdkls.concat(data.IdKelas);
                      var kodeItemRng = TdRng.concat(data.IdKelas);
                   
                      var DataArray = '{"IdKelas":"'+data.IdKelas+'","Kelas":'+TingkatKelas+',"Ruang":"'+RuangKelas+'"}';
          
                      $('#TbKelas').append('<tr ><td id ='+kodeItemdId+' >'+ data.IdKelas +'</td><td id ='+kodeItemKls+'>'+ TingkatKelas +'</td><td id ='+kodeItemRng+'>'+ RuangKelas +'</td><td><a class="Edit" id="SubmitPageEditKelas" value ='+DataArray+'> Edit </a></td><td><a class="delete" id = "SubmitPageEditDelete" value ='+ data.IdKelas +'> Delete </a></td></tr>');
              
                      TampilToast(data.status, data.message);
                    }
                    else
                    {

                       if(data.kode == 'va')
                        {
                           for (var i = 0; i < data.message.length; i++)
                           {                                
                              TampilToast(data.status, data.message[i]);
                           }

                        }
                        else
                        {
                            TampilToast(data.status, data.message);
                        }
                    }
                    

                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });
            }
            else
            {
                TampilToast("E", "Inputan ruang harus huruf!");
            }




           
        });



        $(document).on('click', '#SubmitPageEditKelas', function() { // menampilkan form modal halaman edit kelas
      
            
             var KodeKelas = $(this).attr('value');          
             var DataKelas = JSON.parse(KodeKelas);             

             $('#Kelas-ModalEditDataKelas').modal('show'); 

             document.getElementById("Edit-KodeKls").value = DataKelas.IdKelas;
             document.getElementById("Edit-TingkatKls").value = DataKelas.Kelas;
             document.getElementById("Edit-RuangKls").value = DataKelas.Ruang;
         
      
        });


        $(document).on('click', '#btnSubmitEditKelas', function() { // proses menyimpan eidt data  kelas ke db
      
              
             var KodeKelas    =  document.getElementById("Edit-KodeKls").value;
             var TingkatKelas =  document.getElementById("Edit-TingkatKls").value;
             var RuangKelas   =  document.getElementById("Edit-RuangKls").value;
             
            if(!/[^a-zA-Z]/.test(RuangKelas))
            {

             RuangKelas = RuangKelas.toUpperCase();     
              $.ajax({
             
                  type:'POST',
                  url:'./kelasUpdateData',
                  data: {KodeKelas : KodeKelas, TingkatKelas : TingkatKelas, RuangKelas : RuangKelas },
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    $('#Kelas-ModalEditDataKelas').modal('hide'); 
                   
                    if (data.status == 'S')
                    {    
                          
                         
                         
                          $('#TdId'+KodeKelas+'').text(KodeKelas);
                          $('#Tdkls'+KodeKelas+'').text(TingkatKelas);
                          $('#TdRng'+KodeKelas+'').text(RuangKelas);

                          TampilToast(data.status, data.message);
                    }
                    else
                    {

                       if(data.kode == 'va')
                        {
                           for (var i = 0; i < data.message.length; i++)
                           {                                
                              TampilToast(data.status, data.message[i]);
                           }

                        }
                        else
                        {
                            TampilToast(data.status, data.message);
                        }
                    }
                    

                    
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });

            }
            else
            {
                TampilToast("E", "Inputan ruang harus huruf!");
            }

      
        });

        $(document).on('click', '#SubmitPageEditDelete', function() { // proses menghapus data dari database
      
             var KodeKelas = $(this).attr('value');           
                
              $.ajax({
             
                  type:'POST',
                  url:'./kelasDeleteData',
                  data: {KodeKelas : KodeKelas},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                                  
                    if (data.status == 'S')
                    {     
                       window.location.reload(); 
                    }
                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });
      
        });


     

     var toastCount = 0;
     var TampilToast = function namedFunction(TipePesan, IsiPesan)
     {
   
            this.TipePesan = TipePesan;
            this.IsiPesan = IsiPesan;

            var shortCutFunction = "Error";
            var msg = null;
            var title  = null;

           if (this.TipePesan == "S")
            {
                 shortCutFunction = "success";  //info, success, warning, error
                 title = "Sukses";
                 msg = this.IsiPesan;
            }
            else 
            {
                shortCutFunction = "error";
                title = "Gagal";
                msg = this.IsiPesan;
           
            }
                         
            var toastIndex = toastCount++;

            toastr.options = {
              "closeButton": true,
              "debug": false,
              "positionClass": "toast-top-right",
              "onclick": null,
              "showDuration": 500,
              "hideDuration": 500,
              "timeOut": 5000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"};

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
    }
         
  
});


