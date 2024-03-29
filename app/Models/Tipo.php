<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    // Relación uno a muchos
    public function consultas() {
        return $this->hasMany('App\Models\Consulta');
    }
}
