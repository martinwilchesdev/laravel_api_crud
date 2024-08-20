<?php

use App\Http\Controllers\API\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/students', [StudentsController::class, 'index']);

Route::post('/students', [StudentsController::class, 'store']);

// Route::get('/students/{id}', function() {
//     return 'Obteniendo un estudiante';
// });

// Route::put('/students/{id}', function() {
//     return 'Actualizando estudiantes';
// });

// Route::delete('/students/{id}', function() {
//     return 'Eliminando estudiantes';
// });