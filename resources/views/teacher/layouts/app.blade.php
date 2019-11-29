@extends('layouts.app')

@section('auth')
    @auth ('teacher')
      @include('teacher.layouts.auth')
    @endauth
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
                        <p><a href="{{ route('teacher.olympiad.draft') }}" class="btn btn-outline-success">My olympiads</a></p>
                        <p><a href="{{ route('teacher.olympiad.moderating') }}" class="btn btn-outline-primary">Olympiads on moderation</a></p>
                        <p><a href="{{ route('teacher.olympiad.checking') }}" class="btn btn-outline-primary">Checking olympiads</a></p>
                        <p><a href="{{ route('teacher.olympiad.rejected') }}" class="btn btn-outline-danger">Rejected olympiads</a></p>
                        <p><a href="{{ route('teacher.profile.edit') }}" class="btn btn-outline-info">Edit profile</a></p>
                        <p><a href="{{ route('show-password-form') }}" class="btn btn-outline-danger">Change password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
