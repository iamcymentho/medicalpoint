@extends('admin.layouts.master')

@section('content')

   <div class="page-header fancyfont">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
    <i class="ik ik-edit bg-blue"></i>
    <div class="d-inline fancyfont">
        <h5>Doctors</h5>
        <span>Appointment schedule</span>
    </div>
</div>
</div>
<div class="col-lg-4">
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="../index.html"><i class="ik ik-home"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
    </ol>
</nav>
</div>
</div>
</div>

<div class="container">

     @if (Session::has('message'))
    <div class="alert alert-success fancyfont">
            <strong >{{ Session::get('message') }}</strong>
        </div>
    @endif

     @if (Session::has('errmessage'))
    <div class="alert alert-warning fancyfont">
            <strong >{{ Session::get('errmessage') }}</strong>
        </div>
    @endif

    @foreach ($errors->all() as $error )
        <div class="alert alert-danger fancyfont">
           <strong> {{ $error }} </strong>
        </div>
    @endforeach

    <form action="{{ route('appointment.check') }}" method="POST">
    @csrf

    <div class="card fancyfont1">
        <div class="card-header ">
            Choose date

        </div>

        <div class="card-body">
             <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">

             <button type="submit" class="btn btn-primary mt-3">View schedules</button>

              {{-- @if (isset($date) )
            
           <div class="mt-3 ">
              <p class="mt-3 badge badge-dark"> Your schedule for: &nbsp;&nbsp;&nbsp; <span class="badge badge-light text-dark"> {{ $date }}</span> </p>
           </div>
                
            @endif --}}
        </div>

        {{-- card ends here --}}
    </div>

        {{-- form ends here --}}
        </form>

        @if (Route::is('appointment.check'))
                
        <form action="{{ route('update') }}" method="POST">
            @csrf

     <div class="card fancyfont1">
        <div class="card-header ">
            {{-- Choose AM Time --}}

             @if (isset($date) )
            
           <div class="mt-3 ">
              <p class="mt-3 badge badge-dark"> Your schedule for: &nbsp;&nbsp;&nbsp; <span class="badge badge-light text-dark"> {{ $date }}</span> </p>
           </div>
                
            @endif

           {{-- checking all boxes with an onclick event  --}}

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class="">
              Check all boxes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" class="form-check-input mt-2" onclick="
                
                for(c in document.getElementsByName('time[]'))
                document.getElementsByName('time[]').item(c).checked=this.checked
                
                ">
            </span>
           
        </div>

        <div class="card-body">
                <table class="table table-striped">
        <tbody>

            <input type="hidden" name="appointmentId" value="{{ $appointmentId }}">

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.00am"
                    @if(isset($times)){{ $times->contains('time', '6.00am')?'checked':'' }}@endif
                    >6.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.20am"
                     @if(isset($times)){{ $times->contains('time', '6.20am')?'checked':'' }}@endif
                    >6.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.40am"
                     @if(isset($times)){{ $times->contains('time', '6.40am')?'checked':'' }}@endif
                    >6.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.00am"
                     @if(isset($times)){{ $times->contains('time', '7.00am')?'checked':'' }}@endif
                    >7.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.20am"
                     @if(isset($times)){{ $times->contains('time', '7.20am')?'checked':'' }}@endif
                    >7.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.40am"
                     @if(isset($times)){{ $times->contains('time', '7.40am')?'checked':'' }}@endif
                    >7.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.00am"
                     @if(isset($times)){{ $times->contains('time', '8.00am')?'checked':'' }}@endif
                    >8.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.20am"
                     @if(isset($times)){{ $times->contains('time', '8.20am')?'checked':'' }}@endif
                    >8.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.40am"
                     @if(isset($times)){{ $times->contains('time', '8.40am')?'checked':'' }}@endif
                    >8.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.00am"
                     @if(isset($times)){{ $times->contains('time', '9.00am')?'checked':'' }}@endif
                    >9.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.20am"
                     @if(isset($times)){{ $times->contains('time', '9.20am')?'checked':'' }}@endif
                    >9.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.40am"
                     @if(isset($times)){{ $times->contains('time', '9.40am')?'checked':'' }}@endif
                    >9.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.00am"
                     @if(isset($times)){{ $times->contains('time', '10.00am')?'checked':'' }}@endif
                    >10.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.20am"
                     @if(isset($times)){{ $times->contains('time', '10.20am')?'checked':'' }}@endif
                    >10.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.40am"
                     @if(isset($times)){{ $times->contains('time', '10.40am')?'checked':'' }}@endif
                    >10.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.00am"
                     @if(isset($times)){{ $times->contains('time', '11.00am')?'checked':'' }}@endif
                    >11.00.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.20am"
                     @if(isset($times)){{ $times->contains('time', '11.20am')?'checked':'' }}@endif
                    >11.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.40am"
                     @if(isset($times)){{ $times->contains('time', '11.40am')?'checked':'' }}@endif
                    >11.40AM</td>
                </tr>


                
        </tbody>
        </table>
        </div>

        {{-- card ends here --}}
    </div>



         <div class="card fancyfont1">
        <div class="card-header ">
            {{-- Choose PM Time --}}

             @if (isset($date) )
            
           <div class="mt-3 ">
              <p class="mt-3 badge badge-dark"> Your schedule for: &nbsp;&nbsp;&nbsp; <span class="badge badge-light text-dark"> {{ $date }}</span> </p>
           </div>
                
            @endif
        </div>

        <div class="card-body">
                <table class="table table-striped">
        <tbody>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.00pm"
                 @if(isset($times)){{ $times->contains('time', '12.00pm')?'checked':'' }}@endif
                >12.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.20pm"
                  @if(isset($times)){{ $times->contains('time', '12.20pm')?'checked':'' }}@endif
                >12.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.40pm"
                  @if(isset($times)){{ $times->contains('time', '12.40pm')?'checked':'' }}@endif
                >12.40PM</td>
            </tr>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.00pm"
                  @if(isset($times)){{ $times->contains('time', '1.00pm')?'checked':'' }}@endif
                >1.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.20pm"
                  @if(isset($times)){{ $times->contains('time', '1.20pm')?'checked':'' }}@endif
                >1.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.40pm"
                  @if(isset($times)){{ $times->contains('time', '1.40pm')?'checked':'' }}@endif
                >1.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.00pm"
                  @if(isset($times)){{ $times->contains('time', '2.00pm')?'checked':'' }}@endif
                >2.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.20pm"
                  @if(isset($times)){{ $times->contains('time', '2.20pm')?'checked':'' }}@endif
                >2.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.40pm"
                  @if(isset($times)){{ $times->contains('time', '2.40pm')?'checked':'' }}@endif
                >2.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.00pm"
                  @if(isset($times)){{ $times->contains('time', '3.00pm')?'checked':'' }}@endif
                >3.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.20pm"
                  @if(isset($times)){{ $times->contains('time', '3.20pm')?'checked':'' }}@endif
                >3.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.40pm"
                  @if(isset($times)){{ $times->contains('time', '3.40pm')?'checked':'' }}@endif
                >3.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.00pm"
                  @if(isset($times)){{ $times->contains('time', '4.00pm')?'checked':'' }}@endif
                >4.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.20pm"
                  @if(isset($times)){{ $times->contains('time', '4.20pm')?'checked':'' }}@endif
                >4.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.40pm"
                  @if(isset($times)){{ $times->contains('time', '4.40pm')?'checked':'' }}@endif
                >4.40PM</td>
            </tr>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.00pm"
                  @if(isset($times)){{ $times->contains('time', '5.00pm')?'checked':'' }}@endif
                >5.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.20pm"
                  @if(isset($times)){{ $times->contains('time', '5.20pm')?'checked':'' }}@endif
                >5.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.40pm"
                  @if(isset($times)){{ $times->contains('time', '5.40pm')?'checked':'' }}@endif
                >5.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.00pm"
                  @if(isset($times)){{ $times->contains('time', '6.00pm')?'checked':'' }}@endif
                >6.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.20pm"
                  @if(isset($times)){{ $times->contains('time', '6.20pm')?'checked':'' }}@endif
                >6.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.40pm"
                  @if(isset($times)){{ $times->contains('time', '6.40pm')?'checked':'' }}@endif
                >6.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.00pm"
                  @if(isset($times)){{ $times->contains('time', '7.00pm')?'checked':'' }}@endif
                >7.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.20pm"
                  @if(isset($times)){{ $times->contains('time', '7.20pm')?'checked':'' }}@endif
                >7.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.40pm"
                  @if(isset($times)){{ $times->contains('time', '7.40pm')?'checked':'' }}@endif
                >7.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.00pm"
                  @if(isset($times)){{ $times->contains('time', '8.00pm')?'checked':'' }}@endif
                >8.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.20pm"
                  @if(isset($times)){{ $times->contains('time', '8.20pm')?'checked':'' }}@endif
                >8.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.40pm"
                  @if(isset($times)){{ $times->contains('time', '8.40pm')?'checked':'' }}@endif
                >8.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.00pm"
                  @if(isset($times)){{ $times->contains('time', '9.00pm')?'checked':'' }}@endif
                >9.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.20pm"
                  @if(isset($times)){{ $times->contains('time', '9.20pm')?'checked':'' }}@endif
                >9.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.40pm"
                  @if(isset($times)){{ $times->contains('time', '9.40pm')?'checked':'' }}@endif
                >9.40PM</td>
            </tr>
                
        </tbody>
        </table>
        </div>

        {{-- card ends here --}}
    </div>


    <div class="card fancyfont">
        <div class="card-body">
            <button type="submit" class="btn btn-primary ">Update schedule</button>
        </div>
        {{-- card ends here --}}
    </div>

    {{-- container ends here --}}
</div>

    {{-- form ends here --}}
    </form>

    @else
   <div class="mt-4">
     <h3 class=" ">Total Appointment schedule: <span class="badge badge-primary  shadow"><b>{{ $allappointments->count() }}</b></span></h3>
   </div>

    <table class="table table-hover table-striped mt-4 fancyfont1 shadow">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Creator</th>
      <th scope="col">Date</th>
      <th scope="col">View/Update</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($allappointments as $appointment )  
   
    <tr>
      <th scope="row">#</th>
      <td>{{ $appointment->doctor->name }}</td>
      <td>{{ $appointment->date }}</td>
      <td>

        <form action="{{ route('appointment.check') }}" method="POST">
        @csrf

        <input type="hidden" name="date" value="{{ $appointment->date }}">

        <button type="submit" class="btn btn-primary">view / update</button>
        </form>

      </td>
    </tr>
    
     @endforeach
  </tbody>
</table>

    @endif

<style>
    .fancyfont{
        font-family: 'Roboto', sans-serif;
    }

     .fancyfont1{
        font-family: 'Roboto', sans-serif;
        font-size: 19px;
    }

</style>

@endsection