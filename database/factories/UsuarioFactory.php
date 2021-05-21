<?php

namespace Database\Factories;

use App\Models\Municipio;
use App\Models\Pais;
use App\Models\Sexo;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listaPaises = Pais::all();

        return [
            'nombre' => $this->faker->name(),
            'anotaciones' => $this->faker->sentence(),
            'sexo_id' => Sexo::all()->random()->id,
            'municipio_id' => Municipio::all()->random()->id,
            'paisorigen_id' => $listaPaises->random()->id,
            'paisnacionalidad_id' => $listaPaises->random()->id,
        ];
    }
}
