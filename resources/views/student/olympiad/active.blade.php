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
                      <div class="alert alert-error">
                          {{ session('error') }}
                      </div>
                  @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td><a href="#">{{ $olympiad->name }}</a></td>
                                <td><form action="{{ route('student.olympiad.join', $olympiad) }}" method="post">
                                    @csrf

                                    <input type="submit" value="Join">
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
