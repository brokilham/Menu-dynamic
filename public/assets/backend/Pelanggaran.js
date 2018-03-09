$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


        $(document).on('click', '#SubmitPageAddPelanggaran', function() { 
             $('#Pelanggaran-ModalAddDataPelanggaran').modal('show');        
        });


      $(document).on('click', '#btnSubmitAddPelanggaran', function() { 
      
             
             var IdSiswa = document.getElementById('Add-IdSiswa').value;  
             var IdUser = $('#IdUser').text();
             var BntukPelanggran = document.getElementById('Add-BntukPelanggran').value;
             var BntukPendisplinan   = document.getElementById('Add-BntukPendisplinan').value;
             var NamaSiswa = document.getElementById('Add-NamaSiswa').value; // penyebab error karena ada spasinya
             
             $.ajax({
             
                  type:'POST',
                  url:'./pelanggaranAddData',
                  data: {IdSiswa : IdSiswa, IdUser : IdUser, BntukPelanggran : BntukPelanggran, BntukPendisplinan : BntukPendisplinan},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                    if (data.status == 'S')
                    {     
                      
                      
                    
                      var TdIdp = "TdIdp";
                      var TdIds = "TdIds";
                      var TdJnsPel = "TdJnsPel";
                      var TdJnsPen = "TdJnsPen";

                      var kodeItemdIdPelanggaran = TdIdp.concat(data.Id_Pelanggaran);
                      var kodeItemIdSiswa = TdIds.concat(data.Id_Pelanggaran);
                      var kodeItemJnsPelanggaran = TdJnsPel.concat(data.Id_Pelanggaran);
                      var kodeItemJnsPendisiplanan = TdJnsPen.concat(data.Id_Pelanggaran);
                    
                   
                      NamaSiswaJson = NamaSiswa.replace(/ /g,"_");
                      BntukPelanggranJson = BntukPelanggran.replace(/ /g,"_");
                      BntukPendisplinanJson = BntukPendisplinan.replace(/ /g,"_");

                      var DataArray =  '{"Id_Pelanggaran":"'+data.Id_Pelanggaran+'","Id_Siswa":"'+IdSiswa+'","Nama":"'+NamaSiswaJson+'","Tindakan_Pelanggaran":"'+BntukPelanggranJson+'","Tindakan_Pendisiplinan":"'+BntukPendisplinanJson+'"}';
             
                      $('#TbPelanggaran').append('<tr ><td id ='+kodeItemdIdPelanggaran+'>'+data.Id_Pelanggaran +'</td><td id ='+kodeItemIdSiswa+'>'+ IdSiswa +'</td><td id ='+kodeItemJnsPelanggaran+'>'+ BntukPelanggran +'</td><td id ='+kodeItemJnsPendisiplanan+'>'+ BntukPendisplinan +'</td><td><a class="Edit" id="SubmitPageEditPelanggaran" name = "SubmitPageEditPelanggaran'+data.Id_Pelanggaran+'" value ='+DataArray+'> Edit </a></td><td><a class="delete" id = "SubmitPageEditDelete" value ='+ data.Id_Pelanggaran +'> Delete </a></td></tr>');
                      
                      $('#Pelanggaran-ModalAddDataPelanggaran').find("input,textarea,select").val('').end();
                                              
                     } 
                    $('#Pelanggaran-ModalAddDataPelanggaran').modal('hide');  

                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });
        });



       $(document).on('click', '#SubmitPageEditPelanggaran', function() { 
            var DataPelanggaranRaw = $(this).attr("value");  
           
            //alert(DataPelanggaranRaw);
            var DataPelanggaranJson = JSON.parse(DataPelanggaranRaw);
            DataPelanggaranJson.Nama = DataPelanggaranJson.Nama.replace(/_/g," ");
            DataPelanggaranJson.Tindakan_Pelanggaran = DataPelanggaranJson.Tindakan_Pelanggaran.replace(/_/g," ");
            DataPelanggaranJson.Tindakan_Pendisiplinan = DataPelanggaranJson.Tindakan_Pendisiplinan.replace(/_/g," ");


               
            $('#Pelanggaran-ModaEditDataPelanggaran').modal('show'); 

            document.getElementById("Edit-IdPelanggaran").value = DataPelanggaranJson.Id_Pelanggaran;
            document.getElementById("Edit-IdSiswa").value = DataPelanggaranJson.Id_Siswa;
            document.getElementById("Edit-NamaSiswa").value = DataPelanggaranJson.Nama;
            document.getElementById("Edit-BntukPelanggran").value = DataPelanggaranJson.Tindakan_Pelanggaran;
            document.getElementById("Edit-BntukPendisplinan").value = DataPelanggaranJson.Tindakan_Pendisiplinan;
         
      
        });


 
        $(document).on('click', '#btnSubmitEditPelanggaran', function() { 
      
             Id_Pelanggaran         = document.getElementById("Edit-IdPelanggaran").value; 
             Tindakan_Pelanggaran   = document.getElementById("Edit-BntukPelanggran").value;
             Tindakan_Pendisiplinan = document.getElementById("Edit-BntukPendisplinan").value;
             NamaSiswa    = document.getElementById("Edit-NamaSiswa").value;
             IdSiswa   = document.getElementById("Edit-IdSiswa").value;
             var IdUser       = $('#IdUser').text();
            
              $.ajax({
             
                  type:'POST',
                  url:'./pelanggaranUpdateData',
                  data: {Id_Pelanggaran : Id_Pelanggaran, IdUser : IdUser, BntukPelanggran : Tindakan_Pelanggaran, BntukPendisplinan : Tindakan_Pendisiplinan},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    $('#Pelanggaran-ModaEditDataPelanggaran').modal('hide'); 
                   
                    if (data.status == 'S')
                    {    
                           
                        var NamaSiswaJson = NamaSiswa.replace(/ /g,"_");
                        var BntukPelanggranJson = Tindakan_Pelanggaran.replace(/ /g,"_");
                        var  BntukPendisplinanJson = Tindakan_Pendisiplinan.replace(/ /g,"_");
                        
                        var DataArray =  '{"Id_Pelanggaran":"'+Id_Pelanggaran+'","Id_Siswa":"'+IdSiswa+'","Nama":"'+NamaSiswaJson+'","Tindakan_Pelanggaran":"'+BntukPelanggranJson+'","Tindakan_Pendisiplinan":"'+BntukPendisplinanJson+'"}';
             
                        $("a[name='SubmitPageEditPelanggaran"+Id_Pelanggaran+"']").attr('value',DataArray);
                        $('#TdJnsPel'+Id_Pelanggaran+'').text(Tindakan_Pelanggaran);
                        $('#TdJnsPen'+Id_Pelanggaran+'').text(Tindakan_Pendisiplinan);
                    }
                   
                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });
      
        });

        $(document).on('click', '#SubmitPageDeletePelanggaran', function() { // proses menghapus data dari database
      
             var Id_Pelanggaran = $(this).attr('value');           
                
              $.ajax({
             
                  type:'POST',
                  url:'./pelanggaranDeleteData',
                  data: {Id_Pelanggaran : Id_Pelanggaran},
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


