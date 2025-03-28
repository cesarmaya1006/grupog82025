function activarFincas(url,id){
    const data_url = url;
    var data = {
        _method: 'put',_token: $('input[name=_token]').val()
    };
    $.ajax({
        url: data_url,
        type: "POST",
        data: data,
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta.mensaje == "ok") {
                Sistema.notificaciones(
                    "El proceso fue realizado correctamente",
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
