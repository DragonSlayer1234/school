@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Drafts</div>

                <div class="card-body">
                  <a href="{{route('teacher.olympiad.create')}}" class="btn btn-success">Add an olympiad</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Work</th>
                        <th scope="col">Moderating</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td><a href="{{ route('teacher.olympiad.show', $olympiad) }}">{{ $olympiad->name }}</a></td>
                                <td>
                                  @if (!$olympiad->hasWork())
                                    <a href="{{ route('teacher.work.choose-type', $olympiad) }}" class="btn btn-primary">attach</a>
                                  @else
                                    @if ($olympiad->isFileWork())
                                      <form action="{{ route('teacher.file.delete', $olympiad) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <input type="submit" value="detach">
                                      </form>
                                    @endif
                                  @endif
                                </td>
                                <td><form action="{{ route('teacher.olympiad.to-moderation', $olympiad) }}" method="post">
                                    @csrf
                                    <input type="submit" value="To moderating" class="btn btn-success">
                                  </form>
                                </td>
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
