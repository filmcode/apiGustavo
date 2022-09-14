<?php

namespace Database\Factories;

use App\Models\Actividades;
use App\Models\Empresa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActividadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Datos
        $name = $this->faker->word;
        $description = $this->faker->paragraph;
        $empresas = Empresa::pluck('id')->toArray();
        $empresa_id = $this->faker->randomElement($empresas);

        // asignar aletoriamente
        // $assingHomework = $this->faker->boolean();
        // if ($assingHomework) {
        //     $users = User::pluck('id')->toArray();
        //     $user_random_id = $this->faker->randomElement($users);
        //     $count_homework = Actividades::get()->where('user_id', $user_random_id);
        //     $user_id = $user_random_id;
        //     $user_name = 'prueba'. $count_homework;
        //     // fechas
        //     // $daysAsig = $this->faker->numberBetween(0, 4);
		// 	// $daysVenc = $this->faker->randomDigit();
        //     // $date_start = Carbon::now()->subDays($daysAsig)->format('Y-m-d');
        //     // $date_end = Carbon::now()->addDays($daysVenc)->format('Y-m-d');
        //     $date_start = $this->faker->date();
        //     $date_end = $this->faker->date();
        //     $statusHomework = ($this->faker->boolean()) ? 1 : 0;
        // }else {
        //     $user_id = NULL;
        //     $user_name = NULL;
        //     $date_start = NULL;
        //     $date_end = NULL;
        //     $statusHomework = 0;
        // }
        
        $user_id = NULL;
        $user_name = NULL;
        $date_start = NULL;
        $date_end = NULL;
        $statusHomework = 0;

        return [
            'name' => $name,
            'description' => $description,
            'empresa_id' => $empresa_id,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'status' => $statusHomework,
        ];
    }
}
