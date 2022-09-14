<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Models\Actividades;
use App\Models\Empresa;
use App\Models\User;

Route::prefix('empresa')->group(function(){
	Route::get('/',['App\Http\Controllers\EmpresaController', 'index']);
	Route::get('maxpendientes',['App\Http\Controllers\EmpresaController', 'maxPendientes']);
});

Route::prefix('users')->group(function(){
	Route::get('/',['App\Http\Controllers\UserController', 'index']);
});

