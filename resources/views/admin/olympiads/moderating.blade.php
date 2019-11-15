@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olympiads on moderating</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->id}}</td>
                                <td><a href="{{ route('admin.olympiad.show', $olympiad) }}">{{ $olympiad->name }}</a></td>
                                <td>{{$olympiad->teacher->getFullname()}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
