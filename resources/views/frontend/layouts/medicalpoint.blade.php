<div class="container">
    {{-- <div class="row">
        <div class="col-sm-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">

        </div>   
        <div class="col-sm-6">
            <h2>Create an account & Book your appointment</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <div class="mt-5">
            <button class="btn btn-success">Register as Patient</button>
            <button class="btn btn-secondary">Login</button>
        </div>
        </div>
        
    </div> --}}
    {{-- <hr> --}}
    <section class="">
        <form action="{{ url('/') }}" method="GET">
        <div class="card">
            <div class="card-header clear">Find Doctors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control " id="datepicker"  name="date" placeholder="search availability date">
                        </div>
                        <div class="col-sm-4">
                            {{-- <a href="#" class="template-btn">Find Doctors</a> --}}

                            <button type="submit" class="template-btn mybutton">Find doctors</button>
                        </div>

                    </div>
                </div>
                
            </div>

            </form>

            <div class="card mt-1">
            <div class="card-header clear"> Doctors available today</div>
                <div class="card-body">

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Expertise</th>
                          <th scope="col">Booked</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($doctors as $doctor )
                        <tr>
                          <th scope="row">#</th>
                  <td>
                    <img src="{{ asset('doctors/doctor.png') }}" width="80" style="border-radius: 50%;">

                     {{-- <img src="{{ asset('images') }}/{{ $doctor->doctor->image }}" width="80" style="border-radius: 50%;" class="img-fluid  rounded-circle"> --}}
                  </td>

                          <td>{{ $doctor->doctor->name }}</td>
                          <td>{{ $doctor->doctor->department->name }}</td>
                        <td>
                            <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}">
                                <button class=" btn template-btn-success text-white mt-2">Book Appointment</button>
                            </a>
                            
                        </td>

                        </tr>
                        @empty
                        <td class="alert alert-danger text-center" colspan="5" >No doctors available at the moment</td>
                        @endforelse



                      </tbody>
                    </table>

                    
                </div>
                
            </div>
        </div>

         <script>

    var dateToday = new Date();
  $( function() {
    $("#datepicker").datepicker({
        dateFormat:"yy-mm-dd",
        showButtonPanel:true,
        numberOfMonths:2,
        minDate:dateToday,
    });
});

  </script>

        <style>
            .template-btn-success{
                background: rgb(24,182,9);
               background: linear-gradient(90deg, rgba(24,182,9,1) 75%, rgba(255,255,255,1) 100%);

                   
            }

            .template-btn-success:hover{
                color: lightblue;
                opacity: 0.8;
            }

            .clear{
                font-family: 'Satisfy', cursive;
                font-size: 30px;
            }

            .mybutton{
                border: none;
                border-color: none;
            }
        </style>
    </section>
</div>