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

    @foreach ($errors->all() as $error )
        <div class="alert alert-danger fancyfont">
           <strong> {{ $error }} </strong>
        </div>
    @endforeach

    <form action="{{ route('appointment.store') }}" method="POST">
    @csrf

    <div class="card fancyfont1">
        <div class="card-header ">
            Choose date
        </div>

        <div class="card-body">
             <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        </div>

        {{-- card ends here --}}
    </div>


     <div class="card fancyfont1">
        <div class="card-header ">
            Choose AM Time

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

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.00am">6.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.20am">6.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="6.40am">6.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.00am">7.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.20am">7.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="7.40am">7.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.00am">8.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.20am">8.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="8.40am">8.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.00am">9.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.20am">9.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="9.40am">9.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.00am">10.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.20am">10.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="10.40am">10.40AM</td>
                </tr>

                <tr>
                <th scope="row"></th>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.00am">11.00.00AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.20am">11.20AM</td>
                <td><input type="checkbox" name="time[]" class="form-check-input" value="11.40am">11.40AM</td>
                </tr>


                
        </tbody>
        </table>
        </div>

        {{-- card ends here --}}
    </div>



         <div class="card fancyfont1">
        <div class="card-header ">
            Choose PM Time
        </div>

        <div class="card-body">
                <table class="table table-striped">
        <tbody>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.00pm">12.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.20pm">12.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="12.40pm">12.40PM</td>
            </tr>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.00pm">1.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.20pm">1.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="1.40pm">1.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.00pm">2.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.20pm">2.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="2.40pm">2.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.00pm">3.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.20pm">3.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="3.40pm">3.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.00pm">4.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.20pm">4.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="4.40pm">4.40PM</td>
            </tr>

            <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.00pm">5.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.20pm">5.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="5.40pm">5.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.00pm">6.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.20pm">6.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="6.40pm">6.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.00pm">7.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.20pm">7.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="7.40pm">7.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.00pm">8.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.20pm">8.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="8.40pm">8.40PM</td>
            </tr>

             <tr>
            <th scope="row"></th>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.00pm">9.00PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.20pm">9.20PM</td>
            <td><input type="checkbox" name="time[]" class="form-check-input" value="9.40pm">9.40PM</td>
            </tr>
                
        </tbody>
        </table>
        </div>

        {{-- card ends here --}}
    </div>


    <div class="card fancyfont">
        <div class="card-body">
            <button type="submit" class="btn btn-primary ">Make a schedule</button>
        </div>
        {{-- card ends here --}}
    </div>

    {{-- form ends here --}}
    </form>

    {{-- container ends here --}}
</div>

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