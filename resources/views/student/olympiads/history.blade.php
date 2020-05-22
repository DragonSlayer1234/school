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

                    @forelse ($participants as $participant)
                        <li class="list-group-item border-bottom">
                          <div class="row align-items-center">
                              <div class="col first-li">
                                  <a class="olympiad-link" href="{{ route('olympiad.show', $participant->olympiad) }}">{{ $participant->olympiad->name }}</a>
                              </div>
                              <div class="col">
                                  {{ $participant->mark ?? 'Неизвестно' }}
                              </div>
                              <div class="col">
                                  {{ $participant->place ?? 'Нет' }}
                              </div>

                          </div>
                        </li>
                    @empty
                        <li class="list-group-item border-bottom">
                            <h5>Вы еще не участвовали в олимпиадах</h5>
                        </li>
                    @endforelse



                </ul>
            </div>
        </div>
    </main>
@endsection
