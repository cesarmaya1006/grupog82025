<div class="row">
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="nombre">Nombre de la finca</label>
        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" value="{{ old('nombre', $finca_edit->nombre ?? '') }}" required>
    </div>
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="url">Página web de la finca</label>
        <input type="text" class="form-control form-control-sm" name="url" id="url" value="{{ old('url', $finca_edit->url ?? '') }}" required>
    </div>
    <div class="col-12 col-md-7 form-group">
        <label for="logo" class="requerido">Fotografía</label>
        <input type="file" class="form-control form-control-sm" id="logo" name="logo" placeholder="Foto del usuario" accept="image/png,image/jpeg" onchange="mostrar()">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <table class="table" style="font-size: 0.7em;">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="3">Resticciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Alto</td>
                            <td class="font-weight-bold">Ancho</td>
                            <td class="font-weight-bold"> Resolución</td>
                        </tr>
                        <tr>
                            <td>500 px</td>
                            <td>900 px</td>
                            <td>100 dpi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-md-4">
                <img class="img-fluid fotoUsuario" id="fotoUsuario" src="{{ isset($finca_edit) ?($finca_edit->logo!=null?asset('/imagenes/sistema/logos/'.$finca_edit->logo) : asset('/imagenes/sistema/sin_foto.png')) : asset('/imagenes/sistema/sin_foto.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

