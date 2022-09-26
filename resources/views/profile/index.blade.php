@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white"><b>{{ __('User details') }}</b></div>

                <div class="card-body">
                   <p><b>Name: </b> {{ auth()->user()->name }}</p>
                   <hr class="text-muted">

                   <p><b>Email: </b>{{ auth()->user()->email }}</p>
                    <hr class="text-muted">

                   <p><b>Address: </b>{{ auth()->user()->address }}</p>
                    <hr class="text-muted">

                    <p><b>Phone Number: </b>{{ auth()->user()->phone_number }}</p>
                     <hr class="text-muted">

                    <p><b>Gender: </b>{{ auth()->user()->gender }}</p>
                     <hr class="text-muted">

                    <p><b>Bio: </b>{{ auth()->user()->description }}</p>
                </div>
            </div>
        </div>

         <div class="col-md-6">

             @if(Session::has('message'))
                <div class="alert alert-success">
                    <b>{{Session::get('message')}}</b>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header text-center bg-dark text-white"><b>{{ __('Udate Profile') }}</b></div>

                <div class="card-body">
                   <form action="{{ route('profile.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="" class="mb-2"><b>Name</b></label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="enter full names" autofocus>

                         @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-2"><b>Address</b></label>
                        <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control" placeholder="enter full home address">
                    </div>

                    <div class="form-group mb-3">
                         <label for="" class="mb-2"><b>Phone Number</b></label>
                        <input type="number" name="phone_number" value="{{ auth()->user()->phone_number }}" class="form-control" placeholder="enter phone number">
                    </div>

                    <div class="form-group mb-3">
                          <label for="gender" class="mb-2"><b>Gender</b></label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select gender</option>
                                <option value="male" @if(auth()->user()->gender =='male')selected @endif >Male</option>
                                <option value="female" @if(auth()->user()->gender =='female')selected @endif>Female</option>
                            </select>
                            @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                     <div class="form-group mb-3">
                         <label for="" class="mb-2"><b>Biography</b></label>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="write about yourself" class="form-control">{{ auth()->user()->description }}</textarea>
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
                <div class="card-header text-center bg-dark text-white"><b>{{ __('Update profile picture') }}</b></div>

                <form action="{{ route('profile.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="card-body justify-content-center ">

                    @if (!auth()->user()->image)
                        
                       <div class="">

                         <img src="/profile/1663954992.jpg" alt="" width="200" class="shadow rounded-circle " >

                         {{-- <img src="/images/MMQ9tUxSB1HiPsIBzIa6zjJ7UWMTjVRBQrFloyoG.jpg" alt="" width="200" class="shadow rounded-circle " > --}}

                          {{-- <img src="{{ asset('images') }}/{{ $user->image }}" alt="" width="200px" class="shadow rounded-circle "> --}}
                       </div>
                       @else
                            <img src="/profile/{{ auth()->user()->image  }}" alt="" width="200" class="shadow rounded-circle " >
                       @endif

                       <input type="file" name="file" class="form-control mt-3" required>

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                       <button type="submit" class="btn btn-primary mt-3">Update  picture</button>
                </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
