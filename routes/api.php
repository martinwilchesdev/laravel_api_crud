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

/*******************/
/** OBTENER DATOS **/
/*******************/
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/{id}', [StudentsController::class, 'show']);

/************************/
/** CREAR NUEVOS DATOS **/
/************************/
Route::post('/students', [StudentsController::class, 'store']);

/**********************/
/** ACTUALIZAR DATOS **/
/**********************/
Route::put('/students/{id}', [StudentsController::class, 'update']);
Route::patch('/students/{id}', [StudentsController::class, 'updatePartial']);

/********************/
/** ELIMINAR DATOS **/
/********************/
Route::delete('/students/{id}', [StudentsController::class, 'destroy']);