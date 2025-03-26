function activarUsuarios(url,id){
    const data_url = url;
    var data = {
        _token: $('input[name=_token]').val()
    };
    $.ajax({
        url: data_url,
        type: "PUT",
        data: data,
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta.mensaje == "ok") {
                Sistema.notificaciones(
                    "El usuario fue desactivado correctamente",
                    "Sistema",
                    "success"
                );
            } else {
                Sistema.notificaciones(
                    "No pudo realiza el proceso",
                    "Sistema",
                    "error"
                );
            }
        },
        error: function () {},
    });
}
