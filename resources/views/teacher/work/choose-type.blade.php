@extends('teacher.layouts.app')

@section('content')
    @include ('teacher.nav')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Choose work type</div>

                    <a class="btn btn-primary" href="{{ route('teacher.file.create', $olympiad) }}">file</a>
                    <a class="btn btn-success" href="#">test</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
