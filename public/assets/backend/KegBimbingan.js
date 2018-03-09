$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.



       $(document).on('click', '#SubmitTerlakasana', function() { 


            var Kode_Rel = $(this).attr('value');  
            var Kode_Status_Ren = '1'; 
      
                               
              $.ajax({
             
                  type:'POST',
                  url:'./SetStatusKegiatanRel',
                  data: {Kode_Rel : Kode_Rel,Kode_Status_Ren : Kode_Status_Ren },
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


          $(document).on('click', '#SubmitTakTerlakasana', function() { 


            var Kode_Rel = $(this).attr('value');  
            var Kode_Status_Ren = '0'; 
      
                               
              $.ajax({
             
                  type:'POST',
                  url:'./SetStatusKegiatanRel',
                  data: {Kode_Rel : Kode_Rel,Kode_Status_Ren : Kode_Status_Ren },
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


