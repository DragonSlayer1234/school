@extends('teacher.layouts.app')
@include ('teacher.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My olympiads</div>

                <div class="card-body">
                  <a href="{{route('teacher.olympiad.create')}}" class="btn btn-success">Add an olympiad</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Type</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->name}}</td>
                                <td>{{$olympiad->subject->name}}</td>
                                <td>{{$olympiad->type}}</td>
                                <td>{{ $olympiad->paid ? 'Paid' : 'Free' }}</td>
                                <td>{{$olympiad->start_date}}</td>
                                <td>{{$olympiad->end_date}}</td>
                                <td>{{$olympiad->cost}}</td>
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
