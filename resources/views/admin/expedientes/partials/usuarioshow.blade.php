<div class="card-body">
    <h4>Usuario</h4>

    <table class="table table-striped">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{$usuario->id}}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{$usuario->nombre}}</td>
            </tr>
            <tr>
                <th>Anotaciones</th>
                <td>{{$usuario->anotaciones}}</td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>{{$usuario->sexo->nombre}}</td>
            </tr>
            <tr>
                <th>Municipio / Isla</th>
                <td>{{$usuario->municipio->nombre}}</td>
            </tr>
            <tr>
                <th>País de origen</th>
                <td>{{$usuario->paisorigen->nombre}}</td>
            </tr>
            <tr>
                <th>Nacionalidad</th>
                <td>{{$usuario->paisnacionalidad->nombre}}</td>
            </tr>
            <tr>
                <th>Beneficiario directo</th>
                <td>
                    @if ($usuario->beneficiario_directo)
                        {{'Sí'}}
                    @else
                        {{'No'}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>