<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nombre' => 'Presencial']);

        Tipo::create(['nombre' => 'Teléfono']);

        Tipo::create(['nombre' => 'Email']);

        Tipo::create(['nombre' => 'WhatsApp']);
    }
}
