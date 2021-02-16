<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platos;

class PlatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platos::factory()
            ->count(10)
            ->create();
    }
}
