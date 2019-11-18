@extends('student.layouts.app')

@section('main-title', $olympiad->name . "'s answer paper")

@section('content')

    <p>
        <form action="{{ route('download') }}" method="POST">
            @csrf
            <input type="hidden" name="path" value="{{ $olympiad->file->path }}">
            <input type="submit" value="download" class="btn btn-primary">
        </form>
    </p>

    <p>
        @if ($participant->hasAnswer())
        <form action="{{ route('student.olympiad.file-answer.attach', $olympiad) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="custom-file">
                <input type="file" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" id="path" name="path">
                <label class="custom-file-label" for="path">Choose file</label>
                @error('path')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Answer</button>
        </form>
    </p>

@endsection
