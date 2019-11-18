@extends('teacher.layouts.app')

@section('main-title', 'Checking olympiads')

@section('main-content')

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Answers</th>
      </tr>
    </thead>

    <tbody>
        @foreach($olympiads as $olympiad)
            <tr>
                <td><a href="{{ route('teacher.olympiad.show', $olympiad) }}">{{ $olympiad->name }}</a></td>
                <td><a href="{{ route('teacher.olympiad.answers', $olympiad) }}">Check</a></td>
            </tr>
        @endforeach

    </tbody>
  </table>

@endsection
