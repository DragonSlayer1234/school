@extends('layouts.app')

@section('auth')
    @include('student.layouts.auth')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@yield('main-title')</div>

                    <div class="card-body">
                        @yield('main-content')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Options</div>

                    <div class="card-body">
                        <p><a href="{{ route('show-password-form') }}" class="btn btn-outline-danger">Change password</a></p>
                        <p><a href="{{ route('student.profile.edit') }}" class="btn btn-outline-info">Edit profile</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
