$(document).ready(function(){ //pada jQuery merupakan function khusus yang digunakan oleh jQuery untuk menganalisa / mendeteksi apakah DOM pada halaman HTML / web kita sudah siap digunakan.


	$(document).on('click', '#PengaturanAkun', function() { // menampilkan form modal update email
         


         //alert('show');
    	 //PengaturanAkun
		   var IdUserVal = document.getElementById('IdUser').innerText; // yang benar
		   
    	   $.ajax({
             
                  type:'POST',
                  url:'./PengaturanAkun',         
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  data: {IdUser : IdUserVal},
                  error: function(data)
                  {
                       TampilToast("E", data.responseText);
                  }
                  
                });
    });




   $(document).on('click', '#btnEditAkunShowEmail', function() { // menampilkan form modal update email
                  
            var  DataUser = $(this).attr('value');     
            var DataUserJson = JSON.parse(DataUser); 

            document.getElementById("Edit-EmailLama").value = DataUserJson.email;

             document.getElementById("Edit-Username").value = DataUserJson.username;
          
            $('#Pengaturan-UpdateAkunEmail').modal('show');        
        });



    $(document).on('click', '#btnSubmitEditEmail', function() { // submit update email
                   
                  //var  Username = $(this).attr('value');     
               // alert("tes")
                  $.ajax({
             
                  type:'POST',
                  url:'./PengaturanUpdateEmail',
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  async: true,      
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  data: new FormData($("#submit_form_editEmail")[0]),
                  success: function(data)
                  {
                                                		
                		
                		
                  		if(data.status=='S')
                   		{
                   		  TampilToast(data.status, "Data berhasil diperbarui");
                		  $('#Pengaturan-UpdateAkunEmail').modal('hide');     
 					      $('#AlmtEmail').text(data.message);
                   		}
                   		else
                   		{
                   			  TampilToast(data.status, data.message);               		
                   		}
  						 document.getElementById("submit_form_editEmail").reset();

                  },
                  error: function(data)
                  {
                     TampilToast("E", data.responseText);
                  }
                  
                }); 
  
        });





    $(document).on('click', '#btnEditAkunShowPassword', function() { 
            var  DataUser = $(this).attr('value');     
            var DataUserJson = JSON.parse(DataUser); 
            document.getElementById("Edit-Username").value = DataUserJson.username;
            document.getElementById("Edit-PasswordLamaEncrypt").value = DataUserJson.password;
            //alert(DataUser);
            $('#Pengaturan-UpdateAkunPassword').modal('show');        
        });



      $(document).on('click', '#btnSubmitEditPassword', function() {  



               $.ajax({
             
                  type:'POST',
                  url:'./PengaturanUpdatePassword',
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  async: true,      
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  data: new FormData($("#submit_form_editPassword")[0]),
                  success: function(data)
                  {
                   		if(data.status=='S')
                   		{
                   			//TampilToast(data.status, data.message);
                   		  TampilToast(data.status, "Data berhasil diperbarui");
                		  $('#Pengaturan-UpdateAkunPassword').modal('hide');   
 					      $('#PasswordUser').text(data.message);
                   		}
                   		else
                   		{
                   			  TampilToast(data.status, data.message);               		
                   		}
                        document.getElementById("submit_form_editPassword").reset();
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