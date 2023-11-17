//----------------------insertar un producto----------------------\\

$(document).ready(function () {
    
    $("#formulario").submit(function (e) { 
        e.preventDefault();
        formdata = new FormData($("#formulario")[0]);
        $.ajax({
            type: "post",
            url: "Accion/producto/altaProd.php",
            data:formdata,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function (response) {
                if(response.result){
                    $("#resultado").html(response.mensaje);
                    $("#resultado").css({
                        color : "green"
                    })
                }else{
                    $("#resultado").html(response.mensaje);
                    $("#resultado").css({
                        color : "red"
                    })
                }
            }
        });
    });

});






