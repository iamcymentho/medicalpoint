@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <div class="card myfonts shadow">
                <div class="card-header">
                    <h3 class="text-center">Doctor's Information</h3>
                </div>
            <div class="card-body">
                
                <img src="/doctors/doctor.png" width="100px" style="border-radius: 50%;" alt="Doctor Information">

                <p class="mt-2"><b>Name:</b> </p>
                <p class="mt-2"><b>Expertise:</b> </p>

                {{-- card body ends here --}}
            </div>
                {{-- card ends here --}}
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center"><b>{{ $date }}</b></div>

                <div class="card-body">
                   <div class="row">
                    @foreach ($times as $time )
                        
                    
                    <div class="col-md-3">
                        <label for="" class="btn btn-outline-primary">
                            <input type="radio" name="status" value="1">

                            <span>{{ $time->time }}</span>
                        </label>
                    </div>

                    @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .myfonts{
            font-family: 'Marcellus SC', serif;
        }

                label.btn {
        padding: 0;
        }

        label.btn input {
        opacity: 0;
        position: absolute;

        }

        label.btn span {
        text-align: center;
        padding: 6px 12px;
        display: block;
        min-width: 80px;
        }

        label.btn input:checked+span {
        background-color: rgb(80, 110, 228);
        color: #fff;
        }
    </style>
</div>
@endsection
