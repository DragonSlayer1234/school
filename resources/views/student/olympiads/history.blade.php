@extends('layouts.app')

@section('content')
    <main class="container participants py-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h3 class="text-center title mb-3">История олимпиад</h3>
                <ul class="list-group">
                  <li class="list-group-item bb">
                    <div class="row participants-header">
                        <div class="col">
                            Название
                        </div>
                        <div class="col">
                            Оценка
                        </div>
                        <div class="col">
                            Место
                        </div>
                    </div>
                  </li>

                  @foreach ($participants as $participant)
                      <li class="list-group-item bb-light">
                        <div class="row align-items-center">
                            <div class="col first-li">
                                <a class="olympiad-link" href="{{ route('olympiad.show', $participant->olympiad) }}">{{ $participant->olympiad->name }}</a>
                            </div>
                            <div class="col">
                                {{ $participant->mark }}
                            </div>
                            <div class="col">
                                @if ($participant->isWinner())
                                    {{ $participant->winner->place }}
                                @else
                                    Нет
                                @endif
                            </div>

                        </div>
                      </li>
                  @endforeach



            </ul>
            </div>
        </div>
    </main>
@endsection
