@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('main-title')</div>

                    <div class="card-body">
                        @yield('main-content')
                    </div>
                </div>
            </div>

            <div class="col-md-2">
              <div class="card card-nav-tabs">
                <div class="card-header card-header-danger">
                  Options
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="{{ route('teacher.olympiad.draft') }}">Olympiads</a></li>
                  <li class="list-group-item"><a href="{{ route('teacher.profile.edit') }}">Edit profile</a></li>
                  <li class="list-group-item"><a href="{{ route('show-password-form') }}">Change password</a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>
@endsection
