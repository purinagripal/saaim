<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Expediente;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crear usuarios con expedientes
        //
        $usuariosconexp = Usuario::factory(4)->create(['beneficiario_directo' => 1]);

        foreach ($usuariosconexp as $usuario) {
            // creamos un expediente para el usuario
            Expediente::factory(1)->create([
                'usuario_id' => $usuario->id,
            ]);
            // creamos 3 consultas para el usuario
            $consultas = Consulta::factory(3)->create([
                'usuario_id' => $usuario->id,
            ]);

            // recorremos las consultas creadas para vincular motivos y tramites
            foreach ($consultas as $consulta) {
                // vinculamos 1 motivo a la consulta
                $consulta->motivos()->attach(rand(1,7));
                // vinculamos 1 trámite a la consulta
                $consulta->tramites()->attach(rand(1,8));
            }
        }


        // crear usuarios sin expedientes
        //
        $usuariossinexp = Usuario::factory(6)->create(['beneficiario_directo' => 0]);

        foreach ($usuariossinexp as $usuario) {
            // creamos 1 consulta para el usuario
            $consultas = Consulta::factory(1)->create([
                'usuario_id' => $usuario->id,
            ]);

            foreach ($consultas as $consulta) {
                // vinculamos 2 motivos a la consulta
                $consulta->motivos()->attach([
                    rand(1,3),
                    rand(4,7)
                ]);
                // vinculamos 1 trámite a la consulta
                $consulta->tramites()->attach(rand(1,8));
            }
            
        }
    }
}
