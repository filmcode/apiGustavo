<?php

namespace Database\Seeders;

use App\Models\Actividades;
use App\Models\User;
use App\Models\Empresa;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignarActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        $actividades = Actividades::all();
        $users = User::pluck('id')->toArray();
        $faker = \Faker\Factory::create();

        foreach ($actividades as $actividad) {
            $assingHomework = $faker->boolean();
            if ($assingHomework) {
                $user_random_id = $faker->randomElement($users);
                $count_homework = Actividades::get()->where('user_id', $user_random_id)->where('status',0)->count();
                $user_random_id = ($count_homework < 5) ? $user_random_id : $faker->randomElement($users);
                $count_homework = Actividades::get()->where('user_id', $user_random_id)->where('status',0)->count();
                $statusHomework = ($faker->boolean()) ? 1 : 0;
                // fechas
                $daysAsig = $faker->numberBetween(0, 4);
                $daysVenc = $faker->randomDigit();
                $date_start = Carbon::now()->subDays($daysAsig)->format('Y-m-d');
                $date_end = Carbon::now()->addDays($daysVenc)->format('Y-m-d');
                $user_name = User::find($user_random_id)->name;
                if ($count_homework < 5) {
                    DB::table('actividades')->where('id', $actividad->id)->update([
                        'user_id' => $user_random_id,
                        'user_name' => $user_name,
                        'status' => $statusHomework,
                        'date_start'=> $date_start,
                        'date_end'=> $date_end,
                    ]);
                }
            }
        }
    }
}
