@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-3 side-menu">
                    @include('teacher.layouts.nav', ['active' => 'olympiad.index'])
                </div>

                <div class="col-9 main">
                    @include('teacher.layouts.alert')

                    <h5 class="header">Мои олимпиады</h5>

                    @include('teacher.olympiads.nav', ['type' => 'upcoming'])

                    <ul class="list-group list-group-flush olympiad-list px-4 mt-4">
                        @foreach ($olympiads as $olympiad)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-1">
                                        <img src="{{ $olympiad->subject->image }}"  class="rounded-circle">
                                    </div>
                                    <div class="col-8 pl-4">
                                        <div>{{ $olympiad->name }}</div>
                                        <div class="dates">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $olympiad->getAllDates() }}
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <a href="{{ route('teacher.olympiad.show', $olympiad->id) }}" class="btn btn-primary">Подробнее</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
    </div>


@endsection
