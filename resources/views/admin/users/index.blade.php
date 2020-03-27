@extends('admin.layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <ul class="nav nav-pills nav-fill custom-tabs">
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'student' ? 'active' : '' }}" href="{{ route('admin.student.index') }}">Ученики</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Учителя</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offset-1 col-5 pr-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Поиск по имени">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>


                        </div>
                        <div class="col-1">
                            <a class="btn btn-main" href="{{ route("admin.$active.create") }}">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-4" style="width: 50%;">Пользователь</th>
                                <th class="text-center">Статус</th>
                                <th class="text-center" style="width: 20%;">Пароль</th>
                                <th class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="pl-4">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="user-image rounded-circle" src="https://sun9-57.userapi.com/c857016/v857016920/b8572/koBwSrRB70I.jpg?ava=1">
                                            </div>

                                            <div class="col-10 align-self-center">
                                                <div class="fullname text-truncate">{{ $user->getFullname() }}</div>
                                                <div class="username">{{ $user->username }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                        class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}"
                                        >{{ $user->status }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $user->generated_password ?? 'Неизвестный' }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route("admin.$active.edit", $user->id) }}"><i class="fas fa-pen"></i></a>
                                        <form class="d-inline-block" action="{{ route("admin.$active.reset-password", $user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-custom btn-danger"><i class="fas fa-redo"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
