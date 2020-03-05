@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @yield('main-content')
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="list-group">
                        <a href="{{ route('student.profile.edit') }}" class="list-group-item list-group-item-action active">
                            Edit profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
