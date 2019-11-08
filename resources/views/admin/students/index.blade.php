@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                  <a href="{{route('admin.student.create')}}" class="btn btn-success">Add a student</a>
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
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td><a href="{{route('admin.student.edit', $student)}}">{{$student->login}}</a></td>
                                <td>{{$student->firstname}}</td>
                                <td>{{$student->surname}}</td>
                                <td>{{$student->lastname}}</td>
                                <td>{{$student->status}}</td>
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
