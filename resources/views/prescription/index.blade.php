@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow fancyfont">
                <div class="card-header text-center mx-auto mt-3"><b>{{ __('APPOINTMENTS') }} </b>&nbsp;&nbsp;
                    <span class="badge bg-primary text-white">{{ $bookings->count() }}</span>
                
                </div>

                 @if(Session::has('message'))
                <div class="alert alert-success">
                    <b>{{Session::get('message')}}</b>
                </div>
                @endif
              
                <div class="card-body fancyfont1">
                    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Time</th>
            <th scope="col">Doctor</th>
            <th scope="col">Status</th>
            <th scope="col">Prescription</th>
            
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $key =>$booking )
                
            <tr>
            <th scope="row">{{ $key +1 }}</th>
             <td><img src="/profile/{{ $booking->user->image }}" class="table-user-thumb" alt="picture"></td>
             
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->user->name }}</td>
             <td>{{ $booking->user->email }}</td>
              <td>{{ $booking->user->phone_number }}</td>
               <td>{{ $booking->user->gender }}</td>
            <td>{{ $booking->time }}</td>
            <td>{{ $booking->doctor->name }}</td>
            <td>
               @if ($booking->status == 0)

               <a href="{{ route('update.status', [$booking->id]) }}">
                <button class="btn btn-primary">Pending</button>
               </a>

               @else
                   <a href="{{ route('update.status', [$booking->id]) }}">
                <button class="btn btn-success">Completed</button>
               </a>
               @endif 
            </td>

            <td>
                 <!-- Button trigger modal -->
                       
    @if(!App\Models\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                    Write prescription
        </button>
        @include('prescription.form')

                    @else 
                   <a href="{{ route('prescription.show', [$booking->user_id,$booking->date]) }}" class="btn btn-secondary">View prescription</a>
                    @endif
            </td>
            </tr>
             @empty
                <td colspan="12" class="text-center "><b>You have no appointment</b></td>
            @endforelse
            
        </tbody>
        </table>
                </div>

               <div class="mb-4 mt-3 mx-auto shadow">
                
               </div>
            </div>
        </div>

        
    </div>

      <style>
    .fancyfont{
        font-family: 'Roboto', sans-serif;
    }

    .fancyfont1{
        font-family: 'Roboto', sans-serif;
        font-size: 17px;
    }
</style>
</div>

@endsection
