@extends('layouts.app')
@section('content')

    <main class="container participants py-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h3 class="text-center title mb-3">Участники олимпиады</h3>
                <ul class="list-group">
                  <li class="list-group-item bb">
                    <div class="row participants-header">
                        <div class="col">
                            Участник
                        </div>
                        <div class="col">
                            Ответ
                        </div>
                        <div class="col">
                            Время выполнения
                        </div>
                        <div class="col">
                            Оценка
                        </div>
                        <div class="col">
                            Место
                        </div>
                    </div>
                  </li>

                  @foreach ($olympiad->participants as $participant)
                      <li class="list-group-item bb-light">
                        <div class="row align-items-center">
                            <div class="col first-li">
                                {{ $participant->student->getFullname() }}
                            </div>
                            <div class="col">
                                @if ($participant->hasAnswer())
                                    <a class="olympiad-link" href="{{ route('download', ['path' => $participant->answer->path]) }}">Загрузить</a>
                                @else
                                    Ответ отсутствует
                                @endif
                            </div>
                            <div class="col">
                                hz
                            </div>
                            <div class="col table-div">
                                <form action="{{ route('teacher.participant.mark', $participant) }}" method="post">
                                    @csrf
                                    <input type="text" name="mark" size="5" value="{{ $participant->mark }}">
                                    <button type="submit" class="btn"><i class="fas fa-check"></i></button>
                                </form>
                            </div>
                            <div class="col">
                                <form action="{{ route('teacher.participant.set-place', $participant) }}" method="post">
                                    @csrf
                                    <select class="place custom-select py-0" name="place">
                                        <option {{ !$participant->isWinner() ? 'selected' : '' }}>Нет</option>
                                        <option value="1" {{ $participant->isWinner() && $participant->winner->place === 1 ? 'selected' : '' }}>Первое</option>
                                        <option value="2" {{ $participant->isWinner() && $participant->winner->place === 2 ? 'selected' : '' }}>Второе</option>
                                        <option value="3" {{ $participant->isWinner() && $participant->winner->place === 3? 'selected' : '' }}>Третье</option>
                                    </select>
                                    <button type="submit" class="btn"><i class="fas fa-check"></i></button>
                                </form>

                            </div>
                        </div>
                      </li>
                  @endforeach



            </ul>
            <form action="{{ route('teacher.olympiad.finish', $olympiad) }}" method="post">
                @csrf
                <button type="submit" class="site-btn float-right mt-3">Подтвердить</button>
            </form>
            </div>
        </div>
    </main>

@endsection
