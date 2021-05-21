<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Expediente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function createExp(Expediente $expediente)
    {
        return view('admin.archivos.create', compact('expediente'));
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
            'archivo' => 'required',
        ]);

        $archivo = new Archivo();
        $archivo->url = Storage::put('archivos-exp', $request->file('archivo'));
        $archivo->tipo = Storage::mimeType($archivo->url);
        $archivo->nombre = $request->nombre;
        $archivo->expediente_id = $request->expediente_id;
        $archivo->save();

        return redirect()->route('admin.expedientes.show', $archivo->expediente);
    }

    /**
     * Display the specified resource.
     *
     * @param  Archivo $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Archivo $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Archivo $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Archivo $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
    }

    
}
