 @extends('admin.layouts.master')

@section('content')
 
 <div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
    <div class="page-header-title">
        <i class="ik ik-inbox bg-blue"></i>
        <div class="d-inline fancyfont">
            <h5>Accredicted Doctors</h5>
            <span>List of all doctors</span>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../index.html"><i class="ik ik-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Doctors</a>
            </li>
            <li class="breadcrumb-item active fancyfont" aria-current="page">Doctor page</li>
        </ol>
    </nav>
</div>
</div>
</div>


<div class="row fancyfont2">
<div class="col-md-12">

     @if (Session::has('message'))
    <div class="alert alert-success "  >
            {{ Session::get('message') }}
        </div>
    @endif

<div class="card">
    <div class="card-header"><h3>Doctors</h3></div>
    <div class="card-body">
        <table id="data_table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="nosort">Avatar</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th class="nosort">&nbsp;</th>
                    <th class="nosort">&nbsp;</th>
                    <th class="nosort">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                @foreach ($users as $user )

               {{-- {{ dd($user->name) }} --}}
                    
                <tr>
                    <td>{{ $user->name }}</td>
                    <td><img src="{{ asset('images')}}/{{ $user->image }}" class="table-user-thumb" alt="picture"></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                     <td>{{ $user->phone_number }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                           
                                <a href="#" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="ik ik-eye" ></i>
                                    </button>
                            </a>

                            <a href="{{ route('doctor.edit', [$user->id]) }}">
                                <button type="button" class="btn btn-warning">
                                <i class="ik ik-edit-2"></i>
                                </button>
                            
                            </a>


                            <a href="{{ route('doctor.show', [$user->id]) }}">

                                <button type="button" class="btn btn-danger">
                                    <i class="ik ik-trash-2"></i>
                                </button>
                                
                            </a>

                            </a>
                        </div>
                    </td>
                    <td>x</td>
                </tr>

                        {{-- modal goes in here --}}
                        @include('admin.doctor.modal')

                @endforeach

                @else
                <td>No users found</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<style>
    .fancyfont{
        font-family: 'Roboto', sans-serif;
        size: 50px;
    }

     .fancyfont2{
        font-family: 'Roboto', sans-serif;
        /* width: 500px; */
        font-size: 17px;
    }
</style>

@endsection