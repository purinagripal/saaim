<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Expediente;
use App\Models\Motivo;
use App\Models\Municipio;
use App\Models\Pais;
use App\Models\Sexo;
use App\Models\Tipo;
use App\Models\Tramite;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Boolean;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.consultas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::pluck('nombre', 'id');
        $motivos = Motivo::all();
        $tramites = Tramite::all();
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');
       
        return view('admin.consultas.create', compact('tipos', 'motivos', 'tramites', 'sexos', 'municipios', 'paises'));
        
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
            'fecha' => 'required|date',
            'seguimiento' => 'required',
            'tipo_id' => 'required',
            'motivos' => 'required',
            'tramites' => 'required',

            'usuario.sexo_id' => 'required',
            'usuario.municipio_id' => 'required',
            'usuario.paisorigen_id' => 'required',
            'usuario.paisnacionalidad_id' => 'required',
        ]);


        // creamos y guardamos el usuario
        $usuario = Usuario::create($request->get('usuario'));


        // creamos y guardamos la consulta, sus motivos y trámites
        //
        $consulta = new Consulta();
        $consulta->fill($request->only(['fecha', 'seguimiento', 'comentarios', 'tipo_id']));
        $consulta->usuario_id = $usuario->id;
        $consulta->save();

        // vinculamos a la consulta los motivos seleccionados
        if ($request->motivos) {
            $consulta->motivos()->attach($request->motivos);
        }

        // vinculamos a la consulta los trámites seleccionados
        if ($request->tramites) {
            $consulta->tramites()->attach($request->tramites);
        }

        return redirect()->route('admin.consultas.index')->with('info', 'La atención se generó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        return view('admin.consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        $tipos = Tipo::pluck('nombre', 'id');
        $motivos = Motivo::all();
        $tramites = Tramite::all();
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::orderBy('nombre')->pluck('nombre', 'id');

        $usuario = $consulta->usuario;

        return view('admin.consultas.edit', compact('consulta', 'usuario', 'tipos', 'motivos', 'tramites', 'sexos', 'municipios', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        // si no tiene expediente puede editar el usuario
        if (!$consulta->usuario->expediente) {
            // reglas de validación
            $request->validate([
                'fecha' => 'required|date',
                'tipo_id' => 'required',
                'motivos' => 'required',
                'tramites' => 'required',

                'usuario.sexo_id' => 'required',
                'usuario.municipio_id' => 'required',
                'usuario.paisorigen_id' => 'required',
                'usuario.paisnacionalidad_id' => 'required',
            ]);
            // actualizamos el usuario
            $consulta->usuario->update($request->get('usuario'));

        } else {
            // reglas de validación
            $request->validate([
                'fecha' => 'required|date',
                'tipo_id' => 'required',
                'motivos' => 'required',
                'tramites' => 'required',
            ]);
        }

        // guardamos la consulta
        $consulta->update($request->only(['fecha', 'seguimiento', 'comentarios', 'tipo_id']));
        
        // vinculamos a la consulta los motivos seleccionados
        if ($request->motivos) {
            $consulta->motivos()->sync($request->motivos); // uso sync para que borre los q no se seleccionaron
        }

        // vinculamos a la consulta los trámites seleccionados
        if ($request->tramites) {
            $consulta->tramites()->sync($request->tramites);
        }

        return redirect()->route('admin.consultas.edit', $consulta)->with('info', 'La atención se actualizó con éxito');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExp(Usuario $usuario, int $expedienteid = 0)
    {
        $tipos = Tipo::pluck('nombre', 'id');
        $motivos = Motivo::all();
        $tramites = Tramite::all();
        $sexos = Sexo::pluck('nombre', 'id');
        $municipios = Municipio::pluck('nombre', 'id');
        $paises = Pais::pluck('nombre', 'id');

        // le pasamos el expedienteid para saber de que ruta viene
        return view('admin.consultas.createexp', compact('usuario', 'expedienteid', 'tipos', 'motivos', 'tramites', 'sexos', 'municipios', 'paises'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExp(Request $request, Usuario $usuario)
    {
        // reglas de validación
        $request->validate([
            'fecha' => 'required|date',
            'seguimiento' => 'required',
            'tipo_id' => 'required',
            'motivos' => 'required',
            'tramites' => 'required',
        ]);

        // creamos y guardamos la consulta, sus motivos y trámites
        $consulta = new Consulta();
        $consulta->fill($request->only(['fecha', 'seguimiento', 'comentarios', 'tipo_id']));
        $consulta->usuario_id = $usuario->id;
        $consulta->save();

        // vinculamos a la consulta los motivos seleccionados
        if ($request->motivos) {
            $consulta->motivos()->attach($request->motivos);
        }

        // vinculamos a la consulta los trámites seleccionados
        if ($request->tramites) {
            $consulta->tramites()->attach($request->tramites);
        }

        if ($request->expedienteid == 0) {
            // se ha generado desde la lista de expedientes y retorna a la lista de consultas
            return redirect()->route('admin.consultas.index')->with('info', 'La atención se generó con éxito');
        } else {
            // se ha generado desde el show del expediente y debe retornar a él
            return redirect()->route('admin.expedientes.show', $usuario->expediente)->with('info', 'La atención se generó con éxito');
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        // si la consulta no tiene expediente 
        // y el usuario no tiene más consultas
        // se debería eliminar tbn el usuario
        if (!$consulta->usuario->expediente) {
            if (count($consulta->usuario->consultas) == 1) {
                // borra el usuario si no tiene más consultas
                $consulta->usuario->delete();
            }
        }
        // elimina la consulta
        $consulta->delete();

        // puede eliminar desde expediente (con su lista de consultas)
        // o desde la lista de consultas
        // por eso redirecciona a back()
        return redirect()->back()->with('info', 'Atención eliminada');
    }
}
