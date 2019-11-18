@extends('teacher.layouts.app')

@section('main-title', 'Attach file')

@section('main-content')

   <form action="{{ route('teacher.file.store', $olympiad) }}" method="post" enctype="multipart/form-data">
     @csrf

     <div class="custom-file">
       <input type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file">
       <label class="custom-file-label" for="file">Choose file</label>
       @error('file')
           <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
       @enderror
     </div>

     <button type="submit" class="btn btn-primary">Attach</button>
   </form>
   
@endsection
