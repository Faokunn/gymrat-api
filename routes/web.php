<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController as WebUserController;
use App\Http\Controllers\Web\ChestController as WebChestController;
use App\Http\Controllers\Web\ShoulderController as WebShoulderController;
use App\Http\Controllers\Web\TricepController as WebTricepController;
use App\Http\Controllers\Web\BackController as WebBackController;
use App\Http\Controllers\Web\BicepController as WebBicepController;
use App\Http\Controllers\Web\LegController as WebLegController;
use App\Http\Controllers\Web\ExerciseController as WebExerciseController;

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

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/', function () {
    return view('Login');
});

Route::get('Terms and Condition', function () {
    return view('Terms and Condition');
});

Route::view("Dashboard", 'Dashboard');
Route::view("Account", 'Account');
Route::view("Exercises", 'Exercises');


Route::view("Admins", 'Admins');

Route::resource("Chest", WebChestController::class)->names('web.chests');
Route::resource("Shoulder", WebShoulderController::class)->names('web.shoulders');
Route::resource("Triceps", WebTricepController::class)->names('web.triceps');
Route::resource("Biceps", WebBicepController::class)->names('web.biceps');
Route::resource("Back", WebBackController::class)->names('web.backs');
Route::resource("Leg", WebLegController::class)->names('web.legs');

Route::resource('Users', WebUserController::class)->names('web.users');

Route::resource('exercise', WebExerciseController::class)->names('web.exercise');
