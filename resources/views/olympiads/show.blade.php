@extends('layouts.app')
@section('content')
    <main class="container-fluid main-container py-5">
        <div class="row justify-content-center">
            <div class="col-3 px-5">
                <h5 class="mb-3 text-center">Участники олимпиады</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 90%">Участник</th>
                            <th>Результат</th>
                            <th>Место</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($olympiad->getParticipants() as $participant)
                            <tr>
                                <td>{{ $participant->student->getFullname() }}</td>
                                <td class="text-center">{{ $participant->mark ?? 'Неизвестно' }}</td>
                                <td class="text-center">
                                    <place :place="{{ $participant->place ?? 0 }}"></place>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">Участники отсутствуют</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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

                    <hr>
                    <h5 class="mb-2">Как проходит олимпиада</h5>
                    <p>Участники собираются в Астане накануне открытия, 25 апреля. Далее в течение трёх дней они решают задачи по экономике, финансовой грамотности и анализируют бизнес-кейсы.</p>

                    <hr>
                    <h5 class="mb-2">
                        Как принять участие
                    </h5>
                    <p>
                        Олимпиада проводится для школьников 9–11‑го классов. Желающие принять участие должны направить заявку в Организационный комитет. Для вас экономическая олимпиада — это шанс проверить свои знания и получить новые. Для организаторов — возможность найти талантливых подростков, которые интересуются экономикой, бизнесом и финансами.
                    </p>
                </div>

                <div class="col-2">
                    <p class="mb-0"><b>Начало:</b> {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>
                    <p class="mb-0"><b>Окончание:</b> {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>
                    <p><b>Длительность:</b> {{ $olympiad->getDuration() }}</p>

                    @if ($olympiad->isActive())
                        <div class="alert alert-custom p-0" role="alert">
                            <i class="fas fa-exclamation-triangle warning-icon"></i> В данной олимпиаде могу принять участие только вошедшие ученики!
                        </div>
                    @else
                        <div class="alert alert-custom p-0" role="alert">
                            <i class="fas fa-exclamation-triangle warning-icon"></i> Принять участие в олимпиаде невозможно !
                        </div>
                    @endif
                </div>

            </div>
        </main>


    @endsection
