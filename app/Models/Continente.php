<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    use HasFactory;

    // Relación uno a muchos
    public function paises() {
        return $this->hasMany('App\Models\Pais');
    }
}
