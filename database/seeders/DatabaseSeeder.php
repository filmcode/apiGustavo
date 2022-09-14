<?php

namespace Database\Seeders;

use App\Models\Actividades;
use App\Models\User;
use App\Models\Empresa;
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
        User::factory(15)->create();
        Empresa::factory(10)->create();
        Actividades::factory(100)->create();
        $this->call(AsignarActividadSeeder::class);
    }
}
