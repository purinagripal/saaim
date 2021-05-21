<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    // para habilitar asignación masiva 
    protected $guarded = ['created_at','updated_at'];

    // para que cargue los datos de la relación siempre
    protected $with = ['usuario'];

    // Relación uno a uno (inversa)
    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    // Relación uno a muchos
    public function archivos() {
        return $this->hasMany('App\Models\Archivo');
    }

}
