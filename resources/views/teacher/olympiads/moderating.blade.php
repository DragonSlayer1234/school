@extends('teacher.layouts.app')

@section('main-title', 'Olympiads on moderating')

@section('main-content')

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
        </tr>
      </thead>

      <tbody>
          @foreach($olympiads as $olympiad)
              <tr>
                  <td><a href="{{ route('teacher.olympiad.show', $olympiad) }}">{{ $olympiad->name }}</a></td>
              </tr>
          @endforeach

      </tbody>
    </table>

@endsection
