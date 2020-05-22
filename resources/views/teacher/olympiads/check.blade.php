@extends('layouts.app')
@section('content')

    <main class="container participants py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">
                            Проверка олимпиады - {{ $olympiad->name }}
                            <span class="olympiad-dates float-right">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. HH:mm') }}
                                -
                                {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. HH:mm') }}
                            </span>
                        </h5>
                        <p class="mb-1">
                            <b><i class="fas fa-file-invoice"></i> Описание:</b> {{ $olympiad->description }}
                        </p>
                        <hr class="my-1">
                        <p class="mb-1"><b><i class="fas fa-book"></i> Предмет:</b> {{$olympiad->subject->name}}</p>
                        <hr class="my-1">
                        <p class="mb-1"><b><i class="fas fa-tenge"></i> Цена:</b> {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
                        <hr class="my-1">
                        <p class="mb-1"><b><i class="fas fa-clock"></i> Длительность:</b> {{ $olympiad->getDuration() }}</p>
                        {{-- <hr class="my-1"> --}}
                        {{-- <p class="mb-1"><b><i class="fas fa-calendar-alt"></i> Начало:</b> {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>
                        <p class="mb-1"><b><i class="fas fa-calendar-alt"></i> Конец:</b> {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p> --}}
                    </div>
                </div>
            </div>

            @foreach ($olympiad->participants as $participant)
                <div class="col-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body p-1">
                            <h5 class="answer"><i class="fas fa-user"></i> {{ $participant->student->getFullname() }}</h5>
                            <hr class="o-footer">
                            @if ($participant->hasAnswer())
                                <p>
                                    <a class="olympiad-link" href="{{ route('download', ['path' => $participant->answer->path]) }}">
                                        <i class="fas fa-download"></i>
                                        Загрузить работу
                                    </a>
                                </p>
                            @else
                                <p>Ответ отсутствует</p>
                            @endif
                            <hr>
                            <p-mark :participant="{{ $participant }}"></p-mark>

                            <hr class="o-footer">

                            <p class="btn-accordion mb-0" data-toggle="collapse" data-target="#collapse{{ $participant->id }}" aria-expanded="false" aria-controls="collapseExample">
                                <b>Комментарии:</b>
                            </p>

                            <div class="collapse" id="collapse{{ $participant->id }}">
                                <p class="mt-4 mb-0">
                                    {{ $participant->answer->comment ?? 'Комментарий отсутствует' }}
                                </p>
                            </div>
                        </div>

                        {{-- <div class="card-footer o-footer text-muted ">
                            <p class="btn-accordion mb-0" data-toggle="collapse" data-target="#collapse{{ $participant->id }}" aria-expanded="false" aria-controls="collapseExample">
                                <b>Комментарии:</b>
                            </p>

                            <div class="collapse" id="collapse{{ $participant->id }}">
                                <p class="mt-4 mb-0">
                                    {{ $participant->answer->comment ?? 'Комментарий отсутствует' }}
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                <form action="{{ route('teacher.olympiad.finish', $olympiad) }}" method="post">
                    @csrf
                    <button type="submit" class="site-btn float-right mt-3">Объявить результаты</button>
                </form>
            </div>
        </div>

    </main>

@endsection
