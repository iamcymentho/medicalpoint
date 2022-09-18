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

                 {{-- <img src="{{ asset('images') }}/{{ $user->image }}" width="80" style="border-radius: 50%;" class="img-fluid  rounded-circle"> --}}

                <p class="mt-2"><b>Name: {{ $user->name }}</b>  </p>
                <p class="mt-2"><b>Qualification: {{ $user->education }}</b>  </p>
                <p class="mt-2"><b>Expertise: {{ $user->department->name }}</b> </p>

                {{-- card body ends here --}}
            </div>
                {{-- card ends here --}}
            </div>
        </div>

        <div class="col-md-8">

            <form action="" method="POST">
                @csrf
            
            <div class="card shadow myfonts">
                <div class="card-header text-center"><b>{{ $date }}</b></div>

                <div class="card-body">
                   <div class="row">
                    @foreach ($times as $time )
                        
                    
                    <div class="col-md-3">
                        <label for="" class="btn btn-outline-primary" id="mybutton" onclick="
                        
                        //    alert('yes');  
                        myFunction(this, 'green')
                        myFunction2(this, 'white')
                        myFunction3(this, 'white')

                        ">
                            <input type="radio" name="status" value="1">

                            <span>{{ $time->time }}</span>
                        </label>
                    </div>

                    @endforeach
                   </div>
                </div>

                 <div class="card-footer">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success mt-3">Book Appointment</button>
                </div>
              </div>
            
                {{-- card ends here --}}
            </div>

            </form>
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


    <script>
        function myFunction(element,clr) {
    element.style.backgroundColor = clr;
    element.style.color = clr;
}

 function myFunction2(element,clr) {
    // element.style.backgroundColor = clr;
    element.style.color = clr;
}

function myFunction3(element,clr) {
    // element.style.backgroundColor = clr;
    element.style.borderColor = clr;
}
    </script>
</div>
@endsection
