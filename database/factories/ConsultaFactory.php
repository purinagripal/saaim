<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consulta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date(),
            'comentarios' => $this->faker->sentence(),
            'tipo_id' => Tipo::all()->random()->id,
        ];
    }
}
