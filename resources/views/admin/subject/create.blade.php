@extends('layouts.app')

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
                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
