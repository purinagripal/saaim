<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expediente;
use App\Models\Municipio;
use App\Models\Pais;
use App\Models\Sexo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::all();
        return view('admin.expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');

        return view('admin.expedientes.create', compact('sexos', 'municipios', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // reglas de validación
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'protecc_datos' => 'required',
            'email' => 'nullable|email:rfc',
            'num_expediente' => 'nullable|integer|unique:expedientes',
            'fecha_registro' => 'required|date',

            'usuario.sexo_id' => 'required',
            'usuario.municipio_id' => 'required',
            'usuario.paisorigen_id' => 'required',
            'usuario.paisnacionalidad_id' => 'required',
        ]);        

        // creamos y guardamos el usuario
        $usuario = new Usuario();
        $usuario->fill($request->get('usuario'));
        $usuario->beneficiario_directo = 1;
        $usuario->save();

        // creamos y guardamos el expediente con el usuario_id
        $expediente = new Expediente();
        $expediente->fill($request->only(['nombre', 'apellidos', 'fecha_nacimiento', 'doc_identif', 'domicilio', 'codigo_postal', 'poblacion', 'telefono', 'email', 'protecc_datos', 'fecha_registro']));
        $expediente->usuario_id = $usuario->id;

        if (isset($request->num_expediente)) {
            // le asignamos el valor del formulario
            $expediente->num_expediente = $request->num_expediente;
        } else {
            // le asignamos el autoincremento
            $ultimoexpediente = Expediente::orderByDesc('num_expediente')->first();
            if ($ultimoexpediente) {
                $expediente->num_expediente = 1 + $ultimoexpediente->num_expediente;
            } else {
                $expediente->num_expediente = 1;
            }
            
        }
        $expediente->save();

        
        if ($request->submit_consulta) {
            // redirecciona a nueva consulta con los datos del usuario
            return redirect()->route('admin.consultas.createexp', $usuario);
        } else {
            // redirecciona a editar expediente
            return redirect()->route('admin.expedientes.index')->with('info', 'El expediente se ha creado correctamente');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUsu(Usuario $usuario)
    {
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');

        return view('admin.expedientes.createUsu', compact('usuario', 'sexos', 'municipios', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUsu(Request $request,  Usuario $usuario)
    {
        // reglas de validación
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'protecc_datos' => 'required',
            'email' => 'nullable|email:rfc',
            'num_expediente' => 'nullable|integer|unique:expedientes',
            'fecha_registro' => 'required|date',
        ]);        

        // actualizamos el usuario
        $usuario->beneficiario_directo = 1;
        $usuario->save();

        // creamos y guardamos el expediente con el usuario_id
        $expediente = new Expediente();
        $expediente->fill($request->only(['nombre', 'apellidos', 'fecha_nacimiento', 'doc_identif', 'domicilio', 'codigo_postal', 'poblacion', 'telefono', 'email', 'protecc_datos', 'fecha_registro']));
        $expediente->usuario_id = $usuario->id;

        if (isset($request->num_expediente)) {
            // le asignamos el valor del formulario
            $expediente->num_expediente = $request->num_expediente;
        } else {
            // le asignamos el autoincremento
            $ultimoexpediente = Expediente::orderByDesc('num_expediente')->first();
            if ($ultimoexpediente) {
                $expediente->num_expediente = 1 + $ultimoexpediente->num_expediente;
            } else {
                $expediente->num_expediente = 1;
            }
            
        }
        $expediente->save();

        
        if ($request->submit_consulta) {
            // redirecciona a nueva consulta con los datos del usuario
            return redirect()->route('admin.consultas.createexp', $usuario);
        } else {
            // redirecciona a editar expediente
            return redirect()->route('admin.expedientes.index')->with('info', 'El expediente se ha creado correctamente');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        return view('admin.expedientes.show', compact('expediente'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');

        $usuario = $expediente->usuario;

        return view('admin.expedientes.edit', compact('expediente', 'usuario', 'sexos', 'municipios', 'paises'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        // reglas de validación
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'protecc_datos' => 'required',
            'email' => 'nullable|email:rfc',
            'num_expediente' => "nullable|integer|unique:expedientes,num_expediente,$expediente->id",
            'fecha_registro' => 'required|date',

            'usuario.sexo_id' => 'required',
            'usuario.municipio_id' => 'required',
            'usuario.paisorigen_id' => 'required',
            'usuario.paisnacionalidad_id' => 'required',
        ]);  

        // actualizamos el expediente
        $expediente->fill($request->only(['nombre', 'apellidos', 'fecha_nacimiento', 'doc_identif', 'domicilio', 'codigo_postal', 'poblacion', 'telefono', 'email', 'protecc_datos', 'fecha_registro']));

        if (isset($request->num_expediente)) {
            // le asignamos el valor del formulario
            $expediente->num_expediente = $request->num_expediente;
        } else {
            // le asignamos el autoincremento
            $ultimoexpediente = Expediente::orderByDesc('num_expediente')->first();
            if ($ultimoexpediente) {
                $expediente->num_expediente = 1 + $ultimoexpediente->num_expediente;
            } else {
                $expediente->num_expediente = 1;
            }
        }
        $expediente->save();

        
        // actualizamos el usuario
        $expediente->usuario->update($request->get('usuario'));
        

        if ($request->submit_consulta) {
            // redirecciona a nueva consulta con los datos del usuario
            return redirect()->route('admin.consultas.createexp', $expediente->usuario);
        } else {
            // redirecciona a editar expediente
            return redirect()->route('admin.expedientes.edit', $expediente)->with('info', 'El expediente se actualizó con éxito');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente)
    {
        // TO.DO eliminar archivos del expediente
        
        $expediente->usuario->delete(); // se eliminan tbn las consultas del usuario (relacion en cascada)
        $expediente->delete();

        return redirect()->route('admin.expedientes.index')->with('info', 'Expediente eliminado');
    }
    
}
