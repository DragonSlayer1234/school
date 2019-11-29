@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$olympiad->name}} winners</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mark</th>
                        <th scope="col">Place</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiad->winners as $winner)
                            <tr>
                                <td>{{$winner->participant->student->getFullname()}}</td>
                                <td>{{$winner->participant->mark}}</td>
                                <td>{{$winner->place}}</td>
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
