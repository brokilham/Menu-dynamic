$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.



        $(document).on('click', '#SubmitPageAddKegiatanLangsung', function() { 
          var IdUser = document.getElementById('IdUser').innerText;  
            $.ajax({
             
                  type:'POST',
                  url:'./RelGetJadwalBimbingan',
                  data: {XId_GuruBK : IdUser},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                      // alert(data);
                       $('#Realisasi-ModalAddDataKegiatanLangsung').modal('show'); 
                       if(data.length > 0)
                        {

                             //alert(CountDataSelectKelas);
                           
                              for (i = 0; i < data.length; i++)
                              { 
                                DataJadwalRaw = JSON.stringify(data[i]);
                                DataJadwalJson = JSON.parse(DataJadwalRaw);
                                //alert(DataJadwalJson.Kode_Jadwal);
                                $('#Add-JadwalBK').append('<option value = '+DataJadwalJson.Kode_Jadwal+'>'+DataJadwalJson.Hari+' '+DataJadwalJson.JamMulai+'-'+DataJadwalJson.JamSelesai+''+'</option>');                   
                              }
                               $('#Walikelas-ModalAddDataWalikelas').modal('show');   
                            
                          
                           
                          
                        }     

                                            
                  }
                  
                  
             });
                 
        });


         $(document).on('click', '#btnSubmitAddRealisasiLangsung', function() { 
                  var XIdSiswa = document.getElementById('Add-IdSiswa').value;  
                  var XKodeJadwal = document.getElementById("Add-JadwalBK").value;
                  var XTopik = document.getElementById('Add-TopikBimbingan').value; 
                  //var XWaktuRenJanji = document.getElementById('Add-IdSiswa').value;  <-- didapatkan dari Add-JadwalBK
              
                  $.ajax({
                     
                          type:'POST',
                          url:'./RelInsertKegiatanLangsung',
                          data: {XIdSiswa : XIdSiswa,XKodeJadwal:XKodeJadwal,XTopik:XTopik},
                          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                          success: function(data)
                          {
                              
                               $('#Realisasi-ModalAddDataKegiatanLangsung').modal('hide');                             
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


