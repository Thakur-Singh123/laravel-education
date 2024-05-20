<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Register
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//User Login
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
//Change pwd
Route::post('change-password', [App\Http\Controllers\Api\AuthController::class, 'changePassword']);
//Student 
Route::post('create-student', [App\Http\Controllers\Api\SliderController::class, 'submit_teacher']);
Route::get('all-student', [App\Http\Controllers\Api\SliderController::class, 'all_students_list']);
Route::post('update-student/{id}', [App\Http\Controllers\Api\SliderController::class, 'update_student']);
Route::get('all-student', [App\Http\Controllers\Api\SliderController::class, 'all_students_list']);
Route::get('delete-student/{id}', [App\Http\Controllers\Api\SliderController::class, 'delete_student']);
//blog
Route::post('create-blog', [App\Http\Controllers\Api\BlogController::class, 'submit_blog']);
Route::get('get-all-blogs', [App\Http\Controllers\Api\BlogController::class, 'all_blogs_list']);
Route::post('update-blog/{id}', [App\Http\Controllers\Api\BlogController::class, 'update_blog']);
Route::get('delete-blog/{id}', [App\Http\Controllers\Api\BlogController::class, 'delete_blog']);

