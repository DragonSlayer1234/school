@extends('teacher.layouts.app')
@include ('teacher.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Attach file</div>

                <form action="{{ route('teacher.file.store', $olympiad) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="file">File</label>
                  <input type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file">
                  @error('file')
                      <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Attach</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
