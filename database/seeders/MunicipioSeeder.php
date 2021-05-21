<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;


class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio1 = new Municipio();
        $municipio1->nombre = 'Puerto del Rosario';
        $municipio1->otras_islas = false;
        $municipio1->peninsula = false;
        $municipio1->save();

        $municipio2 = new Municipio();
        $municipio2->nombre = 'La Oliva';
        $municipio2->otras_islas = false;
        $municipio2->peninsula = false;
        $municipio2->save();

        $municipio3 = new Municipio();
        $municipio3->nombre = 'Antigua';
        $municipio3->otras_islas = false;
        $municipio3->peninsula = false;
        $municipio3->save();

        $municipio4 = new Municipio();
        $municipio4->nombre = 'Tuineje';
        $municipio4->otras_islas = false;
        $municipio4->peninsula = false;
        $municipio4->save();

        $municipio5 = new Municipio();
        $municipio5->nombre = 'Betancuria';
        $municipio5->otras_islas = false;
        $municipio5->peninsula = false;
        $municipio5->save();

        $municipio6 = new Municipio();
        $municipio6->nombre = 'Pájara';
        $municipio6->otras_islas = false;
        $municipio6->peninsula = false;
        $municipio6->save();

        // otras islas
        //
        Municipio::create([
            'nombre' => 'Lanzarote',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        Municipio::create([
            'nombre' => 'Gran Canaria',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        Municipio::create([
            'nombre' => 'Tenerife',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        Municipio::create([
            'nombre' => 'La Gomera',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        Municipio::create([
            'nombre' => 'El Hierro',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        Municipio::create([
            'nombre' => 'La Palma',
            'otras_islas' => true,
            'peninsula' => false,
        ]);

        // península
        $municipio8 = new Municipio();
        $municipio8->nombre = 'Península';
        $municipio8->otras_islas = false;
        $municipio8->peninsula = true;
        $municipio8->save();
    }
}
