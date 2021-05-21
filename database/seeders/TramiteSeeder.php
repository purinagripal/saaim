<?php

namespace Database\Seeders;

use App\Models\Tramite;
use Illuminate\Database\Seeder;

class TramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tramite::create([
            'nombre' => 'Información',
            'derivacion' => false,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Asesoramiento',
            'derivacion' => false,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Gestión',
            'derivacion' => false,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Solicitud',
            'derivacion' => false,
            'redaccion' => false
        ]);


        // REDACCIONES
        //
        Tramite::create([
            'nombre' => 'Recursos administrativos',
            'derivacion' => false,
            'redaccion' => true
        ]);

        Tramite::create([
            'nombre' => 'Alegaciones / Reclamación previa',
            'derivacion' => false,
            'redaccion' => true
        ]);

        Tramite::create([
            'nombre' => 'Escritos a la Administración',
            'derivacion' => false,
            'redaccion' => true
        ]);
       
       
        // DERIVACIONES
        //
        Tramite::create([
            'nombre' => 'Deriv. Administración local / autonómica',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Servicios Sociales',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Otras ONGs',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Notario',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Turno de Oficio',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Centros de Salud',
            'derivacion' => true,
            'redaccion' => false
        ]);

        Tramite::create([
            'nombre' => 'Deriv. Defensor del Pueblo',
            'derivacion' => true,
            'redaccion' => false
        ]);

    }
}
