{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content-top')
    @include('partials/navbar')
@endsection


@section('content')


</div>
@endsection
