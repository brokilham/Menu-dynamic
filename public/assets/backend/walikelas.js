$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


        $(document).on('click', '#SubmitPageAddWalikelas', function() { // menampilkan form modal halaman tambah walikelas
             var CountDataSelectKelas = document.getElementById('Add-KelasWK').length;
              if(CountDataSelectKelas < 1)
                {
                    $.ajax({
                   
                        type:'POST',
                        url:'./kelasGetListKelas',
                        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                        success: function(data)
                        {
                         
                          var DataKelasRaw;
                          var DataKelasJson;
                          if(data.length > 0)
                          {

                            $('#Walikelas-ModalAddDataWalikelas').modal('show');   
                            
                            //alert(CountDataSelectKelas);
                           
                              for (i = 0; i < data.length; i++)
                              { 
                                DataKelasRaw = JSON.stringify(data[i]);
                                DataKelasJson = JSON.parse(DataKelasRaw);
                              
                                $('#Add-KelasWK').append('<option value = '+DataKelasJson.IdKelas+'>'+DataKelasJson.Kelas+' '+DataKelasJson.Ruang+''+'</option>');                   
                              }
                           
                          
                          }  
                          else
                          {
                            TampilToast("E", "Master data kelas kosong");
                            //document.getElementById('Add-IdWK').disabled = true;

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

                    $('#Walikelas-ModalAddDataWalikelas').modal('show');   
                }  
        });

          $(document).on('change', '#Add-IdWK', function() { // set default password
             
            var IdWK = document.getElementById('Add-IdWK').value;   


                var PasswordValue = null;
                if ( IdWK.length <6)
                {   
                     PasswordValue = IdWK;

                    for(var i = 0; PasswordValue.length<=6; i++)
                    {
                        PasswordValue = PasswordValue + "x";

                    }
                }
                else
                {
                    PasswordValue =  IdWK;
                }


            document.getElementById('Add-passwordWK').value = PasswordValue;
            document.getElementById('Add-password_confirmationWK').value = PasswordValue;
        });


        $(document).on('click', '#btnSubmitAddWaliKelas', function() { // proses menyimpan data baru walikelas ke db
      
             
             var IdWk     = document.getElementById('Add-IdWK').value;
             var NamaWk   = document.getElementById('Add-NamaWK').value;
             var AlamatWk = document.getElementById('Add-AlamatWK').value; 
             var Id_Kelas = document.getElementById('Add-KelasWK').value;
             var NoTelp   = document.getElementById('Add-NoTelpWK').value;      
             var hak_akses= "walikelas";
             var email    = document.getElementById('Add-EmailWK').value;          
             var password = document.getElementById('Add-passwordWK').value;          
             var password_confirmation   = document.getElementById('Add-password_confirmationWK').value;          
            
              $.ajax({
             
                  type:'POST',
                  url:'./WaliKelasAddData',
                  data: {IdWk : IdWk, NamaWk : NamaWk, AlamatWk : AlamatWk, Id_Kelas : Id_Kelas, NoTelp : NoTelp, email:email,hak_akses:hak_akses, password:password, password_confirmation:password_confirmation},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#Walikelas-ModalAddDataWalikelas').modal('hide'); 
                   
                      if (data.status == 'S')
                      {     

                         NamaWkJson = NamaWk.replace(/ /g,"_");
                         AlamatWkJson = AlamatWk.replace(/ /g,"_");
                        
                          var TdIdW = "TdIdW";// table row
                          var TdNma = "TdNma";
                          var TdAlt = "TdAlt";
                          var TdKls = "TdKls";
                          var TdRng = "TdRng";
                          var TdTlp = "TdTlp"; 


                          /*var kodeItemdIdW  = TdIdW.concat(IdWk);
                          var kodeItemNma   = TdNma.concat(NamaWk);
                          var kodeItemAlt   = TdAlt.concat(AlamatWk);
                          var kodeItemKls   = TdKls.concat(data.kelas);
                          var kodeItemRng   = TdRng.concat(data.ruang);
                          var kodeItemTlp   = TdTlp.concat(NoTelp);*/
                       


                          var kodeItemdIdW  = TdIdW.concat(IdWk);
                          var kodeItemNma   = TdNma.concat(IdWk);
                          var kodeItemAlt   = TdAlt.concat(IdWk);
                          var kodeItemKls   = TdKls.concat(IdWk);
                          var kodeItemRng   = TdRng.concat(IdWk);
                          var kodeItemTlp   = TdTlp.concat(IdWk);
                       
                          var DataArray = '{"Id_WaliKelas":"'+IdWk+'","Nama":"'+NamaWkJson+'","Alamat":"'+AlamatWkJson+'","Id_Kelas":"'+Id_Kelas+'","No_Telp":"'+NoTelp+'","email":"'+email+'","password":"'+password+'"}';
                          $('#TbWaliKelas').append('<tr ><td id ='+kodeItemdIdW+' value ='+ IdWk +' >'+IdWk +'</td><td id ='+kodeItemNma+' value ='+ NamaWk +' >'+NamaWk +'</td><td id ='+kodeItemAlt+' value ='+ AlamatWk +' >'+AlamatWk +'</td><td id ='+kodeItemKls+' value ='+ data.kelas +' >'+data.kelas+'</td><td id ='+kodeItemTlp+' value ='+ data.ruang +' >'+data.ruang +'</td><td id ='+kodeItemTlp+' value ='+ NoTelp +' >'+NoTelp +'</td><td><a class="Edit" id="SubmitPageEditWaliKelas" value ='+DataArray+' > Edit </a></td><td><a class="delete" id = "SubmitPageDeleteWaliKelas" value ='+ IdWk +'> Delete </a></td></tr>');
                  
                         // $('#TbWaliKelas').append('<tr ><td id ='+kodeItemdIdW+' value ='+ IdWk +' >'+IdWk +'</td><td id ='+kodeItemNma+' value ='+ NamaWk +' >'+NamaWk +'</td><td id ='+kodeItemAlt+' value ='+ AlamatWk +' >'+AlamatWk +'</td><td id ='+kodeItemKls+' value ='+ data.kelas +' >'+data.kelas+'</td><td id ='+kodeItemTlp+' value ='+ data.ruang +' >'+data.ruang +'</td><td id ='+kodeItemTlp+' value ='+ NoTelp +' >'+NoTelp +'</td><td><a class="Edit" id="SubmitPageEditWaliKelas"> Edit </a></td><td><a class="delete" id = "SubmitPageDeleteWaliKelas" value ='+ IdWk +'> Delete </a></td></tr>');
                  
                      }
                    
                    TampilToast(data.status, data.message);
                                             
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });
        });




      
        $(document).on('click', '#SubmitPageEditWaliKelas', function() { // menampilkan form modal halaman edit walikelas
      

             var KodeWkKelas = $(this).attr('value');          
             var DataWkKelas = JSON.parse(KodeWkKelas);    
             //alert(DataWkKelas);
             DataWkKelas.Nama = DataWkKelas.Nama.replace(/_/g," ");
             DataWkKelas.Alamat = DataWkKelas.Alamat.replace(/_/g," ");

             $('#Walikelas-ModalEditDataWalikelas').modal('show'); 
             var DefaultEditPassword = "inipassword87";

             document.getElementById("Edit-IdWK").value = DataWkKelas.Id_WaliKelas;
             document.getElementById("Edit-NamaWK").value = DataWkKelas.Nama;
             document.getElementById('Edit-KelasWK').value  = DataWkKelas.Id_Kelas;
             document.getElementById("Edit-AlamatWK").value = DataWkKelas.Alamat;
             document.getElementById("Edit-NoTelpWK").value = DataWkKelas.No_Telp;
             document.getElementById('Edit-EmailWK').value = DataWkKelas.email;          
             document.getElementById('Edit-passwordWK').value = DefaultEditPassword;                    
             document.getElementById('Edit-password_confirmationWK').value = DefaultEditPassword;
              //document.getElementById('Edit-passwordWK').value = DataWkKelas.password; 
             //document.getElementById('Edit-password_confirmationWK').value = DataWkKelas.password; 

              var CountDataSelectKelas = document.getElementById('Edit-KelasWK').length;
              if(CountDataSelectKelas < 1)
              {

                     $.ajax({
             
                      type:'POST',
                      url:'./kelasGetListKelas',
                      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                      success: function(data)
                      {
                       
                        var DataKelasRaw;
                        var DataKelasJson;

                        for (i = 0; i < data.length; i++)
                        { 
                            DataKelasRaw = JSON.stringify(data[i]);
                            DataKelasJson = JSON.parse(DataKelasRaw);
                            
                           $('#Edit-KelasWK').append('<option value = '+DataKelasJson.IdKelas+'>'+DataKelasJson.Kelas+' '+DataKelasJson.Ruang+''+'</option>');                     
                        }
                        $("#Edit-KelasWK").val( DataWkKelas.Id_Kelas);
                       
                        
                      },
                      error: function(data)
                      {
                         TampilToast("E", data.responseText);
                      }
                
                      
                 }); 
              }
              else
              {
                $("#Edit-KelasWK").val(DataWkKelas.Id_Kelas);
              }
                  
         
      
        });



        $(document).on('focus', '#Edit-passwordWK', function() { 
            $('#Edit-passwordWK').val('');
 
        });

        $(document).on('focus', '#Edit-password_confirmationWK', function() { 
            $('#Edit-password_confirmationWK').val('');
 
        });


        $(document).on('click', '#btnSubmitEditWaliKelas', function() { // proses menyimpan eidt data  kelas ke db
      
              
             var IdWk        = document.getElementById('Edit-IdWK').value;
             var NamaWk      = document.getElementById('Edit-NamaWK').value;
             var AlamatWk    = document.getElementById('Edit-AlamatWK').value; 
             var Id_Kelas    = document.getElementById('Edit-KelasWK').value;

             var KelasWkTextRaw = $('#Edit-KelasWK').find('option:selected').text();
             var KelasWkTextArray = KelasWkTextRaw.split(" ");

             var NoTelp      = document.getElementById('Edit-NoTelpWK').value;  
             var email       = document.getElementById('Edit-EmailWK').value;          
             var password    = document.getElementById('Edit-passwordWK').value;          
             var password_confirmation   = document.getElementById('Edit-password_confirmationWK').value;          
            
              $.ajax({
             
                  type:'POST',
                  url:'./WaliKelasUpdateData',
                  data: {IdWk : IdWk, NamaWk : NamaWk, AlamatWk : AlamatWk, Id_Kelas : Id_Kelas, NoTelp : NoTelp, email:email, password:password, password_confirmation:password_confirmation},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    $('#Walikelas-ModalEditDataWalikelas').modal('hide'); 
                   
                    if (data.status == 'S')
                    {
                         NamaWkJson = NamaWk.replace(/ /g,"_");
                         AlamatWkJson = AlamatWk.replace(/ /g,"_");
                         
                         var DataArray = '{"Id_WaliKelas":"'+IdWk+'","Nama":"'+NamaWkJson+'","Alamat":"'+AlamatWkJson+'","Id_Kelas":"'+Id_Kelas+'","No_Telp":"'+NoTelp+'","email":"'+email+'","password":"'+password+'"}';         
                          $("a[name='SubmitPageEditWaliKelas"+IdWk+"']").attr('value',DataArray);

                          $('#TdIdW'+IdWk+'').text(IdWk);
                          $('#TdNma'+IdWk+'').text(NamaWk);
                          $('#TdAlt'+IdWk+'').text(AlamatWk);
                          $('#TdKls'+IdWk+'').text(KelasWkTextArray[0]);
                          $('#TdRng'+IdWk+'').text(KelasWkTextArray[1]); 
                          $('#TdTlp'+IdWk+'').text(NoTelp);
                    }
                   
                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
                  
             });
      
        });


        $(document).on('click', '#SubmitPageDeleteWaliKelas', function() { // proses menghapus data walikelas dari database
      
             var IdWalikelas = $(this).attr('value');           
                
              $.ajax({
             
                  type:'POST',
                  url:'./WaliKelasDeleteData',
                  data: {IdWalikelas : IdWalikelas},
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


