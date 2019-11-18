@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$olympiad->name}}</div>

                <div class="card-body">
                              <p>Subject: {{$olympiad->subject->name}}</p>
                              <p>Type: {{$olympiad->type}}</p>
                              <p>Cost: {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
                              <p>Starts at: {{$olympiad->start_date}}</p>
                              <p>Ends at: {{$olympiad->end_date}}</p>
                              @if ($olympiad->isFileWork())
                                  <p><form action="{{ route('download') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="path" value="{{ $olympiad->file->path }}">
                                      <input type="submit" value="download" class="btn btn-primary">
                                  </form></p>
                              @endif
                              <p><form action="{{ route('admin.olympiad.accept', $olympiad) }}" method="POST">
                                      @csrf
                                      <input type="submit" value="accept" class="btn btn-success">
                                  </form>
                                  <form action="{{ route('admin.olympiad.reject', $olympiad) }}" method="POST">
                                      @csrf
                                      <input type="submit" value="reject" class="btn btn-danger">
                                  </form>
                              </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
