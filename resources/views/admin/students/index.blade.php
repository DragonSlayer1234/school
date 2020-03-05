@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-11">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.student.index') }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.teacher.index') }}">Teachers</a>
                        </li>
                    </ul>
                </div>
                <div class="col-1 text-right">
                    <a class="link-custom" href="{{ route('admin.student.create') }}"><i class="fas fa-user-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th class="pl-4" style="width: 50%;">User</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Password</th>
                        <th class="text-right pr-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="pl-4">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="user-image rounded-circle" src="https://sun9-57.userapi.com/c857016/v857016920/b8572/koBwSrRB70I.jpg?ava=1">
                                    </div>

                                    <div class="col-10 align-self-center">
                                        <div class="fullname text-truncate">{{ $student->getFullname() }}</div>
                                        <div class="username">{{ $student->login }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="@if($student->status === 'active') badge badge-success
                                    @elseif($student->status === 'generated password') badge badge-danger
                                    @elseif($student->status === 'generated user') badge badge-info
                                    @endif"
                                >{{ $student->status }}</span>
                            </td>
                            <td class="align-middle text-center">
                                Unknown
                            </td>
                            <td class="align-middle text-right">
                                <a class="link-custom" href="{{ route('admin.student.edit', $student->id) }}"><i class="fas fa-pen"></i></a>
                                <form class="d-inline-block" action="{{ route('admin.student.reset-password', $student->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-custom"><i class="fas fa-redo"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
