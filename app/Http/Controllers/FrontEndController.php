<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;


class FrontEndController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set('Africa/Lagos'); //setting default time zone for Africa

        if (request('date')) {
            dd($this->findDoctorsBasedOnDate(request('date')));
        }

        // dd(date('Y-m-d'));
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        // return $doctors;
        return view('welcome', compact('doctors'));
    }

    public function show($doctorId, $date)
    {
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();

        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();

        $user = User::where('id', $doctorId)->first();

        return view('appointment', compact('times', 'date', 'user'));
    }

    public function findDoctorsBasedOnDate($date)
    {
        $doctors = Appointment::where('date', $date)->get();
        return $doctors;
    }
}
