@extends('admin.layouts.app')
@include ('admin._nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                  <a href="{{route('admin.olympic.create')}}" class="btn btn-success">Add an olympic</a>
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
                        @foreach($olympics as $olympic)
                            <tr>
                                <td>{{$olympic->id}}</td>
                                <td>{{$olympic->name}}</td>
                                <td>{{$olympic->startDate}}</td>
                                <td>{{$olympic->endDate}}</td>
                                <td>{{$olympic->cost}}</td>

                                <td>{{$olympic->subject->name}}</td>

                                <td>{{$olympic->status}}</td>
                                <td><form action="{{route('admin.olympic.download')}}" method="post">
                                  @csrf
                                    <input name="exercise" value="{{$olympic->exercise}}" type="hidden">
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
