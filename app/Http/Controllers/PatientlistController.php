<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    //
    public function index(Request $request)
    {
        date_default_timezone_set('Africa/Lagos'); //setting default time zone for Africa

        if ($request->date) {

            $bookings = Booking::latest()
                ->where('date', $request->date)
                ->simplePaginate(7);
            return view('admin.patientlist.index', compact('bookings'));
        }

        $bookings = Booking::latest()
            ->where('date', date('Y-m-d'))
            ->simplePaginate(7);
        return view('admin.patientlist.index', compact('bookings'));
    }

    public function toggleStatus($id)
    {
        $booking = Booking::find($id);
        $booking->status = !$booking->status;
        $booking->save();
        return redirect()->back();
    }

    public function allTimeAppointments()
    {
        $bookings = Booking::latest()
            ->simplePaginate(7);
        return view('admin.patientlist.all', compact('bookings'));
    }
}
