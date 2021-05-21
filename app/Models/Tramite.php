<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    // Relación muchos a muchos
    public function consultas() {
        return $this->belongsToMany('App\Models\Consulta');
    }
}
