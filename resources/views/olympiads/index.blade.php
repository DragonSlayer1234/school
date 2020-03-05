@extends('layouts.app')
@section('content')

<div class="container">

      <div class="row justify-content-center">
          @foreach($olympiads as $olympiad)
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">{{$olympiad->name}}</h5>
                  <a href="{{ route('olympiad.participants', $olympiad) }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
            </div>
          @endforeach
      </div>
</div>
@endsection
