@extends('teacher.layouts.app')

@section('main-title', 'Choose work type')

@section('main-content')

    <a class="btn btn-primary" href="{{ route('teacher.file-work.create', $olympiad) }}">file</a>
    <a class="btn btn-success" href="#">test</a>

@endsection
