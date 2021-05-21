<div class="card-footer">
    <h4>Expediente</h4>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Número de expediente</th>
                <td>{{$consulta->usuario->expediente->num_expediente}}</td>
            </tr>
            <tr>
                <th>Fecha de registro (AAAA-mm-dd)</th>
                <td>{{$consulta->usuario->expediente->fecha_registro}}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{$consulta->usuario->expediente->nombre}}</td>
            </tr>
            <tr>
                <th>Apellidos</th>
                <td>{{$consulta->usuario->expediente->apellidos}}</td>
            </tr>
            <tr>
                <th>Fecha de nacimiento (AAAA-mm-dd)</th>
                <td>{{$consulta->usuario->expediente->fecha_nacimiento}}</td>
            </tr>
            <tr>
                <th>Documento de identidad</th>
                <td>{{$consulta->usuario->expediente->doc_identif}}</td>
            </tr>
            <tr>
                <th>Domicilio</th>
                <td>{{$consulta->usuario->expediente->domicilio}}</td>
            </tr>
            <tr>
                <th>Código Postal</th>
                <td>{{$consulta->usuario->expediente->codigo_postal}}</td>
            </tr>
            <tr>
                <th>Población</th>
                <td>{{$consulta->usuario->expediente->poblacion}}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{$consulta->usuario->expediente->telefono}}</td>
            </tr>
            <tr>
                <th>Correo electrónico</th>
                <td>{{$consulta->usuario->expediente->email}}</td>
            </tr>
        </tbody>
    </table>

    <h4>Usuario</h4>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Anotaciones</th>
                <td>{{$consulta->usuario->anotaciones}}</td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>{{$consulta->usuario->sexo->nombre}}</td>
            </tr>
            <tr>
                <th>Municipio / Isla</th>
                <td>{{$consulta->usuario->municipio->nombre}}</td>
            </tr>
            <tr>
                <th>País de origen</th>
                <td>{{$consulta->usuario->paisorigen->nombre}}</td>
            </tr>
            <tr>
                <th>Nacionalidad</th>
                <td>{{$consulta->usuario->paisnacionalidad->nombre}}</td>
            </tr>
            <tr>
                <th>Beneficiario directo</th>
                <td>
                    @if ($consulta->usuario->beneficiario_directo)
                        {{'Sí'}}
                    @else
                        {{'No'}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
       
</div>