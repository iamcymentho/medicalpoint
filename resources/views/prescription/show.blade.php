@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow fancyfont">
                <div class="card-header text-center mx-auto mt-3"><b>{{ __('PRESCRIPTIONS') }} </b>&nbsp;&nbsp;
                    <span class="badge bg-primary text-white">{{ $prescription->count() }}</span>
                
                </div>


                <div class="card-body fancyfont1 m-2">
                    <p class="fancyfont1"><b>Date :</b>&nbsp;{{ $prescription->date }}</p>
                    <p class="fancyfont1"><b>Patient full name :</b>&nbsp;{{ $prescription->user->name }}</p>
                    <p class="fancyfont1"><b>Doctor's full name :</b>&nbsp;{{ $prescription->doctor->name }}</p>

                    <p class="fancyfont1"><b>Disease :</b>&nbsp;{{ $prescription->name_of_disease}}</p>
                    <p class="fancyfont1"><b>Symptoms :</b>&nbsp;{{ $prescription->symptoms }}</p>
                    <p class="fancyfont1"><b>Medications :</b>&nbsp;{{ $prescription->medications }}</p>

                    <p class="fancyfont1"><b>Feedback :</b>&nbsp;{{ $prescription->prescriptions }}</p>
                    <p class="fancyfont1"><b>Doctor's Signature :</b>&nbsp;{{ $prescription->signature }}</p>
                </div>

                 {{-- card ends here --}}
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
