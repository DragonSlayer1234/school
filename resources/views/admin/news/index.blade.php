@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

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

                            <div class="col-4 text-right">
                                <a class="btn btn-main" href="{{ route("admin.news.create") }}">
                                    <i class="fas fa-plus"></i> Создать Новость
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Новость</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $post)
                                    <tr>
                                        <td>
                                            {{ $post->title }}
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
