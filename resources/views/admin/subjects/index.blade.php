@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">

                <div class="card subject">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h5 class="mb-4">
                            Предметы
                            <a class="btn btn-main float-right pt-0" href="{{ route("admin.subject.create") }}">
                                <i class="fas fa-plus"></i> Добавить предмет
                            </a>
                        </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 10%;"></th>
                                    <th style="width:75%;">Название</th>
                                    <th class="text-center" style="width: 10%;">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>
                                            {{ $subject->id }}
                                        </td>
                                        <td>
                                            <img src="{{ $subject->image }}" class="rounded-circle" alt="">
                                        </td>
                                        <td>
                                            {{ $subject->name }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route("admin.subject.edit", $subject->id) }}"><i class="fas fa-pen"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
