@extends('layouts.app')

@section('content')

    <main class="container py-5">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center title">Олимпиады</h3>


        <div class="text-center my-4">
          <a href="{{ route('olympiad.index', ['status' => 'finished']) }}" class="type type-left {{ $selected->status === 'finished' ? 'type-active': '' }}">Прошедшие</a>
          <a href="{{ route('olympiad.index', ['status' => 'active']) }}" class="type type-center {{ $selected->status === 'active' ? 'type-active': '' }}">Активные</a>
          <a href="{{ route('olympiad.index', ['status' => 'upcoming']) }}" class="type type-right {{ $selected->status === 'upcoming' ? 'type-active': '' }}">Будущие</a>
        </div>

        <h5>Сортировка по:</h5>

        <div class="my-3">
            <form class="form-inline" action="{{ route('olympiad.index') }}">
                    <input type="hidden" name="status" value="{{ $selected->status }}">

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
                  <td><a href="{{ route('olympiad.show', $olympiad) }}" class="olympiad-link">{{ $olympiad->name }}</a></td>
                  <td>
                      {{ $olympiad->getStartDate()->format('d.m.Y') }}
                      -
                      {{ $olympiad->getEndDate()->format('d.m.Y') }}
                  </td>
                  <td>{{ $olympiad->getCost() }}</td>
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
