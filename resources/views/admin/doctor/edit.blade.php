@extends('admin.layouts.master')

@section('content')

   <div class="page-header fancyfont">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
    <i class="ik ik-edit bg-blue"></i>
    <div class="d-inline">
        <h5>Doctors</h5>
        <span>Update doctor</span>
    </div>
</div>
</div>
<div class="col-lg-4">
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="../index.html"><i class="ik ik-home"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
</nav>
</div>
</div>
</div>

<div class="row justify-content-center fancyfont">
    <div class="col-md-10">

         @if (Session::has('message'))
                <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

        <div class="card">
            <div class="card-header">

                <div class="mx-auto">
                    <h2>Update  Information</h2>
                </div>
                {{-- card header ends here --}}
            </div>

            <div class="caed-body">
                <form action="{{ route('doctor.update',[$user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mx-auto">
                        <div class="col-md-5 mt-3 mb-3 m-4">
                            <label for="fullname"><b>Fullname</b></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter doctor's name" value="{{ $user->name}}">

                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><p>{{ $message }}</p></strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-5 mt-3 mb-3 m-4 ">
                            <label for="email"><b>Email Address</b></label>
                            <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror"  placeholder="Enter doctor's email" value="{{ $user->email }}">

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><p>{{ $message }}</p></strong>
                                    </span>
                                @enderror
                        </div>
                    </div>


                     <div class="row mx-auto">
                        <div class="col-md-5 m-4">
                            <label for="password"><b>Password</b></label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter password" value="{{ old('password') }}">

                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><p>{{ $message }}</p></strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-5 mt-3 mb-3 m-4 ">
                            <label for="" class="form-label"><b>Gender</b></label>
                            <select name="gender" id=""  class="form-control @error('gender') is-invalid @enderror">

                                <option value="">Choose gender</option>

                               @foreach (['male', 'female'] as $gender )
                                   
                               <option value="{{ $gender }}" @if($user->gender==$gender) selected @endif>{{ $gender }}</option>
                               @endforeach
                            </select>

                            @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><p>{{ $message }}</p></strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                     <div class="row mx-auto">
                        <div class="col-md-5 m-4">
                            <label for="education"><b>Education</b></label>
                            <input type="text" name="education"  class="form-control @error('education') is-invalid @enderror" placeholder="Doctor's highest degree" value="{{ $user->education }}">

                            @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><p>{{ $message }}</p></strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-5 mt-3 mb-3 m-4 ">
                            <label for="address" class="form-label"><b>Address</b></label>

                            <input type="text" name="address"  class="form-control @error('address') is-invalid @enderror" placeholder="Doctor's full address" value="{{ $user->address }}">

                            @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong><p>{{ $message }}</p></strong>
                        </span>
                    @enderror
                           
                        </div>
                    </div>


                     <div class="row mx-auto">
                <div class="col-md-5 m-4">
                    <div class="form-group">
                        <label for="department_id" class="form-label"><b>Specialization</b></label>
                       <select name="department_id" id="department_id" class="form-control  @error('department_id') is-invalid @enderror">
                        {{-- <input type="text" name="department"  class="form-control @error('department') is-invalid @enderror" placeholder="Enter department" value="{{ old('department') }}"> --}}

                        <option value="">select department</option>

                    @foreach (App\Models\Department::all() as $department)

                        {{-- <option value="{{ $department->id }}">{{ $department->name }}</option>     --}}

                        @if($user->id == $department->id)
							<option value="{{$department->id}}" selected>{{$department->name}}</option>

						@else
							<option value="{{$department->id}}" >{{$department->name}}</option>

						@endif	
                    @endforeach

                    </select>

                         @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong><p>{{ $message }}</p></strong>
                        </span>
                    @enderror
                        
                    </div>
                </div>

                <div class="col-md-5 mt-3 mb-3 m-4">
                    <div class="form-group">
                        <label for="phone_number"><b>Phone number</b></label>
                        <input type="number" name="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter phone number" value="{{ $user->phone_number }}">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong><p>{{ $message }}</p></strong>
                        </span>
                    @enderror
                        
                    </div>
                </div>

            </div>

            <div class="row mx-auto">
                <div class="col-md-5 m-4">
                      <div class="form-group">
            <label><b>File upload</b></label>
            {{-- <input type="file" name="img[]" class="file-upload-default"> --}}
            <div class="input-group col-xs-12">
                <input type="file" class="form-control @error('image') is-invalid @enderror file-upload-info" name="image"  placeholder="Upload Image">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Browse</button>
                </span>

                 @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong><p>{{ $message }}</p></strong>
                </span>
            @enderror
            </div>
        </div>

        
                </div>

                <div class="col-md-5 m-4">
                    <label for=""><b>Role</b></label>
                    <select name="role_id" id="" class="form-control @error('role_id') is-invalid @enderror">
                        <option value="">Please select role</option>

                            @foreach (App\Models\Role::where('name', '!=', 'patient')->get() as $role )
        <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                            @endforeach
                    </select>

                    @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong><p>{{ $message }}</p></strong>
                </span>
            @enderror
                </div>
            </div>

            <div class="row mx-auto">
                <div class="col-md-8 m-3">
                     <div class="form-group">
                <label for="desription"><b>Description</b></label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description">{{ $user->description }}</textarea>

                 @error('description')
            <span class="invalid-feedback" role="alert">
                <strong><p>{{ $message }}</p></strong>
            </span>
        @enderror
            </div>
                </div>

                

            </div>

            <div class="row mx-auto m-3">
                
                    <div class="col-md-10 m-3">
                    <button class="btn btn-outline-primary btn-lg">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2 btn-lg">Update</button>
            

                </div>

               
                
            </div>

                </form>
            </div>

            {{-- card ends here --}}
        </div>
    </div>
</div>

<style>
    .fancyfont{
        font-family: 'Roboto', sans-serif;
    }
</style>

@endsection