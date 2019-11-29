@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                  <a href="{{ route('admin.student.create') }}" class="btn btn-success">Add a student</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Login</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Reset Password</th>

                      </tr>
                    </thead>

                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td><a href="{{route('admin.student.edit', $student)}}">{{$student->login}}</a></td>
                                <td>{{$student->getFullname()}}</td>
                                <td>{{$student->status}}</td>
                                <td><form action="{{ route('admin.student.reset-password', $student) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">reset</button>
                                </form></td>
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
