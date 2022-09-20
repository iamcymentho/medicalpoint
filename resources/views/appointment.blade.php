@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card myfonts">

                <div class="card-header">
                    <h3 class="text-center">Doctor's Information</h3>
                </div>

                <div class="card-body">
                    

                     <img src="/doctors/doctor.png" width="100px" style="border-radius: 50%;" alt="Doctor Information">

                    {{-- <img  src="{{asset('images')}}/{{$user->image}}" width="100px" style="border-radius: 50%;" > --}}
                    <br>
                    <p class="mt-2"><b>Name: {{ $user->name }}</b>  </p>
                <p class="mt-2"><b>Qualification: {{ $user->education }}</b>  </p>
                <p class="mt-2"><b>Expertise: {{ $user->department->name }}</b> </p>
                </div>
                
            </div>
            
        </div>
        <div class="col-md-8">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    <b>{{Session::get('message')}}</b>
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    <b>{{Session::get('errmessage')}}</b>
                </div>
            @endif
            
           
            <form action="{{route('booking.appointment')}}" method="post">@csrf
            <div class="card">
                 <div class="card-header text-center"><b>{{ $date }}</b></div>
                <div class="card-body">
                    <div class="row">
                        @foreach($times as $time)
                        <div class="col-md-3 mb-3">
                            <label class="btn btn-outline-success">
                                <input type="radio" name="time" value="{{$time->time}}" >
                                <span>{{$time->time}}
                                    </span>
                            </label>
                        </div>
                        <input type="hidden" name="doctorId" value="{{$doctor_id}}">
                        <input type="hidden" name="appointmentId" value
                        ="{{$time->appointment_id}}">
                        <input type="hidden" name="date" value
                        ="{{$date}}">



                        
                        
                        @endforeach
                    </div>
                </div>
               </div>
               <div class="card-footer">
                @if(Auth::check())
                <button type="submit" class="btn btn-success" style="width: 100%;">Book Appointment</button>
                @else 
                    <p>Please login to make an appointment</p>
                    <a href="/register">Register</a>
                    <a href="/login">Login</a>
                @endif

                   
               </div>


           </form>

           </div>
    </div>

    <style>
        .myfonts{
            font-family: 'Marcellus SC', serif;
        }
    </style>
</div>
@endsection
