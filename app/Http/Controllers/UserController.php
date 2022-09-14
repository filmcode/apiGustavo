<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Actividades;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $collectionUsers = collect($users)->map(function($user) {
            $actividad = Actividades::get()
                        ->where('user_id', $user->id)
                        ->where('status', 0)
                        ->values();
            if ($actividad->count() < 5) {
                return [
                    'id_user' => $user->id,
                    'name_user' => $user->name,
                    'actividades_pendientes' => $actividad,
                    'cantidad_pendiente' => $actividad->count()
                ];
            }
        });
        return $collectionUsers->filter()->values();
    }
}
