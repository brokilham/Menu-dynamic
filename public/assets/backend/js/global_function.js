function Check_text_input(FormName){
    
    var isValid = true;
    $("form#"+FormName+" input[type=text]").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });

    return isValid;      
}

function Check_email_input(FormName){
    
    var isValid = true;
    $("form#"+FormName+" input[type=email]").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });

    return isValid;      
}

function Check_number_input(FormName){
    
    var isValid = true;
    $("form#"+FormName+" input[type=number]").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });

    return isValid;      
}

function Check_text_area_input(FormName){
    var isValid = true;

    $("form#"+FormName+" textarea").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    return isValid;   
}

function Check_select_input(FormName){
    var isValid = true;

    $("form#"+FormName+" select").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    return isValid;   
}


function reset_color_form(FormName){
    $("form#"+FormName+" input[type=number]").css({
        background: "",
        border: "",
        color: "black"
    });

    $("form#"+FormName+" input[type=text]").css({
        background: "",
        border: "",
        color: "black"
    });

    $("form#"+FormName+" input[type=email]").css({
        background: "",
        border: "",
        color: "black"
    });

    $("form#"+FormName+" textarea").css({
        background: "",
        border: "",
        color: "black"
    });

    $("form#"+FormName+" select").each(function() {
        $(this).css({
            background: "",
            border: "",
            color: "black"
        }); 
    });
    

      
}