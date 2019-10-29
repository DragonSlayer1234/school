@extends('admin.layouts.app')
@include ('admin._nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an subject</div>

                <div class="card-body">
                  <form method="post" action="{{route('admin.subject.store')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                  @if ($errors->has('name'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
