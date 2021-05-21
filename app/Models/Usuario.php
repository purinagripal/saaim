<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // para habilitar asignación masiva 
    protected $guarded = ['created_at','updated_at'];

    // para que cargue los datos de la relación siempre
    protected $with = ['paisnacionalidad'];



    // Relación uno a uno
    public function expediente() {
        return $this->hasOne('App\Models\Expediente');
    }

    // Relación uno a muchos (inversa)
    public function municipio() {
        return $this->belongsTo('App\Models\Municipio');
    }

    // Relación uno a muchos (inversa)
    public function sexo() {
        return $this->belongsTo('App\Models\Sexo');
    }

    // Relación uno a muchos (inversa)
    public function paisorigen() {
        return $this->belongsTo('App\Models\Pais', 'paisorigen_id');
    }

    // Relación uno a muchos (inversa)
    public function paisnacionalidad() {
        return $this->belongsTo('App\Models\Pais', 'paisnacionalidad_id');
    }

    // Relación uno a muchos
    public function consultas() {
        return $this->hasMany('App\Models\Consulta');
    }
}
