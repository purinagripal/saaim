<?php

namespace Database\Seeders;

use App\Models\Continente;
use Illuminate\Database\Seeder;

class ContinenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Continente::create(['nombre' => 'Europa']);
        Continente::create(['nombre' => 'África']);
        Continente::create(['nombre' => 'Oceanía']);
        Continente::create(['nombre' => 'América del Sur']);
        Continente::create(['nombre' => 'América del Norte']);
        Continente::create(['nombre' => 'Asia']);
    }
}
