@extends('layouts.app')

@section('content')

    <main class="container py-5">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center title">Олимпиады</h3>


        <div class="text-center my-4">
          <a href="{{ route('olympiad.index', ['status' => 'finished']) }}" class="type type-left {{ $status === 'finished' ? 'type-active': '' }}">Прошедшие</a>
          <a href="{{ route('olympiad.index', ['status' => 'active']) }}" class="type type-center {{ $status === 'active' ? 'type-active': '' }}">Активные</a>
          <a href="{{ route('olympiad.index', ['status' => 'upcoming']) }}" class="type type-right {{ $status === 'upcoming' ? 'type-active': '' }}">Будущие</a>
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
                  <td>{{ $olympiad->cost === 0 ? 'Бесплатно' : $olympiad->cost }}</td>
                  <td>{{ $olympiad->subject->name }}</td>
                  <td>{{ $olympiad->getDuration() }}</td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{ $olympiads->links() }}
        </div>
      </div>
    </main>
@endsection
