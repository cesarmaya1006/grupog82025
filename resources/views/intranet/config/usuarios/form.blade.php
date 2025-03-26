<div class="row">
    <div class="col-5 col-md-2 form-group">
        <label class="requerido" for="tipo_documento_id">Tipo de identificación</label>
        <select id="tipo_documento_id" class="form-control form-control-sm" name="tipo_documento_id" required>
            <option value="">Elija tipo</option>
            @foreach ($tiposdocu as $tipoDocu)
                <option value="{{ $tipoDocu->id }}" {{isset($usuario_edit)?($usuario_edit->tipo_documento_id==$tipoDocu->id?'selected':''):''}}>{{ $tipoDocu->tipo_id }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-7 col-md-2 form-group">
        <label class="requerido" for="identificacion">Identificación</label>
        <input type="text" class="form-control form-control-sm" name="identificacion" id="identificacion" value="{{ old('identificacion', $usuario_edit->identificacion ?? '') }}" required>
    </div>
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="nombres">Nombres</label>
        <input type="text" class="form-control form-control-sm" name="nombres" id="nombres" value="{{ old('nombres', $usuario_edit->nombres ?? '') }}" required>
    </div>
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="apellidos">Apellidos</label>
        <input type="text" class="form-control form-control-sm" name="apellidos" id="apellidos" value="{{ old('apellidos', $usuario_edit->apellidos ?? '') }}" required>
    </div>
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="email">Correo Electrónico</label>
        <input type="email" class="form-control form-control-sm" name="email" id="email" value="{{ old('email', $usuario_edit->email ?? '') }}" required>
    </div>
    <div class="col-5 col-md-2 form-group">
        <label class="requerido" for="genero">Genero</label>
        <select id="genero" class="form-control form-control-sm" name="genero" required>
            <option value="">Elija genero</option>
            <option value="M" {{isset($usuario_edit)?($usuario_edit->genero=='M'?'selected':''):''}}>Masculino</option>
            <option value="F" {{isset($usuario_edit)?($usuario_edit->genero=='F'?'selected':''):''}}>Femenino</option>

        </select>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label class="requerido" for="fecha_nacimiento">fecha de Nacimiento</label>
        <input type="date" class="form-control form-control-sm" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuario_edit->fecha_nacimiento ?? '') }}" required>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label class="requerido" for="telefono">Teléfono</label>
        <input type="text" class="form-control form-control-sm" name="telefono" id="telefono" value="{{ old('telefono', $usuario_edit->telefono ?? '') }}" required>
    </div>
</div>
