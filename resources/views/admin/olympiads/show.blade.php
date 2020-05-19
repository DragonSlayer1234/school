@extends('admin.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('admin.layouts.alert')

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <span class="mr-1"><i class="fas fa-pen"></i></span>
                            {{$olympiad->name}}

                        </h5>
                    </div>

                    <div class="card-body">
                        <p>
                            Описание: {{ $olympiad->description }}
                        </p>
                        <p>Предмет: {{$olympiad->subject->name}}</p>
                        <p>Цена: {{ $olympiad->paid ? $olympiad->cost : 'Free' }}</p>
                        <p>Начало: {{ $olympiad->getStartDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>
                        <p>Конец: {{ $olympiad->getEndDate()->isoFormat('D MMMM YYYY г. в HH:mm') }}</p>

                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        @if ($olympiad->isModeration())
                            <form action="{{ route('admin.olympiad.accept', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Принять</button>
                            </form>

                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#rejectModal">Отклонить</button>

                            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Reject Olympiad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('admin.olympiad.reject', $olympiad->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                          <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" placeholder="Type a reason"></textarea>
                                            @error('reason')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Отклонить</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                        @elseif ($olympiad->isUpcoming())
                            <form action="{{ route('admin.olympiad.start', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Принять</button>
                            </form>

                        @elseif ($olympiad->isCheck())
                            <form action="{{ route('admin.olympiad.finish', $olympiad->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Принять</button>
                            </form>

                        @endif
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">

                    <div class="card-body">
                        <a href="{{ route('download', ['path' => $olympiad->work->path]) }}">
                            <i class="fas fa-download"></i> Скачать задание
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <span class="mr-1"><i class="fas fa-users"></i></span>
                            Участники
                        </h5>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($olympiad->participants as $participant)
                                <li class="list-group-item">
                                    - {{ $participant->student->getFullname() }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
