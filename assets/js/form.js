$("#form-contact").submit(function(event){
    event.preventDefault(); //almacena los datos sin refrescar el sitio web.
    formContactSend();
});

function formContactSend(){
    var $data = $("#form-contact").serialize(); // tma los datos "name,email, message" y los lleva a un arreglo.
    $.ajax({
        type: "post",
        url:"formContact.php",
        data: $data,
        success: function($text){
            if($text=="success"){
                messageOk();
            }else {
                messageError($text);
            }
        }
    });
}   

function messageOk(){
    $("#messageOk").removeClass("d-none");
    $("#messageError").addClass("d-none");
}

function messageError($text) {
    $("#messageError").removeClass("d-none");
    $("#messageError").html($text);
}
