<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SubdepartmentsController;
use App\Http\Controllers\EmploymentsController;
use App\Http\Controllers\JobdescriptionsController;

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

Route::get('/', function () {
    return view('login.login');
});

Route::get('/skp', function () {
    return view('skp.formskp');
});

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'department' => DepartmentsController::class,
        'subdepartment' => SubdepartmentsController::class,
        'employment' => EmploymentsController::class,
        'jobdescription' => JobdescriptionsController::class
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
