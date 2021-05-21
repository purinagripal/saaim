<div class="card-header">

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario']) !!}

        @error('nombre')
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos del usuario']) !!}

        @error('apellidos')
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}

        @error('fecha_nacimiento')
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('doc_identif', 'Documento de identidad') !!}
        {!! Form::text('doc_identif', null, ['class' => 'form-control', 'placeholder' => 'Documento de identidad del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio') !!}
        {!! Form::text('domicilio', null, ['class' => 'form-control', 'placeholder' => 'Domicilio de residencia del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('codigo_postal', 'Código Postal') !!}
        {!! Form::number('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'Código Postal del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('poblacion', 'Población') !!}
        {!! Form::text('poblacion', null, ['class' => 'form-control', 'placeholder' => 'Población de residencia']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'Teléfono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Teléfono del usuario']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Correo electrónico') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico del usuario']) !!}

        @error('email')
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('num_expediente', 'Número de expediente') !!}
        {!! Form::text('num_expediente', null, ['class' => 'form-control', 'placeholder' => 'Dejar en blanco para asignación automática']) !!}

        @error('num_expediente')
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('fecha_registro', 'Fecha de registro') !!}
        @isset($expediente->fecha_registro)
            {!! Form::date('fecha_registro', null, ['class' => 'form-control']) !!}
        @else
            {!! Form::date('fecha_registro', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        @endisset

        @error('fecha_registro')
            <br> 
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

    <div class="form-group">
        <label class="mr-3">
            {!! Form::checkbox('protecc_datos', true, null) !!}
            El usuario ha dado su consentimiento para el tratamiento de sus datos personales
        </label>

        @error('protecc_datos')
            <br>
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>

</div>