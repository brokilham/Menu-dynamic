$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.

     

        $(document).on('change', '#inputgambarAdd', function() {

            if (this.files && this.files[0])
            {
             
                var reader = new FileReader();

                reader.onload = function (e) 
                {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function() 
                    {
                       //alert("width : " + image.width + " height : " + image.height);   
                        if(image.width <=1000 && image.height <=1000)
                        {
                            $('#showgambarAdd').attr('src', e.target.result);          
                        }
                        else
                        {
                           alert("gambar maksimal berukuran 1000 x 1000");                       
                        }
                    };
                  
                  
                }

                reader.readAsDataURL(this.files[0]);
            }

            
              

        });

           $(document).on('change', '#Edit-Foto', function() {

            if (this.files && this.files[0])
            {
             
                var reader = new FileReader();

                reader.onload = function (e) 
                {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function() 
                    {
                       //alert("width : " + image.width + " height : " + image.height);   
                        if(image.width <=1000 && image.height <=1000)
                        {
                            $('#showgambar').attr('src', e.target.result);          
                        }
                        else
                        {
                           alert("gambar maksimal berukuran 1000 x 1000");                       
                        }
                    };
                  
                  
                }

                reader.readAsDataURL(this.files[0]);
            }

            
              

        });




    

        $(document).on('click', '#SubmitPageDetailSiswa', function() { // menampilkan form detail data siswa
             var DataSiswaRaw = $(this).attr('value');     
             //alert(DataSiswaRaw);     
             //alert(DataSiswaRaw);
             var DataSiswaJson = JSON.parse(DataSiswaRaw);    
             
             DataSiswaJson.Nama_siswa = DataSiswaJson.Nama_siswa.replace(/_/g," ");
             DataSiswaJson.Alamat_siswa = DataSiswaJson.Alamat_siswa.replace(/_/g," ");
             DataSiswaJson.Nama_WaliMurid = DataSiswaJson.Nama_WaliMurid.replace(/_/g," ");
             DataSiswaJson.Alamat_WaliMurid = DataSiswaJson.Alamat_WaliMurid.replace(/_/g," ");
         
             $('#Siswa-ModalDetailDataSiswa').modal('show');        

               //$('#Detail-IdSiswa').text(DataSiswaJson.Id_Siswa);
                document.getElementById("Detail-IdSiswa").value = DataSiswaJson.Id_Siswa;
                document.getElementById("Detail-NamaSiswa").value = DataSiswaJson.Nama_siswa;
                document.getElementById("Detail-JenisKelamin").value = DataSiswaJson.Jenis_Kelamin;
                document.getElementById("Detail-Foto").value = DataSiswaJson.Path_Foto_siswa;
                document.getElementById("Detail-AlamatSiswa").value = DataSiswaJson.Alamat_siswa;
                document.getElementById("Detail-Kelas").value = DataSiswaJson.Kelas;
                document.getElementById("Detail-Ruang").value = DataSiswaJson.Ruang;
                document.getElementById("Detail-IdWaliMurid").value = DataSiswaJson.Id_WaliMurid;
                document.getElementById("Detail-NamaWaliMurid").value = DataSiswaJson.Nama_WaliMurid;
                document.getElementById("Detail-AlamatWaliMurid").value = DataSiswaJson.Alamat_WaliMurid;
                document.getElementById("Detail-PekerjaanWaliMurid").value = DataSiswaJson.Pekerjaan_WaliMurid;
                document.getElementById("Detail-NoTelpWaliMurid").value = DataSiswaJson.No_Telp_WaliMurid;
                document.getElementById("showgambarDetail").src = "http://localhost:9090/SisManajemenBK/Sisbk/public/images/"+DataSiswaJson.Path_Foto_siswa;
                document.getElementById('PrindDetailSiswa').href  = "PrintDetailMasterSiswa/"+DataSiswaJson.Id_Siswa;

                
//href=" "
                //document.getElementById("imageid").src="../template/save.png";
               // alert(DataSiswaJson);
        });



        $(document).on('click', '#SubmitPageAddSiswa', function() { // menampilkan form Add data siswa     


            var CountDataSelectKelas = document.getElementById('Add-KelasSiswa').length;
            if(CountDataSelectKelas<1)
            {

               $.ajax({
             
                  type:'POST',
                  url:'./siswaListKelasWithWaliKelas',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                      var DataKelasRaw;
                      var DataKelasJson;
                      if(data.length > 0)
                      {
                          $('#Siswa-ModalAddDataSiswa').modal('show');   
                          for (i = 0; i < data.length; i++)
                          { 
                            DataKelasRaw = JSON.stringify(data[i]);
                            DataKelasJson = JSON.parse(DataKelasRaw);
                            
                           $('#Add-KelasSiswa').append('<option value = '+DataKelasJson.Id_WaliKelas+'|'+DataKelasJson.Kelas+'|'+DataKelasJson.Ruang+'>'+DataKelasJson.Kelas+' '+DataKelasJson.Ruang+''+'</option>');
                     
                          }
                      }
                      else
                      {
                        TampilToast("E", "Master data kelas atau walikelas ada yang kosong");

                      }
                      document.getElementById("submit_form").reset();
                      
                

                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
                });   
            }
            else
            {
                $('#Siswa-ModalAddDataSiswa').modal('show');   
            }
                     
        });


         $(document).on('change', '#Add-IdSiswa', function() { // create default password siswa
             
            var IdSiswa = document.getElementById('Add-IdSiswa').value;   


                var PasswordValue = null;
                if ( IdSiswa.length <6)
                {   
                     PasswordValue = IdSiswa;

                    for(var i = 0; PasswordValue.length<=6; i++)
                    {
                        PasswordValue = PasswordValue + "x";

                    }
                }
                else
                {
                    PasswordValue =  IdSiswa;
                }


            document.getElementById('Add-PasswordSiswa').value = PasswordValue;
            document.getElementById('Add-PasswordConfirmSiswa').value = PasswordValue;
        });




        /*$(document).on('click', '#btnPrintDetailSiswa', function() { // proses menyimpan data siswa dari database
      
          //alert("tes");
             $.ajax({
             
                  type:'POST',
                  url:'./PrintDetailMasterSiswa',
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  async: true,
                  data:  new FormData($("#submit_form_detail")[0]),
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
              });

        });*/

        $(document).on('click', '#btnSubmitAdd', function() { // proses menyimpan data siswa dari database
      
  
      
                  $.ajax({
             
                  type:'POST',
                  url:'./siswaAddData',
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  async: true,
                  data:  new FormData($("#submit_form")[0]),
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#Siswa-ModalAddDataSiswa').modal('hide'); 
                    
                    if (data.status == 'S')
                    {     
                        XNAMA_SISWAJson = data.XNAMA_SISWA.replace(/ /g,"_");
                        XALAMAT_SISWAJson = data.XALAMAT_SISWA.replace(/ /g,"_");
                        XNAMA_WALIMURIDJson = data.XNAMA_WALIMURID.replace(/ /g,"_");
                        XALAMAT_WALIMURIDJson = data.XALAMAT_WALIMURID.replace(/ /g,"_");
                        

                        var tdNoInduk = "tdNoInduk";
                        var tdNmSiswa = "tdNmSiswa";
                        var tdKlsSiswa = "tdKlsSiswa"; // table row
                        var tdRuangSiswa = "tdRuangSiswa"; // table row

                        var kdNoInduk = tdNoInduk.concat(data.XID_SISWA);
                        var kdNmSiswa = tdNmSiswa.concat(data.XID_SISWA);
                        var kdKlsSiswa = tdKlsSiswa.concat(data.XID_SISWA);
                        var kdRuangSiswa = tdRuangSiswa.concat(data.XID_SISWA);

                      
                         var DataArray = '{"Id_Siswa":"'+data.XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWAJson+'","Jenis_Kelamin":"'+data.XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWAJson+'","Path_Foto_siswa":"'+data.XPATH_FOTO+'","Kelas":"'+data.KELAS+'","Ruang":"'+data.RUANG+'","Id_WaliMurid":"'+data.Id_WaliMurid+'","Nama_WaliMurid":"'+XNAMA_WALIMURIDJson+'","Alamat_WaliMurid":"'+XALAMAT_SISWAJson+'","Pekerjaan_WaliMurid":"'+data.XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+data.XNO_TELP+'","Id_WaliKelas":"'+data.XID_WALIKELAS+'"}';
             
                        $('#TbSiswa').append('<tr><td  id ='+kdNoInduk+'>'+ data.XID_SISWA +'</td><td id ='+kdNmSiswa+'>'+ data.XNAMA_SISWA +'</td><td id = '+kdKlsSiswa+'>'+ data.KELAS +'</td><td id ='+kdRuangSiswa+'>'+ data.RUANG +'</td><td><a class="Detail" id="SubmitPageDetailSiswa" value ='+DataArray+'> Detail </a></td><td><a class="Edit" id="SubmitPageEditSiswa" value ='+DataArray+' > Edit </a></td><td><a class="delete" id = "SubmitPageDeleteSiswa" value ='+ data.XID_SISWA +'> Delete </a></td></tr>');
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




 /*$(document).on('click', '#btnSubmitAdd', function() { // proses menyimpan data siswa dari database
      
  
              var XID_SISWA         = document.getElementById("Add-IdSiswa").value;
              var XID_WALIKELAS     = document.getElementById("Add-KelasSiswa").value;
              var XID_WALIKELASText = $('#Add-KelasSiswa').find('option:selected').text();
              var XNO_TELP          = document.getElementById("Add-NoTelp").value;
              var XPEKER_WALIMURID  = document.getElementById("Add-PekerWaliMurid").value;
              var XNAMA_SISWA       = document.getElementById("Add-NamaSiswa").value;
              var XALAMAT_SISWA     = document.getElementById("Add-AlamatSiswa").value;
              var XJENIS_KELAMIN    = document.getElementById("Add-JenisKelamin").value;

              var XHAKAKSES_SISWA   = "siswa";
              var XEMAIL_SISWA      = document.getElementById("Add-EmailSiswa").value;
              var XPASSWORD_SISWA   = document.getElementById("Add-PasswordSiswa").value;
              var XPASSWORDCONFIRM_SISWA     = document.getElementById("Add-PasswordConfirmSiswa").value;
            

              var XNAMA_WALIMURID   = document.getElementById("Add-NamaWaliMurid").value;
              var XALAMAT_WALIMURID = document.getElementById("Add-AlamatWaliMurid").value;
              var XPATH_FOTO        = document.getElementById("Add-FotoSiswa").value;     

              var XHAKAKSES_WALIMURID = "walimurid";
              var XEMAIL_WALIMURID    = document.getElementById("Add-EmailWaliMurid").value; 
          
              if(XEMAIL_WALIMURID == null)
              {
                XEMAIL_WALIMURID = XID_WALIKELAS;

              } 
          
              var XID_WALIKELASArray = XID_WALIKELASText.split(" ");
             
                     
              $.ajax({
             
                  type:'POST',
                  url:'./siswaAddData',
                  data: {XID_SISWA : XID_SISWA, XID_WALIKELAS : XID_WALIKELAS, XNO_TELP : XNO_TELP, XPEKER_WALIMURID : XPEKER_WALIMURID , XNAMA_SISWA : XNAMA_SISWA, XALAMAT_SISWA : XALAMAT_SISWA,XHAKAKSES_SISWA : XHAKAKSES_SISWA,XPASSWORDCONFIRM_SISWA:XPASSWORDCONFIRM_SISWA, XEMAIL_SISWA : XEMAIL_SISWA,XPASSWORD_SISWA:XPASSWORD_SISWA, XNAMA_WALIMURID : XNAMA_WALIMURID, XALAMAT_WALIMURID : XALAMAT_WALIMURID,XHAKAKSES_WALIMURID:XHAKAKSES_WALIMURID,XEMAIL_WALIMURID:XEMAIL_WALIMURID, XJENIS_KELAMIN : XJENIS_KELAMIN, XPATH_FOTO : XPATH_FOTO},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#Siswa-ModalAddDataSiswa').modal('hide'); 
                   
                    if (data.status == 'S')
                    {     
                        XNAMA_SISWAJson = XNAMA_SISWA.replace(/ /g,"_");
                        XALAMAT_SISWAJson = XALAMAT_SISWA.replace(/ /g,"_");
                        XNAMA_WALIMURIDJson = XNAMA_WALIMURID.replace(/ /g,"_");
                        XALAMAT_WALIMURIDJson = XALAMAT_WALIMURID.replace(/ /g,"_");
                        

                        var tdNoInduk = "tdNoInduk";
                        var tdNmSiswa = "tdNmSiswa";
                        var tdKlsSiswa = "tdKlsSiswa"; // table row
                        var tdRuangSiswa = "tdRuangSiswa"; // table row

                        var kdNoInduk = tdNoInduk.concat(XID_SISWA);
                        var kdNmSiswa = tdNmSiswa.concat(XID_SISWA);
                        var kdKlsSiswa = tdKlsSiswa.concat(XID_SISWA);
                        var kdRuangSiswa = tdRuangSiswa.concat(XID_SISWA);

                      
                        var DataArray = '{"Id_Siswa":"'+XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWAJson+'","Jenis_Kelamin":"'+XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWAJson+'","Path_Foto_siswa":"'+XPATH_FOTO+'","Kelas":"'+XID_WALIKELASArray[0]+'","Ruang":"'+XID_WALIKELASArray[1]+'","Id_WaliMurid":"'+data.Id_WaliMurid+'","Nama_WaliMurid":"'+XNAMA_WALIMURIDJson+'","Alamat_WaliMurid":"'+XALAMAT_SISWAJson+'","Pekerjaan_WaliMurid":"'+XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+XNO_TELP+'","Id_WaliKelas":"'+XID_WALIKELAS+'"}';
             
                        $('#TbSiswa').append('<tr><td  id ='+kdNoInduk+'>'+ XID_SISWA +'</td><td id ='+kdNmSiswa+'>'+ XNAMA_SISWA +'</td><td id = '+kdKlsSiswa+'>'+ XID_WALIKELASArray[0] +'</td><td id ='+kdRuangSiswa+'>'+ XID_WALIKELASArray[1] +'</td><td><a class="Detail" id="SubmitPageDetailSiswa" value ='+DataArray+'> Detail </a></td><td><a class="Edit" id="SubmitPageEditSiswa" value ='+DataArray+' > Edit </a></td><td><a class="delete" id = "SubmitPageDeleteSiswa" value ='+ XID_SISWA +'> Delete </a></td></tr>');
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

        });*/

        $(document).on('click', '#SubmitPageEditSiswa', function() { // menampilkan form edit data siswa
             var DataSiswaRaw = $(this).attr('value');          
             var DataSiswaJson = JSON.parse(DataSiswaRaw);    
             
             DataSiswaJson.Nama_siswa = DataSiswaJson.Nama_siswa.replace(/_/g," ");
             DataSiswaJson.Alamat_siswa = DataSiswaJson.Alamat_siswa.replace(/_/g," ");
             DataSiswaJson.Nama_WaliMurid = DataSiswaJson.Nama_WaliMurid.replace(/_/g," ");
             DataSiswaJson.Alamat_WaliMurid = DataSiswaJson.Alamat_WaliMurid.replace(/_/g," ");


              $('#Siswa-ModalEditDataSiswa').modal('show');        

                document.getElementById("Edit-IdSiswa").value = DataSiswaJson.Id_Siswa;
                document.getElementById("Edit-NamaSiswa").value = DataSiswaJson.Nama_siswa;
                $("#Edit-JenisKelamin").val( DataSiswaJson.Jenis_Kelamin);
                
                //document.getElementById("Edit-Foto").value =  DataSiswaJson.Path_Foto_siswa ;
                document.getElementById("showgambar").src = "http://localhost:9090/SisManajemenBK/Sisbk/public/images/"+DataSiswaJson.Path_Foto_siswa;
                //document.getElementById("Edit-Foto").value =  "http://localhost:9090/SisManajemenBK/Sisbk/public/images/"+DataSiswaJson.Path_Foto_siswa;

               // alert(DataSiswaJson.Path_Foto_siswa);

                document.getElementById("Edit-AlamatSiswa").value = DataSiswaJson.Alamat_siswa;
                document.getElementById("Edit-IdWaliMurid").value = DataSiswaJson.Id_WaliMurid;
                document.getElementById("Edit-NamaWaliMurid").value = DataSiswaJson.Nama_WaliMurid;
                document.getElementById("Edit-AlamatWaliMurid").value = DataSiswaJson.Alamat_WaliMurid;
                document.getElementById("Edit-PekerjaanWaliMurid").value = DataSiswaJson.Pekerjaan_WaliMurid;
                document.getElementById("Edit-NoTelpWaliMurid").value = DataSiswaJson.No_Telp_WaliMurid;
               
               
                GetKelasList(DataSiswaJson.Id_WaliKelas);
                GetUserData(DataSiswaJson.Id_Siswa,DataSiswaJson.Id_WaliMurid);
        });


        /*$(document).on('click', '#SubmitPageEditSiswa', function() { // menampilkan form edit data siswa
             var DataSiswaRaw = $(this).attr('value');          
             var DataSiswaJson = JSON.parse(DataSiswaRaw);    
             
             DataSiswaJson.Nama_siswa = DataSiswaJson.Nama_siswa.replace(/_/g," ");
             DataSiswaJson.Alamat_siswa = DataSiswaJson.Alamat_siswa.replace(/_/g," ");
             DataSiswaJson.Nama_WaliMurid = DataSiswaJson.Nama_WaliMurid.replace(/_/g," ");
             DataSiswaJson.Alamat_WaliMurid = DataSiswaJson.Alamat_WaliMurid.replace(/_/g," ");


              $('#Siswa-ModalEditDataSiswa').modal('show');        

                document.getElementById("Edit-IdSiswa").value = DataSiswaJson.Id_Siswa;
                document.getElementById("Edit-NamaSiswa").value = DataSiswaJson.Nama_siswa;
                $("#Edit-JenisKelamin").val( DataSiswaJson.Jenis_Kelamin);
                //document.getElementById("Edit-Foto").value = DataSiswaJson.Path_Foto_siswa;
                document.getElementById("Edit-AlamatSiswa").value = DataSiswaJson.Alamat_siswa;
               
              

                document.getElementById("Edit-IdWaliMurid").value = DataSiswaJson.Id_WaliMurid;
                document.getElementById("Edit-NamaWaliMurid").value = DataSiswaJson.Nama_WaliMurid;
                document.getElementById("Edit-AlamatWaliMurid").value = DataSiswaJson.Alamat_WaliMurid;
                document.getElementById("Edit-PekerjaanWaliMurid").value = DataSiswaJson.Pekerjaan_WaliMurid;
                document.getElementById("Edit-NoTelpWaliMurid").value = DataSiswaJson.No_Telp_WaliMurid;
               
                
                GetKelasList(DataSiswaJson.Id_WaliKelas);
                GetUserData(DataSiswaJson.Id_Siswa,DataSiswaJson.Id_WaliMurid);
        });*/

        function GetKelasList(XID_WALIKELAS) {


              var CountDataSelectKelas = document.getElementById('Edit-KelasSiswa').length;
              /*if(CountDataSelectKelas<1)
              {*/ 
                $.ajax({
             
                  type:'POST',
                  url:'./siswaListKelasWithWaliKelas',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    var DataKelasRaw;
                    var DataKelasJson;
                    var kelas, ruang;
                    //alert(data.length);


                    for (i = 0; i < data.length; i++)
                    { 
                        DataKelasRaw = JSON.stringify(data[i]);
                        DataKelasJson = JSON.parse(DataKelasRaw);
                        if(CountDataSelectKelas<data.length)
                        {
                          $('#Edit-KelasSiswa').append('<option value = '+DataKelasJson.Id_WaliKelas+'|'+DataKelasJson.Kelas+'|'+DataKelasJson.Ruang+'>'+DataKelasJson.Kelas+' '+DataKelasJson.Ruang+''+'</option>');                       
                        }
                       
                      if(XID_WALIKELAS == DataKelasJson.Id_WaliKelas)
                      {
                        kelas = DataKelasJson.Kelas;
                        ruang = DataKelasJson.Ruang;
                      }
                    }
                      //alert(XID_WALIKELAS+'|'+kelas+'|'+ruang);
                     $("#Edit-KelasSiswa").val(XID_WALIKELAS+'|'+kelas+'|'+ruang);
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
                });    
             /* }
              else
              {
                $("#Edit-KelasSiswa").val(XID_WALIKELAS);
              }*/
        }


        function GetUserData(XID_SISWA,XID_WALIKELAS) {

              var DefaultEditPassword = "inipassword87";

               $.ajax({
             
                  type:'POST',
                  url:'./GetUserSiswaWalimurid',
                  data: {XID_SISWA : XID_SISWA, XID_WALIKELAS : XID_WALIKELAS},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                      
                    for (i = 0; i < data.length; i++)
                    { 
      
                        if(data[i].username == XID_SISWA)
                        {
                            document.getElementById("Edit-EmailSiswa").value = data[i].email;
                            document.getElementById("Edit-PassowrdSiswa").value = DefaultEditPassword;
                            document.getElementById("Edit-KonfirmPassowrdSiswa").value =  DefaultEditPassword;
                            /*document.getElementById("Edit-PassowrdSiswa").value =  data[i].password;
                            document.getElementById("Edit-KonfirmPassowrdSiswa").value =  data[i].password;*/
                        }     
                        else if (data[i].username== XID_WALIKELAS)
                        {
                            document.getElementById("Edit-EmailWalimurid").value = data[i].email;
                            document.getElementById("Edit-PassowrdWalimurid").value = DefaultEditPassword;
                            document.getElementById("Edit-KonfirmPassowrdWalimurid").value = DefaultEditPassword;
                            /*document.getElementById("Edit-PassowrdWalimurid").value = data[i].password;
                            document.getElementById("Edit-KonfirmPassowrdWalimurid").value = data[i].password;*/
                        }            
                    }

                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });    
          } 

        $(document).on('focus', '#Edit-PassowrdSiswa', function() { 
            $('#Edit-PassowrdSiswa').val('');
 
        });

        $(document).on('focus', '#Edit-KonfirmPassowrdSiswa', function() { 
            $('#Edit-KonfirmPassowrdSiswa').val('');
 
        });

        $(document).on('focus', '#Edit-PassowrdWalimurid', function() { 
            $('#Edit-PassowrdWalimurid').val('');
 
        });

        $(document).on('focus', '#Edit-KonfirmPassowrdWalimurid', function() { 
            $('#Edit-KonfirmPassowrdWalimurid').val('');
 
        });


        $(document).on('click', '#btnSubmitEditSiswa', function() { // proses mengedit data siswa dari database
              



            /* var XID_SISWA = document.getElementById("Edit-IdSiswa").value ;
             var XID_WALIMURID = document.getElementById("Edit-IdWaliMurid").value ;
             var XID_WALIKELAS = document.getElementById("Edit-KelasSiswa").value;
             var XID_WALIKELASText = $('#Edit-KelasSiswa').find('option:selected').text();
             var XNO_TELP = document.getElementById("Edit-NoTelpWaliMurid").value;
             var XPEKER_WALIMURID = document.getElementById("Edit-PekerjaanWaliMurid").value;
             var XNAMA_SISWA = document.getElementById("Edit-NamaSiswa").value;
             var XALAMAT_SISWA = document.getElementById("Edit-AlamatSiswa").value;
             var XPATH_FOTO = document.getElementById("Edit-Foto").value;
             var XEMAIL_SISWA =  document.getElementById("Edit-EmailSiswa").value;
             var password =  document.getElementById("Edit-PassowrdSiswa").value;
             var password_confirmation =  document.getElementById("Edit-KonfirmPassowrdSiswa").value;
           

             var XNAMA_WALIMURID = document.getElementById("Edit-NamaWaliMurid").value ;
             var XALAMAT_WALIMURID = document.getElementById("Edit-AlamatWaliMurid").value;
             var XJENIS_KELAMIN = document.getElementById("Edit-JenisKelamin").value;          
             var XEMAIL_WALIMURID =  document.getElementById("Edit-EmailWalimurid").value;
             var passwordWM =  document.getElementById("Edit-PassowrdWalimurid").value;
             var passwordWM_confirmation =  document.getElementById("Edit-KonfirmPassowrdWalimurid").value;
    
             var XID_WALIKELASArray = XID_WALIKELASText.split(" ");*/
             



            $.ajax({
             
                  type:'POST',
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  async: true,
                  url:'./siswaUpdateData',
                   data:  new FormData($("#submit_form_edit")[0]),
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                     
                    $('#Siswa-ModalEditDataSiswa').modal('hide');        
                    
                     if (data.status == 'S')
                    {     


                          $('#tdNoInduk'+data.XID_SISWA+'').text(data.XID_SISWA);
                          $('#tdNmSiswa'+data.XID_SISWA+'').text(data.XNAMA_SISWA);
                          $('#tdKlsSiswa'+data.XID_SISWA+'').text(data.KELAS);
                          $('#tdRuangSiswa'+data.XID_SISWA+'').text(data.RUANG);
                          
                          TampilToast(data.status, data.message);

                           var DataArray = '{"Id_Siswa":"'+data.XID_SISWA+'","Nama_siswa":"'+data.XNAMA_SISWA+'","Jenis_Kelamin":"'+data.XJENIS_KELAMIN+'","Alamat_siswa":"'+data.XALAMAT_SISWA+'","Path_Foto_siswa":"'+data.XPATH_FOTO+'","Kelas":"'+data.KELAS+'","Ruang":"'+data.RUANG+'","Id_WaliMurid":"'+data.Id_WaliMurid+'","Nama_WaliMurid":"'+data.XNAMA_WALIMURID+'","Alamat_WaliMurid":"'+data.XALAMAT_SISWA+'","Pekerjaan_WaliMurid":"'+data.XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+data.XNO_TELP+'","Id_WaliKelas":"'+data.XID_WALIKELAS+'"}';
                          $("a[name='SubmitPageDetailSiswa"+data.XID_SISWA+"']").attr('value',DataArray);
                          $("a[name='SubmitPageEditSiswa"+data.XID_SISWA+"']").attr('value',DataArray);
                          $(this).find("input,textarea,select").val('').end();


                        /*XNAMA_SISWAJson = data.XNAMA_SISWA.replace(/ /g,"_");
                        XALAMAT_SISWAJson = data.XALAMAT_SISWA.replace(/ /g,"_");
                        XNAMA_WALIMURIDJson = data.XNAMA_WALIMURID.replace(/ /g,"_");
                        XALAMAT_WALIMURIDJson = data.XALAMAT_WALIMURID.replace(/ /g,"_");
                        

                        var tdNoInduk = "tdNoInduk";
                        var tdNmSiswa = "tdNmSiswa";
                        var tdKlsSiswa = "tdKlsSiswa"; // table row
                        var tdRuangSiswa = "tdRuangSiswa"; // table row

                        var kdNoInduk = tdNoInduk.concat(data.XID_SISWA);
                        var kdNmSiswa = tdNmSiswa.concat(data.XID_SISWA);
                        var kdKlsSiswa = tdKlsSiswa.concat(data.XID_SISWA);
                        var kdRuangSiswa = tdRuangSiswa.concat(data.XID_SISWA);

                      
                         var DataArray = '{"Id_Siswa":"'+data.XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWAJson+'","Jenis_Kelamin":"'+data.XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWAJson+'","Path_Foto_siswa":"'+data.XPATH_FOTO+'","Kelas":"'+data.KELAS+'","Ruang":"'+data.RUANG+'","Id_WaliMurid":"'+data.Id_WaliMurid+'","Nama_WaliMurid":"'+XNAMA_WALIMURIDJson+'","Alamat_WaliMurid":"'+XALAMAT_SISWAJson+'","Pekerjaan_WaliMurid":"'+data.XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+data.XNO_TELP+'","Id_WaliKelas":"'+data.XID_WALIKELAS+'"}';
             
                        $('#TbSiswa').append('<tr><td  id ='+kdNoInduk+'>'+ data.XID_SISWA +'</td><td id ='+kdNmSiswa+'>'+ data.XNAMA_SISWA +'</td><td id = '+kdKlsSiswa+'>'+ data.KELAS +'</td><td id ='+kdRuangSiswa+'>'+ data.RUANG +'</td><td><a class="Detail" id="SubmitPageDetailSiswa" value ='+DataArray+'> Detail </a></td><td><a class="Edit" id="SubmitPageEditSiswa" value ='+DataArray+' > Edit </a></td><td><a class="delete" id = "SubmitPageDeleteSiswa" value ='+ data.XID_SISWA +'> Delete </a></td></tr>');
                        $(this).find("input,textarea,select").val('').end();
                        TampilToast(data.status, data.message);*/
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


                /*    if (data.status == 'S')
                    {
                          $('#tdNoInduk'+XID_SISWA+'').text(XID_SISWA);
                          $('#tdNmSiswa'+XID_SISWA+'').text(XNAMA_SISWA);
                          $('#tdKlsSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[0]);
                          $('#tdRuangSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[1]);
                          
                          TampilToast(data.status, data.message);

                          var DataArray = '{"Id_Siswa":"'+XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWA+'","Jenis_Kelamin":"'+XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWA+'","Path_Foto_siswa":"'+XPATH_FOTO+'","Kelas":"'+XID_WALIKELASArray[0]+'","Ruang":"'+XID_WALIKELASArray[1]+'","Id_WaliMurid":"'+XID_WALIMURID+'","Nama_WaliMurid":"'+XNAMA_WALIMURID+'","Alamat_WaliMurid":"'+XALAMAT_SISWA+'","Pekerjaan_WaliMurid":"'+XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+XNO_TELP+'","Id_WaliKelas":"'+XID_WALIKELAS+'"}';
                          $("a[name='SubmitPageDetailSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $("a[name='SubmitPageEditSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $(this).find("input,textarea,select").val('').end();

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
                    }*/
                         
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });    
               
        });


        // sebelum di tambahin foto
        /*$(document).on('click', '#btnSubmitEditSiswa', function() { // proses mengedit data siswa dari database
              



             var XID_SISWA = document.getElementById("Edit-IdSiswa").value ;
             var XID_WALIMURID = document.getElementById("Edit-IdWaliMurid").value ;
             var XID_WALIKELAS = document.getElementById("Edit-KelasSiswa").value;
             var XID_WALIKELASText = $('#Edit-KelasSiswa').find('option:selected').text();
             var XNO_TELP = document.getElementById("Edit-NoTelpWaliMurid").value;
             var XPEKER_WALIMURID = document.getElementById("Edit-PekerjaanWaliMurid").value;
             var XNAMA_SISWA = document.getElementById("Edit-NamaSiswa").value;
             var XALAMAT_SISWA = document.getElementById("Edit-AlamatSiswa").value;
             var X$(document).on('click', '#btnSubmitEditSiswa', function() { // proses mengedit data siswa dari database
              



             var XID_SISWA = document.getElementById("Edit-IdSiswa").value ;
             var XID_WALIMURID = document.getElementById("Edit-IdWaliMurid").value ;
             var XID_WALIKELAS = document.getElementById("Edit-KelasSiswa").value;
             var XID_WALIKELASText = $('#Edit-KelasSiswa').find('option:selected').text();
             var XNO_TELP = document.getElementById("Edit-NoTelpWaliMurid").value;
             var XPEKER_WALIMURID = document.getElementById("Edit-PekerjaanWaliMurid").value;
             var XNAMA_SISWA = document.getElementById("Edit-NamaSiswa").value;
             var XALAMAT_SISWA = document.getElementById("Edit-AlamatSiswa").value;
             var XPATH_FOTO = document.getElementById("Edit-Foto").value;
             var XEMAIL_SISWA =  document.getElementById("Edit-EmailSiswa").value;
             var password =  document.getElementById("Edit-PassowrdSiswa").value;
             var password_confirmation =  document.getElementById("Edit-KonfirmPassowrdSiswa").value;
           

             var XNAMA_WALIMURID = document.getElementById("Edit-NamaWaliMurid").value ;
             var XALAMAT_WALIMURID = document.getElementById("Edit-AlamatWaliMurid").value;
             var XJENIS_KELAMIN = document.getElementById("Edit-JenisKelamin").value;          
             var XEMAIL_WALIMURID =  document.getElementById("Edit-EmailWalimurid").value;
             var passwordWM =  document.getElementById("Edit-PassowrdWalimurid").value;
             var passwordWM_confirmation =  document.getElementById("Edit-KonfirmPassowrdWalimurid").value;
    
             var XID_WALIKELASArray = XID_WALIKELASText.split(" ");
             
            $.ajax({
             
                  type:'POST',
                  url:'./siswaUpdateData',
                  data: {XID_SISWA : XID_SISWA,XID_WALIMURID:XID_WALIMURID, XID_WALIKELAS : XID_WALIKELAS, XNO_TELP : XNO_TELP, XPEKER_WALIMURID : XPEKER_WALIMURID , XNAMA_SISWA : XNAMA_SISWA, XALAMAT_SISWA : XALAMAT_SISWA,XEMAIL_SISWA:XEMAIL_SISWA,password_confirmation:password_confirmation,password:password, XNAMA_WALIMURID : XNAMA_WALIMURID, XALAMAT_WALIMURID : XALAMAT_WALIMURID, XJENIS_KELAMIN : XJENIS_KELAMIN, XPATH_FOTO : XPATH_FOTO,  XEMAIL_WALIMURID:XEMAIL_WALIMURID,passwordWM_confirmation:passwordWM_confirmation,passwordWM:passwordWM
                  },
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                     
                    $('#Siswa-ModalEditDataSiswa').modal('hide');        
                 
                    if (data.status == 'S')
                    {
                          $('#tdNoInduk'+XID_SISWA+'').text(XID_SISWA);
                          $('#tdNmSiswa'+XID_SISWA+'').text(XNAMA_SISWA);
                          $('#tdKlsSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[0]);
                          $('#tdRuangSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[1]);
                          
                          TampilToast(data.status, data.message);

                          var DataArray = '{"Id_Siswa":"'+XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWA+'","Jenis_Kelamin":"'+XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWA+'","Path_Foto_siswa":"'+XPATH_FOTO+'","Kelas":"'+XID_WALIKELASArray[0]+'","Ruang":"'+XID_WALIKELASArray[1]+'","Id_WaliMurid":"'+XID_WALIMURID+'","Nama_WaliMurid":"'+XNAMA_WALIMURID+'","Alamat_WaliMurid":"'+XALAMAT_SISWA+'","Pekerjaan_WaliMurid":"'+XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+XNO_TELP+'","Id_WaliKelas":"'+XID_WALIKELAS+'"}';
                          $("a[name='SubmitPageDetailSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $("a[name='SubmitPageEditSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $(this).find("input,textarea,select").val('').end();

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
               
        });PATH_FOTO = document.getElementById("Edit-Foto").value;
             var XEMAIL_SISWA =  document.getElementById("Edit-EmailSiswa").value;
             var password =  document.getElementById("Edit-PassowrdSiswa").value;
             var password_confirmation =  document.getElementById("Edit-KonfirmPassowrdSiswa").value;
           

             var XNAMA_WALIMURID = document.getElementById("Edit-NamaWaliMurid").value ;
             var XALAMAT_WALIMURID = document.getElementById("Edit-AlamatWaliMurid").value;
             var XJENIS_KELAMIN = document.getElementById("Edit-JenisKelamin").value;          
             var XEMAIL_WALIMURID =  document.getElementById("Edit-EmailWalimurid").value;
             var passwordWM =  document.getElementById("Edit-PassowrdWalimurid").value;
             var passwordWM_confirmation =  document.getElementById("Edit-KonfirmPassowrdWalimurid").value;
    
             var XID_WALIKELASArray = XID_WALIKELASText.split(" ");
             
            $.ajax({
             
                  type:'POST',
                  url:'./siswaUpdateData',
                  data: {XID_SISWA : XID_SISWA,XID_WALIMURID:XID_WALIMURID, XID_WALIKELAS : XID_WALIKELAS, XNO_TELP : XNO_TELP, XPEKER_WALIMURID : XPEKER_WALIMURID , XNAMA_SISWA : XNAMA_SISWA, XALAMAT_SISWA : XALAMAT_SISWA,XEMAIL_SISWA:XEMAIL_SISWA,password_confirmation:password_confirmation,password:password, XNAMA_WALIMURID : XNAMA_WALIMURID, XALAMAT_WALIMURID : XALAMAT_WALIMURID, XJENIS_KELAMIN : XJENIS_KELAMIN, XPATH_FOTO : XPATH_FOTO,  XEMAIL_WALIMURID:XEMAIL_WALIMURID,passwordWM_confirmation:passwordWM_confirmation,passwordWM:passwordWM
                  },
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                     
                    $('#Siswa-ModalEditDataSiswa').modal('hide');        
                 
                    if (data.status == 'S')
                    {
                          $('#tdNoInduk'+XID_SISWA+'').text(XID_SISWA);
                          $('#tdNmSiswa'+XID_SISWA+'').text(XNAMA_SISWA);
                          $('#tdKlsSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[0]);
                          $('#tdRuangSiswa'+XID_SISWA+'').text(XID_WALIKELASArray[1]);
                          
                          TampilToast(data.status, data.message);

                          var DataArray = '{"Id_Siswa":"'+XID_SISWA+'","Nama_siswa":"'+XNAMA_SISWA+'","Jenis_Kelamin":"'+XJENIS_KELAMIN+'","Alamat_siswa":"'+XALAMAT_SISWA+'","Path_Foto_siswa":"'+XPATH_FOTO+'","Kelas":"'+XID_WALIKELASArray[0]+'","Ruang":"'+XID_WALIKELASArray[1]+'","Id_WaliMurid":"'+XID_WALIMURID+'","Nama_WaliMurid":"'+XNAMA_WALIMURID+'","Alamat_WaliMurid":"'+XALAMAT_SISWA+'","Pekerjaan_WaliMurid":"'+XPEKER_WALIMURID+'","No_Telp_WaliMurid":"'+XNO_TELP+'","Id_WaliKelas":"'+XID_WALIKELAS+'"}';
                          $("a[name='SubmitPageDetailSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $("a[name='SubmitPageEditSiswa"+XID_SISWA+"']").attr('value',DataArray);
                          $(this).find("input,textarea,select").val('').end();

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
               
        });*/

     $(document).on('click', '#SubmitPageDeleteSiswa', function() { // proses menghapus data siswa dari database
      
             var Id_Siswa = $(this).attr('value');           
                
              $.ajax({
             
                  type:'POST',
                  url:'./siswaDeleteData',
                  data: {Id_Siswa : Id_Siswa},
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


