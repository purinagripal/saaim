<?php

namespace Database\Factories;

use App\Models\Expediente;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpedienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expediente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::all()->unique()->random()->id, // unique para que la relacion sea uno a uno
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'fecha_nacimiento' => $this->faker->date(),
            'doc_identif' => $this->faker->isbn10(),
            'domicilio' => $this->faker->address,
            'codigo_postal' => $this->faker->postcode,
            'poblacion' => $this->faker->city,
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail,
            'num_expediente' => $this->faker->unique()->numberBetween(1,20),
            'fecha_registro' => $this->faker->date(),
            'protecc_datos' => $this->faker->boolean(33),
        ];
    }
}
