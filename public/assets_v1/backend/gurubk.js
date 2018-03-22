$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


        $(document).on('click', '#SubmitPageAddGuruBk', function() { // menampilkan form modal halaman tambah guru bk
                  
             $('#GuruBk-ModalAddDataGuruBk').modal('show');        
        });


        $(document).on('change', '#Add-IdBK', function() { // menampilkan form modal halaman  tambah guru
             
            var IdBK = document.getElementById('Add-IdBK').value;   


                var PasswordValue = null;
                if ( IdBK.length <6)
                {   
                     PasswordValue = IdBK;

                    for(var i = 0; PasswordValue.length<=6; i++)
                    {
                        PasswordValue = PasswordValue + "x";

                    }
                }
                else
                {
                    PasswordValue =  IdBK;
                }


            document.getElementById('Add-password').value = PasswordValue;
            document.getElementById('Add-password_confirmation').value = PasswordValue;
        });

       


       $(document).on('click', '#btnSubmitAddKGuruBK', function() { // proses menyimpan data baru kelas ke db
      
             
             var IdBK     = document.getElementById('Add-IdBK').value;
             var NamaBK   = document.getElementById('Add-NamaBK').value;
             var AlamatBK = document.getElementById('Add-AlamatBK').value;
             var NoTelpBK = document.getElementById('Add-NoTelpBK').value;
             var Email    = document.getElementById('Add-Email').value;
             var hak_akses = "gurubk";

             var password = document.getElementById('Add-password').value;    
             var password_confirmation = document.getElementById('Add-password_confirmation').value;
             

           
              $.ajax({
             
                  type:'POST',
                  url:'./GuruBkAddData',
                  data: {IdBK : IdBK, NamaBK : NamaBK,AlamatBK :AlamatBK, NoTelpBK:NoTelpBK, Email:Email,hak_akses:hak_akses, password:password, password_confirmation:password_confirmation },
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#GuruBk-ModalAddDataGuruBk').modal('hide'); 
                                        

                    if (data.status == 'S')
                    {     


                      var NamaBKJson   = NamaBK.replace(/ /g,"_");
                      var AlamatBKJson = AlamatBK.replace(/ /g,"_");
                      
                      var TdIdBk   = "TdIdBk";
                      var TdNmBk   = "TdNmBk";
                      var TdAlmtBk = "TdAlmtBk"; 
                      var TdTelpBk = "TdTelpBk";
                      var TdEmailBk = "TdEmailBk";

                      var kodeItemdIdBk  = TdIdBk.concat(IdBK);
                      var kodeItemNmBk   = TdNmBk.concat(IdBK);
                      var kodeItemAlmtBk = TdAlmtBk.concat(IdBK);
                      var kodeItemTelpBk = TdTelpBk.concat(IdBK);
                      var kodeItemEmailBk = TdTelpBk.concat(IdBK);
                      
                       var DataArray =  '{"Id_GuruBK":"'+IdBK+'","Nama":"'+NamaBKJson+'","Alamat":"'+AlamatBKJson+'","No_Telp":"'+NoTelpBK+'","email":"'+Email+'","password":"'+password+'"}';
                          
                      $('#TbGuruBk').append('<tr ><td id ='+kodeItemdIdBk+' >'+ IdBK +'</td><td id ='+kodeItemNmBk+'>'+ NamaBK +'</td><td id ='+kodeItemAlmtBk+'>'+ AlamatBK +'</td><td id ='+kodeItemTelpBk+'>'+ NoTelpBK +'</td><td><a class="Edit" id="SubmitPageEditGuruBK" name = "SubmitPageEditGuruBK'+IdBK+'" value ='+DataArray+'> Edit </a></td><td><a class="delete" id = "SubmitPageDeleteGuruBK" value ='+ IdBK +'> Delete </a></td></tr>');
                     
                      $(this).find("input,textarea,select").val('').end();
                     
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
        });


        $(document).on('focus', '#Edit-password', function() { 
            $('#Edit-password').val('');
 
        });

        $(document).on('focus', '#Edit-password_confirmation', function() { 
            $('#Edit-password_confirmation').val('');
 
        });


        //$(document).on('click', '#SubmitPageEditGuruBK', function()
        $(document).on('click', '#SubmitPageEditGuruBK', function() { // menampilkan form modal halaman edit kelas
             
            //var DataGuruBkRaw   = $(this).attr('value'); 
            var DataGuruBkRaw   = $(this).attr("value");  
            var DataGuruBkArray = JSON.parse(DataGuruBkRaw); 
            var DefaultEditPassword = "inipassword87";
            DataGuruBkArray.Nama   =  DataGuruBkArray.Nama.replace(/_/g," ");
            DataGuruBkArray.Alamat =  DataGuruBkArray.Alamat.replace(/_/g," ");

            $('#GuruBk-ModalEditDataGuruBk').modal('show');              

            document.getElementById('Edit-IdBK').value     = DataGuruBkArray.Id_GuruBK;
            document.getElementById('Edit-NamaBK').value   = DataGuruBkArray.Nama;
            document.getElementById('Edit-AlamatBK').value = DataGuruBkArray.Alamat;
            document.getElementById('Edit-NoTelpBK').value = DataGuruBkArray.No_Telp;  
            document.getElementById('Edit-Email').value    = DataGuruBkArray.email; 
            document.getElementById('Edit-password').value = DefaultEditPassword;  
            document.getElementById('Edit-password_confirmation').value = DefaultEditPassword;     
            //document.getElementById('Edit-password').value = DataGuruBkArray.password;           
            //document.getElementById('Edit-password_confirmation').value = DataGuruBkArray.password;             
     
        });


        $(document).on('click', '#btnSubmitEditGuruBK', function() { // proses menyimpan eidt data  kelas ke db
      
              
           /*  if()
             {


             }*/

             var IdBK     = document.getElementById('Edit-IdBK').value;
             var NamaBK   = document.getElementById('Edit-NamaBK').value;
             var AlamatBK = document.getElementById('Edit-AlamatBK').value;
             var NoTelpBK = document.getElementById('Edit-NoTelpBK').value;
             var Email    = document.getElementById('Edit-Email').value;
             var password = document.getElementById('Edit-password').value;    
             var password_confirmation = document.getElementById('Edit-password_confirmation').value;

              $.ajax({
             
                  type:'POST',
                  url:'./GuruBkUpdateData',
                  data: {IdBK : IdBK, NamaBK : NamaBK,AlamatBK :AlamatBK, NoTelpBK:NoTelpBK, Email:Email, password:password, password_confirmation:password_confirmation },
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    $('#GuruBk-ModalEditDataGuruBk').modal('hide'); 
                   
                    if (data.status == 'S')
                    {    

                          var DataArray =  '{"Id_GuruBK":"'+IdBK+'","Nama":"'+NamaBK+'","Alamat":"'+AlamatBK+'","No_Telp":"'+NoTelpBK+'","email":"'+Email+'","password":"'+password+'"}';
                          
                         // $('#SubmitPageEditGuruBK'+IdBK+'').attr('value',DataArray);

                          $("a[name='SubmitPageEditGuruBK"+IdBK+"']").attr('value',DataArray);

                          $('#TdIdBk'+IdBK+'').text(IdBK);
                          $('#TdNmBk'+IdBK+'').text(NamaBK);
                          $('#TdAlmtBk'+IdBK+'').text(AlamatBK);
                          $('#TdTelpBk'+IdBK+'').text(NoTelpBK);


                    }
                   
                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
                  
             });
      
        });

        $(document).on('click', '#SubmitPageDeleteGuruBK', function() { // proses menghapus data dari database
      
             var IdBK = $(this).attr('value');           
            
              $.ajax({
             
                  type:'POST',
                  url:'./GuruBkDeleteData',
                  data: {IdBK : IdBK},
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


