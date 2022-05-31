<?php

use App\Http\Controllers\OfertLaboralController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('users/registro', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
  /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
  Route::get('/users/index', [UserController::class, 'index']);
  Route::post('/oferta-laboral/registro', [OfertLaboralController::class, 'store']);
});