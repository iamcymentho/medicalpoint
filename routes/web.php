<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontEndController::class, 'index']);
/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTES
|--------------------------------------------------------------------------
|
*/

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


/*
|--------------------------------------------------------------------------
| DOCTOR ROUTES
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::resource('doctor', DoctorController::class);
});

/*
|--------------------------------------------------------------------------
| APPOINTMENT ROUTES
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['auth', 'doctor']], function () {

    Route::resource('appointment', AppointmentController::class);

    Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');

    Route::post('/appointment/update', [AppointmentController::class, 'updateTime'])->name('update');
});


/*
|--------------------------------------------------------------------------
| ROUTES FOR APPOINTMENT BOOKING FROM HOMEPAGE
|--------------------------------------------------------------------------
|
*/
Route::get('/new-appointment/{doctorId}/{date}', [FrontEndController::class, 'show'])->name('create.appointment');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
