<?php

use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PrescriptionController;

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

Route::get('/dashboard', [DashboardController::class,  'index']);

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
    Route::get('/patients', [PatientlistController::class, 'index'])->name('patient');
    Route::get('/status/update/{id}', [PatientlistController::class, 'toggleStatus'])->name('update.status');
    Route::get('/patients/all', [PatientlistController::class, 'allTimeAppointments'])->name('all.appointments');
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

    /*
        |--------------------------------------------------------------------------
        | ROUTES FOR PATIENT PRESCRIPTION
        |--------------------------------------------------------------------------
        |
        */

    Route::get('patient-today', [PrescriptionController::class, 'index'])->name('patients.today');

    Route::post('/prescription', [PrescriptionController::class, 'store'])->name('prescription');

    Route::get('/prescription/{userId}/{date}', [PrescriptionController::class, 'show'])->name('prescription.show');

    Route::get('/prescribed-patients', [PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');
});





/*
|--------------------------------------------------------------------------
| ROUTES FOR APPOINTMENT BOOKING FROM HOMEPAGE
|--------------------------------------------------------------------------
|
*/
Route::get('/new-appointment/{doctorId}/{date}', [FrontEndController::class, 'show'])->name('create.appointment');



Route::group(['middleware' => ['auth', 'patient']], function () {

    /*
|--------------------------------------------------------------------------
|  ROUTES FOR USER BOOKINGS
|--------------------------------------------------------------------------
|
*/
    Route::post('/book/appointment', [FrontEndController::class, 'store'])->name('booking.appointment');

    Route::get('/my-booking', [FrontEndController::class, 'myBookings'])->name('my.booking');

    /*
|--------------------------------------------------------------------------
|  ROUTES FOR USER PROFILE
|--------------------------------------------------------------------------
|
*/
    Route::get('/user-profile', [ProfileController::class, 'index']);

    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::post('/profile-pic', [ProfileController::class, 'profilePic'])->name('profile.pic');

    Route::get('/my-prescription', [FrontendController::class, 'myPrescription'])->name('my.prescription');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
