$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.



       $(document).on('click', '#SubmitPageAccRen', function() { // proses mengacc rencana bimbingan

            var Kode_Ren = $(this).attr('value');   
      
                               
              $.ajax({
             
                  type:'POST',
                  url:'./renBimbinganAcc',
                  data: {Kode_Ren : Kode_Ren},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                  

                    if (data.status == 'S')
                    {     
                       window.location.reload(); 
                    }
                   
                    /*if (data.status == 'S')
                    { 
                     
                        $('#TextStatus'+Kode_Ren+'').text("Disetujui");
                       //$("a[name='SubmitPageAccRen"+Kode_Ren+"']").attr("style", "visibility: hidden");
                        var NameButtonAcc = document.getElementById("SubmitPageAccRen").name;
                        var buttonAcc = document.getElementsByName(NameButtonAcc)[0];//Get the first and only button in your case
                        buttonAcc.style.visibility = "hidden";

                        var NameButtonTolak = document.getElementById("SubmitPageTolaktRen").name;
                        var buttonTolak = document.getElementsByName(NameButtonTolak)[0];//Get the first and only button in your case
                        buttonTolak.style.visibility = "hidden";
                     
                    }*/
                    TampilToast(data.status, data.message);
                                            
                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }

              });
                 
        });


          $(document).on('click', '#SubmitPageTolaktRen', function() { // proses menolak rencana bimbingan

            var Kode_Ren = $(this).attr('value');   
      
                               
              $.ajax({
             
                  type:'POST',
                  url:'./renBimbinganTolak',
                  data: {Kode_Ren : Kode_Ren},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                  
                   
                    if (data.status == 'S')
                    {     
                     
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


