@extends('admin.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="accordion" id="participantsAccordion">

                  <div class="card">
                    <div class="card-header" id="participantsHeader">
                      <h5 class="mb-0 btn-accordion" data-toggle="collapse" data-target="#participants" aria-expanded="true" aria-controls="participants">
                          Участники
                      </h5>
                    </div>

                    <div id="participants" class="collapse show" aria-labelledby="participantsHeader" data-parent="#participantsAccordion">
                      <div class="card-body p-0">
                          <ul class="list-group list-group-flush">
                              @forelse ($olympiad->participants as $participant)
                                  <li class="list-group-item">
                                      - {{ $participant->student->getFullname() }}
                                  </li>
                              @empty
                                  <li class="list-group-item">
                                      Участники отсутствуют
                                  </li>
                              @endforelse
                          </ul>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
            <div class="col-md-6">
                @include('admin.layouts.alert')

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            {{$olympiad->name}}

                        </h5>
                    </div>

                    <div class="card-body">
                        <p>
                            <b><i class="fas fa-file-invoice"></i> Описание:</b> {{ $olympiad->description }}
                        </p>
                        <hr>
                        <p><b><i class="fas fa-book"></i> Предмет:</b> {{$olympiad->subject->name}}</p>
                        <hr>
                        <p><b><i class="fas fa-tenge"></i> Цена:</b> {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
                        <hr>
                        <p><b><i class="fas fa-clock"></i> Длительность:</b> {{ $olympiad->getDuration() }}</p>
                        <hr>
                        <p><b><i class="fas fa-calendar-alt"></i> Начало:</b> {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>
                        <p><b><i class="fas fa-calendar-alt"></i> Конец:</b> {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>

                    </div>
                </div>
            </div>

            <div class="col-3">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            Действия
                        </h5>
                    </div>

                    <div class="card-body py-2">
                        <a class="btn btn-action text-primary" href="{{ route('download', ['path' => $olympiad->work->path]) }}">
                            <span class="action-icon"><i class="fas fa-download"></i></span>
                            Скачать задание
                        </a>
                        @if ($olympiad->isModeration())
                            <form action="{{ route('admin.olympiad.accept', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-action btn-success-custom" type="submit">
                                    <span class="action-icon"><i class="far fa-check-circle"></i></span>
                                    Принять олимпиаду
                                </button>
                            </form>

                            <button class="btn btn-action btn-danger" type="button" data-toggle="modal" data-target="#rejectModal">
                                <span class="action-icon"><i class="far fa-times-circle"></i></span>
                                Отклонить олимпиаду
                            </button>

                            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Отклонить олимпиаду</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('admin.olympiad.reject', $olympiad->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                          <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" placeholder="Причина отклонения"></textarea>
                                            @error('reason')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-danger float-right" type="submit">Отклонить</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                        @elseif ($olympiad->isUpcoming())
                            <form action="{{ route('admin.olympiad.start', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-action btn-success-custom" type="submit">
                                    <span class="action-icon"><i class="fas fa-hourglass-start"></i></span>
                                    Начать олимпиаду
                                </button>
                            </form>

                        @elseif ($olympiad->isActive())
                            <form action="{{ route('admin.olympiad.finish', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-action btn-danger" type="submit">
                                    <span class="action-icon"><i class="fas fa-hourglass-end"></i></span>
                                    Завершить олимпиаду
                                </button>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
