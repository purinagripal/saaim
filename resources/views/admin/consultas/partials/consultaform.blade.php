<div class="card-header">

    <div class="form-group">
        {!! Form::label('fecha', 'Fecha') !!}
        @isset($consulta->fecha)
            {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
        @else
            {!! Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        @endisset

        @error('fecha')
            <br> 
            <small class="text-danger">{{$message}}</small>   
        @enderror
    </div>
    
    <div class="form-group">
        {!! Form::label('comentarios', 'Comentarios') !!}
        {!! Form::text('comentarios', null, ['class' => 'form-control', 'placeholder' => 'Comentarios sobre la atención']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo_id', 'Tipo de atención') !!}
        {!! Form::select('tipo_id', $tipos, null, ['class' => 'form-control', 'placeholder' => 'Selecciona el tipo de atención']) !!}

        @error('tipo_id')
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        <p class="font-weight-bold">Motivos de consulta</p>

        @foreach ($motivos as $motivo)
            <label class="mr-3 font-weight-normal">
                {!! Form::checkbox('motivos[]', $motivo->id, null) !!}
                {{$motivo->nombre}}
            </label>
        @endforeach

        @error('motivos')
            <br>
            <small class="text-danger">{{$message}}</small>    
        @enderror
    </div>

    <div class="form-group">
        <p class="font-weight-bold">Trámites generados</p>

        @foreach ($tramites as $tramite)
            <label class="mr-3 font-weight-normal">
                {!! Form::checkbox('tramites[]', $tramite->id, null) !!}
                {{$tramite->nombre}}
            </label>
        @endforeach

        @error('tramites')
            <br>
            <small class="text-danger">{{$message}}</small>  
        @enderror
    </div>
    
</div>