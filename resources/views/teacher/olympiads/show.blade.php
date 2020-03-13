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

                    @include('teacher.olympiads.nav', ['type' => ''])

                    <div class="olympiad-info">
                        <h5 class="header">{{ $olympiad->name }}</h5>

                        <p class="mt-4">
                            <span class="title">Предмет:</span>
                            <span class="value">
                                <i class="far fa-bookmark"></i>
                                {{ $olympiad->subject->name }}
                            </span>
                        </p>

                        <p class="mt-4">
                            <span class="title">Дата начала:</span>
                            <span class="value">
                                <i class="far fa-calendar-alt"></i>
                                {{ $olympiad->getStartDate() }}
                            </span>
                        </p>

                        <p>
                            <span class="title">Дата окончания:</span>
                            <span class="value">
                                <i class="far fa-calendar-alt"></i>
                                {{ $olympiad->getEndDate() }}
                            </span>
                        </p>

                        <p>
                            <span class="title">Цена:</span>
                            <span class="value">
                                <i class="fas fa-tenge"></i>
                                {{ $olympiad->cost !== 0 ? $olympiad->cost : 'Free' }}
                            </span>
                        </p>

                        <p>
                            <span class="title">Задание:</span>
                            <span class="value">
                                <a href="{{ route('download') }}?path={{ $olympiad->work->path }}" class="btn btn-primary">
                                    <i class="fas fa-download"></i>
                                    Скачать
                                </a>
                            </span>
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>




@endsection
