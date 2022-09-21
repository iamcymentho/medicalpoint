@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center"><b>{{ __('User Profile') }}</b></div>

                <div class="card-body">
                   <p><b>Name: {{ auth()->user()->name }}</b></p>
                   <p><b>Email: {{ auth()->user()->email }}</b></p>
                   <p><b>Address: {{ auth()->user()->address }}</b></p>
                    <p><b>Phone Number: {{ auth()->user()->phone_number }}</b></p>
                    <p><b>Gender: {{ auth()->user()->gender }}</b></p>
                    <p><b>Bio: {{ auth()->user()->description }}</b></p>
                </div>
            </div>
        </div>

         <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center"><b>{{ __('Udate Profile') }}</b></div>

                <div class="card-body">
                   <form action="" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="" class="mb-2"><b>Name</b></label>
                        <input type="text" name="name" class="form-control" placeholder="enter full names">
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-2"><b>Address</b></label>
                        <input type="text" name="address" class="form-control" placeholder="enter full home address">
                    </div>

                    <div class="form-group mb-3">
                         <label for="" class="mb-2"><b>Phone Number</b></label>
                        <input type="number" name="phone_number" class="form-control" placeholder="enter phone number">
                    </div>

                    <div class="form-group mb-3">
                          <label for="" class="mb-2"><b>Gender</b></label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select gender</option>
                                <option value="male" @if(auth()->user()->gender==='male')selected @endif >Male</option>
                                <option value="female" @if(auth()->user()->gender==='female')selected @endif>Female</option>
                            </select>
                            @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                     <div class="form-group mb-3">
                         <label for="" class="mb-2"><b>Biography</b></label>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="write about yourself" class="form-control"></textarea>
                    </div>

                     <div class="form-group mb-2 mt-2">
                        <button type="submit" class="btn btn-primary">Update profile</button>
                    </div>

                   </form>
                </div>
            </div>
        </div>

         <div class="col-md-3">
            <div class="card shadow ">
                <div class="card-header text-center"><b>{{ __('Update profile picture') }}</b></div>

                <div class="card-body justify-content-center ">
                       <div class="">
                         <img src="/images/MMQ9tUxSB1HiPsIBzIa6zjJ7UWMTjVRBQrFloyoG.jpg" alt="" width="200" class="shadow rounded-circle " >
                       </div>

                       <input type="file" name="image" class="form-control mt-3">
                       <button type="submit" class="btn btn-primary mt-3">Update  picture</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
