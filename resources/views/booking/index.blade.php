@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center"><b>{{ __('Booked Appointments') }} </b>
                    <span class="badge bg-primary">{{ $appointments->count() }}</span>
                
                </div>

                <div class="card-body">
                    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Doctor</th>
            <th scope="col">Time</th>
            <th scope="col">Date Booked</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Status</th>
            
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $key =>$appointment )
                
            <tr>
            <th scope="row">{{ $key +1 }}</th>
            <td>{{ $appointment->doctor->name }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->created_at->diffForHumans() }}</td>
            <td>{{ $appointment->date }}</td>
            <td>
               @if ($appointment->status == 0)
               <button class="btn btn-primary">Pending</button>
               @else
                   <button class="btn btn-success">Granted</button>
               @endif 
            </td>
            </tr>
             @empty
                <td>You have no appointment</td>
            @endforelse
            
        </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
