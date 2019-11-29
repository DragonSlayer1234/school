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
                        <th scope="col">Login</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Reset password</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td><a href="{{route('admin.teacher.edit', $teacher)}}">{{$teacher->login}}</a></td>
                                <td>{{$teacher->getFullname()}}</td>
                                <td>{{$teacher->status}}</td>
                                <td><form action="{{ route('admin.teacher.reset-password', $teacher) }}" method="post">
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
