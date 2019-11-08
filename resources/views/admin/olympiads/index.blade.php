@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olympiads</div>

                <div class="card-body">
                  <a href="{{route('admin.olympiad.create')}}" class="btn btn-success">Add an olympiad</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        <th scope="col">Exercise</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->id}}</td>
                                <td>{{$olympiad->name}}</td>
                                <td>{{$olympiad->startDate}}</td>
                                <td>{{$olympiad->endDate}}</td>
                                <td>{{$olympiad->cost}}</td>
                                <td>{{$olympiad->subject->name}}</td>
                                <td>{{$olympiad->status}}</td>
                                <td><form action="{{route('admin.olympiad.download')}}" method="post">
                                  @csrf
                                    <input name="exercise" value="{{$olympiad->exercise}}" type="hidden">
                                    <input type="submit" value="download" class="btn btn-primary">
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
