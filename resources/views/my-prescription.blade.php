@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mt-3">
                <div class="card-header fancyfont text-center"><b>{{ __('MY PRISCRIPTIONS') }}</b></div>

                <div class="card-body fancyfont1">

                     <table class="table table-striped table-hover">
                      <thead class="">
                        <tr>
                          
                          <th scope="col">Date</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Disease</th>
                          <th scope="col">Symptoms</th>
                          <th scope="col">Medication</th>
                          <th scope="col">Prescription</th>
                          <th scope="col">Doctor's Feedback</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($prescriptions as $prescription)
                        <tr>
                         
                          <td>{{$prescription->date}}</td>
                          <td>{{$prescription->doctor->name}}</td>
                          <td>{{$prescription->name_of_disease}}</td>
                          <td>{{$prescription->symptoms}}</td>
                          <td>{{$prescription->medications}}</td>
                          <td>{{$prescription->prescriptions}}</td>
                          <td>{{$prescription->feedback}}</td>
                        </tr>
                        @empty
                        <td>You have no prescriptions</td>
                        @endforelse
                       
                      </tbody>
                    </table>



                    
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
