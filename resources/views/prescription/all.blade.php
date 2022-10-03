@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow fancyfont">
                <div class="card-header text-center mx-auto mt-3"><b>{{ __('APPOINTMENTS') }} </b>&nbsp;&nbsp;
                    <span class="badge bg-primary text-white">{{ $patients->count() }}</span>
                
                </div>
              
                <div class="card-body fancyfont1">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>

                          <th scope="col">Time</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Status</th>
                          <th scope="col">Prescription</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                           <td>
            <img src="/profile/{{ $patient->user->image }}" class="table-user-thumb" alt="picture">
                        </td>
                          </td>
                          <td></td>
                          <td>{{$patient->user->name}}</td>
                          <td>{{$patient->user->email}}</td>
                          <td>{{$patient->user->phone_number}}</td>
                          <td>{{$patient->user->gender}}</td>
                          <td>{{$patient->time}}</td>
                          <td>{{$patient->doctor->name}}</td>
                          <td>
                            @if($patient->status==1)
                             checked
                             @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
              
                   <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View prescription</a>
                  

                               
                          </td>
                        </tr>
                        @empty
                        <td>There is no any appointments !</td>
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
