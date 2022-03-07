function VerificarUsuario() {
    let usuario = $("#txt_usuario").val();
    let clave = $("#txt_clave").val();

    var parametros = {
        "usuario": usuario,
        "clave": clave
    };
    $.ajax({
        data: parametros,
        url: '../controlador/ctr.php',
        type: 'post',
        beforeSend: function() {
            $("#resultado").html("Procesando, espere por favor...");

        },
        success: function(response) {
            console.log(response);
            if (response.estado == "true") {

                mensaje = "Usuario encontrado, te estamos redirigiendo";
                // window.location.href = "../index.html", true;

            } else {
                mensaje = "usuario o clave incorrecta";
            }

            $("#resultado").html(mensaje);
        },
        error: function() {
            $("#resultado").html("Opps Ha surgido algun error en la conexion");
        }
    });

}