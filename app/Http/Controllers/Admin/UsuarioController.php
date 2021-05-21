<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use App\Models\Pais;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
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
            'email' => 'email:rfc,dns',
        ]);

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');

        return view('admin.usuarios.edit', compact('usuario', 'sexos', 'municipios', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        // reglas de validación
        $request->validate([
            'sexo_id' => 'required',
            'municipio_id' => 'required',
            'paisorigen_id' => 'required',
            'paisnacionalidad_id' => 'required',
        ]);  

        // guardamos el usuario
        $usuario->fill($request->all());
        if (!isset($request->beneficiario_directo)) {
            $usuario->beneficiario_directo = false;
        }
        $usuario->save();


        if ($request->submit_consulta) {
            // redirecciona a nueva consulta con los datos del usuario
            return redirect()->route('admin.consultas.createexp', $usuario);
        } else {
            // redirecciona a editar usuario
            return redirect()->route('admin.usuarios.edit', $usuario)->with('info', 'El usuario se actualizó con éxito');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete(); // se eliminan tbn las consultas del usuario (relacion en cascada)
        
        return redirect()->route('admin.usuarios.index')->with('info', 'Usuario eliminado');
    }
}
