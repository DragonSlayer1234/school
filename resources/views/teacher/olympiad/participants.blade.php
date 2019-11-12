@extends('teacher.layouts.app')
@include ('teacher.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$olympiad->name}} participants</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiad->participants as $participant)
                            <tr>
                                <td>{{$participant->student->getFullname()}}</td>
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
