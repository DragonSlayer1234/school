@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">

                <div class="card subject">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Поиск по названию">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <a class="btn btn-main" href="{{ route("admin.subject.create") }}">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 90%;">Предмет</th>
                                    <th class="text-center" style="width: 10%;">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-2">
                                                    <img class="rounded-circle" src="/storage/{{ $subject->image }}" alt="">
                                                </div>
                                                <div class="col-10 align-self-center">
                                                    {{ $subject->name }}
                                                </div>
                                            </div>
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
