@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow fancyfont">
                <div class="card-header text-center mx-auto mt-3"><b>{{ __(' ALL APPOINTMENTS') }} </b>&nbsp;&nbsp;
                    <span class="badge bg-primary text-white">{{ $bookings->count() }}</span>
                
                </div>


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
            </tr>
             @empty
                <td colspan="10" class="text-center "><b>You have no appointment</b></td>
            @endforelse
            
        </tbody>
        </table>
                </div>

               <div class="mb-4 mt-3 mx-auto shadow">
                 {{ $bookings->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
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
