@extends('student.layouts.app')
@include ('student.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Active olympiads</div>

                <div class="card-body">
                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{ $olympiad->name }}</td>
                                <td><a href="{{ route('student.olympiad.participants', $olympiad) }}">show</a></td>
                                <td><form action="{{ route('student.olympiad.join', $olympiad) }}" method="post">
                                    @csrf
                                    <input type="submit" value="join" class="btn btn-primary">
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
