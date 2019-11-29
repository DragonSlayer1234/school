@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subjects</div>

                <div class="card-body">
                  <a href="{{route('admin.subject.create')}}" class="btn btn-success">Add a subject</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td><a href="{{ route('admin.subject.edit', $subject) }}">{{ $subject->name }}</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
