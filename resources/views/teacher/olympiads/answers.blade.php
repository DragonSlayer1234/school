@extends('teacher.layouts.app')

@section('main-title', $olympiad->name . 'participants')

@section('main-content')

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Answer</th>
          <th scope="col">Mark</th>
        </tr>
      </thead>

      <tbody>
          @foreach($participants as $participant)
              <tr>
                  <td>{{ $participant->student->getFullname() }}</td>
                    <td><form action="{{ route('download') }}" method="post">
                        @csrf
                        <input type="hidden" name="path" value="{{ $participant->file->path }}">
                        <button type="submit">download</button>
                    </form></td>
                  <td><form action="{{ route('teacher.participant.mark', $participant) }}" method="post">
                      @csrf
                      <input type="text" name="mark" value="{{ $participant->mark }}">
                      <button type="submit">mark</button>
                  </form></td>
                  <td><form action="{{ route('teacher.winner.choose', $participant) }}" method="post">
                      @csrf
                      <input type="text" name="place">
                      <button type="submit">winner</button>
                  </form></td>
              </tr>
          @endforeach

      </tbody>
    </table>
    <form action="{{ route('teacher.olympiad.announce', $olympiad) }}" method="post">
        @csrf
        <button type="submit">announce winners</button>
    </form>

@endsection
