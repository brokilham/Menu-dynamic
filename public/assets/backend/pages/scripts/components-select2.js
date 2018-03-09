var ComponentsSelect2 = function() {

    var handleDemo = function() {

       
        $.fn.select2.defaults.set("theme", "bootstrap");

        var placeholder = "Pilih Id Guru";

       
        $(".select2, .select2-multiple").select2({
               placeholder: placeholder,
               width: null, 
               ajax: {
                    type:'get',
                    dataType: 'json',
                    url:'./WaliKelasListData',
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                     processResults: function(data, page) {

                        var d = [];

                        for (var i = data.length - 1; i >= 0; i--) {
                          d.push({
                            id: data[i].Id_WaliKelas, 
                            text: data[i].Nama,
                            email: data[i].Email,
                          });
                        }

                     page.page = page.page || 0;
                     return {

                            results: d,
                            pagination: {
                                more: (1 + page.page) < data.totalPages
                                  // results: data.data,
                            }
                                       
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection

        });
       
        function formatRepo(repo) {
           if (repo.loading) return repo.text;
           
           var markup = "<option id="+repo.id+" value =us>"+repo.id+"-"+repo.text+"</option>";  
           return markup;
        }

        function formatRepoSelection(repo) {
            return repo.id;
        }

      
    }

    return {
        //main function to initiate the module
        init: function() {
            handleDemo();
        }
    };

}();

/*$('select').on('select2:select', function (evt) 
{
  
    var DataWaliKelas = $("#single").select2("data");
         
    document.getElementById("username").value = DataWaliKelas[0].id;
    document.getElementById("name").value = DataWaliKelas[0].text;
    
    document.getElementById("email").value = DataWaliKelas[0].email;
   
    var Password = null;
    if ( DataWaliKelas[0].id.length <6)
    {   
         Password = DataWaliKelas[0].id;

        for(var i = 0; Password.length<=6; i++)
        {
            Password = Password + "x";

        }
    }
    else
    {
        Password = DataWaliKelas[0].id;

    }
    document.getElementById("password").value = Password;
    document.getElementById("password_confirmation").value = Password;
         
         

    
});*/


if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        ComponentsSelect2.init();
    });
}