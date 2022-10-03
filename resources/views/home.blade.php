@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Your Dashboard') }}</div>

                <div class="card-body">

                    <add-btn></add-btn>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as ') }}<b>{{ auth()->user()->name }}</b>. &nbsp;&nbsp;<span>You've taken first major step to health maintenance </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
