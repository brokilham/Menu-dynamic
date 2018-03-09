$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


        $(document).on('click', '#SubmitPageAddUser', function() { // menampilkan form modal halaman tambah user
                  
             $('#UserByApp-ModalAddDataUserByApp').modal('show');        
        });


           $(document).on('click', '#btnSubmitAddUser', function() { 
            
             var username = document.getElementById('username').value;
             var name = document.getElementById('name').value;
             
             var email   = document.getElementById('email').value;
             var password = document.getElementById('password').value;
             var password_confirmation   = document.getElementById('password_confirmation').value;
             var hak_akses = document.getElementById('hak_akses').value;
            
             var Type  = null;
            var Message = null;    
                           
              $.ajax({
             
                  type:'POST',
                  url:'./legister',
                  data: {username: username,name:name, email: email, password: password, password_confirmation:password_confirmation, hak_akses:hak_akses},
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {
                   
                    $('#UserByApp-ModalAddDataUserByApp').modal('hide');    

                      Type = data.status;
                     
                      if(Type == "E")
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
                     
                      
                  },
                  error: function(data)
                  {
                      Type = "E";   
                      Message = data;   
                      TampilToast(Type, Message);
                  }

                   
             });

        });

      // reset value modal
      $('#UserByApp-ModalAddDataUserByApp').on('hidden.bs.modal', function () {
        $(this).find("input,textarea,select").val('').end();});     
    

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


