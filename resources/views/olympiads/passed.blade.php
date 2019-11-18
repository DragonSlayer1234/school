@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Passed olympiads</div>

                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Participants</th>
                        <th scope="col">Winners</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td><a href="{{ route('olympiad.show', $olympiad) }}">{{ $olympiad->name }}</a></td>
                                <td><a href="{{ route('olympiad.participants', $olympiad) }}">Participants</a></td>
                                <td><a href="{{ route('olympiad.winners', $olympiad) }}">Winners</a></td>
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