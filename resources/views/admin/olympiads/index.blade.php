@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.alert')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('admin.olympiad.index') }}">
                        <div class="form-row">
                            <div class="form-group col mb-0">
                                <select class="form-control custom-select" name="status">
                                    @foreach (App\Olympiad::getStatuses() as $key => $value)
                                        <option
                                            value="{{ $key }}"
                                            {{ $key === $status ? 'selected' : '' }}
                                        >
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col mb-0">
                                <button class="btn px-0" type="submit"><i class="fas fa-lg fa-sort-amount-up-alt"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Поиск по названию">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%;">Название</th>
                        <th class="text-center" style="width: 20%;">Автор</th>
                        <th class="text-center" style="width: 15%;">Предмет</th>
                        <th class="text-center" style="width: 35%;">Дата проведения</th>
                        <th class="text-center" style="width: 10%;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($olympiads as $olympiad)
                        <tr>
                            <td>{{ $olympiad->name }}</td>
                            <td class="text-center">{{ $olympiad->teacher->getFullname() }}</td>
                            <td class="text-center">{{ $olympiad->subject->name }}</td>
                            <td class="text-center">{{ $olympiad->getAllDates() }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.olympiad.show', $olympiad->id) }}">Подробнее</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $olympiads->links() }}
        </div>
    </div>

@endsection
