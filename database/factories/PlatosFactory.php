<?php

namespace Database\Factories;

use App\Models\Platos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlatosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Platos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => "Pizza " . $this->faker->regexify('[A-Za-z]{20}'),
            'descripcion' => "Lorem ipsum ...",
            'foto' => "",
            'precio' => 20.5,
            'categoria' => "Pizzas",
            'restaurante_id' => 2
        ];
    }
}
