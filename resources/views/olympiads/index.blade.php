@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olympiads</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Participants</th>
                        <th scope='col'>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->name}}</td>
                                <td>{{$olympiad->start_date}}</td>
                                <td>{{$olympiad->end_date}}</td>
                                <td><a href="{{ route('olympiad.participants', $olympiad) }}">Participants</a></td>
                                <td><form action="{{ route('student.olympiad.join', $olympiad) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">join</button>
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
