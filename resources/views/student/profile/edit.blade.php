@extends('student.layouts.app')

@section('main-content')

    <div class="card">
        <div class="card-header">
            <h5 class="text-center mb-0">Profile</h5>
        </div>

        <div class="card-body">
            <div class="row profile mt-2 justify-content-center">
                <div class="col-4 text-center">
                    <div><img src="https://sun9-63.userapi.com/impg/c857016/v857016920/b856d/Tfxd3M2Ugt8.jpg?size=200x0&quality=90&sign=2946bd9aad1ca4bd221936305f95c4d4" alt=""></div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary update-btn">Update</button>
                    </div>
                </div>

                <div class="col-7 pl-0 pt-3">
                    <form method="post" action="{{route('student.profile.update')}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="firstname" class="col-2 col-form-label pr-0">Firstname</label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" id="firstname" placeholder="Enter firstname" name="firstname" value="{{$student->firstname}}">
                                @error('firstname')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-2 col-form-label pr-0">Surname</label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Enter surname" name="surname" value="{{$student->surname}}">
                                @error('surname')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-2 col-form-label pr-0">Lastname</label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lastname" placeholder="Enter lastname" name="lastname" value="{{$student->lastname}}">
                                @error('lastname')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="my-4">

            <div class="row justify-content-center">
                <div class="col-7">
                    <h5 class="text-center">Change Password</h5>

                    <div class="mt-4">
                        <form method="POST" action="{{ route('change-password') }}">
                            @csrf

                            <div class="form-group">
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Enter current password">

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" style="width: 150px">
                                    {{ __('Change') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
