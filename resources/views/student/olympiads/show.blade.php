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
                </div>
            </div>
            <div class="col-5 main-olympiad">
                <h5 class="mb-3">Примите участвие в олимпиаде {{ $olympiad->name }}</h5>
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
                    <h5>Как проходит олимпиада</h5>
                    <p>Участники собираются в Астане накануне открытия, 25 апреля. Далее в течение трёх дней они решают задачи по экономике, финансовой грамотности и анализируют бизнес-кейсы.</p>

                    <hr>
                    <h5>
                        Как принять участие
                    </h5>
                    <p>
                        Олимпиада проводится для школьников 9–11‑го классов. Желающие принять участие должны направить заявку в Организационный комитет. Для вас экономическая олимпиада — это шанс проверить свои знания и получить новые. Для организаторов — возможность найти талантливых подростков, которые интересуются экономикой, бизнесом и финансами.
                    </p>
                </div>

                <div class="col-3">
                    <div class="row">
                        <div class="col-11">
                            <p class="mb-0"><b>Начало:</b> {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в. HH:mm') }}</p>
                            <p class="mb-0"><b>Окончание:</b> {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в. HH:mm') }}</p>
                            <p><b>Длительность:</b> {{ $olympiad->getDuration() }}</p>

                            @if ($olympiad->hasParticipant(Auth::guard('student')->user()))
                                <p class="mb-2"><b>Задание к олимпиаде</b></p>
                                <p class="file text-truncate">
                                    <a href="{{ route('download', ['path' => $olympiad->work->path]) }}"><i class="fas fa-file-alt"></i> {{ $olympiad->work->name }}</a>
                                    {{-- <i class="far fa-file-pdf fa-lg"></i>
                                    <a href="#" class="float-right"> <i class="fas fa-download"></i></a> --}}
                                </p>

                                <p class="mb-2"><b>Ответ к олимпиаде</b></p>
                                <p class="file">
                                    @if ($participant->hasAnswer())
                                        <a href="{{ route('download', ['path' => $participant->answer->path]) }}"><i class="fas fa-file-alt"></i> {{ $participant->answer->name }}</a>
                                    @else
                                        <button type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#answerModal">
                                            Загрузить ответ
                                        </button>

                                        <div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="answerModalLabel">Загрузить ответ</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('student.olympiad.answer', $olympiad) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="comment">Введите замечания: </label>
                                                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="answer">Загрузите свою работу: </label>
                                                                <input type="file" name="answer" style="border:none" class="form-control pl-0" id="answer">
                                                            </div>
                                                            <hr>
                                                            <button type="submit" class="btn btn-primary float-right">Отправить ответ</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </p>

                            @else

                                @if ($olympiad->cost > 0)
                                    <div class="alert alert-custom" role="alert">
                                        <i class="fas fa-exclamation-triangle warning-icon"></i> Данная олимпиада является платной. Для участия вы должны заплатить 1000 тг
                                    </div>

                                    <form action="{{ route('student.olympiad.join', $olympiad) }}" method="post">
                                        @csrf
                                        <button type="submit" class="site-btn"><i class="fas fa-tenge"></i> Перейти к оплате</button>
                                    </form>
                                @else
                                    <div class="alert alert-custom" role="alert">
                                        <i class="fas fa-exclamation-triangle warning-icon"></i> Данная олимпиада является бесплатной. Участие доступно для всех желающих
                                    </div>

                                    <form action="{{ route('student.olympiad.join', $olympiad) }}" method="post">
                                        @csrf
                                        <button type="submit" class="site-btn">Принять участие</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>






    @endsection
