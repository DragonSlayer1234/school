@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olympiads</div>

                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Type</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->id}}</td>
                                <td>{{$olympiad->teacher->getFullname()}}</td>
                                <td>{{$olympiad->subject->name}}</td>
                                <td>{{$olympiad->name}}</td>
                                <td>{{$olympiad->type}}</td>
                                <td>{{ $olympiad->paid ? 'Paid' : 'Free' }}</td>
                                <td>{{$olympiad->cost}}</td>
                                <td>{{$olympiad->start_date}}</td>
                                <td>{{$olympiad->end_date}}</td>
                                <td>{{$olympiad->status}}</td>
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
