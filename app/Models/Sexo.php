<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    // Relación uno a muchos
    public function usuarios() {
        return $this->hasMany('App\Models\Usuario');
    }
}
