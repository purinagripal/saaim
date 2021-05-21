<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    // Relación uno a muchos
    public function usuarios() {
        return $this->hasMany('App\Models\Usuario');
    }
}
