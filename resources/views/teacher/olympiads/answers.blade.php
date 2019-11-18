@extends('layouts.app')
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
                        <th scope="col">Answer</th>
                        <th scope="col">Mark</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiad->participants as $participant)
                            <tr>
                                <td>{{ $participant->student->getFullname() }}</td>
                                <td><form action="{{ route('download') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="path" value="{{ $participant->fileAnswer->path }}">
                                    <button type="submit">download</button>
                                </form></td>
                                <td><form action="{{ route('teacher.olympiad.mark', $participant) }}" method="post">
                                    @csrf
                                    <input type="text" name="mark" value="{{ $participant->mark }}">
                                    <button type="submit">mark</button>
                                </form></td>
                                <td><form action="{{ route('teacher.olympiad.choose-winner', $participant) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
