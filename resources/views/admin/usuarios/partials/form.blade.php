<div class="card-body">
    <h4>Usuario</h4>

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('anotaciones', 'Anotaciones') !!}
        {!! Form::text('anotaciones', null, ['class' => 'form-control', 'placeholder' => 'Anotaciones sobre el usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sexo_id', 'Sexo') !!}
        {!! Form::select('sexo_id', $sexos, null, ['class' => 'form-control']) !!}

        @error('sexo_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('municipio_id', 'Municipio / Isla') !!}
        {!! Form::select('municipio_id', $municipios, null, ['class' => 'form-control', 'placeholder' => 'Selecciona municipio o isla']) !!}

        @error('municipio_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('paisorigen_id', 'País de origen') !!}
        {!! Form::select('paisorigen_id', $paises, null, ['class' => 'form-control', 'placeholder' => 'Selecciona país de origen']) !!}

        @error('paisorigen_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('paisnacionalidad_id', 'Nacionalidad') !!}
        {!! Form::select('paisnacionalidad_id', $paises, null, ['class' => 'form-control', 'placeholder' => 'Selecciona nacionalidad']) !!}

        @error('paisnacionalidad_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        <label class="mr-3">
            {!! Form::checkbox('beneficiario_directo', true, null) !!}
            Es beneficiario directo
        </label>
    </div>

</div>