@extends('student.layouts.app')

@section('main-title', $olympiad->name . "'s answer paper")

@section('main-content')

    <p>
        <form action="{{ route('download') }}" method="POST">
            @csrf
            <input type="hidden" name="path" value="{{ $olympiad->file->path }}">
            <input type="submit" value="download" class="btn btn-primary">
        </form>
    </p>

    <p>
        @if ($participant->hasFileAnswer())
            <form action="{{ route('student.file-answer.detach', $participant) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="detach">
            </form>
        @else
            <form action="{{ route('student.file-answer.attach', $participant) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="custom-file">
                    <input type="file" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" id="path" name="path">
                    <label class="custom-file-label" for="path">Choose file</label>
                    @error('path')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">attach answer</button>
            </form>
        @endif
    </p>

    <p><form action="{{ route('student.participant.answer', $participant) }}" method="post">
        @csrf
        <input type="submit" value="answer">
    </form></p>

@endsection
