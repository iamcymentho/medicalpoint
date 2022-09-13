@extends('admin.layouts.master')

@section('content')

   <div class="page-header fancyfont">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
    <i class="ik ik-edit bg-blue"></i>
    <div class="d-inline">
        <h5>Doctors</h5>
        <span>Add User</span>
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
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
</div>
</div>
</div>

<div class="row justify-content-center fancyfont">
    <div class="col-md-10">

         @if ( Session::has('message'))
                <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

        <div class="card">
            <div class="card-header">

                <div class="mx-auto">
                    <h2>Confirm delete</h2>
                </div>
                {{-- card header ends here --}}
            </div>

            <div class="card-body ">

                <img src="{{ asset('images') }}/{{ $user->image }}" alt="image" width="120">
                <h3 class="mb-3">User: {{ $user->name }}</h3>
                <form action="{{ route('doctor.destroy', [$user->id]) }}" method="POST">
                    @csrf
                    @method("DELETE ")

                   

                    <div class="card-footer">
                        <div class="row mx-auto ">
                
                    <div class="col-md-10 ">
                    
                    <button type="submit" class="btn btn-danger mr-2 btn-lg">Delete</button>
            
                    <a href="{{ route('doctor.index') }}">
                       <button class="btn btn-secondary btn-lg" type="button">Cancel</button>     
                        </a>
                </div>

               
                
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