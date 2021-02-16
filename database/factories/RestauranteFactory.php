<?php

namespace Database\Factories;

use App\Models\Restaurante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class RestauranteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->company,

            'direccion' => $this->faker->streetAddress,

            'ciudad' => $this->faker->city,

            'telefono' => $this->faker->phoneNumber,

            'latitud' => $this->faker->latitude,

            'longitud' => $this->faker->longitude,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ];
    }
}
