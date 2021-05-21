<?php

namespace Database\Seeders;

use App\Models\Motivo;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motivo::create([
            'nombre' => 'Visado',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Autorización de residencia',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Autorización de trabajo y residencia',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Otros procesos de obtención de autorización',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Renovación autorización de residencia',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Renovación autorización de trabajo',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Reagrupación familiar',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Tarjeta estudiante',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Tarjeta comunitaria',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Expulsiones',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Penales',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Nacionalidad',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Modificación autorización de residencia',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Arraigo laboral',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Arraigo social',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Modificación autorización de trabajo y residencia',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Orden de salida',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Tarjeta de larga duración UE',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Retorno voluntario',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Trámites trabajar en la UE',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Contraer matrimonio civil',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Trámites retorno canarios',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Trámites consulares',
            'derivacion' => false,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Medios de comunicación',
            'derivacion' => false,
            'social' => false
        ]);


        // SOCIAL
        //
        Motivo::create([
            'nombre' => 'Protección social',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Seguridad Social',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Empleo',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Escolarización hijos/as',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Formación',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Vivienda',
            'derivacion' => false,
            'social' => true
        ]);
        
        Motivo::create([
            'nombre' => 'Sanidad',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Laboral',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Tráfico',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Homologación de titulaciones académicas',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Trámites gestión ayudas directas asociación',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Jubilación',
            'derivacion' => false,
            'social' => true
        ]);

        Motivo::create([
            'nombre' => 'Trámites de apoyo a otras organizaciones e instituciones',
            'derivacion' => false,
            'social' => true
        ]);


        // DERIVACIONES
        //
        Motivo::create([
            'nombre' => 'Deriv. Administración local / autonómica',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Servicios Sociales',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Otras ONGs',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Notario',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Turno de Oficio',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Centros de Salud',
            'derivacion' => true,
            'social' => false
        ]);

        Motivo::create([
            'nombre' => 'Deriv. Defensor del Pueblo',
            'derivacion' => true,
            'social' => false
        ]);

        

        Motivo::create([
            'nombre' => 'Otros motivos',
            'derivacion' => false,
            'social' => false
        ]);
    }
}