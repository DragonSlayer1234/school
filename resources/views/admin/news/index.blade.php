@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="card subject">
                    {{-- <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Поиск по названию">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 text-right">
                                <a class="btn btn-main" href="{{ route("admin.news.create") }}">
                                    <i class="fas fa-plus"></i> Создать Новость
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h4 class="mb-3">
                            Новости
                            <a class="btn btn-main float-right pt-0" href="{{ route("admin.news.create") }}">
                                <i class="fas fa-plus"></i> Создать Новость
                            </a>
                        </h4>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th style="width: 30%;">Дата редактирования</th>
                                    <th style="width: 10%;">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $post)
                                    <tr>
                                        <td>
                                            {{ $post->id }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td class="text-center">
                                            {{$post->created_at->isoFormat('D MMM YYYY')}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="mr-3"><i class="fas fa-pen"></i></a>
                                            {{-- <a href="" class="btn-danger"><i class="fas fa-times fa-lg"></i></a> --}}
                                            <form class="d-inline-block" action="{{ route('admin.news.delete', $post) }}" method="post">
                                                @csrf
                                                <button class="p-0 btn btn-danger" type="submit"><i class="fas fa-times fa-lg"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
