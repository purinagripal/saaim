<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Expediente;
use App\Models\Sexo;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Saaim Prueba',
            'email' => 'maria@saaim.es',
            'password' => bcrypt('saaim123'),
            'profile_photo_path' => 'profile-photos/eqA85HGhd2R1gAdBxW42nfLk1EarEqunIGLubqM8.jpg'
        ]);

        Sexo::create(['nombre' => 'Sin especificar']);
        Sexo::create(['nombre' => 'Masculino']);
        Sexo::create(['nombre' => 'Femenino']);

        $this->call(MunicipioSeeder::class);
        $this->call(ContinenteSeeder::class);
        $this->call(PaisSeeder::class);

        $this->call(TipoSeeder::class);
        $this->call(MotivoSeeder::class);
        $this->call(TramiteSeeder::class);
 
        // crea los usuarios, expedientes y consultas
        $this->call(UsuarioSeeder::class);
    }
}
