@extends('layouts.app')
@section('content')
    <main class="container-fluid main-container p-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="row">
                    <div class="col-11">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 90%">Участник</th>
                                    <th>Результат</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($olympiad->participants as $participant)
                                    <tr>
                                        <td>{{ $participant->student->getFullname() }}</td>
                                        <td class="text-center">{{ $participant->mark }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="2">Участники отсутствуют</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-5 main-olympiad">
                <h5 class="mb-3">{{ $olympiad->name }}</h5>
                <p class="mb-5"><i class="far fa-calendar-alt"></i> Дата проведения: {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г.') }}
                    - {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г.') }}</p>
                    <h5>ОБ ОЛИМПИАДЕ</h5>
                    <hr>

                    <p>{{ $olympiad->description }}</p>

                    <hr>

                    <p><i class="far fa-clock"></i> Начало в {{ $olympiad->getStartDate()->format('H:i') }}</p>
                    <p><i class="far fa-hourglass"></i> Длительность - {{ $olympiad->getDuration() }}</p>
                    <p><i class="far fa-bookmark"></i> Предмет: {{ $olympiad->subject->name }} </p>
                    <p><i class="fas fa-tenge"></i> Цена за участие: {{ $olympiad->getCost() }}</p>
                </div>

                <div class="col-2">
                    <div class="row">
                        <div class="col-11">
                            <p class="mb-0"><b>Начало:</b> {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в. HH:mm') }}</p>
                            <p class="mb-0"><b>Окончание:</b> {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в. HH:mm') }}</p>
                            <p><b>Длительность:</b> {{ $olympiad->getDuration() }}</p>
                            <p><b>Задание к олимпиаде</b></p>
                            <p class="file">
                                <i class="far fa-file-pdf fa-lg"></i> pidor.pdf
                                <a href="#" class="float-right"> <i class="fas fa-download"></i></a>
                            </p>
                </div>
            </div>
        </main>






    @endsection
