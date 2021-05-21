<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    // para habilitar asignación masiva 
    protected $guarded = ['id', 'created_at','updated_at'];

    // para que cargue los datos de la relación siempre
    protected $with = ['tipo'];

    
    // Relación uno a muchos (inversa)
    public function usuario() {
        return $this->belongsTo('App\Models\Usuario');
    }

    // Relación uno a muchos (inversa)
    public function tipo() {
        return $this->belongsTo('App\Models\Tipo');
    }

    // Relación muchos a muchos
    public function motivos() {
        return $this->belongsToMany('App\Models\Motivo');
    }

    // Relación muchos a muchos 
    public function tramites() {
        return $this->belongsToMany('App\Models\Tramite');
    }
}
