@extends('student.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cabinet</div>

                    <div class="card-body">
                        @include('student.cabinet.edit')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Options</div>

                    <div class="card-body">
                        <a href="{{ route('show-password-form') }}">Change password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
