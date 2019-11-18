@extends('admin.layouts.app')
@include ('admin.nav')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olympiads</div>

                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr>
                                <td>{{$olympiad->name}}</td>
                                <td>{{$olympiad->teacher->getFullname()}}</td>
                                <td>{{$olympiad->start_date}}</td>
                                <td>{{$olympiad->end_date}}</td>
                                <td>{{$olympiad->status}}</td>
                                <td>
                                    @if ($olympiad->isUpcoming())
                                        <form action="{{ route('admin.olympiad.start', $olympiad) }}" method="post">
                                            @csrf
                                            <input type="submit" value="start">
                                        </form>
                                    @elseif ($olympiad->isActive())
                                        <form action="{{ route('admin.olympiad.finish', $olympiad) }}" method="post">
                                            @csrf
                                            <input type="submit" value="finish">
                                        </form>
                                    @endif
                                </td>
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
