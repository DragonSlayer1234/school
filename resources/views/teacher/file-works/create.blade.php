@extends('teacher.layouts.app')

@section('main-title', 'Attach file')

@section('main-content')

   <form action="{{ route('teacher.file-work.attach', $olympiad) }}" method="post" enctype="multipart/form-data">
     @csrf

     <div class="form-group">
     <label for="name">Work</label>

     <textarea id="summernote" name="work" rows="8" cols="50" class="form-control"></textarea>
     @error('work')
         <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
     @enderror
     </div>
     <div class="custom-file">
       <input type="file" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" id="file" name="path">
       <label class="custom-file-label" for="file">Choose file</label>
       @error('path')
           <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
       @enderror
     </div>

     <button type="submit" class="btn btn-primary">Attach</button>
   </form>

@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
