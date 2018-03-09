


$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.

   
       
        $(document).on('click', '#SubmitPageAddKJadwal', function() { // menampilkan form modal halaman tambah kelas
                  
             $('#Jadwal-ModalAddDataJadwal').modal('show');        
        });

        var clickCount
        $(document).on('click', '#btnSubmitAddjadwal', function()
        { // menampilkan form modal halaman tambah kelas
                  
          //var IdGuruBK = "234"; // ini nanti mengambil ketika user login

          var IdGuruBK = document.getElementById('Add-IdBK').value;
          var Hari     = document.getElementById('Add-Hari').value;
          var Jam      = document.getElementById('Add-Jam').value;
             
          $.ajax({
             
                  type:'POST',
                  url:'./JadwalAddData',
                  data: {IdGuruBK : IdGuruBK, Hari : Hari, Jam : Jam},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                    $('#Jadwal-ModalAddDataJadwal').modal('hide'); 
                   
                    if (data.status == 'S')
                    {     
                                
                      $('#TbJadwal').append('<tr ><td id ="'+data.IdJadwal+'"" >'+ data.IdJadwal +'</td><td >'+ Hari +'</td><td>'+data.JamMulai+'-'+data.JamSelesai+'</td><td>'+data.NamaGuruBk+'</td><td>'+data.NoTelpGuruBk+'</td><td><a class="delete" id = "SubmitPageDeleteJadwal" value ='+ data.IdJadwal +'> Delete </a></td></tr>');        
                    }

                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
             });      
        });

        


      $(document).on('click', '#SubmitPageDeleteJadwal', function() { // proses menghapus data dari database
      
             var KodeJadwal = $(this).attr('value');           
                
              $.ajax({
             
                  type:'POST',
                  url:'./JadwalDeleteData',
                  data: {KodeJadwal : KodeJadwal},
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


$(document).ready(function()
{    // get data froms spann 
     var IdGuruBKVal = document.getElementById('IdUser').innerText; // yang benar
    //var IdGuruBKVal = document.getElementById('IdUser').Text; // yang salah
   
      $.ajax({
             
                  type:'POST',
                  url:'./GetAllTableDataById',
                  data: {IdGuruBK : IdGuruBKVal},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                                       
                    if (data.status == 'S')
                    {     
                      //alert(data.message);
                      for (i = 0; i < data.message.length; i++)
                      { 
                        DataKelasRaw = JSON.stringify(data.message[i]);
                        DataKelasJson = JSON.parse(DataKelasRaw);
                         //$('#TbJadwal').append('<tr ><td id ="'+DataKelasRaw.IdJadwal+'"" >'+ DataKelasRaw.IdJadwal +'</td><td >'+ Hari +'</td><td>'+data.JamMulai+'-'+data.JamSelesai+'</td><td>'+data.NamaGuruBk+'</td><td>'+data.NoTelpGuruBk+'</td><td><a class="delete" id = "SubmitPageDeleteJadwal" value ='+ data.IdJadwal +'> Delete </a></td></tr>'); 
                          $('#TbJadwal').append('<tr ><td id ="'+DataKelasJson.Kode_Jadwal+'"" >'+ DataKelasJson.Kode_Jadwal +'</td><td >'+ DataKelasJson.Hari +'</td><td>'+DataKelasJson.JamMulai+'-'+DataKelasJson.JamSelesai+'</td><td>'+DataKelasJson.Nama+'</td><td>'+DataKelasJson.No_Telp+'</td><td><a class="delete" id = "SubmitPageDeleteJadwal" value ='+ DataKelasJson.Kode_Jadwal +'> Delete </a></td></tr>'); 
                          //$('#TbJadwal').append('<tr ><td id ="'+DataKelasJson.Kode_Jadwal+'"" >'+ DataKelasJson.Kode_Jadwal +'</td>'); 
                        //alert(DataKelasRaw);
                       //$('#Add-KelasWK').append('<option value = '+DataKelasJson.IdKelas+'>'+DataKelasJson.Kelas+' '+DataKelasJson.Ruang+''+'</option>');                   
                      } 
                     //var DataKelasRaw = JSON.stringify(data.message[1]);
                       // DataKelasRaw = JSON.stringify(data.message);
                         //alert(DataKelasRaw);

                    }
                    else
                    {

                      TampilToast(data.status, data.message);
                    }
                                            
                  },
                  error: function(data)
                  {
                     //alert('E : ' + data.responseText);  
                     TampilToast("E", data.responseText);
                  }
                  
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
