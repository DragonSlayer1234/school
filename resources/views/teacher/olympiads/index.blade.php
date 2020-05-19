@extends('layouts.app')


@section('content')

    <main class="container py-5">
      <div class="row">
        <div class="col-12">


            <a class="float-right btn btn-main" href="{{ route("teacher.olympiad.create") }}">
                <i class="fas fa-plus"></i>
            </a>

          <h3 class="text-center title">Олимпиады</h3>

          <h5>Сортировка по:</h5>

          <div class="my-3">
              <form class="form-inline" action="{{ route('teacher.olympiad.index') }}">
                      <select class="form-control custom-select mr-2" name="status">
                          <option disabled>Тип олимпиады</option>
                          <option value="" {{ $selected->status === null ? 'selected' : '' }}>Все олимпиады</option>
                          @foreach (App\Olympiad::getStatuses() as $key => $value)
                              <option
                                  value="{{ $key }}"
                                  {{ $key === $selected->status ? 'selected' : '' }}
                              >
                                  {{ $value }}
                              </option>
                          @endforeach
                      </select>

                      <select class="form-control custom-select mr-2" name="date">
                          <option {{ $selected->date === null ? 'selected' : '' }} disabled>По дате</option>
                          <option {{ $selected->date === 'new' ? 'selected' : '' }} value="new">Сначала новые</option>
                          <option {{ $selected->date === 'old' ? 'selected' : '' }} value="old">Сначала старые</option>
                      </select>

                      <select class="form-control custom-select mr-2" name="subject">
                          <option disabled>По предмету</option>
                          <option value="" {{ $selected->subject === null ? 'selected' : '' }}>Все предметы</option>
                          @foreach ($subjects as $subject)
                              <option {{ (int)$selected->subject === $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endforeach
                      </select>

                      <button type="submit" class="btn btn-primary">Сортировать</button>
              </form>


          </div>

        <table class="table olympiad-table">
          <thead>
            <tr>
              <th>Олимпиада</th>
              <th>Дата проведения</th>
              <th>Цена</th>
              <th>Предмет</th>
              <th>Длительность</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($olympiads as $olympiad)
                <tr>
                  <td>
                      @if ($olympiad->isCheck())
                        <a href="{{ route('teacher.olympiad.check', $olympiad) }}" class="olympiad-link">{{ $olympiad->name }}</a>
                      @elseif ($olympiad->isRejected())
                        <a href="{{ route('teacher.olympiad.reason', $olympiad) }}" class="olympiad-link">{{ $olympiad->name }}</a>
                      @else
                        <a href="{{ route('olympiad.show', $olympiad) }}" class="olympiad-link">{{ $olympiad->name }}</a>
                      @endif
                  </td>
                  <td>
                      {{ $olympiad->getStartDate()->format('d.m.Y') }}
                      -
                      {{ $olympiad->getEndDate()->format('d.m.Y') }}
                  </td>
                  <td>{{ $olympiad->cost === 0 ? 'Бесплатно' : "$olympiad->cost тг." }}</td>
                  <td>{{ $olympiad->subject->name }}</td>
                  <td>{{ $olympiad->getDuration() }}</td>
                </tr>
            @endforeach

          </tbody>
        </table>
        </div>
      </div>
    </main>

@endsection
