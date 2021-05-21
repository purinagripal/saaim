<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    // Relación uno a muchos
    public function usuariosnacionalidad() {
        return $this->hasMany('App\Models\Usuario', 'paisnacionalidad_id');
    }

    // Relación uno a muchos
    public function usuariosorigen() {
        return $this->hasMany('App\Models\Usuario', 'paisorigen_id');
    }

    // Relación uno a muchos (inversa)
    public function continente() {
        return $this->belongsTo('App\Models\Continente');
    }

}
