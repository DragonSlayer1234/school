@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teachers</div>

                <div class="card-body">
                  <a href="{{ route('admin.teacher.create') }}" class="btn btn-success">Add a teacher</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Login</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td><a href="{{route('admin.teacher.edit', $teacher)}}">{{$teacher->login}}</a></td>
                                <td>{{$teacher->firstname}}</td>
                                <td>{{$teacher->surname}}</td>
                                <td>{{$teacher->lastname}}</td>
                                <td>{{$teacher->status}}</td>
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
