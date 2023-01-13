<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
// Route::resource('/', UserDetailController::class ); 

Route::get('/', [UserDetailController::class,'index'] ); 
Route::get('/create', [UserDetailController::class,'create'] ); 
Route::post('/', [UserDetailController::class,'store'] ); 
Route::get('/{id}', [UserDetailController::class,'show'] ); 
Route::get('download/{id}', [UserDetailController::class,'download'] ); 
 
