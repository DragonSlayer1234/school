@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$olympiad->name}}</div>

                <div class="card-body">
                                  <p><form action="{{ route('download') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="path" value="{{ $olympiad->file->path }}">
                                      <input type="submit" value="download" class="btn btn-primary">
                                  </form></p>
                              <p>  <form action="{{ route('student.olympiad.file-answer', $olympiad) }}" method="post" enctype="multipart/form-data">
                                      @csrf

                                      <div class="custom-file">
                                        <input type="file" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" id="path" name="path">
                                        <label class="custom-file-label" for="path">Choose file</label>
                                        @error('path')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                      </div>

                                      <button type="submit" class="btn btn-primary">Answer</button>
                                  </form></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
