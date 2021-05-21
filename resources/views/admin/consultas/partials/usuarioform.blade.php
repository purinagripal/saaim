<div class="card-body">
    <h4>Usuario</h4>

    {!! Form::hidden('usuario[beneficiario_directo]', $value = 0) !!}

    <div class="form-group">
        {!! Form::label('nombre_usu', 'Nombre') !!}
        {!! Form::text('usuario[nombre]', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('anotaciones', 'Anotaciones') !!}
        {!! Form::text('usuario[anotaciones]', null, ['class' => 'form-control', 'placeholder' => 'Anotaciones sobre el usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sexo_id', 'Sexo') !!}
        {!! Form::select('usuario[sexo_id]', $sexos, null, ['class' => 'form-control']) !!}

        @error('usuario.sexo_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('municipio_id', 'Municipio / Isla') !!}
        {!! Form::select('usuario[municipio_id]', $municipios, null, ['class' => 'form-control', 'placeholder' => 'Selecciona municipio o isla']) !!}

        @error('usuario.municipio_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('paisorigen_id', 'País de origen') !!}
        {!! Form::select('usuario[paisorigen_id]', $paises, null, ['class' => 'form-control', 'placeholder' => 'Selecciona país de origen']) !!}

        @error('usuario.paisorigen_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('paisnacionalidad_id', 'Nacionalidad') !!}
        {!! Form::select('usuario[paisnacionalidad_id]', $paises, null, ['class' => 'form-control', 'placeholder' => 'Selecciona nacionalidad']) !!}

        @error('usuario.paisnacionalidad_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

</div>